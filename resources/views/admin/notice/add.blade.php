@extends('layouts.admin.index')
@section('adminContent')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h4>Create Notification</h4>
                    </div>
                    <div class="col-lg-8 justify-content-center">
                        <form action="{{route('admin.notice.add')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="to">Send To:</label>
                                <select class="form-control {{$errors->has('to')?'is-invalid':''}}" id="to" name="to">
                                    <option value="1">Student</option>
                                    <option value="2">Teacher</option>
                                    <option value="3">Both</option>
                                </select>
                                @if ($errors->has('rollNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rollNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject"
                                       class="form-control {{$errors->has('subject')?'is-invalid':''}}">
                                @if($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert"><strong>{{$errors->first('subject')}}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="notification">Write Notification</label>
                                <textarea class="form-control {{$errors->has('message')?'is-invalid':''}}"
                                          name="message" id="notification" rows="9">

                                </textarea>
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Send Notification</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('customScript')
    <script>
        tinymce.init({
            selector: '#notification'
        });
    </script>
@endpush
