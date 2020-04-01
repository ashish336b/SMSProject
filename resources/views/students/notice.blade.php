@extends('layouts.students.index')

@section('studentContent')

    <div class="container mb-2 pb-2">
        <div class="text-center">
            <h1 class="text-primary">Notice</h1>
        </div>
        {{--<div class="alert alert-success p-4">
            <strong>Success</strong>
            <p class="mb-0">I'm an old success alert</p>
        </div>

        <div class="alert alert-success new p-4">
            <strong>Success</strong>
            <p class="mb-0">I'm a new success alert</p>
        </div>--}}
        @foreach($notice as $item)
            <div class="alert alert-success new2 p-4">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <div class="alert-body">
                    <h6 class="alert-header pb-3">{{$item->subject}}</h6>
                    <p class="mb-1 pb-2">{!! $item->message !!}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container pb-5 mb-5">
        <div class="pagination">
            <div class="ml-3">
                {{ $notice->links() }}
            </div>
        </div>
    </div>
@endsection

@push('customStyle')
    <style>
        .pagination{
            margin-left: 12%;
        }
        .alert-success.new2 {
            background: #f3f8f3;
            border: none;
            border-left: 4px solid #0b2e13;
            border-radius: 0;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, .2);
        }

        .alert-success.new2.p-4 {
            padding: 0.75rem 0.75rem !important;
        }

        .alert-success.new2 .fa {
            color: #0D47A1;
            display: table-cell;
            text-align: center;
            vertical-align: middle;
            font-size: 40px;
        }

        .alert-success .alert-body {
            padding-left: 0.75rem;
            display: table-cell;
            color: rgba(0, 0, 0, 0.5);
        }

        .alert-success .alert-header {
            font-weight: 700;
            color: #1E88E5;
            padding: 0;
            margin: 0;
        }

    </style>
@endpush
