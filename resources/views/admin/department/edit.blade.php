@extends('layouts.admin.index')
@section('adminContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="customDashboardForm">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        @include('layouts.flashmessage')
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header text-center font-weight-bold">
                        Edit Department
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ route('admin.department.update',['id'=>$departmentData]) }}"
                            method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="departmentCode">Department Code</label>
                                        <input id="departmentCode" type="text"
                                            class="form-control{{ $errors->has('departmentCode') ? ' is-invalid' : '' }}"
                                            name="departmentCode" value="{{ $departmentData->departmentCode }}"
                                            autofocus>

                                        @if($errors->has('departmentCode'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('departmentCode') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Department Name</label>
                                        <input id="name" type="text"
                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="{{ $departmentData->name }}" autofocus>

                                        @if($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Edit Department
                            <span class="iconify" data-icon="ion:paper-plane-sharp" data-inline="false"></span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
