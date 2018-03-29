@extends('layouts._base')

@push('css')
    <script type="text/javascript">
        window.onload = function () {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
    </script>
@endpush

@section('title', 'Login to Application Dashboard')

@section('content')
    <div class="login-wrapper ">
        <div class="bg-pic">
            <img src="/vendor/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg"
                 data-src="/vendor/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg"
                 data-src-retina="/vendor/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg"
                 alt="" class="lazy">

            <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
                <h2 class="semi-bold text-white">
                    Pages make it easy to enjoy what matters the most in the life</h2>
                <p class="small">
                    images Displayed are solely for representation purposes only, All work copyright of respective
                    owner, otherwise © 2013-2014 REVOX.
                </p>
            </div>
        </div>
        <div class="login-container bg-white">
            <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
                <img src="/vendor/assets/img/logo.png" alt="logo" data-src="assets/img/logo.png"
                     data-src-retina="/vendor/assets/img/logo_2x.png" width="78" height="22">
                <p class="p-t-35">Sign into your pages account</p>
                <form id="form-login" class="p-t-15" role="form" method="post" action="{{ route('user.login') }}">
                    @csrf
                    <div class="form-group form-group-default {{ $errors->has('username') ? 'has-error' : '' }}">
                        <label>Login</label>
                        <input type="text" name="username"
                               placeholder="Username"
                               class="form-control {{ $errors->has('username') ? 'error' : '' }}"
                               value="{{ old('username') }}"
                               required
                        >
                    </div>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <label class="error">{{ $errors->first('username') }}</label>
                        </span>
                    @endif

                    <div class="form-group form-group-default {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label>Password</label>
                        <input type="password"
                               name="password"
                               placeholder="Credential"
                               class="form-control {{ $errors->has('password') ? 'error' : '' }}"
                               required
                        >
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <label class="error">{{ $errors->first('password') }}</label>
                        </span>
                     @endif


                    <div class="row">
                        <div class="col-md-6 no-padding sm-p-l-10">
                            <div class="checkbox ">
                                <input id="remember" name="remember" type="checkbox" value="1" {{ old('remember') }}>
                                <label for="remember">Keep Me Signed in</label>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <a href="{{ route('get.password_request') }}" class="text-info small">Lost your password?</a>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cons m-t-10" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
@endsection