<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Http\Requests;
use App\Lesson;
use App\Course;
use App\User;

class LessonController extends Controller
{
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path(config('project.file.directory') . "lessons/");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseId = request('course');
        
        if(isset($courseId)){
            $course = Course::findOrFail($courseId);
            $lessons = $course->lessons;

            return view('course.lesson.index', compact('lessons', 'course'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Lesson $lesson)
    {
        $authUser = request()->user();
        $course = Course::where('id', request('course'))->firstOrFail();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            return view('course.lesson.create', compact('lesson', 'course'));
        }

        return abort(403, "Forbidden access!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authUser = request()->user();
        $course = Course::findOrFail($request['course_id'])->first();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            
            $data = $this->handleRequest($request);
            Lesson::create($data);

            return redirect()->back()->with('alert-success', 'Your lesson  was created successfully.');
        }

        return abort(403, "Forbidden access!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $authUser = request()->user();
        $course = Course::where('id', $lesson->course_id)->firstOrFail();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            return view('course.lesson.edit', compact('lesson', 'course'));
        }

        return abort(403, "Forbidden access!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\LessonRequest $request, Lesson $lesson)
    {
        $authUser = request()->user();
        $course = Course::where('id', $lesson->course_id)->firstOrFail();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            $data = $this->handleRequest($request);
            $oldFile = $lesson->file;
            $lesson->update($data);
            if(!empty($oldFile) && $lesson->file != $oldFile){
                $this->removeFile($oldFile);
            }

            return redirect()->back()->with("alert-success", "Lesson was update successfully.");
        }

        return abort(403, "Forbidden access!");
    }


    public function homeworkUpload(Request $request, Lesson $lesson)
    {
        $user = request()->user();
        $student = $lesson->students()->where('lesson_id', $lesson->id)->where('user_id', $user->id)->get()->first();

        if($student){
            if($request->hasFile('file')){
                $file = $request->file('file');
                $fileId = uniqid();
                $extension = $file->getClientOriginalExtension();
                $fileName = $fileId . "." . $extension;
                $destination = $this->uploadPath;
    
                $successUploaded = $file->move($destination, $fileName);
    
                $student->pivot->file = $fileName;
                $student->pivot->save();

                return redirect()->back()->with("alert-success", "Sent homework successfully.");
            }
        }

        return abort(403, "Forbidden access!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $authUser = request()->user();
        $course = $lesson->course;

        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            $lessonFile = $lesson->file;
            $lesson->delete();

            if(!empty($lessonFile)){
                $this->removeFile($lessonFile);
            }

            return redirect(route('course.edit', $course->slug))->with('alert-warning', 'Your lesson was deleted.');
        }

        return abort(403, "Forbidden access!");
    }

    public function downloadFile(Lesson $lesson)
    {
        $filePath = $this->uploadPath . $lesson->file;
        $fileName = $lesson->filename;

        if(file_exists($filePath)){
            return response()->download($filePath, $fileName);
        }

        abort(404);
    }

    public function downloadHomeworkFile(Lesson $lesson)
    {
        $user = User::findOrFail(request()->user()->id);
        $student = $lesson->students()->where('lesson_id', $lesson->id)->where('user_id', $user->id)->first();
        $filePath = $this->uploadPath . $student->pivot->file;
        $fileName = $lesson->homework_filename;

        if(file_exists($filePath)){
            return response()->download($filePath, $fileName);
        }

        abort(404);
    }

    public function deleteFile(Lesson $lesson, $file)  
    {
        $authUser = request()->user();
        $course = $lesson->course;

        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $course->author_id){
            if($lesson->file == $file){
                if($this->removeFile($file)){
                    $lesson->file = null;
                    $lesson->save();
                    return redirect()->back()->with('alert-success', "Delete file successfully.");
                }
            } 

            abor(404);
        }
        
        return abort(403, "Forbidden access!");
    }

    private function handleRequest($request)
    {
        $data = $request->all();

        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileId = uniqid();
            $extension = $file->getClientOriginalExtension();
            $fileName = $fileId . "." . $extension;
            $destination = $this->uploadPath;

            $successUploaded = $file->move($destination, $fileName);

            $data['file'] = $fileName;
        }

        return $data;
    }

    public function removeFile($file)
    {
        if(! empty($file)){
            $filePath = $this->uploadPath . $file;
            if(file_exists($filePath)){
                unlink($filePath);

                return true;
            }
        }

        return false;
    }
}
