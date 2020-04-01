<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classroom';
    protected $fillable = ['department_id', 'name'];

    public function students()
    {
        return $this->hasMany('App\Students');
    }
    public function department()
    {
        return $this->belongsTo('App\Model\Department');
    }
}
