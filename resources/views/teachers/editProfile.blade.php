@extends('layouts.teachers.index')

@section('teacherContent')
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-6">
        @include('layouts.flashmessage')
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="customDashboardForm">
            <div class="row justify-content-center">
            </div>
            <div class="card shadow">
                <div class="card-header text-center font-weight-bold">
                    Edit Profile
                </div>
                <div class="card-body">
                    <form action="{{ route('teachers.updateProfile', $teacherData->id) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        disabled placeholder="Name" value="{{ $teacherData->firstName }}" autofocus>

                                    @if($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">Last Name</label>
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        disabled placeholder="Name" value="{{ $teacherData->lastName }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email"
                                        class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" id="email" value="{{ $teacherData->email }}"
                                        placeholder="Email" />
                                    @if($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                        name="address" id="email" value="{{ $teacherData->address }}"
                                        placeholder="Email" />
                                    @if($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="phoneNumber"
                                        class="col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                    <input id="phoneNumber" type="text"
                                        class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}"
                                        name="phoneNumber" value="{{ $teacherData->phoneNumber }}" autofocus>

                                    @if($errors->has('phoneNumber'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phoneNumber') }}</strong>
                                        </span>
                                    @endif
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
    <div class="col-lg-6">
        <div class="customDashboardForm">
            <div class="card shadow">
                <div class="card-header text-center font-weight-bold">
                    Change Password
                </div>
                <div class="card-body">
                    <form action="{{ route('teachers.changePassword', $teacherData->id) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="previousPassword"
                                        class="col-form-label text-md-right">{{ __('Previous Password') }}</label>
                                    <input id="previousPassword" type="password"
                                        class="form-control{{ $errors->has('previousPassword') ? ' is-invalid' : '' }}"
                                        placeholder="Previous Password" name="previousPassword">

                                    @if($errors->has('previousPassword'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('previousPassword') }}</strong>
                                        </span>
                                    @endif

                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        placeholder="password" name="password">

                                    @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password-confirm"
                                        class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Change Password
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
