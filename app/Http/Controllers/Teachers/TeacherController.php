<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SendNotice;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers.index');
    }
    public function showNotice()
    {
        $notice = SendNotice::where('to', 'Teacher')->orWhere('to', 'both')->paginate(5);
        return view('teachers.notice',compact('notice'));
    }
}
