<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignment';
    protected $fillable = ['fileUrl', 'classroom_id', 'message', 'teacher_id'];
}
