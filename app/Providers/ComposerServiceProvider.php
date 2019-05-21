<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Order;
use App\User;
use App\Course;
use App\Post;
use App\Category;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer('post.index', function($view){
            $categories = Category::whereHas('posts', function($query) {
                $query->published();
            })->get();

            return $view->with('categories', $categories);
        });
        
        view::composer(['layouts.admin', 'admin.orders'], function($view){
            $countPendingOrders = Order::where('status', 'pending')->count();
            $countUsers = User::count();
            $countCourses = Course::count();
            $countPosts = Post::count();
            return $view->with(['countPendingOrders' => number_format($countPendingOrders>0 or ''), 'countUsers' => number_format($countUsers), 'countCourses' => number_format($countCourses>0 or ''), 'countPosts' => number_format($countPosts>0 or '')]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
