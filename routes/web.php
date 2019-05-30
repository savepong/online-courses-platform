<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontendController@index')->name('index')->where('any', '.*');
Route::get('/articles', 'FrontendController@articles')->name('articles');


/** Local Streaming */
Route::get('/player', function () {
    $video = "video/myvideo.mp4";
    $mime = "video/mp4";
    $title = "Os Simpsons";
    return view('player')->with(compact('video', 'mime', 'title'));
});

Route::get('/video/{filename}', function ($filename) {
    // Pasta dos videos.
    $videosDir = base_path('resources/assets/videos');
    if (file_exists($filePath = $videosDir."/".$filename)) {
        $stream = new \App\Http\VideoStream($filePath);
        return response()->stream(function() use ($stream) {
            $stream->start();
        });
    }
    return response("File doesn't exists", 404);
});



Auth::routes();
Route::middleware(['auth'])->group(function () {

    /** User & Account */
    Route::resource('user', 'UserController');
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/profile', 'AccountController@profile')->name('profile');
    Route::get('/account/edit', 'AccountController@edit')->name('account.edit');
    Route::put('/account/edit', 'AccountController@update')->name('account.update');
    Route::get('/enrolled', 'AccountController@enrolled')->name('courses.enrolled');

    
    /** Course */
    Route::resource('course', 'CourseController');
    Route::get('/enroll/{course}', 'CourseController@enroll')->name('course.enroll');
    Route::get('/learn/{course}', 'CourseController@learn')->name('course.learn');
    Route::get('/course/{course}/students', 'CourseController@students')->name('course.students');
    Route::get('/checkout/{course}', 'CourseController@checkout')->name('course.checkout');
    Route::put('/course/restore/{id}', 'CourseController@restore')->name('course.restore');
    Route::delete('/course/{course}/student/{id}', 'CourseController@removeStudent')->name('course.student.remove');


    /** Lesson */
    Route::resource('lesson', 'LessonController');
    Route::get('/lesson/{lesson}/file/download', 'LessonController@downloadFile')->name('lesson.file.download');
    Route::get('/lesson/{lesson}/file/delete/{file}', 'LessonController@deleteFile')->name('lesson.file.delete');
    Route::get('/lesson/{lesson}/homework/download', 'LessonController@downloadHomeworkFile')->name('lesson.homework.download');
    Route::post('/lesson/{lesson}/homework', 'LessonController@homeworkUpload')->name('lesson.homework.upload');
    

    /** Category */
    Route::resource('category', 'CategoryController');


    /** Carousel */
    Route::resource('carousel', 'CarouselController');


    /** Post */
    Route::resource('post', 'PostController');
    Route::put('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::delete('/post/force-destroy/{id}', 'PostController@forceDestroy')->name('post.force-destroy');


    /** Coupon */
    Route::resource('coupon', 'CouponController');
    Route::post('/generate/coupon', 'CouponController@generate')->name('coupon.generate');


    /** Order */
    Route::post('/checkout', 'OrderController@checkout')->name('order.checkout');
    Route::get('/billing', 'OrderController@index')->name('order.index');
    Route::get('/invoice/{order}', 'OrderController@show')->name('order.show');


    /** Payment */
    Route::get('/payment/{order}', 'PaymentController@create')->name('payment.create');
    Route::POST('/payment/{order}', 'PaymentController@store')->name('payment.store');
    Route::post('/payment/approve/{payment}', 'PaymentController@approve')->name('payment.approve');
    Route::post('/payment/cancel/{payment}', 'PaymentController@cancel')->name('payment.cancel');
    

    /** Admin */
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/courses/{tab?}', 'AdminController@courses')->name('admin.courses');
    Route::get('/admin/categories', 'AdminController@categories')->name('admin.categories');
    Route::get('/admin/carousels', 'AdminController@carousels')->name('admin.carousels');
    Route::get('/admin/posts/{tab?}', 'AdminController@posts')->name('admin.posts');
    Route::get('/admin/orders/{tab?}', 'AdminController@orders')->name('admin.orders');
    Route::get('/admin/invoice/{order}', 'AdminController@invoice')->name('admin.invoice');
    Route::get('/admin/earnings', 'AdminController@earnings')->name('admin.earnings');
    Route::get('/admin/statement', 'AdminController@statement')->name('admin.statement');
    Route::get('/admin/users/{tab?}', 'AdminController@users')->name('admin.users');
    Route::get('/admin/coupons/{tab?}', 'AdminController@coupons')->name('admin.coupons');
    Route::get('/admin/changelog', 'AdminController@changelog')->name('admin.changelog');
});

/** Account */
Route::any('/courses', 'CourseController@index')->name('course.index');
Route::get('/login', 'AccountController@login')->name('login');
Route::get('/register', 'AccountController@register')->name('register');
Route::get('/profile/{user}', 'UserController@profile')->name('user.profile');
Route::get('/account/verify', 'AccountController@verify')->name('account.verify');


/** Site map */
Route::get('/sitemap.xml', function (App\Course $course) {
    $courses = $course->published()->get();
    return response()->view('sitemap', compact('courses'))->header('Content-Type', 'text/xml');
})->name('sitemap');



/** Post */
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/post/{post}', 'PostController@show')->name('post.view');
Route::get('/post/category/{category}', 'PostController@category')->name('post.category');



/** Course */
Route::get('/browse', 'CourseController@index')->name('courses.index');
Route::get('/tag/{tag}', 'CourseController@tag')->name('course.tag');
Route::get('/author/{author}', 'CourseController@author')->name('course.author');
Route::get('/category/{category}', 'CourseController@category')->name('course.category');
Route::get('/{course}', 'CourseController@view')->name('course.view');



/** Social Login */
Route::prefix('connect')->group(function () {
    Route::get('/facebook/redirect', 'SocialAuthFacebookController@redirect')->name('facebook.redirect');
    Route::get('/facebook/callback', 'SocialAuthFacebookController@callback')->name('facebook.callback');
});


/** Streaming Video */
Route::get('/vod/{video?}', function(){
    return view('video');
})->name('vod');

