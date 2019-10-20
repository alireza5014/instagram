@extends('layouts.app')

@section('head')

    @parent
    <link rel="stylesheet" href="{{url('gelr/vendors/summernote/dist/summernote-bs4.css')}}">

@endsection

@section('content')



    <div class="vz_main_content">
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        {{--                        <h4 class="card_title">  لیست   @if($posts[0]){{$posts[0]->category->title}}@endif</h4>--}}

                        <div id="table" class="row">

                            @include('user.post.table')
                        </div>
                    </div>
                    {{$posts->appends($_GET)->links()}}

                </div>
            </div>
            <!-- Progress Table end -->
        </div>
    </div>

@endsection
@section('foot')

    @parent

@endsection
