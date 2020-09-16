@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <!-- contact area start -->
    <div class="contact-area mtb-60px">
        <div class="container">
            <div class="custom-row-2 justify-content-center">
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2>{{ $title ?? __('Sell Mac') }}</h2>
                            <p class="mb-3">{{ __('Due to the vast differences in models, specifications and options, we require you to provide us with as many details about your iMac before giving you a quote. Please fill out the form below and we will get back to you within 24 hours.') }}</p>
                        </div>
                        <form class="contact-form-style" id="contact-form" action="" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input id="name" placeholder="Name *" type="text" name="name">
                                </div>
                                <div class="col-lg-6">
                                    <input name="email" placeholder="Email*" type="email" />
                                </div>
                                <div class="col-lg-6">
                                    <input name="subject" placeholder="Phone*" type="text" />
                                </div>
                                <div class="col-lg-6">
                                    <input name="subject" placeholder="Model Number*" type="text" />
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Mac Details"></textarea>
                                    <button class="submit" type="submit">SEND</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
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

@section('breadcrumb')
    <ul class="nav">
        <li><a href="{{ route("/") }}">Home</a></li>
        <li>{{ $title ?? '' }}</li>
    </ul>
@endsection
@section('scripts')@endsection

@section('subscriber-section')@endsection
