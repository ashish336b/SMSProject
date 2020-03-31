@extends('layouts.admin.index')
@section('adminContent')
    <div class="container">
        <div class="p-2">
            <div class="text-right pb-2"><a href="{{ route("admin.students.add") }}"
                                            class="btn btn-info btn-sm">ADD <span class="iconify"
                                                                                  data-icon="bx:bxs-message-add"
                                                                                  data-inline="false"></span></a></div>
            @include('layouts.flashmessage')
            <table id="teacherTable" class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Roll</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Class</th>
                    <th scope="col">Gender</th>
                    <th scope="col">IsPaid</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $counter = 1;
                @endphp
                @foreach($studentData as $student)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $student->rollNumber }}</td>
                        <td>{{ $student->firstName }} {{ $student->lastName }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->phoneNumber }}</td>
                        <td>{{$student->classroom->name}}</td>
                        <td>{{$student->gender}}</td>
                        <td>{!! $student->isFeePaid ? 'Paid': '<span id="red">Not Paid</span>' !!}</td>
                        <td>
                            <a href="{{ route('admin.teachers.show',['id'=>$student->id]) }}"
                               class="btn btn-primary btn-sm"><span class="iconify" data-icon="fa-solid:edit"
                                                                    data-inline="false"></span></a>
                            <form
                                action="{{ route('admin.students.delete',['id'=>$student->id]) }}"
                                method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button onclick=" return deleteConfirm()" type="submit" class="btn btn-danger btn-sm">
                                    <span class="iconify" data-icon="mdi:delete-alert" data-inline="false"></span>
                                </button>
                            </form>
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

        tbody tr td #red {
            color: red;
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
