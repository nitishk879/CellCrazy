@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="{{ route("/") }}">Home</a></li>
                            <li>{{ $title ?? 'Register' }}</li>
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
                        <div class="login-form-container">
                            <h3 class="py-2">{{ __('Register') }}</h3>
                            <p class="py-2">Create a new account today to reap the benefits of a personalised experience.</p>
                            <div class="login-register-form">
                                <!-- Register Form -->
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="name" placeholder="{{ __('Name') }}" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="username" placeholder="{{ __('Username') }}" type="text" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="phone" placeholder="{{ __('Phone Number') }}" type="text" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="password" placeholder="{{ __('Password') }}" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">

                                        <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required autocomplete="new-password">

                                    </div>

                                    <div class="form-group row mb-0 button-box">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary"><span>{{ __('Register') }}</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-3">
                                <h3>Registered User?</h3>
                                <p>Already have account? Please <a href="/login" class="">Login</a> here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->
@endsection
