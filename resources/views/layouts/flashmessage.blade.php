@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-black text-center" style="letter-spacing: 1px" role="alert">
        <strong>{{session('success')}}</strong>
    </div>
@elseif(session('danger'))
<div class="alert alert-danger alert-dismissible fade show text-black text-center" style="letter-spacing: 1px" role="alert">
    <strong>{{session('danger')}}</strong> 
</div>
@endif
