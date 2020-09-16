@extends('adminlte::page')

@section('title', $title ?? 'Notifications')

@section('content_header')
    <h1>{{ $title ?? 'Notifications' }}</h1>
@stop

@section('content')
    <p>Hey {{ Auth::user()->name }} You've {{ $total_notifications ?? '' }} notifications!</p>
    @isset($notifications)
        @foreach($notifications as $notification){{ $notification->type }}@endforeach
    @endisset
@stop
@section('right-sidebar')
{{-- Section   --}}
@stop
@section('css')
{{-- Section   --}}
@stop
@section('js')
{{-- Section   --}}
@stop
@section('plugins.Sweetalert2', true)

