<header class="vz_main_header flex-grow-1 top_nav">
    <div class="container-fluid d-flex flex-row h-100 align-items-center">
        <!--=========================*
                          Logo
            *===========================-->
        <div class="text-center rt_nav_wrapper d-flex align-items-center">
            <a class="nav_logo rt_logo" href="index.html"><img src="{{url('gelr/images/logo-dark.svg')}}" alt="logo"/></a>
            <a class="nav_logo nav_logo_mob" href="index.html"><img src="{{url('gelr/images/mobile-logo.svg')}}" alt="logo"/></a>

        </div>
        <!--=========================*
                   End Logo
       *===========================-->
        <div class="nav_wrapper_main d-flex align-items-center justify-content-between flex-grow-1">

            <ul class="navbar-nav navbar-nav-right mr-0 ml-auto">

                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <span class="profile_sec">

                                <span class="profile_name">
                                    <span class="hi_name">سلام،</span>
                                    {{getUser('name')}} <i class="feather ft-chevron-down"></i>
                                </span>
                                <img src="{{url('gelr/images/profile.png')}}" alt="profile"/>
                            </span>
                    </a>
                    {{--<div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-2"--}}
                         {{--aria-labelledby="profileDropdown">--}}
                        {{--<a class="dropdown-item">--}}
                            {{--<i class="ti-user text-dark mr-3"></i> پروفایل--}}
                        {{--</a>--}}
                        {{--<a class="dropdown-item">--}}
                            {{--<i class="ti-settings text-dark mr-3"></i> تنظیمات حساب--}}
                        {{--</a>--}}
                        {{--<a class="dropdown-item">--}}
                            {{--<i class="feather ft-lock text-dark mr-3"></i>--}}
                            {{--به روز رسانی رمز عبور--}}
                        {{--</a>--}}
                    {{--</div>--}}
                </li>
                <!--==================================*
                         End Profile Menu
                *====================================-->
                <li class="nav-item d_none_sm">

                    <form method="post" action="{{route('logout')}}">
                        <button type="submit" class="nav-link logout_link" >
                            @csrf
                            خروج <i class="feather ft-power"></i>
                        </button>
                    </form>
                </li>
            </ul>
            <!--=========================*
                       Mobile Menu
           *===========================-->
            <span class="d-lg-none">
                    <a class="vz_mobile_menu_icon ml-3" id="vz_mobileCollapseIconMobile" href="javascript:"><span></span></a>
                </span>
            <!--=========================*
                   End Mobile Menu
           *===========================-->
        </div>
    </div>
</header>
