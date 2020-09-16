@extends('layouts.app')

@section('title', $title ?? 'Login')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="{{ route("/") }}">Home</a></li>
                            <li>{{ $title ?? 'Login' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End-->
    <!-- login area start -->
    <div class="login-register-area mtb-60px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="title">
                            <h3 class="py-2">{{ __('Login  to your account') }}</h3>
                            <p class="py-2">{{__('you can login here to fetch your sales record, track your order etc.')}}</p>
                        </div>
                        <!-- Login -->
                        <div class="login-form-container">
                            <div class="login-register-form">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-30">
                                            <input id="username" type="text" placeholder="Enter your username" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-20">
                                            <input id="password" type="password" placeholder="Enter your password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 button-box">
                                            <div class="login-toggle-btn">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                                @endif
                                                <button type="submit" class="btn btn-default" value="LOGIN"><span>{{ __('Login') }}</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @if (Route::has('register'))
                                    <h4 class="mt-3">Don’t have account? please click <a href="{{ route('register') }}">{{ __('Register') }}</a></h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->
@endsection
