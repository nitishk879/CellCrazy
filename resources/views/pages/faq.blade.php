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
            <div class="row">
                <div class="col-lg-6 col-12 mb-50">
                    <div class="about-content">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            What Shipping Methods are Available?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Terms know how to pursue pleasure rationally encounter once that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            What Payment Methods are Available?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Terms know how to pursue pleasure rationally encounter cnces that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            How I Return back my product?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Terms know how to pursue pleasure rationally encounter cnces that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            What policy do you have for product sell?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Terms know how to pursue pleasure rationally encounter cnces that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-50">
                    <div class="about-area">
                        <div class="accordion" id="accordionRightSide">
                            <div class="card">
                                <div class="card-header" id="headingEleven">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                                            What is the payment security system?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseEleven" class="collapse show" aria-labelledby="headingEleven" data-parent="#accordionRightSide">
                                    <div class="card-body">
                                        <p>Terms know how to pursue pleasure rationally encounter cnces that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTweleve">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTweleve" aria-expanded="false" aria-controls="collapseTweleve">
                                            How can I track my order?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTweleve" class="collapse" aria-labelledby="headingTweleve" data-parent="#accordionRightSide">
                                    <div class="card-body">
                                        <p>Terms know how to pursue pleasure rationally encounter cnces that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThirteen">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                            Do I need creat account for buy products?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionRightSide">
                                    <div class="card-body">
                                        <p>Terms know how to pursue pleasure rationally encounter once that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFourteen">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                            How can I get discount coupon?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordionRightSide">
                                    <div class="card-body">
                                        <p>Terms know how to pursue pleasure rationally encounter once that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because.</p>
                                    </div>
                                </div>
                            </div>
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
