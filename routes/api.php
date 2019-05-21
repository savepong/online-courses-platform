<?php

use Illuminate\Http\Request;
use App\Lesson;
use App\User;
use App\Role;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::apiResource('/courses', 'CourseController');

Route::get('/learning/progress/{lesson_id}/{user_id}/{progress}', function ($lesson_id, $user_id, $progress){
    $lesson = Lesson::findOrFail($lesson_id);
    $student = $lesson->students()->where('lesson_id', $lesson_id)->where('user_id', $user_id)->get()->first();

    if(isset($student->pivot->progress)){
        if($student->pivot->progress < $progress){
            $student->pivot->progress = $progress;
            $student->pivot->save();
            $data['message'] = "Progress " . $progress . "% updated";
        }else{
            $data['message'] = "Completed";
        }
    }else{
        $lesson->students()->attach($user_id);
        $data['message'] = "Attached";
    }

    return response()->json($data);
    
})->name('learning.progress');



Route::post('/v1/student', function(Request $request){
    $data = $request->all();
    $data['password'] = bcrypt($data['password']);

    $user = new User;
    $user->name = $request->name;
    $user->username = $request->username;
    $user->phone_number = $request->phone_number;
    $user->password = bcrypt($request->password);
    
    if($user->save()){
        $user->attachRole(Role::where('name', 'student')->first());
        $response['status'] = 'success';
        $response['data'] = $user;

        return response()->json($response, 201);
    }else{
        $response['status'] = 'error';
        $response['error'] = 'Username is exists!';
    }

    return response()->json($response, 201);
    
})->name('student.create');



Route::post('/v1/media/upload', function(Request $request){

    if($request->hasFile('image')){
        $image = $request->file('image');
        $imageId = uniqid();
        $extension = $image->getClientOriginalExtension();
        $fileName = $imageId . "." . $extension;
        $destination = config('project.media.directory') . "posts/uploads/";

        $successUploaded = $image->move($destination, $fileName);

        if($successUploaded){
            $width = config('project.media.image.width');
            $height = config('project.media.image.height');

            /** Resize image */
            Image::make($destination . '/' . $fileName)
            ->resize($width, $height, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            })
            ->save($destination . '/' . $fileName);   
        }

        $data['url'] = asset('media/posts/uploads/' . $fileName);
        return response()->json($data, 200);
    }else{
        $data = ['message' => 'No image'];
        return response()->json($data, 404);
    }
    

})->name('media.upload');


/*
Route::get('/develop', function (){
    $user = App\User::whereEmail(null)->first();
  
    if (!$user) {
        echo 'n';
    }else{
        echo 'y';
    }
    dd($user);
});
*/