<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
use App\Course;
use App\Lesson;
use App\Category;
use App\User;
use App\Tag;
use App\Carousel;
use App\Coupon;
use App\Post;

class CourseController extends Controller
{
    protected $limit = 20;
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path(config('project.image.directory') . "courses/");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latestFirst()
                        ->published()
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);

        $carousels = Carousel::whereNotNull('image')->orderBy('updated_at', 'DESC')->get();

        return view('course.index', compact('courses', 'carousels'));
    }

    

    public function category(Category $category)
    {
        $categoryName = $category->title;

        $courses = $category->courses()
                        ->published()
                        ->with('author', 'tags')
                        ->paginate($this->limit);

        return view('course.index', compact('courses', 'categoryName'));
    }

    public function author(User $author)
    {
        $courses = $author->courses()
                        ->published()
                        ->with('category', 'tags')
                        ->paginate($this->limit);

        return view('account.index', compact('courses', 'author'));
    }


    public function tag(Tag $tag)
    {
        $tagName = $tag->name;

        $courses = $tag->courses()
                        ->published()
                        ->with('category', 'author')
                        ->paginate($this->limit);

        return view('course.index', compact('courses', 'tagName'));
    }


    public function students(Course $course)
    {
        $authUser = request()->user();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){

            $students = $course->students()->paginate($this->limit);

            return view('course.students', compact('course', 'students'));
        }

        return abort(403, "Forbidden access!");
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        authorizeRoles(['admin', 'editor', 'author']);
        $authorUsers = User::authorUsers()->get()->pluck('name', 'id');
        return view('course.create', compact('course', 'authorUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CourseRequest $request)
    {
        authorizeRoles(['admin', 'editor', 'author']);
        $data = $this->handleRequest($request);
        if(!isset($data['price'])) $data['price'] = 0;

        $newCourse = $request->user()->courses()->create($data);
        $newCourse->createTags($data['course_tags']);

        return redirect(route('admin.courses'))->with('alert-success', 'Your course was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.view', compact('course'));
    }

    public function view(Course $course)
    {
        $discount = $this->getCouponDiscount($course->sale_price);
        $net_price = $course->sale_price - $discount;

        return view('course.view', compact('course', 'discount', 'net_price'));
    }


    public function enroll(Request $request, Course $course)
    {
        $user = $request->user();
        if($user->enrolled->find($course->id) == null && $course->price == 0){
            $course->enroll($user->id);
            return redirect(route('user.profile', $user->username))->with('alert-success', "Your have enrolled course {$course->title} successfully.");
        }

        return redirect(route('course.view', $course->slug));
    }

    public function checkout(Request $request, Course $course)
    {
        if($course->sale_price >= 0){
            $discount = $this->getCouponDiscount($course->sale_price);
            $net_price = $course->sale_price - $discount;

            return view('payment.checkout', compact('course', 'discount', 'net_price'));
        }

        return redirect()->back()->with('alert-info', "This course is Free.");
    }

    public function learn(Request $request, Course $course)
    {
        /** Check Student */
        $user = $request->user();
        $student = $course->students->where('id', $user->id)->first();
        if(!$student){
            return redirect(route('course.view', $course->slug))->with('alert-warning', "Please Enroll this course first.");
        }

        $lesson = Lesson::where(['id' => request('lesson'), 'course_id' => $course->id])->first();

        if($lesson){
            return view('course.lesson.learn', compact('course', 'lesson'));
        }else{
            abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Lesson $lesson)
    {
        $authUser = request()->user();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            $authorUsers = User::authorUsers()->get()->pluck('name', 'id');

            return view('course.edit', compact('course', 'lesson', 'authorUsers'));
        }
        
        return abort(403, "Forbidden access!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CourseRequest $request,Course $course)
    {
        $authUser = request()->user();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            $data = $this->handleRequest($request);
            if(!isset($data['published_at'])) $data['published_at'] = null;

            $oldImage = $course->image;
            $course->update($data);
            if(!empty($oldImage) && $oldImage != $course->image){
                $this->removeImage($oldImage);
            }

            $course->createTags($data['course_tags']);

            return redirect(route('admin.courses'))->with('alert-success', 'Your course "' . $course->title . '" was updated successfully.');
        }
        
        return abort(403, "Forbidden access!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $authUser = request()->user();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            $courseId = $course->id;
            $courseTitle = $course->title;
            $course->delete();

            return redirect(route('admin.courses'))->with('alert-trash', ['Your course "' . $courseTitle . '" moved to Trash.', ['method' => 'PUT', 'route' => ['course.restore', $courseId]] ]);
        }

        return abort(403, "Forbidden access!");
    }

    public function removeStudent(Course $course, $id)
    {
        $authUser = request()->user();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            $student = User::findOrFail($id);
            $course->students()->detach($id);

            return redirect(route('course.students', $course->slug))->with('alert-warning', 'Your student name "' . $student->name . '" has been removed.');
        }

        return abort(403, "Forbidden access!");
    }

    public function restore($id)
    {
        $authUser = request()->user();
        $course = Course::withTrashed()->findOrFail($id);

        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            $course->restore();

            return redirect(route('admin.courses'))->with('alert-success', 'Your course has been moved from the Trash.');
        }

        return abort(403, "Forbidden access!");
    }

    private function handleRequest($request)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageId = uniqid();
            $extension = $image->getClientOriginalExtension();
            $fileName = $imageId . "." . $extension;
            $destination = $this->uploadPath;

            $successUploaded = $image->move($destination, $fileName);

            if($successUploaded){
                $width = config('project.image.width');
                $height = config('project.image.height');
                $thumbWidth = config('project.image.thumbnail.width');
                $thumbHeight = config('project.image.thumbnail.height');
                $thumbnail = $imageId . "_thumb." . $extension;

                /** Resize image */
                Image::make($destination . '/' . $fileName)
                ->resize($width, $height, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                })
                ->save($destination . '/' . $fileName);  
                
                /** Make & Resize thumbnail image */
                Image::make($destination . '/' . $fileName)
                    ->resize($thumbWidth, $thumbHeight, function ($c) {
                        $c->aspectRatio();
                        $c->upsize();
                    })
                    ->save($destination . '/' . $thumbnail);    
            }

            $data['image'] = $fileName;
        }

        return $data;
    }

    public function removeImage($image)
    {
        if(! empty($image)){
            $imagePath = $this->uploadPath . '/' . $image;
            $ext = substr(strrchr($image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if(file_exists($imagePath)) unlink($imagePath);
            if(file_exists($thumbnailPath)) unlink($thumbnailPath);
        }
    }

}
