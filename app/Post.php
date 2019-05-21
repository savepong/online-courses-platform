<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Tag;
use App\Category;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'image', 'category_id', 'author_id', 'published_at'];
    protected $dates = ['published_at'];
    use SoftDeletes;


    public function author()
    {
        return $this->belongsTo(User::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, $filter)
    {
        if(isset($filter['q']) && $q = $filter['q']){
            $query->where(function($qr) use ($q){
                $qr->where('title', 'LIKE', "%{$q}%");
                $qr->orWhere('excerpt', 'LIKE', "%{$q}%");
                $qr->orWhere('body', 'LIKE', "%{$q}%");
            });
        }
    }

    public function getImageUrlAttribute()
    {
        $mediaDirectory = config('project.media.directory') . "posts/images/";    
        $imageUrl = 'http://via.placeholder.com/1200x630';

        if( ! is_null($this->image)){
            $imagePath = public_path() . "/" . $mediaDirectory . $this->image;
            if(file_exists($imagePath)) $imageUrl = asset($mediaDirectory . $this->image);
        }
         
        return $imageUrl;
    }

    public function getImageThumbUrlAttribute()
    {
        $mediaDirectory = config('project.media.directory') . "posts/images/";    
        $imageUrl = 'http://via.placeholder.com/600x315';

        if ( ! is_null($this->image))
        {
            $ext       = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/" . $mediaDirectory . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset($mediaDirectory . $thumbnail);
        }

        return $imageUrl;
    }

    public function getPublishedDateAttribute()
    {
        return is_null($this->published_at) ? '-' : $this->published_at->diffForHumans();
    }

    public function getTagsListAttribute()
    {
        return $this->tags->pluck('name');
    }


    /** 
     * Scopes
     */
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", "NOW()");
    }
    
    public function scopeSceduled($query)
    {
        return $query->where("published_at", ">", "NOW()");
    }
    
    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }


    public function createTags($tagString)
    {
        $tags = explode(",", $tagString);
        $tagIds = [];

        foreach ($tags as $tag) {
            $newTag = Tag::firstOrCreate([
                'name' => $tag,
                'slug' => $this->convertToSlug($tag)
            ]);

            $tagIds[] = $newTag->id;
        }

        // $this->tags()->detach();
        // $this->tags()->attach($tagIds);

        $this->tags()->sync($tagIds);
    }

    public function convertToSlug($string)
    {
        return preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-',str_replace('&', '-and-', $string));
    }
}
