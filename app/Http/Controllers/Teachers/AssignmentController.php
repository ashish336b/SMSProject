<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Model\Assignment;
use App\Model\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function index()
    {
        $classUnderDepartment = Department::where('id', Auth::user()->department_id)->first()->classroom()->get();
        return view('teachers.assignment.index', ['classUnderDepartment' => $classUnderDepartment]);
    }
    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'message' => ['required'],
            'classroom_id' => ['required'],
            'uploadFile' => ['required'],
        ]);
        $fileNameWithExt = $request->file('uploadFile')->getClientOriginalName();
        $ext = $request->file('uploadFile')->getClientOriginalExtension();
        $fileNameWithoutExt = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $fileNameToStore = $fileNameWithoutExt . time() . "." . $ext;
        $path = $request->file('uploadFile')->storeAs('public/assignment', $fileNameToStore);
        $createAssignment = Assignment::create([
            'message' => $request->message,
            'classroom_id' => $request->classroom_id,
            'fileUrl' => $fileNameToStore,
        ]);
        if ($createAssignment) {
            return redirect(route('teachers.attachment'))->with('success',"File Upload Successfully");
        }
    }
}
