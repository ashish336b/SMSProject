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
                            Edit Admin
                        </div>
                        <div class="card-body">
                                <form action="{{ route('admin.update', $adminData->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" placeholder="Name" value="{{ $adminData->name }}" autofocus>

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
                                                name="email" id="email" value="{{ $adminData->email }}"
                                                placeholder="Email" />
                                            @if($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
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
        </div>
    </div>
@endsection


