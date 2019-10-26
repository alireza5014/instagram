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
        <div style="max-width: 1200px; margin: auto;min-height: 75vh;" >


        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link  @if($type=='photo') active @endif" id="home-tab" href="{{route('user.post.new',['type'=>'photo'])}}" role="tab" aria-controls="home" aria-selected="true"><i class="ti-image"></i> تصویر</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($type=='album') active @endif  " id="profile-tab"   href="{{route('user.post.new',['type'=>'album'])}}" role="tab"  ><i class="ti-loop"></i> آلبوم</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if($type=='video') active @endif" id="contact-tab"   href="{{route('user.post.new',['type'=>'video'])}}" role="tab"  ><i class="ti-video-camera"></i> ویدیو</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if($type=='story') active @endif" id="contact-tab"   href="{{route('user.post.new',['type'=>'story'])}}" role="tab"  ><i class="ti-video-clapper"></i> استوری</a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link  @if($type=='live') active @endif" id="contact-tab"   href="{{route('user.post.new',['type'=>'live'])}}" role="tab" ><i class="ti-mobile"></i> لایو</a>--}}
{{--            </li>--}}

        </ul>
        @include('user.post.new.'.$type,['type'=>$type])
        </div>
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




@endsection
