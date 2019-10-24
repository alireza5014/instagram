@extends('layouts.app')

@section('header')

    @parent


@endsection

@section('content')



    <div class="vz_main_content">


                        <div class="row">
                            <!-- Progress Table start -->
                            <div class="col-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card_title">  لیست پست ها</h4>
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table table-hover progress-table text-center">
                                                    <thead class="text-uppercase">
                                                    <tr>
                                                        <th scope="col">شناسه</th>
                                                        <th scope="col">اکانت</th>
                                                        <th scope="col">تصویر</th>
                                                        <th scope="col">کپشن</th>
                                                        <th scope="col">  زمان  </th>

                                                        <th scope="col">وضعیت</th>
                                                        <th scope="col">اقدام</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="table">
                                                    @include('user.post.table')

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Progress Table end -->
                        </div>
        {{$posts->appends($_GET)->links()}}



                    </div>




@endsection
<script src="{{url('gelr/js/owl.carousel.min.js')}}"></script>

@section('foot')

    @parent

@endsection
