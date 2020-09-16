@extends('adminlte::page')

@section('title', $title ?? 'Type')

@section('content_header')
    <h1>{{ $title ?? 'Type' }}</h1>
@stop

@section('content')
    <table id="typeTable" class="table table-striped" >
        <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
        </tr>
        </thead>
        <tbody>
        @foreach($type->items as $item)
            <tr>
                <td><img src="{{ asset("storage/products/{$item->image}") }}" alt="{{ $item->name }}" class="img-fluid" width="42px"> {{ $item->name }}</td>
                <td>{{ $item->category->name ?? '' }}</td>
                <td>{{ $item->brand->name ?? '' }}</td>
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
            $('#typeTable').DataTable({
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
