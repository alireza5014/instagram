


<nav class="vz_navbar ">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <div class="vz_navigation">
                <ul class="sidebar nav flex-column">
                    <li class="active"><a class="nav-link text-center"   ><i class="feather ft-home"></i><span>داشبورد</span></a></li>

                    <li><a class="nav-link text-center" href="{{route('user.account.list')}}"  ><i class="feather ft-gitlab"></i><span> اکانت ها </span></a></li>
                     <li><a class="nav-link text-center"  data-nav="advance_kit"><i class="feather ft-zap"></i><span>  ارسال محتوا   </span></a></li>
                    <li><a class="nav-link text-center"   data-nav="forms"><i class="feather ft-clipboard"></i><span> تجهیزات</span></a></li>
                    <li><a class="nav-link text-center"   data-nav="maps"><i class="feather ft-map-pin"></i><span>   خدمات </span></a></li>
                    <li><a class="nav-link text-center"   data-nav="data"><i class="feather ft-file-text"></i><span>تماس با ما</span></a></li>
                    <li><a class="nav-link text-center"   data-nav="pages"><i class="feather ft-layers"></i><span>درباره ما</span></a></li>
                </ul>

                <div class="sidebar_content">

                    <div class="vz_sidebar_link advance_kit">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>نرخ ها  </label>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{route('user.post.new',['type'=>'photo'])}}"><i class="menu_icon ti-layout-cta-left"></i> <span>ارسال تصویر جدید</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('user.post.new',['type'=>'album'])}}"><i class="menu_icon ti-layout-cta-left"></i> <span>ارسال گالری جدید</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('user.post.new',['type'=>'video'])}}"><i class="menu_icon ti-layout-cta-left"></i> <span>ارسال ویدیو جدید</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('user.post.new',['type'=>'story'])}}"><i class="menu_icon ti-layout-cta-left"></i> <span>ارسال استوری جدید</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('user.post.new',['type'=>'live'])}}"><i class="menu_icon ti-layout-cta-left"></i> <span>ارسال لایو جدید</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('user.post.list')}}"><i class="menu_icon ti-layout-cta-left"></i> <span>لیست محتوا </span></a></li>

                        </ul>
                    </div>
                    <div class="vz_sidebar_link forms">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>تجهیزات  </label>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="form-basic.html"><i class="menu_icon ion-edit"></i><span>  ایجاد دستگاه جدید</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="form-basic.html"><i class="menu_icon ion-edit"></i><span>   لیست دستگاه ها</span></a></li>

                        </ul>
                    </div>
                    <div class="vz_sidebar_link maps">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>خدمات  </label>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="google-maps.html"><i class="menu_icon icon-map"></i><span>  ایجاد خدمت جدید   </span></a></li>
                            <li class="nav-item"><a class="nav-link" href="google-maps.html"><i class="menu_icon icon-map"></i><span>   لیست خدمات  </span></a></li>

                        </ul>
                    </div>
                    <div class="vz_sidebar_link data">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>تماس با ما</label>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="basic-table.html"><i class="menu_icon ion-ios-grid-view"></i><span>  ویرایش تماس با ما</span></a></li>

                        </ul>
                    </div>
                    <div class="vz_sidebar_link pages">
                        <ul class="nav vz_inner_nav">
                            <li class="nav-item menu_title">
                                <label>درباره ما</label>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="login.html"><i class="menu_icon feather ft-log-in"></i><span>ویرایش درباره ما</span></a></li>

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>

