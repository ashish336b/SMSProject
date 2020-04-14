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
                            Create New Admin
                        </div>
                        <div class="card-body">
                                <form action="{{ route('admin.add') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" placeholder="Name" value="{{ old('name') }}" autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('name') }}</strong>
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
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Add Admin
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


