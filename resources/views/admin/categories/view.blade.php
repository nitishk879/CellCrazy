@extends('adminlte::page')

@section('title', $title ?? 'Category')

@section('content_header')
    <h1>{{ $title ?? 'Category' }}</h1>
@stop

@section('content')
    <table class="table table-striped" id="nameTable">
        <thead class="">
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Items</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category->types as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>{{ $type->slug }}</td>
                <td>{{ $type->items->count() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
@section('right-sidebar')
    {{--  Somthing on the right sidebar  --}}
@stop
@section('css')
    {{--    <link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop
@section('js')

@stop
@section('plugins.Sweetalert2', true)
