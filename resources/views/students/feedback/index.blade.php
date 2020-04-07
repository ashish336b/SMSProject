@extends('layouts.students.index')

@section('studentContent')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>Send Feedback</h4>
                </div>
                <div class="col-lg-8 justify-content-center">
                    <form action="{{ route('admin.notice.add') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="to">Email:</label>
                            <input type="text" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                            @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject"
                                class="form-control {{ $errors->has('subject')?'is-invalid':'' }}">
                            @if($errors->has('subject'))
                                <span class="invalid-feedback"
                                    role="alert"><strong>{{ $errors->first('subject') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="notification">FeedBack</label>
                            <textarea
                                class="form-control {{ $errors->has('message')?'is-invalid':'' }}"
                                name="message" id="feedback" rows="9">

                           </textarea>
                            @if($errors->has('message'))
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
       selector: '#feedback'
   });
</script>
@endpush
