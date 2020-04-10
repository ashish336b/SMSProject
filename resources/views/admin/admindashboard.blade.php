@extends('layouts.admin.index')
@section('adminContent')
<div class="row">
    @foreach($adminStats as $item)
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-two">
                    <div class="stat-content">
                        <div class="stat-text">{{ $item[0] }}</div>
                        <div class="stat-digit">{{ $item[1] }}</div>
                    </div>
                    <div class="progress">
                        <div class="{{ $item[2] }}" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
