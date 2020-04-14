@extends('layouts.students.index')

@section('studentContent')
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
                    Send FeedBack
                </div>
                <div class="card-body">
                    <form action="{{ route('students.feedback') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
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
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject" placeholder="Subject"
                                        class="form-control {{ $errors->has('subject')?'is-invalid':'' }}">
                                    @if($errors->has('subject'))
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $errors->first('subject') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="feedback">FeedBack</label>
                                    <textarea
                                        class="form-control {{ $errors->has('message')?'is-invalid':'' }}"
                                        name="message" id="feedback" rows="9"></textarea>
                                    @if($errors->has('message'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Send Feedback
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
@push('customScript')
<script>
    tinymce.init({
        selector: '#feedback'
    });
</script>
@endpush
