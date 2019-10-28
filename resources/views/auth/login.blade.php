<!doctype html>
<html lang="fa">

<head>
    @include('layouts.head')
<title>ورود به حساب کاربری</title>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="login-form-body text-center p-4">
                    <img src="{{url('gelr/images/logo-login.svg')}}" class="mb-5" alt="Logo">
                    <div class="form-gp">
                        <label for="exampleInputEmail1">آدرس ایمیل</label>
                        <input  value="{{old('email')}}" type="text" name="email" id="exampleInputEmail1"  >
                        <i class="ti-email"></i>

                    </div>

                    <div class="form-gp">
                        <label for="exampleInputPassword1">رمزعبور</label>
                        <input  name="password" type="password" id="exampleInputPassword1">
                        <i class="ti-lock"></i>
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox primary-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" name="remember" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">مرا به خاطر بسپار</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{url('password/reset')}}" class="text-primary">رمز عبور را فراموش کردید؟</a>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit" class="btn btn-primary">تایید <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">حساب کاربری ندارید؟ <a href="{{route('register')}}" class="text-primary">ثبت نام</a></p>
                    </div>
                </div>

            </form>

            <div class="login100-more" style="background-image: url('{{url('gelr/images/bg-01.jpg')}}');">
            </div>
        </div>
    </div>
</div>



</body>

</html>