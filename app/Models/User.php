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
    protected $fillable = ['name','last_name', 'email', 'password', 'phone','permissions','address','city','state','zip'];

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
     * return all payments done by this user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(Payments::class);
    }

    /**
     * return Total Payments Done By This User
     */
    public function getIncomeAmount()
    {
        try{
            return $this->payments->sum('income');
        }
        catch (\Exception $ex)
        {
            return 0;
        }
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
