<?php

namespace App\Models;

use App\Notifications\SendCustomPasswordReset;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','last_name', 'email', 'password','phone','permissions'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * return all the tickets for this user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
       return $this->hasMany(Ticket::class);
    }

    /**
     * rewrite password reset notification
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SendCustomPasswordReset($token));
    }

    /**
     * return if the user is admin
     * @return bool
     */
    public function isAdmin()
    {
        return ($this->permissions == 'admin');
    }
}
