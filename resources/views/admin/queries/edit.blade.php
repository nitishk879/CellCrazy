@extends('adminlte::page')

@section('title', $title ?? 'Edit Order')

@section('content_header')
    <h1>{{ $title ?? 'Edit Order' }}</h1>
@stop

@section('content')
    <form class="" action="{{ route('admin.orders.update', $order->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-row">
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="orderPrice">Order Price</label>
                    <input type="text" name="order_price" disabled class="form-control form-control-sm @error('order_price') is-invalid @enderror" id="orderPrice" placeholder="559" value="{{  $order->order_price ?? old('order_price') ?? '' }}">
                    <div class="form-group">
                        @error('order_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="orderType">Order Type</label>
                    <input type="text" name="order_type" disabled class="form-control form-control-sm @error('order_type') is-invalid @enderror" id="orderType" placeholder="buy/sell" value="{{  $order->order_type ?? old('order_type') ?? '' }}">
                    <div class="form-group">
                        @error('order_type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="productId">Product Name</label>
                    <input type="text" name="product_id" disabled class="form-control form-control-sm @error('product_id') is-invalid @enderror" id="productId" placeholder="{{ __('123') }}" value="{{  $order->item->name ?? old('product_id') ?? '' }}">
                    <input type="hidden" name="product_id" disabled class="form-control form-control-sm @error('product_id') is-invalid @enderror" id="productId" placeholder="{{ __('123') }}" value="{{  $order->product_id ?? old('product_id') ?? '' }}">
                    <div class="form-group">
                        @error('product_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="productQt">Product Quantity</label>
                    <input type="text" name="product_quantity" disabled class="form-control form-control-sm @error('product_quantity') is-invalid @enderror" id="productQt" placeholder="{{ __('1') }}" value="{{  $order->product_quantity ?? old('product_quantity') ?? '' }}">
                    <div class="form-group">
                        @error('product_quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="productPrice">Product Price in({{ config('app.default_currency') }})</label>
                    <input type="text" name="product_price" disabled class="form-control form-control-sm @error('product_price') is-invalid @enderror" id="productPrice" placeholder="{{ __('449') }}" value="{{  $order->product_price ?? old('product_price') ?? '' }}">
                    <div class="form-group">
                        @error('product_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <label for="orderName">Order Status</label>
                    <select name="order_status" class="form-control form-control-sm @error('order_status') is-invalid @enderror" id="orderName">
                        <option value="">--Select--</option>
                        <option @if($order->order_status=="process") selected @endif value="process">{{  __("Processing") }}</option>
                        <option @if($order->order_status=="complete") selected @endif value="complete">{{  __("Completed") }}</option>
                        <option @if($order->order_status=="cancelled") selected @endif value="cancelled">{{  __("Cancelled") }}</option>
                        <option @if($order->order_status=="pending") selected @endif value="pending">{{  __("Pending") }}</option>
                    </select>
                    <div class="form-group">
                        @error('order_status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
    </form>
@stop
@section('right-sidebar')
    <span class="badge-info badge">{{ Auth::user()->id }}</span>
@stop
@section('css')
    {{--    <link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop
@section('js')
    <script>
        $('span#deleteUser').on('click', function (e) {
            var id = $(this).attr('data-id');
            var tr = $(this).closest("tr");
            var url = $(this).attr("action");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'delete',
                url:"/admin/users/"+id,
                success:function (data) {
                    tr.find('td').fadeOut(500, function () {
                        tr.remove();
                    });
                    Swal.fire({
                        title: 'Success!',
                        text: data,
                        icon: 'success',
                        confirmButtonText: 'Close'
                    })
                }
            });
        })
    </script>
@stop
@section('plugins.Sweetalert2', true)
