@extends('layouts.admin.index')
@section('adminContent')
    <div class="container">
        <div class="p-2">
            <div class="text-right pb-2"><a href="{{ route("admin.notice.add") }}"
                                            class="btn btn-info btn-sm">Create New Notification <span class="iconify"
                                                                                  data-icon="bx:bxs-message-add"
                                                                                  data-inline="false"></span></a></div>
            @include('layouts.flashmessage')
            <table id="teacherTable" class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Sent To</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Notification</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $counter = 1;
                @endphp
                @foreach($allNoticeData as $item)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{$item->to}}</td>
                        <td>{{$item->subject}}</td>
                        <td>{{$item->message}}</td>
                        <td>{{\Carbon\Carbon::parse($item->created_at)->format('Y/m/d')}}</td>
                        <td>
                            <a href="{{ route('admin.notice.show',['id'=>$item->id]) }}"
                               class="btn btn-primary btn-sm"><span class="iconify" data-icon="fa-solid:edit"
                                                                    data-inline="false"></span></a>
                            <form
                                action="{{ route('admin.notice.delete',['id'=>$item->id]) }}"
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
