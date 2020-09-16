@extends('adminlte::page')

@section('title', $title ?? 'Notifications')

@section('content_header')
    <h1>{{ $title ?? 'Notifications' }}</h1>
@stop

@section('content')
    <h4>{{ $role->title }} has following permission!</h4>
    <table class="table table-striped" id="nameTable">
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->title }}</td>
                <td>{{ $permission->name }}</td>
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
