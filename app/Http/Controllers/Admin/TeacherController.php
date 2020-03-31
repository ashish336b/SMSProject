<?php

namespace App\Http\Controllers\Admin;

use App\Model\Department;
use App\Students;
use App\Teachers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacherData = Teachers::all();
        return view('admin.teachers.index', [
            'teacherData' => $teacherData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'rollNumber' => ['required', 'string', 'max:255', 'unique:teachers'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'address' => ['required', 'string'],
            'phoneNumber' => ['required', 'numeric'],
            'department_id' => ['required', 'numeric'],
        ]);
        $addNewTeacher = Teachers::create([
            'rollNumber' => $request->rollNumber,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'department_id' => $request->department_id
        ]);
        if ($addNewTeacher) {
            return redirect(route('admin.teachers.add'))->with('success', 'Teacher Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Teachers $teachers
     * @return \Illuminate\Http\Response
     */
    public function show($teachers)
    {
        $oneTeacher = Teachers::where("id", $teachers)->first();
        return view('admin.teachers.edit', ['oneTeacher' => $oneTeacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Teachers $teachers
     * @return \Illuminate\Http\Response
     */
    public function edit($teachers, Request $request)
    {

        /*$validation = $request->validate([
            'rollNumber' => ['required', 'string'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'address' => ['required', 'string'],
            'phoneNumber' => ['required', 'numeric'],
            'department_id' => ['required', 'numeric'],
        ]);*/
        $data = Teachers::where('id', $teachers)->update([
            'rollNumber' => $request->rollNumber,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'department_id' => $request->department_id
        ]);
        if ($data) {
            return redirect(route('admin.teachers.update',['id'=>$teachers]))->with('success', "updated Successfully");
        }else{
            dd("failed");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Teachers $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teachers $teachers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Teachers $teachers
     * @return \Illuminate\Http\Response
     */
    public function destroy($teachers)
    {
        $destroyData = Teachers::where('id', $teachers)->delete();
        if ($destroyData)
        {
            return redirect(route('admin.teachers'))->with('danger',"Deleted Successfully");
        }
        return null;
    }
}
