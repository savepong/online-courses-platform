<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;
use App\Post;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
