@extends('layouts.admin.index')
@section('adminContent')
<div class="container">
    <div class="p-2">

        <table id="teacherTable" class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">PaymentId</th>
                    <th scope="col">PayerId</th>
                    <th scope="col">Amount Paid</th>
                    <th scope="col">Paid At</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $counter = 1;
                @endphp
                @foreach($feePaymentList as $item)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>
                            @php
                                $studentData = DB::table('students')->where('id', $item->students_id)->first()
                            @endphp
                            {{ $studentData->firstName }} {{$studentData->lastName}}
                        </td>
                        <td>{{ $item->paymentId }}</td>
                        <td>{{ $item->payerId }}</td>
                        <td>$4000</td>
                        <td>{{ $item->created_at ? $item->created_at->format('Y-m-d') : '' }}
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
