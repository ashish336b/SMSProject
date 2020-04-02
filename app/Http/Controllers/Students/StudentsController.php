<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Model\SendNotice;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function notice()
    {
        $notice = SendNotice::where('to', 'Both')
            ->orwhere('to', 'Student')->orderBy('created_at', 'desc')
            ->paginate(3);
        return view('students.notice', ['notice' => $notice]);
    }
}
