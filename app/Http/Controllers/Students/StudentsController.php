<?php

namespace App\Http\Controllers\Students;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\Assignment;
use App\Model\SendNotice;
use App\Notifications\SchoolFeePaid;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;

class StudentsController extends Controller
{
    public function index()
    {
        return redirect(route('students.notice'));
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
            'email' => $request->email,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
        ]);
        if ($updateTeacherProfile) {
            $notificationMessage = Auth::user()->firstName . " " . Auth::user()->lastName . " has updated Profile";
            Notification::send(Admin::all(), new SchoolFeePaid('', $notificationMessage, 'Student Profile'));
            return redirect(route('students.profile'))->with('success', 'Your Profile Updated Successfully');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'previousPassword' => ['required'],
        ]);
        if (!Hash::check($request->previousPassword, Auth::user()->password)) {
            return redirect(route('students.profile'))->with('danger', 'Your Previous Password Does not Match');
        }
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

    public function teacherNotice()
    {
        $allAssignmentData = Assignment::where('classroom_id', Auth::user()->classroom_id)->get();
        return view('students.assignment', ['allAssignmentData' => $allAssignmentData]);
    }
    public function downloadAssignment($id)
    {
        return response()->download(asset('/storage/assignment/'.$id), $id);
    }
}
