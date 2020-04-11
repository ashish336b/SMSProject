<?php

namespace App;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Students extends Authenticatable
{
    use Notifiable;
    protected $guard = 'students';
    protected $table = 'students';

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token , 'students.password.reset'));
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rollNumber', 'firstName', 'lastName', 'email', 'password', 'phoneNumber', 'address', 'isFeePaid', 'gender',
        'classroom_id',
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

    public function classroom()
    {
        return $this->belongsTo("App\Model\Classroom");
    }

    public function payments()
    {
        return $this->hasOne('App\Model\Payment', 'id');
    }

}
