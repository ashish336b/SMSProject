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
                    Add classroom
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.classroom.add') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">ClassRoom Name</label>
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ old('name') }}"
                                        placeholder="Class Name">

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
                        </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Register Student
                        <span class="iconify" data-icon="ion:paper-plane-sharp" data-inline="false"></span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</div>
@endsection
