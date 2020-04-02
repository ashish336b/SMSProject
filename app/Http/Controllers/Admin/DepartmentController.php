<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Classroom;
use App\Students;
use App\Teachers;
use Illuminate\Http\Request;
use App\Model\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departmentData = Department::all();
        return view('admin.department.index', [
            'departmentData' => $departmentData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.add');
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
            'departmentCode' => ['required', 'string', 'max:255', 'unique:department'],
            'name' => ['required', 'string', 'max:255'],
        ]);
        $addNewTeacher = Department::create([
            'departmentCode' => $request->departmentCode,
            'name' => $request->name,
        ]);
        if ($addNewTeacher) {
            return redirect(route('admin.department.add'))->with('success', 'Department Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departmentData = Department::where('id', $id)->first();
        return view("admin.department.edit", [
            'departmentData' => $departmentData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $data = Department::where('id', $id)->update([
            'departmentCode' => $request->departmentCode,
            'name' => $request->name,
        ]);
        if ($data) {
            return redirect(route('admin.department.update', ['id' => $id]))->with('success', "updated Successfully");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyData = Department::where('id', $id)->delete();
        if ($destroyData) {
            $classRoomData = Classroom::where('department_id', $id)->get();
            foreach ($classRoomData as $item) {
                Students::where('classroom_id', $item->id)->delete();
            }
            Teachers::where('department_id', $id)->delete();
            Classroom::where('department_id', $id)->delete();
            return redirect(route('admin.department'))->with("danger", "deleted Successfully");
        }
        return null;
    }
}
