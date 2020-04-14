@php
    if(session('success')){
        $className = 'success';
        $message = session('success');
    } 
    if(session('danger'))
    {
        $className = 'danger';
        $message = session('danger');
    }
@endphp
@if(isset($className) && isset($message))
<div class="customAlert">
    <div class="alert alert-{{$className}} alert-dismissible fade show text-black text-center" style="letter-spacing: 1px"
        role="alert">
        <strong>{{ $message }}</strong>
    </div>
</div>
@endif