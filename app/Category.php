<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, $filter)
    {
        if(isset($filter['q']) && $q = $filter['q']){
            $query->where(function($qr) use ($q){
                $qr->where('title', 'LIKE', "%{$q}%");
            });
        }
    }
}
