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

    <!-- Returns & Refund policy -->
    <div class="about-area mtb-60px">
        <div class="container">
            <div class="row">
                <div class="about-content col-lg-11 col-12">
                    <h2>Returns & Refund policy</h2>

                                <h3>Shipping Costs</h3>
                                <p>We offer <strong>free delivery</strong> on all our orders for customers in the United Kingdom. We do not sell or ship to outside the UK – sorry.</p>
                                <h3>14 Day Returns or Exchange</h3>
                                <p>At Cell Crazy, we understand that sometimes a customer may change their mind. We offer a 14 day exchange or refund policy. The device must be returned in the same condition as purchased for a exchange or full refund. Please see below for our returns process.</p>
                                <h3>Refund or Exchange Process</h3>
                                <ul>
                                    <li>Ensure that there is no damage to the device and it is in the same condition as your received it.</li>
                                    <li>You will need to contact us for a RMA number.</li>
                                    <li>Please ensure that all security locks are removed i.e. passcode &amp; iCloud. We cannot process a return with these locks still on the device.</li>
                                    <li>A returns exchange form will need to be filled out. Please note: an incomplete returns form can result in a delay in your return or exchange.</li>
                                    <li>The device needs to be carefully packaged including any accessories received to ensure no damage occurs during transit.</li>
                                </ul>
                                <p><strong>Please send the device to the following address:</strong>
                                </p><p>Cell Crazy Ltd<br> 407 Montrose Avenue<br> Slough<br> Berkshire<br> SL1 4TJ<br> United Kindgom</p>
                                <p>Once received your exchange or refund will be processed within 5 working days.</p>
                                <p>If you have any questions about our 14 day returns or exchange process then please give us a call on 01753 696 664 or email info@cellcrazy.co.uk.</p>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- Returns & Refund policy-->

@endsection

@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
