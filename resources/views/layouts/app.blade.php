<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="{{url('gelr/js/jquery.min.js')}}"></script>

    @include('layouts.head')


</head>


<body>

@include('layouts.nav')

<div class="vz_main_sec">

    @include('layouts.sidebar')


    <div class="vz_main_container">
        @yield('content')
        @include('layouts.footer')


    </div>


</div>

@include('layouts.foot')

</body>

</html>
