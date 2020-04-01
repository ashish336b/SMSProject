<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Classroom;
use App\Model\Department;
class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroomData = Classroom::all();
        return view('admin.classroom.index',['classroomData'=>$classroomData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departmentData = Department::all();
        return view('admin.classroom.add',['departmentData'=> $departmentData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:classroom'],
            'department_id' => ['required', 'string', 'max:255'],
        ]);
        $addNewClassroom = Classroom::create([
            'name' => $request->name,
            'department_id' => $request->department_id
        ]);
        if ($addNewClassroom) {
            return redirect(route('admin.classroom.add'))->with('success', 'Classroom Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Classroom::where('id',$id)->delete())
        {
            return redirect(route('admin.classroom'))->with("success","Deleted Classroom");
        }
    }
}
