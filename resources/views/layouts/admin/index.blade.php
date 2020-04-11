<!DOCTYPE html>
<html lang="en">
<head>
<title>{{Auth::user()->name}}</title>
    @include('layouts.admin.head')
</head>
<body>
@include('layouts.admin.sidebar')
@include('layouts.admin.header')
@include('layouts.admin.content')
@include('layouts.admin.script')
</body>

</html>
