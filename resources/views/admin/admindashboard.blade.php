@extends('layouts.admin.index')
@section('adminContent')
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                @foreach($adminStats as $item)
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="stat-widget-two">
                                <div class="stat-content">
                                    <div class="stat-text">{{$item[0]}}</div>
                                    <div class="stat-digit">{{$item[1]}}</div>
                                </div>
                                <div class="progress">
                                    <div class="{{$item[2]}}" role="progressbar"
                                         aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-title text-center text-primary mb-2">
                    New Notification
                </div>
                <div class="card-body scroll">
                    @foreach($unreadNotification as $notification)
                        @isset($notification->data['payment'])
                            <ul class="p-2 bg-ash">
                                <li>
                                    <a href="#">
                                        <div class="notification-content">
                                            <small
                                                class="notification-timestamp pull-right">{{$notification->created_at->diffForHumans()}}</small>
                                            <div class="notification-heading">School Fee Payment
                                                @if($fetchStudentData = \App\Students::where("id",$notification->data["payment"]["students_id"])->first())
                                                    By {{$fetchStudentData->firstName}}
                                                @endif

                                            </div>
                                            <div class="notification-text">Amount 4000</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        @endisset
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
@endsection
@push('customStyle')
    <style>
        .scroll {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
@endpush
