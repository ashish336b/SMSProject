@extends('layouts.students.index')

@section('studentContent')
<div class="container">
    <div class="p-2">
        <div class="text-right pb-2"><a href="{{ route("admin.students.add") }}"
                class="btn btn-info btn-sm">ADD <span class="iconify" data-icon="bx:bxs-message-add"
                    data-inline="false"></span></a></div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @include('layouts.flashmessage')
            </div>
        </div>
        <table id="assignment" class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Message</th>
                    <th scope="col">Sent From</th>
                    <th scope="col">Download Link</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $counter = 1;
                @endphp
                @foreach($allAssignmentData as $item)
                    @php
                        $teacher = DB::table('teachers')->where('id', $item->teacher_id)->first();
                    @endphp
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $item->message }}</td>
                        <td>{{ $teacher->firstName }} {{ $teacher->lastName }}</td>
                        <td>
                            <a href="{{asset('/storage/assignment/'.$item->fileUrl)}}" download
                                class="btn btn-primary btn-xs"><i class="ti-download"></i></a>
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
            $('#assignment').DataTable();
        });

    </script>
@endpush
