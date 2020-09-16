@extends('layouts.app')

@section('title', $title ?? __('Contact Us'))

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="{{ route("/") }}">Home</a></li>
                            <li>{{ $title ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End-->
    <!-- contact area start -->
    <div class="contact-area mtb-60px">
        <div class="container">
            <div class="custom-row-2">
                <div class="col-lg-4 col-md-5 mb-lm-30px">
                    <div class="contact-info-wrap">
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="ion-android-call"></i>
                            </div>
                            <div class="contact-info-dec">
                                <p><a href="tel://01234567890">{{ __("01753 696 664") }}</a></p>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="ion-android-globe"></i>
                            </div>
                            <div class="contact-info-dec">
                                <p><a href="mailto:info@cellcrazy.co.uk">info@cellcrazy.co.uk</a></p>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="ion-android-pin"></i>
                            </div>
                            <div class="contact-info-dec">
                                {{ __("407 Montrose Avenue, Slough, United Kingdom SL1 4TJ") }}
                            </div>
                        </div>
                        <div class="contact-social">
                            <h3>Follow Us</h3>
                            <div class="social-info">
                                <ul>
                                    <li>
                                        <a href="#"><i class="ion-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-google"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form">
                        <div class="contact-title mb-3">
                            <h2>Get In Touch</h2>
                            <p>{{ __('Get in touch with us today with any query you may have – we aim to respond to all questions within 48 hours. If you require urgent help, feel free to call us or pop in to our Slough head office.') }}</p>
                        </div>
                        <contact-form></contact-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
