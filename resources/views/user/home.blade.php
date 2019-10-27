@extends('layouts.app')

@section('header')

    @parent

@endsection

@section('content')




    <div class="vz_main_content">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card d-flex w-100">
                    <div class="row no-gutters row-bordered row-border-light h-100 widget_row">

                        @foreach($data as $key=>$value)
                            <div class="d-flex col-md-6 col-lg-3 align-items-center col-sm-6">
                                <div class="card-body">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-auto">
                                            <img src="{{url('gelr/images/icon-bg.png')}}" alt="Icon">
                                            <i class="feather {{$value[2]}} text-primary display-4"></i>
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-0 text-muted">  <span class="text-primary">   {{$key}}</span></h6>
                                            <h4 class="mt-3 mb-0">{{$value[0]}}<span> {{$value[1]}} </span></h4>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            @endforeach
                    </div>
                </div>



            </div>
        </div>




    </div>

@endsection
