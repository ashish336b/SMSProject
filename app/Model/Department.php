<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $fillable = ['departmentCode', 'name'];

    public function teachers()
    {
       return $this->hasMany('App\Teachers');
    }

}
