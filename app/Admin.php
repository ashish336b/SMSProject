<?php

namespace App;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token , 'admin.password.reset'));
    }

    protected $fillable = [
        'name', 'email', 'password', 'job_title',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
