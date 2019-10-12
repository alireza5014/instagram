@extends('layouts.app')

@section('header')

    @parent

    <title>   اضافه کردن مطلب جدید </title>

    <link rel="stylesheet" href="{{url('gelr/vendors/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/ladda-button/css/ladda-themeless.min.css')}}">
    <link rel="stylesheet" href="{{url('gelr/vendors/toastr/css/toastr.min.css')}}">

@endsection

@section('content')

    <div class="vz_main_content">


        <div class="card">
        <div class="card-body">
        <div class="row">



                <div class="col-lg-3 col-md-3 mb-3">
                    <label for="validationTooltip01">  عنوان</label>
                    <input type="text" class="form-control" id="validationTooltip01" placeholder="عنوان  " value="" required="">
                    <div class="valid-tooltip">
                        به نظر خوب میاد!
                    </div>
                </div>
                <div class="col-lg-6 col-md-9 mb-3">
                    <label for="validationTooltip02">چکیده  </label>
                    <input type="text" class="form-control" id="validationTooltip02" placeholder="  چکیده" value="" required="">
                    <div class="valid-tooltip">
                        به نظر خوب میاد!
                    </div>
                </div>

            <div class="col-lg-3 stretched_card">
                <div class="card">

                        <form action="#" class="dropzone dropzone-light" id="basic-dropzone-upload">
                            <div class="dz-default dz-message">
                                <span><i class="ti-image"></i></span>
                            </div>
                        </form>

                </div>
            </div>


            <div class="col-lg-12 mt-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">مطلب</h4>
                        <textarea class="summer_note_editor"></textarea>
                    </div>
                </div>
            </div>



            <button id="new_post_btn" class="btn btn-primary ladda-button ladda_btn" data-style="expand-right">
                <span class="ladda-label">تایید</span>
                <span class="ladda-spinner"></span></button>

        </div>

    </div>

    </div>
    </div>


@endsection


@section('foot')
    @parent
    <script  src="{{url('gelr/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script  src="{{url('gelr/js/init/editors.js')}}"></script>



    <!-- Main Js -->
    <script src="{{url('gelr/js/main.js')}}"></script>

    <script src="{{url('gelr/vendors/ladda-button/js/spin.min.js')}}"></script>
    <script src="{{url('gelr/vendors/ladda-button/js/ladda.jquery.min.js')}}"></script>
    <script src="{{url('gelr/vendors/ladda-button/js/ladda.min.js')}}"></script>


    <script src="{{url('gelr/vendors/toastr/js/toastr.min.js')}}"></script>
    <!-- Toastr Init -->
    <script src="{{url('gelr/js/init/toastr.js')}}"></script>


    <!-- Ladda Button init Js -->
  <script>
      jQuery(document).ready(function () {

          $("#new_post_btn").on("click", function(t) {

              toastr.success("لورم ایپسوم متن ساختگی با تولید سادگی", "نوار پیشرفت", {
                  progressBar: !0
              });
              var e = t.currentTarget,
                  a = Ladda.create(e);
              a.start(), setTimeout(function() {
                  a.stop()
              }, 1000)
          })
      });
  </script>
@endsection
