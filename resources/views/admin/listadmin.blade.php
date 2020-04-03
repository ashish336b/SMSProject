@extends('layouts.admin.index')
@section('adminContent')
    <div class="container">
        <div class="p-2">
            <div class="text-right pb-2 "><a href="{{ route("admin.add") }}"
                                             class="btn btn-info btn-sm">ADD <span class="iconify" data-icon="bx:bxs-message-add"
                                                                                   data-inline="false"></span> </a></div>
            @include('layouts.flashmessage')
            <table id="departmentTable" class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $counter = 1;
                @endphp
                @foreach($adminData as $data)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <a href="{{ route('admin.show',['id'=>$data->id]) }}"
                               class="btn btn-primary btn-sm"><span class="iconify" data-icon="fa-solid:edit"
                                                                    data-inline="false"></span></a>
                            <form
                                action="{{ route('admin.delete',['id'=>$data->id]) }}"
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
        tbody tr  td {
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
            $('#departmentTable').DataTable();
        });

    </script>
@endpush
