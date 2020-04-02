<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Model\Department;
use App\Students;
use App\Teachers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $noOfStudent = Students::all()->count();
        $noOfDepartment = Department::all()->count();
        $noOfTeacher = Teachers::all()->count();
        $noOfAdmin = Admin::all()->count();
        return view('admin.index', [
            'noOfStudent' => $noOfStudent,
            'noOfDepartment' => $noOfDepartment,
            'noOfTeacher' => $noOfTeacher,
            'noOfAdmin' => $noOfAdmin
        ]);
    }
}
