@extends('adminlte::page')

@section('title', $title ?? 'Items')

@section('content_header')
    <h1>{{ $title ?? 'Items' }}</h1>
@stop

@section('content')
    <table id="itemTable" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
            <th class="text-left">Name</th>
            <th>Price</th>
            <th>Sales Price</th>
            <th>Discount %</th>
            <th>Status</th>
            <th>In Stock</th>
            <th>Type</th>
            <th>Setting</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>
                    <a href="{{ route('admin.items.show', $item->id) }}">
                        <img src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" class="img-fluid" width="42px"> {{ $item->name }}
                    </a>
                </td>
                <td class="text-center">{{ $item->models[0]->price->regular ?? '-' }}</td>
                <td class="text-center">{{ $item->models[0]->price->sales ?? '-' }}</td>
                <td class="text-center">{{ $item->models[0]->price->discount ?? '-' }}</td>
                <td class="text-center publish-status" data-id="{{ $item->id }}">@if($item->published==1)<i class="fas fa-check text-success"></i>@else<i class="fas fa-window-close text-danger"></i>@endif</td>
                <td class="text-center stock-status" data-id="{{ $item->id }}">@if($item->stock==1)<i class="fas fa-check text-success"></i>@else<i class="fas fa-window-close text-danger"></i>@endif</td>
                <td>{{ $item->type['name'] ?? '' }}</td>
                <td class="btn-group btn-group-sm">
                    @can("view-item")
                        <a href="{{ route("admin.items.show", $item->id) }}" class="btn btn-outline-success btn-sm"><i class="fas fa-eye" title="View"></i></a>
                    @endcan
                    @can("edit-item")
                        <a href="{{ route("admin.items.edit", $item->id) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-edit" title="Edit"></i> </a>
                    @endcan
                    @can("delete-item")
                        <span id="canItem" class="btn btn-outline-danger btn-sm" title="Delete"><i class="fas fa-trash"></i> </span>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
@section('right-sidebar')@stop
@section('css')@stop
@section('js')
    <script>
        $(function () {
            $('#itemTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
        $(".publish-status").on("click", function (e) {
            e.preventDefault();
            var id = $(this).data("id");
            $.ajax({
                type:'get',
                url:"/admin/item/publish/"+id,
                success:function (data) {
                    if(data==="ok"){
                        Swal.fire({
                            title: 'Success!',
                            text: "Item status has been changed, you can reload your browser to view changes.",
                            icon: 'success',
                            confirmButtonText: 'Close'
                        })
                    }else{
                        Swal.fire({
                            title: 'Error!',
                            text: "Sorry! Status didn't changed for this time.",
                            icon: 'error',
                            confirmButtonText: 'Close'
                        })
                    }
                }
            });
        })
        $(".stock-status").on("click", function (e) {
            e.preventDefault();
            var id = $(this).data("id");
            $.ajax({
                type:'get',
                url:"/admin/item/stock/"+id,
                success:function (data) {
                    if(data==="ok"){
                        Swal.fire({
                            title: 'Success!',
                            text: "Item status has been changed, you can reload your browser to view changes.",
                            icon: 'success',
                            confirmButtonText: 'Close'
                        })
                    }else{
                        Swal.fire({
                            title: 'Error!',
                            text: "Sorry! Status didn't changed for this time.",
                            icon: 'error',
                            confirmButtonText: 'Close'
                        })
                    }
                }
            });
        })
    </script>
@stop
@section('plugins.Sweetalert2', true)
@section('plugins.DataTables', true)
