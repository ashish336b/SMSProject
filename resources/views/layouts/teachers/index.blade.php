<!DOCTYPE html>
<html lang="en">
<head>
<title>{{Auth::user()->firstName}} {{Auth::user()->lastName}}</title>
    @include('layouts.teachers.head')
</head>
<body>
@include('layouts.teachers.sidebar')
@include('layouts.teachers.header')
@include('layouts.teachers.content')
@include('layouts.teachers.script')
</body>

</html>
