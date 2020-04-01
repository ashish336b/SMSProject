<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SendNotification extends Model
{
    protected $table = 'sendnotification';
    protected $fillable = ['to','subject','message'];
}
