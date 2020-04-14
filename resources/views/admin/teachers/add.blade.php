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
                        Add Teachers
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.teachers.add') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('firstName')? 'is-invalid': '' }}"
                                            name="firstName" value="{{ old('firstName') }}"
                                            id="firstName" aria-describedby="helpId" placeholder="First Name" />
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
                                            name="lastName" value="{{ old('lastName') }}"
                                            id="lastName" placeholder="Last Name" />
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
                                        <label for="rollNumber">Teacher Id</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('rollNumber') ? ' is-invalid' : '' }}"
                                            name="rollNumber" value="{{ old('rollNumber') }}"
                                            id="rollNumber" placeholder="Teacher Id">
                                        @if($errors->has('rollNumber'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('rollNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"
                                            class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" id="email" value="{{ old('email') }}"
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
                                        <label for="password">Password</label>
                                        <input type="password"
                                            class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" id="password" aria-describedby="helpId"
                                            placeholder="Password" />
                                        @if($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Confirm Password" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                            name="address" value="{{ old('address') }}" id="address"
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
                                            name="phoneNumber" id="phoneNumber"
                                            value="{{ old('phoneNumber') }}" aria-describedby="helpId"
                                            placeholder="PhoneNumber">
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
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                <button type="submit" class="btn btn-primary">Add
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
