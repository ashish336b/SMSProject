@extends('layouts.students.index')

@section('studentContent')
    <div class="container">
        <div class="p-5 m-5">
            <h3 class="text-center">You can Pay your Fee.</h3>
            @include('layouts.flashmessage')
            <div class="row justify-content-center py-3">
                <form action="{{route('students.payment')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Pay Your School Fee</button>
                </form>
            </div>
        </div>
    </div>
@endsection
