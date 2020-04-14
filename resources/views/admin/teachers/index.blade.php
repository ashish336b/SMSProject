@extends('layouts.admin.index')
@section('adminContent')
<div class="container">
    <div class="p-2">
        <div class="text-right pb-2"><a href="{{ route("admin.teachers.add") }}"
                class="btn btn-info btn-sm">ADD <span class="iconify" data-icon="bx:bxs-message-add"
                    data-inline="false"></span></a></div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @include('layouts.flashmessage')
            </div>
        </div>
        <table id="teacherTable" class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Teacher Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Department</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $counter = 1;
                @endphp
                @foreach($teacherData as $teacher)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $teacher->rollNumber }}</td>
                        <td>{{ $teacher->firstName }} {{ $teacher->lastName }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->address }}</td>
                        <td>{{ $teacher->phoneNumber }}</td>
                        <td>{{ $teacher->department->name }}</td>
                        <td>
                            <div class="row">
                                <a href="{{ route('admin.teachers.show',['id'=>$teacher->id]) }}"
                                    class="btn btn-primary btn-sm mr-1"><span class="iconify" data-icon="fa-solid:edit"
                                        data-inline="false"></span></a>
                                <form
                                    action="{{ route('admin.teachers.delete',['id'=>$teacher->id]) }}"
                                    method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button onclick=" return deleteConfirm()" type="submit"
                                        class="btn btn-danger btn-sm">
                                        <span class="iconify" data-icon="mdi:delete-alert" data-inline="false"></span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('customStyle')
    <style>
        tbody tr td {
            color: black;
        }

    </style>
@endpush
@push('customScript')
    <script>
        function deleteConfirm() {
            var a = confirm("are you sure want to delete");
            return a;
        }

    </script>
    <script>
        $(document).ready(function () {
            $('#teacherTable').DataTable();
        });

    </script>
@endpush
