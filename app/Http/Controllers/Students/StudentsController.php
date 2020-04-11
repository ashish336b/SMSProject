<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Model\SendNotice;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function showProfile()
    {
        $studentData = Students::where('id', Auth::user()->id)->first();
        return view('students.editProfile', ['studentData' => $studentData]);
    }

    public function updateProfile(Request $request)
    {
        $updateTeacherProfile = Students::where('id', Auth::user()->id)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
        ]);
        if ($updateTeacherProfile) {
            return redirect(route('students.profile'))->with('success', 'Your Profile Updated Successfully');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $updatePassword = Students::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->password),
        ]);
        if ($updatePassword) {
            return redirect(route('students.profile'))->with('success', "Your Password Updated Successfully");
        }
    }

    public function notice()
    {
        $notice = SendNotice::where('to', 'Both')
            ->orwhere('to', 'Student')->orderBy('created_at', 'desc')
            ->paginate(3);
        return view('students.notice', ['notice' => $notice]);
    }
}
