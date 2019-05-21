<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Course;

class Lesson extends Model
{
    protected $fillable = ['title', 'text', 'file', 'video', 'course_id', 'duration'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user($user_id)
    {
        return $this->belongsTo(User::class)->where('user_id', $user_id)->withPivot(['file']);
    }

    public function students()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot(['progress', 'file']);
    }

    public function getFilenameAttribute()
    {
        $ext = substr(strrchr($this->file, '.'), 1);
        return $this->convertToSlug($this->title) . '.' . $ext;
    }

    public function getHomeworkFilenameAttribute()
    {
        $user = User::findOrFail(request()->user()->id);
        $student = $this->students()->where('lesson_id', $this->id)->where('user_id', $user->id)->first();
        $ext = substr(strrchr($student->pivot->file, '.'), 1);

        return "Homework - " . $user->name . " - " . $this->title . "." . $ext;
    }
    
    public function getVideoDurationAttribute()
    {
        return gmdate("i:s", $this->duration);
    }

    public function convertToSlug($string)
    {
        return preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-',str_replace('&', '-and-', $string));
    }
}
