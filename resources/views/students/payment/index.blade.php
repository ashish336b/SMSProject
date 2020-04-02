@extends('layouts.students.index')

@section('studentContent')
<div class="container">
    <div class="p-5 m-5">
        @include('layouts.flashmessage')
        <form action="{{route('students.payment')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Pay Fee</button>
        </form>
    </div>
</div>
@endsection
