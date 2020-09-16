@extends('adminlte::page')

@section('title', $title ?? 'Notifications')

@section('content_header')
    <h1>{{ $title ?? 'Notifications' }}</h1>
@stop

@section('content')
    <p>Hey {{ Auth::user()->name }}</p>
    @isset($notification)
        <ul class="list-group">
            {{ $id }}{{ $notification }}
        </ul>
    @endif
@stop
{{--@section('right-sidebar')@stop--}}
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
