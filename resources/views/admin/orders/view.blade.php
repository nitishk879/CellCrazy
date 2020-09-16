@extends('adminlte::page')

@section('title', $title ?? 'order')

@section('content_header')
    <h1>{{ $title ?? 'order' }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __("Customer Detail") }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Name</b>: {{ $order->customer->first_name }} {{ $order->customer->last_name }}</li>
                    <li class="list-group-item"><b>Email</b>: {{ $order->customer->email }}</li>
                    <li class="list-group-item"><b>Phone</b>: {{ $order->customer->phone }}</li>
                    <li class="list-group-item">
                        <ul>
                            <li class="list-group-item list-group-item-dark"><b>Address</b>: {{ $order->customer->address_line_1 }} {{ $order->customer->address_line_2 ?? '' }}</li>
                            <li class="list-group-item list-group-item-dark"><b>City</b>: {{ $order->customer->city ?? '' }}</li>
                            <li class="list-group-item list-group-item-dark"><b>County</b>: {{ $order->customer->county ?? '' }}</li>
                            <li class="list-group-item list-group-item-dark"><b>Country</b>: {{ $order->customer->country ?? '' }}</li>
                            <li class="list-group-item list-group-item-dark"><b>Postal Code</b>: {{ $order->customer->postal_code ?? '' }}</li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <b>Payment Method</b>: <b class="text-capitalize text-success">{{ \Illuminate\Support\Str::title($order->customer->payment_method) ?? '' }}</b>
                    </li>
                    <li class="list-group-item">
                        <ul>
                            <li class="list-group-item list-group-item-dark"><b>Account Holder Name</b>: {{ $order->customer->account_holder_name ?? '' }}</li>
                            <li class="list-group-item list-group-item-dark"><b>Account Number</b>: {{ $order->customer->account_number ?? '' }}</li>
                            <li class="list-group-item list-group-item-dark"><b>Account Short Code</b>: {{ $order->customer->account_short_code ?? '' }}</li>
                        </ul>
                    </li>
                    <li class="list-group-item"><b>IMEI Number</b>: {{ $order->customer->imei ?? '' }}</li>
                    <li class="list-group-item"><b>Message</b>: {{ $order->customer->message ?? '' }}</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __("Product Details") }}</h5>
                    <p class="card-text">{!! $order->item->short_desc ?? '' !!}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span><b>Name</b>: {{ $order->item->name }}</span>
                        <span class="badge badge-dark font-weight-bolder">{{ $order->order_status ?? '' }}</span>
                    </li>
                    <li class="list-group-item"><b>Price</b>: {{ config('app.default_currency') }}{{ $order->order_price }}</li>
                    <li class="list-group-item text-capitalize"><b>Order Service</b>: <span class="@if($order->order_type=="buy") text-success @else text-danger @endif">{{ $order->order_type }}</span></li>
                    <li class="list-group-item">
                        @foreach(json_decode($order->order_details) as $product)
                            <ul>
                                <p>Order Details</p>
                                <li class="list-group-item list-group-item-dark"><b>Name</b>: {{ $product->name ?? $product['name'] ?? '' }}</li>
                                <li class="list-group-item list-group-item-dark"><b>Memory</b>: {{ $product->model->memory ?? '' }}</li>
                                <li class="list-group-item list-group-item-dark"><b>Condition</b>: {{ $product->model->condition ?? '' }}</li>
                                @if($order->order_type=="buy")
                                    <li class="list-group-item list-group-item-dark"><b>Color</b>: {{ $product->model->color ?? 'NA' }}</li>
                                @else
                                    <li class="list-group-item list-group-item-dark"><b>Network</b>: {{ $product->model->network ?? 'NA' }}</li>
                                @endif
                            </ul>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop
@section('right-sidebar')
    <span class="badge-info badge">{{ Auth::user()->id }}</span>
@stop
@section('css')
    {{--    <link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop
@section('js')

@stop
@section('plugins.Sweetalert2', true)
