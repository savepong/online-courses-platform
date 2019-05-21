<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Passport\HasApiTokens;
use App\Post;

class User extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'avatar' , 'email', 'phone_number', 'facebook', 'line_id', 'password', 'bio', 'billing_to', 'billing_address', 'billing_country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'author_id');
    }
    
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function coupon()
    {
        return $this->hasMany(Order::class);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function SocialAccount()
    {
        return $this->hasMany(SocialFacebookAccount::class);
    }

    public function enrolled()
    {
        return $this->belongsToMany(Course::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function getAvatarUrlAttribute()
    { 
        $avatar_url = asset('media/images/avatar/default.png');
        if($this->avatar){
            $imagePath = public_path("media/images/avatar/" . $this->avatar);
            if(file_exists($imagePath)) $avatar_url = asset('media/images/avatar/' . $this->avatar);
        }

        return $avatar_url;
    }

    public function scopeFilter($query, $filter)
    {
        if(isset($filter['q']) && $q = $filter['q']){
            $query->where(function($qr) use ($q){
                $qr->where('name', 'LIKE', "%{$q}%");
                $qr->orWhere('username', 'LIKE', "%{$q}%");
                $qr->orWhere('email', 'LIKE', "%{$q}%");
            });
        }
    }


    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles);
        }
        return $this->hasRole($roles);
    }

    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }


    public function scopeAuthorUsers()
    {
        return $this->whereHas('roles', function ($query) {
            $query->where('name', '=', 'author');
        })->orWhere('id', request()->user()->id);
    }
}
