@extends('adminlte::page')

@section('title', $title ?? 'User')

@section('content_header')
    <h1>{{ $title ?? 'User' }}</h1>
@stop

@section('content')
    <div class="media">
        <img src="{{ $user->adminlte_image() }}" class="align-self-center rounded mr-3" alt="{{ $user->name }}" width="52">
        <div class="media-body">
            <h5 class="mt-0">{{ $user->name }}</h5>
            <p>{{ $user->name }} has joined {{ $user->created_at->diffForHumans() }} with {{ $user->email }} address.</p>
        </div>
    </div>
    <h4>{{ $user->title }} has following Roles!</h4>
    <table class="table table-striped" id="nameTable">
        <tbody>
        @foreach($user->roles as $role)
            <tr>
                <td>{{ $role->title }}</td>
                <td>{{ $role->name }}</td>
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
