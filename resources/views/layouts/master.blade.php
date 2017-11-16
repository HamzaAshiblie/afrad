<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{URL::to('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('src/css/bootstrap-theme.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('src/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('src/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('src/plugins/fullcalendar/fullcalendar.print.css'),array('media' => 'print')}}" rel="stylesheet">
    <link href="{{URL::to('src/font-awesome/css/font-awesome.css') }}" rel='stylesheet' media='all' />
    <link href="{{URL::to('src/css/app.css')}}" rel="stylesheet">
    <link href="{{URL::to('src/css/rtl.css')}}" rel="stylesheet">
</head>
<body>
@section('header')
    @include('includes.header')
@show

<div class="container">
    @yield('content')
</div>
<link rel="stylesheet" href="{{URL::to('src/plugins/moment/moment.min.js')}}">
<link rel="stylesheet" href="{{URL::to('src/plugins/fullcalendar/fullcalendar.min.js')}}">
<script  src="{{URL::to('src/js/jquery-2.2.4.js')}}"> </script>
<script  src="{{URL::to('src/js/bootstrap.min.js')}}"> </script>

<!-- DataTables -->
<script src="{{URL::to('src/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::to('src/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::to('src/js/datatables.js')}}"></script>
<!-- AppJS -->
<script  src="{{URL::to('src/js/app.js')}}"></script>
</body>
</html>
