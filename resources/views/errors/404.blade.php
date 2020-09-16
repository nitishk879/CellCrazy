@extends('layouts.app')

@section('title', '404 | Error')

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
    <!-- checkout area start -->
    <div class="checkout-area mt-60px mb-40px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $title ?? ' 404 | Error' }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout area end -->
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
@endsection

@section('scripts')@endsection

@section('subscriber-section')@endsection
