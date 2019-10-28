

<!doctype html>
<html lang="zxx">

<head>
    @include('layouts.head')
    <title>بازیابی رمز عبور</title>

</head>

 <body>

<div class="limiter">
    <div class="container-login100">

        <div class="wrap-login100">
            {{--<form class="login100-form validate-form">--}}


            <form method="POST" class="login100-form validate-form" action="{{ route('password.email') }}">
                @csrf
                <div class="login-form-body text-center p-4">

                    {{--<img src="{{url('gelr/images/logo-login.svg')}}" class="mb-5" alt="Logo">--}}

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="form-gp">
                        <label for="email">آدرس ایمیل</label>
                        <input value="{{old('email')}}" type="text" name="email" id="email" required autocomplete="email" autofocus>
                        <i class="ti-email"></i>

                    </div>




                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit" class="btn btn-primary">تایید <i
                                    class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">حساب کاربری دارید؟ <a href="{{route('login')}}" class="text-primary"> ورود
                                به حساب کاربری</a></p>
                    </div>
                </div>

            </form>

            <div class="login100-more" style="background-image: url('{{url('gelr/images/bg-reg.jpg')}}');">


            </div>
        </div>
    </div>
</div>


<!--=========================*
            Scripts
*===========================-->

@include('layouts.foot')

<!-- This Page Js -->
<script>
    jQuery(document).ready(function ($) {

        $('.form-gp input').on('focus', function () {
            $(this).parent('.form-gp').addClass('focused');
        });
        $('.form-gp input').on('focusout', function () {
            if ($(this).val().length === 0) {
                $(this).parent('.form-gp').removeClass('focused');
            }
        });
    });
</script>
</body>

</html>
