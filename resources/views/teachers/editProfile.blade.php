@extends('layouts.teachers.index')

@section('teacherContent')
<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.flashmessage')
                <div class="card">
                    <div class="card-header text-center text-blue">
                        <h1>{{ __('Change Profile') }}</h1>
                    </div>
                    <div class="card-body">
                        <form method="post"
                            action="{{ route('teachers.updateProfile', $teacherData->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="requestFrom"
                                value="{{ url('/admin/profile') }}">
                            <div class="form-group row">
                                <label for="firstName"
                                    class="col-md-4 col-form-label text-md-right">{{ __('FirstName') }}</label>

                                <div class="col-md-6">
                                    <input id="firstName" type="text"
                                        class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}"
                                        name="firstName" value="{{ $teacherData->firstName }}" autofocus>

                                    @if($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastName"
                                    class="col-md-4 col-form-label text-md-right">{{ __('LastName') }}</label>

                                <div class="col-md-6">
                                    <input id="lastName" type="text"
                                        class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}"
                                        name="lastName" value="{{ $teacherData->lastName }}" autofocus>

                                    @if($errors->has('lastName'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ $teacherData->email }}" autofocus>
                                    @if($errors->has('email'))
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
                                        name="address" value="{{ $teacherData->address }}" autofocus>

                                    @if($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phoneNumber"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-blue">
                        <h1>{{ __('Change Password') }}</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('teachers.changePassword') }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="previousPassword"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Previous Password') }}</label>

                                <div class="col-md-6">
                                    <input id="previousPassword" type="password"
                                        class="form-control{{ $errors->has('previousPassword') ? ' is-invalid' : '' }}"
                                        name="previousPassword">

                                    @if($errors->has('previousPassword'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('previousPassword') }}</strong>
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
                                        name="password" required>

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
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change Password') }}
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
