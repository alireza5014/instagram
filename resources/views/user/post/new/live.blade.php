@extends('layouts.app')

@section('header')

    @parent

    <title> اضافه کردن مطلب جدید </title>
    <link rel="stylesheet" href="{{url('gelr/vendors/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/ladda-button/css/ladda-themeless.min.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/toastr/css/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('crop/css/style.css')}}"/>
    {{--    <link rel="stylesheet" type="text/css" href="{{url('crop/css/style-example.css')}}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{url('crop/css/jquery.Jcrop.css')}}"/>
    <script type="text/javascript" src="{{url('crop/scripts/jquery.Jcrop.js')}}"></script>
    <script type="text/javascript" src="{{url('crop/scripts/jquery.SimpleCropper.js')}}"></script>
    {{--    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>--}}
    <link rel='stylesheet' href='{{url('gelr/css/bootstrap-tagsinput.css')}}'>




     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>



@endsection

@section('content')

    <div class="vz_main_content">

        <form method="POST" id="new_post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-9">
                            <div class="row">

                                <div class="col-lg-12 mt-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">

                                            <label for="caption">   کپشن   :</label><br/>

                                            <textarea name="caption" class="form-control" rows="8"></textarea>

                                            <div class="form-group mt-3">
                                                <label for="tags">   تگ ها :</label><br/>

                                                <input style="width: 100%" type="text" id="tags" name="tags" value=""
                                                       data-role="tagsinput" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="card ">
                                <div id="form_image_preview" class="card-body text-center">
                                    <img src="{{url('images/cover.jpg')}}" alt="Image" class="img-responsive">
                                </div>
                            </div>
                            <textarea style="display: none   ;" id="main_image" name="main_image"></textarea>

                            <script>
                                // Init Simple Cropper
                                $('#form_image_preview').simpleCropper(600, 600, 200, 200);
                            </script>

                            <div class="form-group">
                                <label>اکانت ها:</label>
                                <select name="accounts[]" class="selectpicker form-control" multiple data-live-search="true">
                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->username}}</option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="keywords">   مجموعه :</label><br/>
                                <select id="category_id" name="category_id"
                                        class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="keywords">   زمان ارسال :</label><br/>

                               <input dir="ltr" name="sent_at" value="{{\Carbon\Carbon::now()}}"  type="text" class="form-control">
                            </div>


                            <div class="col-lg-12 mr-4 ml-4">

                                <button type="button" id="new_post_btn" class="btn btn-success ladda-button ladda_btn mb-4 btn-block"
                                        data-style="expand-right">
                                    <span class="ladda-label">ایجاد    </span>
                                    <span class="ladda-spinner"></span></button>
                            </div>

                        </div>




                    </div>

                </div>

            </div>
        </form>

    </div>


@endsection


@section('foot')
    @parent
    <script src="{{url('gelr/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{url('gelr/js/init/editors.js')}}"></script>



    <!-- Main Js -->
    <script src="{{url('gelr/js/main.js')}}"></script>

    <script src="{{url('gelr/vendors/ladda-button/js/spin.min.js')}}"></script>
    <script src="{{url('gelr/vendors/ladda-button/js/ladda.jquery.min.js')}}"></script>
    <script src="{{url('gelr/vendors/ladda-button/js/ladda.min.js')}}"></script>


    <script src="{{url('gelr/vendors/toastr/js/toastr.min.js')}}"></script>
    <!-- Toastr Init -->
    <script src="{{url('gelr/js/init/toastr.js')}}"></script>
    <script src='https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js'></script>

    <!-- Ladda Button init Js -->
    <script>
        $('.selectpicker').selectpicker();

        var csrf_token = $('meta[name="csrf-token"]').attr('content');


        jQuery(document).ready(function () {
            $("#new_post_btn").on("click", function (t) {

                var e = t.currentTarget,
                    a = Ladda.create(e);

                a.start();

                $.ajax({
                    url: 'create',
                    method: 'POST',
                    data: $('#new_post').serialize(),
                    success: function (data, textStatus, jqXHR) {
                        if (textStatus === 'success') {
                            toastr.success(data.status + "اطلاعات با موفقیت ثبت شد", "", {
                                progressBar: !0
                            });


                            $("#form_image_preview img").attr("src", "{{url('images/cover.jpg')}}")
                            $('#new_post')[0].reset();
                            $("#tags").tagsinput('removeAll');
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
