@extends('layouts.app')

@section('header')

    @parent

@endsection

@section('content')

    <div class="vz_main_content">
        <div class="row">
            <div class="col-lg-8 stretched_card">
                <div class="card">
                    <div class="card-body">
                        <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                            <div>
                                <h4 class="card_title mb-0">نمای کلی درآمد</h4>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="mr-2 d-none d-md-block tab_links">
                                        <a href="#" class="active">هفتگی</a>
                                        <a href="#">سالانه</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mb-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                            گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                        <div id="sale_chart_vz"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="stats_slider" class="carousel slide slide_widget" data-ride="carousel"
                                     data-interval="4000">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card_title mb-0">
                                                <span class="heading_icon">
                                                    <img src="images/icon-bg.png" alt="Icon">
                                                    <i class="feather ft-shopping-bag"></i>
                                                </span>
                                            فروش</h4>
                                        <div class="btn-group border-0">
                                            <div class="vz_nav">
                                                <a class="vz_nav-prev carousel-control-prev" href="#stats_slider"
                                                   role="button" data-slide="prev">
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                                <a class="vz_nav-next carousel-control-next" href="#stats_slider"
                                                   role="button" data-slide="next">
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <h3 class="mb-0 font-weight-medium">20 میل</h3>
                                            <p class="text-muted">10٪ بالاتر از ماه قبل</p>
                                            <div class="slide_progress">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="font-weight-medium">پیشرفت</h4>
                                                    <p class="mb-0 text-muted">50%</p>
                                                </div>
                                                <div class="progress progress-md">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                         style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                                <small class="text-muted">63٪ از اهداف شما</small>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <h3 class="mb-0 font-weight-medium">500 هزار</h3>
                                            <p class="text-muted">5٪ بالاتر از ماه قبل</p>
                                            <div class="slide_progress">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="font-weight-medium">پیشرفت</h4>
                                                    <p class="mb-0 text-muted">25%</p>
                                                </div>
                                                <div class="progress progress-md">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                         style="width: 25%" aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                                <small class="text-muted">63٪ از اهداف شما</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="orders_slider" class="carousel slide slide_widget" data-ride="carousel"
                                     data-interval="4000">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card_title mb-0">
                                                <span class="heading_icon">
                                                    <img src="images/icon-bg.png" alt="Icon">
                                                    <i class="feather ft-archive"></i>
                                                </span>
                                            سفارشات</h4>
                                        <div class="btn-group border-0">
                                            <div class="vz_nav">
                                                <a class="vz_nav-prev carousel-control-prev" href="#orders_slider"
                                                   role="button" data-slide="prev">
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                                <a class="vz_nav-next carousel-control-next" href="#orders_slider"
                                                   role="button" data-slide="next">
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <h3 class="mb-0 font-weight-medium">100 هزار</h3>
                                            <p class="text-muted">10٪ بالاتر از ماه قبل</p>
                                            <div class="slide_progress">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="font-weight-medium">پیشرفت</h4>
                                                    <p class="mb-0 text-muted">73%</p>
                                                </div>
                                                <div class="progress progress-md">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                         style="width: 73%" aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                                <small class="text-muted">63٪ از اهداف شما</small>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <h3 class="mb-0 font-weight-medium">500 هزار</h3>
                                            <p class="text-muted">5٪ بالاتر از ماه قبل</p>
                                            <div class="slide_progress">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="font-weight-medium">پیشرفت</h4>
                                                    <p class="mb-0 text-muted">61%</p>
                                                </div>
                                                <div class="progress progress-md">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                         style="width: 61%" aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                                <small class="text-muted">63٪ از اهداف شما</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card d-flex w-100">
                    <div class="row no-gutters row-bordered row-border-light h-100 widget_row">
                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <img src="images/icon-bg.png" alt="Icon">
                                        <i class="feather ft-briefcase text-primary display-4"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">فعال <span class="text-primary">پروژه</span></h6>
                                        <h4 class="mt-3 mb-0">6834</h4>
                                    </div>
                                </div>
                                <p class="mb-0 text-muted">63٪ از ماه گذشته</p>
                            </div>
                        </div>
                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <img src="images/icon-bg.png" alt="Icon">
                                        <i class="feather ft-shopping-cart text-primary display-4"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted"><span class="text-primary">مجموع</span> سفارشات</h6>
                                        <h4 class="mt-3 mb-0">8263</h4>
                                    </div>
                                </div>
                                <p class="mb-0 text-muted">70٪ از ماه گذشته</p>
                            </div>
                        </div>
                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <img src="images/icon-bg.png" alt="Icon">
                                        <i class="feather ft-users text-primary display-4"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">جدید <span class="text-primary">بازدیدکنندگان</span>
                                        </h6>
                                        <h4 class="mt-3 mb-0">9236</h4>
                                    </div>
                                </div>
                                <p class="mb-0 text-muted">59% From Last Month</p>
                            </div>
                        </div>
                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <img src="images/icon-bg.png" alt="Icon">
                                        <i class="feather ft-dollar-sign text-primary display-4"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">مجموع <span class="text-primary">درآمد</span></h6>
                                        <h4 class="mt-3 mb-0">3682</h4>
                                    </div>
                                </div>
                                <p class="mb-0 text-muted">89٪ از ماه گذشته</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mt-4 stretched_card">
                <div class="card">
                    <div class="card-body">
                        <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                            <div>
                                <h4 class="card_title mb-0">بازدید کنندگان کاربر</h4>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="mr-2 d-none d-md-block tab_links">
                                        <a href="#" class="active">هفته</a>
                                        <a href="#">ماه</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="vz_pie_chart_home"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4 stretched_card">
                <div class="card">
                    <div class="card-body">
                        <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                            <div>
                                <h4 class="card_title mb-0">آمار فروش</h4>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="mr-2 d-none d-md-block tab_links">
                                        <a href="#" class="active">روزانه</a>
                                        <a href="#">سالانه</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sales_stats"></div>
                        <div class="bullet_wrap_chart text-center mt-3">
                            <div class="bullet_chart">
                                <span class="circle_chart circle_light_chart"></span><span>هفتگی (15.12%)</span>
                            </div>
                            <div class="bullet_chart">
                                <span class="circle_chart"></span><span>ماهانه (3.20%)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">جدول محصولات</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">وضعیت</th>
                                        <th scope="col">مشتری</th>
                                        <th scope="col">محصول</th>
                                        <th scope="col">تاریخ</th>
                                        <th scope="col">قیمت</th>
                                        <th scope="col">اقدام</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <span class="dot_vz dot_vz_success"></span>
                                            <div class="text-left">
                                                <div class="text-success">تکمیل شده</div>
                                                <div class="text-dark">23 دی 1398</div>
                                            </div>
                                        </td>
                                        <td>آرش خادملو</td>
                                        <td>آیپد لنوو 310</td>
                                        <td>14-06-2019</td>
                                        <td>50000تومان</td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3">
                                                    <button type="button" class="btn btn-inverse-secondary"><i
                                                            class="fa fa-edit"></i></button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-inverse-danger"><i
                                                            class="ti-trash"></i></button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <span class="dot_vz dot_vz_primary"></span>
                                            <div class="text-left">
                                                <div class="text-primary">در انتظار</div>
                                                <div class="text-dark">15 دی 1398</div>
                                            </div>
                                        </td>
                                        <td>آرش خادملو</td>
                                        <td>آیپد لنوو 310</td>
                                        <td>14-06-2019</td>
                                        <td>50000تومان</td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3">
                                                    <button type="button" class="btn btn-inverse-secondary"><i
                                                            class="fa fa-edit"></i></button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-inverse-danger"><i
                                                            class="ti-trash"></i></button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <span class="dot_vz dot_vz_danger"></span>
                                            <div class="text-left">
                                                <div class="text-danger">رد شده</div>
                                                <div class="text-dark">15 دی 1398</div>
                                            </div>
                                        </td>
                                        <td>آرش خادملو</td>
                                        <td>آیپد لنوو 310</td>
                                        <td>14-06-2019</td>
                                        <td>50000تومان</td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3">
                                                    <button type="button" class="btn btn-inverse-secondary"><i
                                                            class="fa fa-edit"></i></button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-inverse-danger"><i
                                                            class="ti-trash"></i></button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <span class="dot_vz dot_vz_secondary"></span>
                                            <div class="text-left">
                                                <div class="text-secondary">در حال پیش رفت</div>
                                                <div class="text-dark">15 دی 1398</div>
                                            </div>
                                        </td>
                                        <td>آرش خادملو</td>
                                        <td>آیپد لنوو 310</td>
                                        <td>14-06-2019</td>
                                        <td>50000تومان</td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3">
                                                    <button type="button" class="btn btn-inverse-secondary"><i
                                                            class="fa fa-edit"></i></button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-inverse-danger"><i
                                                            class="ti-trash"></i></button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Progress Table end -->
        </div>
    </div>

@endsection
