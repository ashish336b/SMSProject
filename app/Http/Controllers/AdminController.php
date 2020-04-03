<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Model\Department;
use App\Students;
use App\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function list()
    {
        $adminData = Admin::all();
        return view('admin.listadmin', ['adminData' => $adminData]);
    }

    public function create()
    {
        return view('admin.addadmin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $addAdmin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'job_title' => 'admin'
        ]);
        if ($addAdmin) {
            return redirect(route('admin.list'))->with('success', 'Admin Added Successfully');
        }
        return null;
    }

    public function show(Request $request, $id)
    {
        $adminData = Admin::where('id', $id)->first();
        return view('admin.editadmin', ['adminData' => $adminData]);
    }

    public function edit($id, Request $request)
    {
        $updateAdmin = Admin::where('id', $id)->update([
            'email' => $request->email,
            'name' => $request->name
        ]);
        if ($updateAdmin) {
            return redirect(route('admin.list'))->with('success', 'Admin Updated Successfully');
        }
    }

    public function destroy($id)
    {
        if (Admin::where('id', $id)->delete()) {
            return redirect(route('admin.list'))->with('success', 'Admin Deleted Successfully');
        }
    }

}
