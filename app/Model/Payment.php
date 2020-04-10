<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $fillable = ['paymentId','payerId','students_id'];

    public function students()
    {
        return $this->hasOne('App\Students' , 'id');
    }
}
