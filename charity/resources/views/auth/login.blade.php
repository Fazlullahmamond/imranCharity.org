{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/simple-line-icons.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/css/AdminLTE.min.css') }}">
    <link rel="icon" href="{{asset('icon.png')}}">
    <!-- AdminLTE Skins. Choose a skin from the backend/css/skins
       folder instead of downloading all of them to reduce the load. -->
  
</head>
<body class="hold-transition login-page" style='height:0'>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="login-logo">
            <a href="#">Login<b>As</b>Admin</a>
          </div>
        <div class="login-box-body">
            <div class="login-logo">
                <a href="#"><img src="{{ asset('backend/img/logo.jpeg') }}" alt="" width="100px"
                        style="border-radius: 50%"> </a>
            </div>
            <p class="login-box-msg">Sign in to help Needy People</p>


            {{-- <div class="social-auth-links text-center">
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
            <br>
                <p>- OR -</p>
            </div> --}}
            <!-- /.social-auth-links -->


            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback">
                    <x-jet-label for="email" value="{{ __('Email') }}" />     
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    <span class="fa fa-envelope form-control-feedback"></span>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <x-jet-label for="password" value="{{ __('Password') }}" />     
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Password">
                    <span class="fa fa-lock form-control-feedback" id='showPassword'></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <label>
                            <input type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}"> {{ __('Remember Me') }}
                        </label>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ __('Login') }}
                        </button>

                    </div>
                    <!-- /.col -->
                </div>
            </form>
{{-- 

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            @if (Route::has('password.request'))
                <a class="btn btn-link text-center" href="{{ route('register') }}">
                    Register a new membership.
                </a>
            @endif --}}
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</body>
</html>