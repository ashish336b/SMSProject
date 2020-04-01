<?php

namespace App\Http\Controllers\Admin;

use App\Model\Classroom;
use App\Students;
use App\Teachers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $studentData = Students::all();
        return view('admin.student.index',['studentData'=>$studentData]);
    }
    public function create()
    {
        $classroomData = Classroom::all('id', 'name');
        return view('admin.student.add',['classroomData'=> $classroomData]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'rollNumber' => ['required', 'string', 'max:255', 'unique:students'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'address' => ['required', 'string'],
            'phoneNumber' => ['required', 'numeric'],
            'gender'=> ['required'],
            'classroom_id' => ['required', 'numeric'],
        ]);

        $addNewStudent = Students::create([
            'rollNumber' => $request->rollNumber,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'classroom_id' => $request->classroom_id,
            'isFeePaid'=> 0,
            'gender'=> $request->gender
        ]);
        if ($addNewStudent) {
            return redirect(route('admin.students.add'))->with('success', 'Student Added Successfully');
        }
        return null;
    }

    public function show(Request $request , $id)
    {
        $classroomData = Classroom::all('id', 'name');
        $studentData = Students::where('id',$id)->first();
       return view('admin.student.edit',['classroomData'=> $classroomData,'studentData'=>$studentData]);
    }

    public function edit(Request $request , $id)
    {
        $editStudent = Students::where('id',$id)->update([
            'rollNumber' => $request->rollNumber,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'classroom_id' => $request->classroom_id,
            'isFeePaid'=> 0,
            'gender'=> $request->gender
        ]);
        if ($editStudent) {
            return redirect(route('admin.students'))->with('success', 'Student Edited Successfully');
        }
        return null;
    }

    public function destroy($id)
    {
        if(Students::where('id', $id)->delete())
        {
            return redirect(route('admin.students'))->with('danger', "Deleted Successfully");
        }
        return null;
    }

}
