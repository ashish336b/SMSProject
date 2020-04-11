<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</title>
    @include('layouts.students.head')
</head>

<body>
    @include('layouts.students.sidebar')
    @include('layouts.students.header')
    @include('layouts.students.content')
    @include('layouts.students.script')
</body>

</html>
