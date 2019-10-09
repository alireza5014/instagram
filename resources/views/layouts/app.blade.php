<!DOCTYPE html>
<html class="no-js" lang="zxx">
@include('layouts.head')


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
