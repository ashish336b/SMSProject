@extends('layouts.admin.index')
@section('adminContent')
<div class="container">
    {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-blue"><h1>{{ __('Edit Classroom') }}
    </h1>
</div>
<div class="card-body">
    @include('layouts.flashmessage')
    <form method="POST"
        action="{{ route('admin.classroom.update',['id'=>$classroomData->id]) }}">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group row">
            <label for="classroomName"
                class="col-md-4 col-form-label text-md-right">{{ __('Classroom Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text"
                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    name="name" value="{{ $classroomData->name }}" autofocus>

                @if($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="department"
                class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
            <div class="col-md-6">
                <select name="department_id"
                    class="form-control {{ $errors->has('department')? 'is-invalid': '' }}"
                    id="department">
                    @foreach($departmentData as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('department') }}</strong>
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
</div> --}}
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="customDashboardForm">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    @include('layouts.flashmessage')
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header text-center font-weight-bold">
                    Edit classroom
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.classroom.update', $classroomData->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">ClassRoom Name</label>
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ $classroomData->name }}" autofocus>

                                    @if($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select name="department_id"
                                        class="form-control {{ $errors->has('department')? 'is-invalid': '' }}"
                                        id="department">
                                        @foreach($departmentData as $item)
                                            <option value="{{ $item->id }}" {{$item->id === $classroomData->department_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('department'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('department') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Edit
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
