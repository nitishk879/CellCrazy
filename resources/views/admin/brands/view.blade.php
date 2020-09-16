@extends('adminlte::page')

@section('title', $title ?? 'Brand')

@section('content_header')
    <h1>{{ $title ?? 'Brand' }}</h1>
@stop

@section('content')
    <h4>{{ $brand->name }} has following products!</h4>
    <table id="brandTable" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Categories</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach($brand->items as $item)
            <tr>
                <td><img src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" class="img-fluid" width="42px"> {{ $item->name }}</td>
                <td>@foreach($item->categories as $category)<span class="badge badge-info">{{ $category->name ?? '-' }}</span>@endforeach </td>
                <td>{{ $item->type->name ?? '' }}</td>
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
        $(function () {
            $('#brandTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@stop
@section('plugins.DataTables', true)
