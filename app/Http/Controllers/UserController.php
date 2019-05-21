<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Contoller;
use Intervention\Image\Facades\Image;
use App\User;
use App\Course;

class UserController extends Controller
{
    protected $limit = 10;
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path(config('project.image.directory') . "avatar/");
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


    public function profile(User $user)
    {
        return view('account.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        authorizeRoles(['admin']);
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {
        authorizeRoles(['admin']);
        $data = $this->handleRequest($request);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->attachRole($request->role);

        return redirect(route('user.profile', $user->username))->with("alert-success", "New user was created successfully.");
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
    public function edit(Request $request, $id)
    {
        $authUser = $request->user();
        if($authUser->authorizeRoles('admin')){
            $user   =   User::findOrFail($id);
            $users  =   User::where('id', '!=', $user->id)->whereHas('roles', function ($query) {
                                $query->whereIn('name', ['admin', 'editor', 'author']);
                            })->pluck('name', 'id');
            return view('user.edit', compact('user', 'users'));
        }
        
        return abort(403, "Forbidden access!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        $authUser = $request->user();
        if($authUser->authorizeRoles('admin')){
            $data = $this->handleRequest($request);
            $data['password'] = bcrypt($data['password']);

            $user = User::findOrFail($id);
            $oldAvatar = $user->avatar;
            $user->update($data);
            if(!empty($oldAvatar) && $user->avatar != $oldAvatar){
                $this->removeAvatar($oldAvatar);
            }

            $user->detachRoles();
            $user->attachRole($request->role);

            return redirect(route('user.profile', $user->username))->with("alert-success", "User was updated successfully.");
        }
        
        return abort(403, "Forbidden access!");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {
        $authUser = $request->user();
        if($authUser->authorizeRoles('admin') && $authUser->id != $id){
            $user = User::findOrFail($id);
            $deleteOption = $request->delete_option;
            $selectedUser = $request->selected_user;
            if($deleteOption == "delete"){
                // Delete all course
                // $user->courses()->withTrashed()->forceDelete();
                $user->courses()->delete();
                $user->courses()->withTrashed()->update(['author_id' => config('project.default_user_id')]);
            }elseif($deleteOption == "attribute"){
                $user->courses()->update(['author_id' => $selectedUser]);
            }

            $userAvatar = $user->avatar;
            $user->delete();
            $this->removeAvatar($userAvatar);


            return redirect(route("admin.users"))->with("alert-success", "User was deleted successfully.");
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
                $width = '200';
                $height = '200';
                Image::make($destination . '/' . $fileName)
                    ->fit($width, $height, function ($c) {
                        $c->aspectRatio();
                        $c->upsize();
                    })
                    ->save($destination . '/' . $fileName);    
            }

            $data['avatar'] = $fileName;
        }

        return $data;
    }

    public function removeAvatar($image)
    {
        if(! empty($image)){
            $imagePath = $this->uploadPath . $image;
            if(file_exists($imagePath)) unlink($imagePath);
        } 
    }
}
