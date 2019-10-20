@extends('layouts.app')

@section('header')

    @parent
    <link rel="stylesheet" href="{{url('gelr/vendors/ladda-button/css/ladda-themeless.min.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/toastr/css/toastr.min.css')}}">
@endsection

@section('content')

    <div class="modal fade" id="new_account_modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    <h5 class="modal-title">افزودن حساب کاربری جدید</h5>

                </div>
                <div class="modal-body">
                    <form class="form-group" action="" id="new_account" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">نام کاربری اینستاگرام</label>
                            <input class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password"> زمر ورود اینستاگرام</label>

                            <input class="form-control" type="password" name="password" id="password">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button id="new_account_btn" type="button" class="btn btn-primary ladda-button ladda_btn"> افزودن
                    </button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>

    <div class="vz_main_content">
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body" style="min-height: 60vh">
                        <button type="button" class="btn btn-primary btn-flat mt-2" data-toggle="modal"
                                data-target="#new_account_modal"> افزودن حساب کاربری جدید
                        </button>

                        <h4 class="card_title"> List Accounts</h4>
                        <div id="table" class="row">

                            @include('user.account.table')
                        </div>
                    </div>
                    {{--                    {{$accounts->appends($_GET)->links()}}--}}

                </div>
            </div>
            <!-- Progress Table end -->
        </div>
    </div>

@endsection
@section('foot')

    @parent

    <script src="{{url('gelr/js/main.js')}}"></script>

    <script src="{{url('gelr/vendors/ladda-button/js/spin.min.js')}}"></script>
    <script src="{{url('gelr/vendors/ladda-button/js/ladda.jquery.min.js')}}"></script>
    <script src="{{url('gelr/vendors/ladda-button/js/ladda.min.js')}}"></script>



    <script src="{{url('gelr/vendors/toastr/js/toastr.min.js')}}"></script>
    <!-- Toastr Init -->
    <script src="{{url('gelr/js/init/toastr.js')}}"></script>


    <script>
        $(document).ready(function () {

            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                // $('#loader').show();
                var page = $(this).attr('href');
                fetch_data(page);

            });


        });

        function fetch_data(page) {
            $.ajax({
                url: page,
                success: function (data) {
                    $('#table').html(data);
                    // $('#loader').hide();

                }
            });
        }


        jQuery(document).ready(function () {
            $("#new_account_btn").on("click", function (t) {

                var e = t.currentTarget,
                    a = Ladda.create(e);

                a.start();

                $.ajax({
                    url: 'create',
                    method: 'POST',
                    data: $('#new_account').serialize(),
                    success: function (data, textStatus, jqXHR) {


                        if (textStatus === 'success') {
                            toastr.success(data.status + "اطلاعات با موفقیت ثبت شد", "", {
                                progressBar: !0

                            });
                            $('#new_account')[0].reset();
                            $('#new_account_modal').modal('hide');

                            var my_data = data.data;


                            $('#table').append('<div class="col-lg-4 col-md-6  mb-3 col-sm-12 grid-item">\n' +
                                '    <div class="team_member">\n' +
                                '        <img src="'+my_data.profile_pic_url+'" alt="Team Member">\n' +
                                '        <div class="member_name">\n' +
                                '            <h3>  '+my_data.username+'</h3>\n' +
                                '            <span>    '+my_data.full_name+'  </span>\n' +
                                '        </div>\n' +
                                '        <p style="min-height: 100px">'+my_data.biography+'</p>\n' +
                                '\n' +
                                '        <ul>\n' +
                                '            <li><a href="#"><i class="fa fa-facebook"></i></a></li>\n' +
                                '            <li><a href="#"><i class="fa fa-twitter"></i></a></li>\n' +
                                '            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>\n' +
                                '            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>\n' +
                                '        </ul>\n' +
                                '    </div>\n' +
                                '</div>')
                        }


                    },
                    error: function (error) {

                        if (error.status === 422) {
                            var errors = $.parseJSON(error.responseText);
                            $.each(errors.errors, function (key, val) {

                                toastr.error(val[0], "خطا", {
                                    progressBar: !0
                                });
                            });
                        } else {

                            console.log(error.responseText)
                            toastr.error("خطا در ثبت اطلاعات", "خطا ", {
                                progressBar: !0
                            });
                        }


                    },

                    complete: function () {
                        a.stop();
                    }

                });


            })
        });


    </script>

@endsection
