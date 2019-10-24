@extends('layouts.app')

@section('header')

    @parent

    <title> اضافه کردن مطلب جدید </title>
    <link rel="stylesheet" href="{{url('gelr/vendors/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/ladda-button/css/ladda-themeless.min.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/toastr/css/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('crop/css/style.css')}}"/>

    <link rel='stylesheet' href='{{url('gelr/css/bootstrap-tagsinput.css')}}'>




    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>



@endsection

@section('content')

    <div class="vz_main_content">

        <form method="POST" id="new_post" enctype="multipart/form-data">
            @csrf
            <div class="card" style="max-width: 1200px; margin: auto;min-height: 75vh;" >
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-6">

                            <div class="col-lg-12 mt-0 mb-4">

                                <div id="lfm" data-input="thumbnail" data-preview="holder" class="  text-center">
                                    <div id="holder">
                                        <img src="{{url('images/cover.jpg')}}" width="150px" alt="Image" class="img-responsive">

                                    </div>
                                    <input id="thumbnail" class="form-control" type="hidden" name="filepath">


                                </div>
                                <div class="row">


                                    <label for="caption"> کپشن :</label><br/>

                                    <textarea id="caption" name="caption" class="form-control" rows="8"></textarea>

                                    <div style="width: 100% !important;" class="form-group mt-3">
                                        <label for="tags"> تگ ها :</label><br/>

                                        <input type="text" id="tags" name="tags" value=""
                                               data-role="tagsinput" class="form-control"/>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>اکانت ها:</label>
                                        <select name="accounts[]" class="selectpicker form-control" multiple
                                                data-live-search="true">
                                            @foreach($accounts as $account)
                                                <option value="{{$account->id}}">{{$account->username}}</option>

                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="keywords"> زمان ارسال :</label><br/>
                                        <select id="sent_at" name="sent_at"
                                                class="form-control">
                                            @for($i=0;$i<60;$i++)

                                                <option value="{{$i}}">@if($i==0) همین
                                                    الان @else{{$i." دقیقه دیگر "}}@endif</option>

                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 mr-4 ml-4">

                                    <button type="button" id="new_post_btn"
                                            class="btn btn-success ladda-button ladda_btn mb-4 btn-block"
                                            data-style="expand-right">
                                        <span class="ladda-label">ایجاد    </span>
                                        <span class="ladda-spinner"></span></button>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="smartphone">
                                <div class="content">
                                    <p class="text-center m-2">Posts</p>

                                    <div class="card bg-white" id="__image"  style="max-height: 180px;" >


                                    </div>

                                    <p id="_caption" class="text-right m-2"></p>
                                </div>
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
    <!-- Ladda Button init Js -->
    <script>
        $('.selectpicker').selectpicker();

        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        String.prototype.replaceAll = function (search, replacement) {
            var target = this;
            return target.replace(new RegExp(search, 'g'), replacement);
        };


        jQuery(document).ready(function () {

            $("#thumbnail").on("change", function (t) {

                    var src = $(this).val();
                    var myarr = src.split(',');
                    if (myarr.length > 1) {

                        var html1 = '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">  <ol class="carousel-indicators">';
                        var html2 = '<div class="carousel-inner">';

                        var status = '';
                        for (var i = 0; i < myarr.length; i++) {
                            if(i == 0) { status = "active"} else {status = ""};
                            html1 += ' <li data-target="#carouselExampleIndicators" data-slide-to="' + i + '" class="'+status+'"></li>';
                            html2 += ' <div class="carousel-item '+status+'">  <img  style="height: 200px" class="d-block w-100" src="' + myarr[i] + '" alt="First slide">  </div>';
                        }
                        html1 += "</ol>";
                        html2 += "</div>";
                        html2 += '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>  <span class="sr-only">قبلی</span>  </a>  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">    <span class="carousel-control-next-icon" aria-hidden="true"></span>  <span class="sr-only">بعدی</span>  </a>  </div>';


                        $('#__image').html(html1 + html2);
                    } else {
                        $('#__image').html('<img id="_image"  style="width: 100%"  src="'+myarr[0]+'"    onerror="this.onerror=null;this.src=\'http://localhost/instagram/public/my-files/files/user_1/plus-flat.png\';">');

                    }
                }
            );
            $("#caption").on("keyup", function (t) {


                var tags = $('#tags').val();

                $('#_caption').html('<span>' + $(this).val() + '</span>' + " " + '<span class="text-danger">' + tags.replaceAll(',', "#") + '</span>');


            });

            jQuery(document).on('change', "#tags", function (e) {


                var tags = $(this).val();

                $('#_caption').html('<span>' + $('#caption').val() + '</span>' + " " + '<span class="text-danger">' + tags.replaceAll(',', " #") + '</span>');

                e.preventDefault();
            });


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
                            $('#__image').html('');
                            $('.filter-option-inner-inner').html('');

                            $('#holder').html('<img src="{{url('images/cover.jpg')}}" width="150px" alt="Image" class="img-responsive">');
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


    <script>
                {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
        var route_prefix = "{{ url('laravel-filemanager') }}";

        $('#lfm').filemanager('image', {prefix: route_prefix});
        $('#lfm2').filemanager('file', {prefix: route_prefix});

        $(document).ready(function () {

            // Define function to open filemanager window
            var lfm = function (options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = cb;
            };

            // Define LFM summernote button
            var LFMButton = function (context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'Insert image with filemanager',
                    click: function () {

                        lfm({type: 'image', prefix: '/laravel-filemanager'}, function (lfmItems, path) {
                            lfmItems.forEach(function (lfmItem) {
                                context.invoke('insertImage', lfmItem.url);
                            });
                        });

                    }
                });
                return button.render();
            };

            // Initialize summernote with LFM button in the popover button group
            // Please note that you can add this button to any other button group you'd like
            $('#summernote-editor').summernote({
                toolbar: [
                    ['popovers', ['lfm']],
                ],
                buttons: {
                    lfm: LFMButton
                }
            })
        });

    </script>


@endsection
