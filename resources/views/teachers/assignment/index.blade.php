@extends('layouts.teachers.index')

@section('teacherContent')
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
                        Create Attachment
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teachers.attachment') }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('message')? 'is-invalid': '' }}"
                                            name="message" value="{{ old('message') }}" id="message"
                                            aria-describedby="helpId" placeholder="Message" />
                                        @if($errors->has('message'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('message') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="classroom_id">ClassName</label>
                                        <select
                                            class="form-control {{ $errors->has('classroom_id')? 'is-invalid': '' }}"
                                            name="classroom_id" id="classroom_id">
                                            @foreach($classUnderDepartment as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('classroom_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('classroom_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="uploadFile">Upload File</label>
                                        <input type="file"
                                            class="form-control {{ $errors->has('uploadFile')? 'is-invalid': '' }}"
                                            name="uploadFile" id="uploadFile">
                                        @if($errors->has('uploadFile'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('uploadFile') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Send Attachment
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
