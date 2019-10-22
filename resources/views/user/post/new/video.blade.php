@extends('layouts.app')

@section('header')

    @parent

    <title> اضافه کردن مطلب جدید </title>
    <link rel="stylesheet" href="{{url('gelr/vendors/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/ladda-button/css/ladda-themeless.min.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/toastr/css/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('crop/css/style.css')}}"/>

    {{--    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>--}}
    <link rel='stylesheet' href='{{url('gelr/css/bootstrap-tagsinput.css')}}'>




    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>



@endsection

@section('content')

    <div class="vz_main_content">

        <form method="POST" action="{{route('user.post.create_video')}}" id="new_post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-9">
                            <div class="row">

                                <div class="col-lg-12 mt-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">

                                            <label for="caption"> کپشن :</label><br/>

                                            <textarea name="caption" class="form-control" rows="8"></textarea>

                                            <div class="form-group mt-3">
                                                <label for="tags"> تگ ها :</label><br/>

                                                <input style="width: 100%" type="text" id="tags" name="tags" value=""
                                                       data-role="tagsinput" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="keywords"> نوع محتوا :</label>
                                <span>ویدیو</span>
                            </div>

                            <input accept="video/*" style="display: none" type="file" name="video" id="video">
                            <div  class="card" id="card-video">
                            <div class="card-block  text-center">
                                <img id="video-image" src="{{url('images/video.png')}}" alt="Image" class="img-responsive">

                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="80"
                                         aria-valuemin="0" aria-valuemax="100">0%
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>اکانت ها:</label>
                                <select name="accounts[]" class="selectpicker form-control" multiple
                                        data-live-search="true">
                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->username}}</option>

                                    @endforeach

                                </select>
                            </div>




                            <div class="form-group">
                                <label for="keywords"> زمان ارسال :</label><br/>

                                <input dir="ltr" name="sent_at" value="{{\Carbon\Carbon::now()}}" type="text"
                                       class="form-control">
                            </div>


                            <div class="col-lg-12 mr-4 ml-4">

                                <button type="submit" id="new_post_btn"
                                        class="btn btn-success ladda-button ladda_btn mb-4 btn-block"
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
    <script src="script.js"></script>


    <script src="http://malsup.github.com/jquery.form.js"></script>
    <!-- Ladda Button init Js -->
    <script>
        $('.selectpicker').selectpicker();

        var csrf_token = $('meta[name="csrf-token"]').attr('content');


        jQuery(document).ready(function () {


        $("#card-video").on("click", function (t) {
            $('#video').trigger('click')
        });
        $('#video').on('change',function () {
            $('#video-image').attr('src','{{url('images/video_file.png')}}')
        })
            $('form').ajaxForm({
                beforeSend: function (t) {



                },
                uploadProgress: function (event, position, total, percentComplete) {
                    $('.progress-bar').text(percentComplete + '%');
                    $('.progress-bar').css('width', percentComplete + '%');
                },
                success: function (data) {


                     if (data.status==1) {
                        $('.progress-bar').text('Uploaded');
                        $('.progress-bar').css('width', '100%');

                        setTimeout(function () {
                            $('.progress-bar').text('');
                            $('.progress-bar').css('width', '0%');
                            $('#video-image').attr('src','{{url('images/video.png')}}')

                        },2000);

                         $('#new_post')[0].reset();
                         $("#tags").tagsinput('removeAll');


                         toastr.success(data.message, "توجه", {
                             progressBar: !0
                         });
                    }
                    else  {

                         toastr.warning(data.message, "توجه", {
                             progressBar: !0
                         });

                         $('.progress-bar').text('0%');
                        $('.progress-bar').css('width', '0%');

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

                }
            });

        });

    </script>


@endsection


