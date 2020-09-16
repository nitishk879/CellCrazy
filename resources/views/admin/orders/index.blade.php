@extends('adminlte::page')

@section('title', $title ?? 'Orders')

@section('content_header')
    <h1>{{ $title ?? 'Orders' }}</h1>
@stop

@section('content')
    <table class="table table-striped" id="orderTable">
        <thead>
        <tr>
            <th>Name</th>
            <th>Product</th>
            <th>Status</th>
            <th>Service</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Updated</th>
            <th>Settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr class="@if($order->order_type=='buy') bg-dark @endif">
                <td>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                <td>{{ $order->item->name }}</td>
                <td><span class="badge @if($order->order_status=='in-process') badge-success @else badge-warning @endif">{{ $order->order_status }}</span></td>
                <td class="text-capitalize">{{ $order->order_type }}</td>
                <td>{{ $order->product_quantity }}</td>
                <td>{{ config('app.default_currency') }}{{ $order->total_price }}</td>
                <td>{{ $order->updated_at->diffForHumans() }}</td>
                <td class="btn-group btn-group-sm">
                    @can("view-order")
                        <a href="{{ route("admin.orders.show", $order->id) }}" class="btn btn-outline-success btn-sm">View</a>
                    @endcan
                    @can("edit-order")
                        <a href="{{ route("admin.orders.edit", $order->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                    @endcan
                    @can("delete-order")
                        <span id="canorder" class="btn btn-outline-danger btn-sm">Delete</span>
                    @endcan
{{--                    @can('edit-category')--}}
{{--                        <a href="{{ route("admin.add-category", $order->id) }}" class="btn btn-outline-secondary btn-sm">Assign Categories</a>--}}
{{--                    @endcan--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
