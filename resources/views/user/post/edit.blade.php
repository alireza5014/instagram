@extends('layouts.app')

@section('header')

    @parent

    <title> ویرایش مطلب   </title>




    <link rel="stylesheet" href="{{url('gelr/vendors/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/ladda-button/css/ladda-themeless.min.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/toastr/css/toastr.min.css')}}">



    <link rel="stylesheet" type="text/css" href="{{url('crop/css/style.css')}}"/>
    {{--    <link rel="stylesheet" type="text/css" href="{{url('crop/css/style-example.css')}}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{url('crop/css/jquery.Jcrop.css')}}"/>

    <script type="text/javascript" src="{{url('crop/scripts/jquery.Jcrop.js')}}"></script>
    <script type="text/javascript" src="{{url('crop/scripts/jquery.SimpleCropper.js')}}"></script>




    {{--    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>--}}
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css'>



@endsection

@section('content')

    <div class="vz_main_content">

        <form method="POST" id="edit_post" enctype="multipart/form-data">
            @csrf
            <input name="id" value="{{$post->id}}">
            <div class="card">
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-9">
                            <div class="row">


                                <div class="col-lg-3 col-md-3 mb-3">
                                    <label for="validationTooltip01"> عنوان</label>
                                    <input name="title" type="text" class="form-control" id="validationTooltip01"
                                           placeholder="عنوان  "
                                           value="{{$post->title}}" required="">
                                    <div class="valid-tooltip">
                                        به نظر خوب میاد!
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 mb-3">
                                    <label for="validationTooltip02">چکیده </label>
                                    <input name="abstract" type="text" class="form-control" id="validationTooltip02"
                                           placeholder="  چکیده"
                                           value="{{$post->abstract}}" required="">
                                    <div class="valid-tooltip">
                                        به نظر خوب میاد!
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card_title">مطلب</h4>
                                            <textarea name="content" class="summer_note_editor">{{$post->content}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="card ">
                                <div id="form_image_preview" class="card-body text-center">
                                    <img src="{{url($post->image_path)}}" alt="Image" class="img-responsive">
                                </div>
                            </div>
                            <textarea style="display: none   ;" id="main_image" name="main_image"></textarea>

                            <script>
                                // Init Simple Cropper
                                $('#form_image_preview').simpleCropper(500, 300, 200, 200);
                            </script>


                            <div class="form-group">
                                <label for="keywords">کلمات کلید :</label><br/>
                                <input type="text" id="keywords" name="keywords" value=""
                                       data-role="tagsinput" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="description">  توضیحات متا :</label><br/>
                                <textarea type="text" id="description" name="description"
                                          data-role="tagsinput" class="form-control"></textarea>
                            </div>

                        </div>


                        <div class="col-lg-12 mr-4 ml-4">

                            <button type="button" id="edit_post_btn" class="btn btn-primary ladda-button ladda_btn"
                                    data-style="expand-right">
                                <span class="ladda-label">  ویرایش  </span>
                                <span class="ladda-spinner"></span></button>
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
    <!-- Ladda Button init Js -->
    <script>
        // var csrf_token = $('meta[name="csrf-token"]').attr('content');


        jQuery(document).ready(function () {
            $("#edit_post_btn").on("click", function (t) {

                var e = t.currentTarget,
                    a = Ladda.create(e);

                a.start();

                $.ajax({
                    url: 'modify',
                    method: 'POST',
                    data: $('#edit_post').serialize(),
                    success: function (data, textStatus, jqXHR) {
                        if (textStatus === 'success') {
                            toastr.success(data.status + "اطلاعات با موفقیت ثبت شد", "", {
                                progressBar: !0
                            });

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
