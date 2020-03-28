@extends('layouts.admin.index')
@section('adminContent')
    <div class="container">
        <div class="p-2">
            <div class="text-right"><a href="{{route("admin.teachers.add")}}" class="btn btn-info">Add</a></div>
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">RollNumber</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Department</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teacherData as $teacher)
                    <tr>
                        <td>1</td>
                        <td>{{$teacher->rollNumber}}</td>
                        <td>{{$teacher->firstName}} {{$teacher->lastName}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->address}}</td>
                        <td>{{$teacher->phoneNumber}}</td>
                        <td>{{$teacher->department}}</td>
                        <td>
                            <a href="{{route('admin.teachers.show',['id'=>$teacher->id])}}"
                               class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{route('admin.teachers.delete',['id'=>$teacher->id])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button onclick=" return deleteConfirm()" type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
<script>
    function deleteConfirm() {
        var a = confirm("are you sure want to delete");
        return a;
    }
</script>
