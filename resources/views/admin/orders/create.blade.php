@extends('adminlte::page')

@section('title', $title ?? 'Create Service')

@section('content_header')
    <h1>{{ $title ?? 'Create Service' }}</h1>
@stop

@section('content')
    <form class="" action="{{ route('admin.services.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="ServiceName">Service Name</label>
                <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" id="ServiceName" placeholder="Enter Service Name" value="{{  $role->name ?? old('name') ?? '' }}">
            </div>
            <div class="form-group">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
    </form>
@stop
@section('right-sidebar')
    <span class="badge-info badge">{{ Auth::user()->id }}</span>
@stop
@section('css')
    {{--    <link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop
@section('js')@stop
@section('plugins.Sweetalert2', true)
