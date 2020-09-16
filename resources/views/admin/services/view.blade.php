@extends('adminlte::page')

@section('title', $title ?? 'Service')

@section('content_header')
    <h1>{{ $title ?? 'Service' }}</h1>
@stop

@section('content')
    <h4>{{ $service->name }} has following categories</h4>
    <table class="table table-striped" id="serviceCategoryTable">
        <tbody>
        @foreach($service->categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>@foreach($category->types as $type) <span class="badge badge-success p-2">{{ $type->name }}</span> @endforeach</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h4>{{ $service->name }} has following Brands</h4>
    <table class="table table-striped" id="serviceBrandTable">
        <tbody>
        @foreach($service->brands as $brand)
            <tr>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->slug }}</td>
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

@stop
@section('plugins.Sweetalert2', true)
