<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SendNotice extends Model
{
    protected $table = 'sendnotice';
    protected $fillable = ['to','subject','message'];
}
