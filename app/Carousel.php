<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = ['title', 'url', 'image'];

    public function scopeFilter($query, $filter)
    {
        if(isset($filter['q']) && $q = $filter['q']){
            $query->where(function($qr) use ($q){
                $qr->where('title', 'LIKE', "%{$q}%");
            });
        }
    }

    public function getImageUrlAttribute()
    {
        $imageUrl = 'http://via.placeholder.com/1200x630';

        if( ! is_null($this->image)){
            $directory = config('project.image.directory') . "carousels/";
            $imagePath = public_path() . "/" . $directory . $this->image;
            if(file_exists($imagePath)) $imageUrl = asset($directory . $this->image);
        }
         
        return $imageUrl;
    }

    public function getImageThumbUrlAttribute()
    {
        $imageUrl = 'http://via.placeholder.com/600x315';

        if ( ! is_null($this->image))
        {
            $directory = config('project.image.directory') . "carousels/";
            $ext       = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/" . $directory . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset($directory . $thumbnail);
        }

        return $imageUrl;
    }
}
