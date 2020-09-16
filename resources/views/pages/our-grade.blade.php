@extends('layouts.app')

@section('title', $title ?? 'Return & Refund Policies')

@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="{{ route("/") }}">Home</a></li>
                            <li>{{ $title ?? __("FAQ") }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End-->

    <!-- Faq Section Start -->
    <div class="about-area mtb-60px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12 mb-50">
                    <div class="about-content shadow-sm p-3 mb-3">
                        <div class="about-feature mb-3">
                            <p>All of our devices are subject to a rigorous quality control test at our facility, so you can purchase with 100% peace of mind that you’ll receive only the best quality products from us in the condition they are advertised. All of our devices are supplied as below without exception</p>
                        </div>
                    </div>
                    <div class="about-content shadow p-3 mb-3">
                        <div class="about-feature mb-3">
                            <h4 class="color-theme mb-2">Pristine</h4>
                            <p>The closest you can get to a new phone without paying the price. Your device will look and function exactly as if it was new.</p>
                        </div>
                        <div class="about-feature mb-3">
                            <h4 class="color-theme mb-2">Very Good</h4>
                            <p>Your device will be in near-flawless condition, both internally and cosmetically. You’ll barely be able to tell it’s refurbished!</p>
                        </div>

                        <div class="about-feature mb-3">
                            <h4 class="color-theme mb-2">Good</h4>
                            <p>There will be extremely light signs of cosmetic wear but your device will be fully functional and in faultless working order.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-3 text-center pt-3">
                    <p class="ask-question">Can’t find an answer? Call us at
                        <a href="tel:{{ config("services.nexmo.sms_from") }}">{{ config("services.nexmo.sms_from") }}</a> or mail us through
                        <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div><!-- Faq Section End -->

@endsection

@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
