<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    protected $limit = 10;
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path(config('project.media.directory') . "posts/images/");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latestFirst()
                        ->published()
                        ->filter(request()->only(['q']))
                        ->paginate($this->limit);

        

        return view('post.index', compact('posts'));
    }


    public function category(Category $category)
    {
        $posts = $category->posts()
                        ->published()
                        ->with('author', 'tags')
                        ->paginate($this->limit);
        
        $categoryId = $category->id;

        return view('post.index', compact('posts', 'categoryId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        authorizeRoles(['admin', 'editor', 'author']);

        $authorUsers = User::authorUsers()->get()->pluck('name', 'id');
        return view('post.create', compact('post', 'authorUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {
        $data = $this->handleRequest($request);
        if(!isset($data['published_at'])) $data['published_at'] = null;

        $post = $request->user()->posts()->create($data);
        $post->createTags($data['post_tags']);

        return redirect(route('admin.posts'))->with('alert-success', 'Your post was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $authUser = request()->user();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $post->author_id){
            $authorUsers = User::authorUsers()->get()->pluck('name', 'id');

            return view('post.edit', compact('post', 'authorUsers'));
        }
        
        return abort(403, "Forbidden access!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, Post $post)
    {
        $authUser = request()->user();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $post->author_id){
            $data = $this->handleRequest($request);
            if(!isset($data['published_at'])) $data['published_at'] = null;

            $oldImage = $post->image;
            $post->update($data);
            if(!empty($oldImage) && $oldImage != $post->image){
                $this->removeImage($oldImage);
            }

            $post->createTags($data['post_tags']);

            return redirect(route('admin.posts'))->with('alert-success', 'Your post "' . $post->title . '" was updated successfully.');
        }
        
        return abort(403, "Forbidden access!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $authUser = request()->user();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $post->author_id){
            $postId = $post->id;
            $postTitle = $post->title;
            $post->delete();

            return redirect(route('admin.posts'))->with('alert-trash', ['Your post "' . $postTitle . '" moved to Trash.', ['method' => 'PUT', 'route' => ['post.restore', $postId]] ]);
        }

        return abort(403, "Forbidden access!");
    }
    
    public function forceDestroy($id)
    {
        $authUser = request()->user();
        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $post->author_id){
            $post = Post::withTrashed()->findOrFail($id);

            $postId = $post->id;
            $postTitle = $post->title;
            $postImage = $post->image;

            $post->forceDelete();
            $this->removeImage($postImage);

            return redirect()->back()->with('alert-warning', 'Your post "' . $postTitle . '" has been removed successfully.');
        }

        return abort(403, "Forbidden access!");
    }


    public function restore($id)
    {
        $authUser = request()->user();

        if($authUser->authorizeRoles(['admin', 'editor']) || $authUser->id == $post->author_id){
            $post->withTrashed()->findOrFail($id)->restore();

            return redirect(route('admin.posts'))->with('alert-success', 'Your post has been moved from the Trash.');
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
                $width = config('project.media.image.width');
                $height = config('project.media.image.height');
                $thumbWidth = config('project.media.image.thumbnail.width');
                $thumbHeight = config('project.media.image.thumbnail.height');
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
