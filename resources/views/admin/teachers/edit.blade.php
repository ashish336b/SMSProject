@extends('layouts.admin.index')
@section('adminContent')
<div class="container">
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
                        Edit Teachers
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ route('admin.teachers.update',['id'=>$oneTeacher->id]) }}"
                            method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('firstName')? 'is-invalid': '' }}"
                                            name="firstName" value="{{ $oneTeacher->firstName }}" id="firstName"
                                            aria-describedby="helpId" placeholder="First Name" />
                                        @if($errors->has('firstName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('firstName') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('lastName')? 'is-invalid' : '' }}"
                                            name="lastName" value="{{ $oneTeacher->lastName }}" id="lastName"
                                            placeholder="Last Name" />
                                        @if($errors->has('lastName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lastName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="rollNumber">Roll Number</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('rollNumber') ? ' is-invalid' : '' }}"
                                            name="rollNumber" value="{{ $oneTeacher->rollNumber }}" id="rollNumber"
                                            placeholder="Roll Number">
                                        @if($errors->has('rollNumber'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $oneTeacher->first('rollNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"
                                            class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" id="email" value="{{ $oneTeacher->email }}"
                                            placeholder="Email" />
                                        @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                            name="address" value="{{ $oneTeacher->address }}" id="address"
                                            aria-describedby="helpId" placeholder="Address">
                                        @if($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phoneNumber">PhoneNumber</label>
                                        <input type="number"
                                            class="form-control {{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}"
                                            name="phoneNumber" id="phoneNumber" value="{{ $oneTeacher->phoneNumber }}"
                                            aria-describedby="helpId" placeholder="PhoneNumber">
                                        @if($errors->has('phoneNumber'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phoneNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <select
                                            class="form-control {{ $errors->has('department_id')? 'is-invalid': '' }}"
                                            name="department_id" id="department">
                                            @foreach($departmentData as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id === $oneTeacher->department_id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('department_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('department_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Edit Teachers
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
