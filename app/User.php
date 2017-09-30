<?php

namespace App;

use App\Post;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorites');
    }

    public function routeNotificationForSlack()
    {
        return 'https://hooks.slack.com/services/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'; 
    }
}
