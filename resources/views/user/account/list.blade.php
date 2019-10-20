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
                    <div class="card-body" style="min-height: 60vh">
                        <h4 class="card_title"> List Accounts</h4>
                        <div class="row">

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
