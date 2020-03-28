@extends('layouts.admin.index')
@section('adminContent')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-blue"><h1>{{ __('Edit Teacher') }}</h1></div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    <p style="color: #0c0c0c">{{ session('success') }}</p>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('admin.teachers.update',['id'=>$oneTeacher->id]) }}">
                                <input name="_method" type="hidden" value="PUT">
                                @csrf
                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Teacher Rollno.') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('rollNumber') ? ' is-invalid' : '' }}"
                                               name="rollNumber" value="{{ $oneTeacher->rollNumber }}" autofocus>

                                        @if ($errors->has('rollNumber'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rollNumber') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="firstName"
                                           class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="firstName" type="text"
                                               class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}"
                                               name="firstName" value="{{ $oneTeacher->firstName }}"  autofocus>

                                        @if ($errors->has('firstName'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastName"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="lastName" type="text"
                                               class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}"
                                               name="lastName" value="{{ $oneTeacher->lastName }}"  autofocus>

                                        @if ($errors->has('lastName'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{$oneTeacher->email }}" >

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                               class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                               name="address" value="{{ $oneTeacher->address }}"  autofocus>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phoneNumber"
                                           class="col-md-4 col-form-label text-md-right">{{ __('PhoneNumber') }}</label>

                                    <div class="col-md-6">
                                        <input id="phoneNumber" type="text"
                                               class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}"
                                               name="phoneNumber" value="{{ $oneTeacher->phoneNumber }}"  autofocus>

                                        @if ($errors->has('phoneNumber'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="department"
                                           class="col-md-4 col-form-label text-md-right">{{__('Department')}}</label>
                                    <div class="col-md-6">
                                        <select name="department_id"
                                                class="form-control {{$errors->has('department')? 'is-invalid': ''}}"
                                                id="department">
                                            <option value="1">Physics</option>
                                            <option value="2">Chemistry</option>
                                        </select>
                                        @if ($errors->has('department'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4 text-center">
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
