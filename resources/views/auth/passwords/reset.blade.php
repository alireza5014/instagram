
<!doctype html>
<html lang="zxx">

@include('layouts.head')


<body>

<div class="limiter">
    <div class="container-login100">

        <div class="wrap-login100">
            {{--<form class="login100-form validate-form">--}}


            <form method="POST" class="login100-form validate-form" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="login-form-body text-center p-4">

                    {{--<img src="{{url('gelr/images/logo-login.svg')}}" class="mb-5" alt="Logo">--}}


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
                        <input  value="{{ $email ?? old('email') }}"type="text" name="email" id="email">
                        <i class="ti-email"></i>

                    </div>

                    <div class="form-gp">
                        <label for="password">رمز عبور</label>
                        <input name="password" type="password" id="password">
                        <i class="ti-lock"></i>
                    </div>


                    <div class="form-gp">
                        <label for="password-confirm">تایید رمز عبور</label>
                        <input name="password_confirmation" type="password" id="password-confirm" autocomplete="new-password">
                        <i class="ti-lock"></i>
                    </div>


                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox primary-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">مرا به خاطر
                                    بسپار</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#" class="text-primary">رمز عبور را فراموش کردید؟</a>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit" class="btn btn-primary">تغییر رمز عیور <i
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
