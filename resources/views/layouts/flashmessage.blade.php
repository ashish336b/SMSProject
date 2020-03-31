@if(session('success'))
    <div class="alert alert-success text-black-50">
        <p style="color: #0c0c0c">{{ session('success') }}</p>
    </div>
@elseif(session('danger'))
    <div class="alert alert-danger text-black-50">
        <p style="color: #0c0c0c">{{ session('danger') }}</p>
    </div>
@endif
