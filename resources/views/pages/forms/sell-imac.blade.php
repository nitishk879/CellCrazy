@extends('layouts.app')

@section('title', 'Home Page')

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
            <div class="custom-row-2 justify-content-center">
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2>{{ $title ?? __('Sell iMac') }}</h2>
                            <p class="mb-3">{{ __('Due to the vast differences in models, specifications and options, we require you to provide us with as many details about your iMac before giving you a quote. Please fill out the form below and we will get back to you within 24 hours.') }}</p>
                        </div>
                        <sell-mac-form></sell-mac-form>
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

@section('scripts')
    <script>
        $('form#sellMacForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type:'post',
                url:"/sell-mac",
                data:$(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (data) {
                    if(data==='ok'){
                        $(".form-messege").html("Thank you for providing details! Our expert will get back to you on this.");
                    }
                }
            });
        })
    </script>
@endsection

@section('subscriber-section')@endsection
