@extends('layouts.admin.index')
@section('adminContent')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-lg-12">
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
                                            name="firstName" value="{{old('firstName')}}" id="firstName" aria-describedby="helpId"
                                            placeholder="First Name" />
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
                                            name="lastName" value="{{old('lastName')}}" id="lastName" placeholder="Last Name" />
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
                                            name="rollNumber" value="{{old('rollNumber')}}" id="rollNumber"
                                            placeholder="Roll Number">
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
                                            name="email" id="email" value="{{old('email')}}" placeholder="Email" />
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
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                            placeholder="Confirm Password" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                            name="address" value="{{old('address')}}" id="address" aria-describedby="helpId" placeholder="Address">
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
                                            name="phoneNumber" id="phoneNumber" value="{{old('phoneNumber')}}" aria-describedby="helpId"
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


    {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-blue"><h1>{{ __('Teacher Register') }}
    </h1>
</div>

<div class="card-body">
    @if(session('success'))
        <div class="alert alert-success text-black-50">
            <p style="color: #0c0c0c">{{ session('success') }}</p>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.teachers.add') }}">
        @csrf
        <div class="form-group row">
            <label for="name"
                class="col-md-4 col-form-label text-md-right">{{ __('Teacher Rollno.') }}</label>

            <div class="col-md-6">
                <input id="name" type="text"
                    class="form-control{{ $errors->has('rollNumber') ? ' is-invalid' : '' }}"
                    name="rollNumber" value="{{ old('rollNumber') }}" autofocus>

                @if($errors->has('rollNumber'))
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
                    name="firstName" value="{{ old('firstName') }}" autofocus>

                @if($errors->has('firstName'))
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
                    name="lastName" value="{{ old('lastName') }}" autofocus>

                @if($errors->has('lastName'))
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
                    name="email" value="{{ old('email') }}">

                @if($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password"
                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                    name="password">

                @if($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
        </div>
        <div class="form-group row">
            <label for="address"
                class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

            <div class="col-md-6">
                <input id="address" type="text"
                    class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                    name="address" value="{{ old('address') }}" autofocus>

                @if($errors->has('address'))
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
                    name="phoneNumber" value="{{ old('phoneNumber') }}" autofocus>

                @if($errors->has('phoneNumber'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phoneNumber') }}</strong>
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
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
</div>
@endsection
