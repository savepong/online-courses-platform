<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\User;
use App\Category;
use App\Tag;
use App\Order;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'slug', 'excerpt', 'description', 'published_at','author_id', 'category_id', 'image', 'video', 'price', 'sale_price', 'deleted_at'];
    protected $dates = ['published_at'];
    protected $appends = ['image_url'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class)->withPivot('created_at');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: NULL;
    }

    public function getImageUrlAttribute()
    {
        $imageUrl = asset("/media/images/courses/default_cover.svg");

        if( ! is_null($this->image)){
            $directory = config('project.image.directory') . "courses/";
            $imagePath = public_path() . "/" . $directory . $this->image;
            if(file_exists($imagePath)) $imageUrl = asset($directory . $this->image);
        }
         
        return $imageUrl;
    }

    public function getImageThumbUrlAttribute()
    {
        $imageUrl = asset("/media/images/courses/default_cover.svg");

        if ( ! is_null($this->image))
        {
            $directory = config('project.image.directory') . "courses/";
            $ext       = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/" . $directory . $thumbnail;
            if(file_exists($imagePath)) $imageUrl = asset($directory . $thumbnail);
        }

        return $imageUrl;
    }

    public function getTagsListAttribute()
    {
        return $this->tags->pluck('name');
    }

    public function getDurationAttribute()
    {
        return $this->lessons->sum('duration');
    }

    public function learningProgress($userId)
    {
        $lessonIds = $this->lessons->pluck('id');
        $lessonCount = $lessonIds->count();

        if($lessonCount){
            $totalProgress = DB::table('lesson_user')->whereIn('lesson_id', $lessonIds)->where('user_id', $userId)->sum('progress');
            return round($totalProgress / $lessonCount);
        }else{
            return 0;
        }

    }

    public function scopeFilter($query, $filter)
    {
        if(isset($filter['q']) && $q = $filter['q']){
            $query->where(function($qr) use ($q){
                $qr->whereHas('author', function($qrr) use ($q){
                    $qrr->where('name', 'LIKE', "%{$q}%");
                });
                $qr->orWhere('title', 'LIKE', "%{$q}%");
                $qr->orWhere('excerpt', 'LIKE', "%{$q}%");
            });
        }
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

    public function enroll($user_id)
    {
        $this->students()->detach($user_id);
        $this->students()->attach($user_id);
    }

    public function getPublishedDateAttribute()
    {
        return is_null($this->published_at) ? '-' : $this->published_at->diffForHumans();
    }

    public function discountPercent($price, $sale_price)
    {
        $discount = $price - $sale_price;
        return number_format(($discount / $price) * 100);
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function convertToSlug($string)
    {
        return preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-',str_replace('&', '-and-', $string));
    }
    
}
