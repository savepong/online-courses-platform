<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
use App\Carousel;

class CarouselController extends Controller
{
    protected $limit = 10;
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path(config('project.image.directory') . "carousels/");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Carousel $carousel)
    {
        authorizeRoles(['admin']);
        return view("carousel.create", compact('carousel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CarouselRequest $request)
    {
        authorizeRoles(['admin']);
        $data = $this->handleRequest($request);

        $carousel = Carousel::create($data);
        
        return redirect(route('admin.carousels'))->with("alert-success", "New carousel was created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        authorizeRoles(['admin']);
        $carousel = Carousel::findOrFail($id);
        return view('carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CarouselRequest $request, $id)
    {
        authorizeRoles(['admin']);
        $data = $this->handleRequest($request);

        $carousel = Carousel::findOrFail($id);
        $oldImage = $carousel->image;
        $carousel->update($data);

        if(!empty($oldImage) && $oldImage != $carousel->image){
            $this->removeImage($oldImage);
        }

        return redirect(route('admin.carousels'))->with('alert-success', 'Your carousel "' . $carousel->title . '" was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        authorizeRoles(['admin']);

        $carousel = Carousel::findOrFail($id);
        if(!empty($carousel->image)){
            $this->removeImage($carousel->image);
        }
        $carousel->delete();

        return redirect(route('admin.carousels'))->with('alert-warning', 'Your carousel "' . $carousel->title . '" was deleted successfully.');
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
                $width = config('project.image.thumbnail.width');
                $height = config('project.image.thumbnail.height');
                $thumbnail = $imageId . "_thumb." . $extension;

                Image::make($destination . '/' . $fileName)
                    ->resize($width, $height, function ($c) {
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
