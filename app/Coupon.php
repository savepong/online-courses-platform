<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'type', 'discount', 'expire_date', 'repeatable', 'course_id'];
    protected $dates = ['expire_date'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getExpireAttribute()
    {
        return is_null($this->expire_date) ? '-' : $this->expire_date->diffForHumans();
    }

    public function scopeFilter($query, $filter)
    {
        if(isset($filter['q']) && $q = $filter['q']){
            $query->where(function($qr) use ($q){
                $qr->where('code', 'LIKE', "%{$q}%");
                $qr->orWhere('discount', 'LIKE', "%{$q}%");
            });
        }
    }
}
