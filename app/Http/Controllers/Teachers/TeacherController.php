<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Model\SendNotice;
use App\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers.index');
    }
    public function showNotice()
    {
        $notice = SendNotice::where('to', 'Teacher')->orWhere('to', 'both')->paginate(5);
        return view('teachers.notice', compact('notice'));
    }

    public function showProfile()
    {
        $teacherData = Teachers::where('id', Auth::user()->id)->first();
        // dd($teacherData->id);
        return view('teachers.editProfile', ['teacherData' => $teacherData]);
    }
    public function updateProfile(Request $request)
    {
        $updateTeacherProfile = Teachers::where('id', Auth::user()->id)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
        ]);
        if ($updateTeacherProfile) {
            return redirect(route('teachers.profile'))->with('success', 'Your Profile Updated Successfully');
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'previousPassword'=>['required']
        ]);
        if (!Hash::check($request->previousPassword, Auth::user()->password)) {
            return redirect(route('teachers.profile'))->with('danger', 'Your Previous Password Does not Match');
        }
        $updatePassword = Teachers::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->password),
        ]);
        if ($updatePassword) {
            return redirect(route('teachers.profile'))->with('success', "Your Password Updated Successfully");
        }
    }
}
