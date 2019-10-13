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
                        <h4 class="card_title">  لیست   @if($posts[0]){{$posts[0]->category->title}}@endif</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">تصویر</th>
                                        <th scope="col">وضعیت</th>
                                        <th scope="col">عنوان</th>
                                        <th scope="col">چکیده</th>


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
                    {{$posts->appends($_GET)->links()}}

                </div>
            </div>
            <!-- Progress Table end -->
        </div>
    </div>

@endsection
@section('foot')

    @parent
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

    </script>

@endsection
