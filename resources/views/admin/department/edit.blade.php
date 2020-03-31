@extends('layouts.admin.index')
@section('adminContent')
<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-blue">
                        <h1>{{ __('Edit Department') }}</h1>
                    </div>
                    <div class="card-body">
                        @include('layouts.flashmessage')
                        <form method="POST"
                            action="{{ route('admin.department.update',['id'=>$departmentData]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="departmentCode"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Department Code') }}</label>

                                <div class="col-md-6">
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

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Department Name') }}</label>

                                <div class="col-md-6">
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
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
