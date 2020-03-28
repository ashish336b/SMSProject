@extends('layouts.admin.index')
@section('adminContent')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-two">
                    <div class="stat-content">
                        <div class="stat-text">Total Student </div>
                        <div class="stat-digit">400</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-two">
                    <div class="stat-content">
                        <div class="stat-text">Total Teacher</div>
                        <div class="stat-digit">20</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-two">
                    <div class="stat-content">
                        <div class="stat-text">Number of Admins</div>
                        <div class="stat-digit">2</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-two">
                    <div class="stat-content">
                        <div class="stat-text">Total Department</div>
                        <div class="stat-digit">4</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
@endsection
