<?php

namespace App\Http\Controllers;

use App\Course;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $course = Course::with('category')->latestFirst()
        ->published()->first();
        // $courses= Course::with('category')->latestFirst()
        // ->published()->get();
        $posts = Post::all();
        $categories = Category::all();

        return view('frontend.index', compact('course', 'posts', 'categories'));
    }

    public function articles()
    {
        $posts = Post::latestFirst()
                        ->published()
                        ->filter(request()->only(['q']))->get();
                        // ->paginate(20);

        return view('frontend.articles', compact('posts'));
    }
}
