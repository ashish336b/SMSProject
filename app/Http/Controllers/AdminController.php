<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Model\Department;
use App\Students;
use App\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $noOfStudent = Students::all()->count();
        $noOfDepartment = Department::all()->count();
        $noOfTeacher = Teachers::all()->count();
        $noOfAdmin = Admin::all()->count();
        //        dd($admin->unreadNotifications);
        $adminStats = collect([
            "adminStats" => [
                'noOfStudent' => ["No of Student", $noOfStudent, "progress-bar progress-bar-danger w-85"],
                'noOfDepartment' => ["No of Department", $noOfDepartment, "progress-bar progress-bar-success w-50"],
                'noOfTeacher' => ["No of Teacher", $noOfTeacher, "progress-bar progress-bar-primary w-65"],
                'noOfAdmin' => ["No of Admin", $noOfAdmin, "progress-bar progress-bar-warning w-95"],
            ],
            "unreadNotification" => Auth::user()->unreadNotifications,
        ]);
        return view('admin.admindashboard')->with($adminStats->all());
    }

    function list() {
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
            'job_title' => 'admin',
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
        if (!Auth::user()->isSuperAdmin && Admin::where('id', $id)->first()->isSuperAdmin) {
            return redirect(route('admin.profile'))->with('danger', 'Sorry you cannot edit SuperAdmin Data');
        }
        $updateAdmin = Admin::where('id', $id)->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);
        if ($updateAdmin) {
            if ($request->has('requestFrom')) {
                return redirect(route('admin.profile'))->with('success', 'Profile Edited Successfully');
            }
            return redirect(route('admin.list'))->with('success', 'Admin Updated Successfully');
        }
        return "errors in updating";
    }

    public function destroy($id)
    {
        if (!Auth::user()->isSuperAdmin && Admin::where('id', $id)->first()->isSuperAdmin) {
            return null;
        }
        if (Admin::where('id', $id)->delete()) {
            return redirect(route('admin.list'))->with('success', 'Admin Deleted Successfully');
        }
    }

    public function profile()
    {
        $adminData = Admin::where('id', Auth::user()->id)->first();
        return view('admin.profile', ['adminData' => $adminData]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $updatePassword = Admin::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->password),
        ]);
        if ($updatePassword) {
            return redirect(route('admin.profile'))->with('success', 'Password Updated Successfully');
        }
    }
}
