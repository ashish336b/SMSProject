@extends('layouts.admin.index')
@section('adminContent')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h4>Edit Notification</h4>
                    </div>
                    <div class="col-lg-8 justify-content-center">
                        <form action="{{route('admin.notice.update',["id"=>$noticeData->id])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="to">Send To:</label>
                                <select class="form-control {{$errors->has('to')?'is-invalid':''}}" id="to" name="to">
                                    <option value="1" {{$noticeData->to === "Student"?'selected': ''}}>Student</option>
                                    <option value="2" {{$noticeData->to === "Teacher"?'selected': ''}}>Teacher</option>
                                    <option value="3" {{$noticeData->to === "Both"?'selected': ''}}>Both</option>
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
                                       class="form-control {{$errors->has('subject')?'is-invalid':''}}"
                                       value="{{$noticeData->subject}}">
                                @if($errors->has('subject'))
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{$errors->first('subject')}}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="notification">Write Notification</label>
                                <textarea class="form-control {{$errors->has('message')?'is-invalid':''}}"
                                          name="message" id="notification" rows="9">
                                    {{$noticeData->message}}
                                </textarea>
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Notification</button>
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
