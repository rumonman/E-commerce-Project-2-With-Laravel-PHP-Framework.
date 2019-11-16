<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{asset('frontlogin/images/icons/favicon.ico')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('frontlogin/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontlogin/fonts/iconic/css/material-design-iconic-font.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontlogin/vendor/animate/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontlogin/vendor/css-hamburgers/hamburgers.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontlogin/vendor/animsition/css/animsition.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontlogin/vendor/select2/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontlogin/vendor/daterangepicker/daterangepicker.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontlogin/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontlogin/css/main.css')}}">
    </head>
    <body>
        
        
        <div class="container-login100" style="background-image: url('frontlogin/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-37">
                        Sign In
                    </span>
                    <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                        <input placeholder="username or email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
                        <input placeholder="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                         @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                        Sign In
                        </button>
                    </div>
                    <div class="container text-center">
                        @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                    </div>
                    <div class="text-center p-t-57 p-b-20">
                        <span class="txt1">
                            Or login with
                        </span>
                    </div>
                    <div class="flex-c p-b-112">
                        <a href="#" class="login100-social-item">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                        <a href="#" class="login100-social-item">
                            <img src="{{asset('frontlogin/images/icons/icon-google.png')}}" alt="GOOGLE">
                        </a>
                    </div>
                    
                    <div class="text-center">
                        <a href="{{url('/register')}}" class="txt2 hov1">
                            Sign Up
                        </a>
                    </div>
                </form>
                
            </div>
        </div>
        
        
        <div id="dropDownSelect1"></div>
        <script src="{{asset('frontlogin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('frontlogin/vendor/animsition/js/animsition.min.js')}}"></script>
        <script src="{{asset('frontlogin/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('frontlogin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontlogin/vendor/select2/select2.min.js')}}"></script>
        <script src="{{asset('frontlogin/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('frontlogin/vendor/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('frontlogin/vendor/countdowntime/countdowntime.js')}}"></script>
        <script src="{{asset('frontlogin/js/main.js')}}"></script>
    </body>
</html>
