<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
@section('header')
    @include('includes.header')
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
