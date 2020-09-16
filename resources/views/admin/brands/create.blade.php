@extends('adminlte::page')

@section('title', $title ?? 'Brand')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $title ?? 'Brand' }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{ $title ?? 'Brand' }}</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <p>Hey {{ Auth::user()->name }}</p>
    <form class="" action="{{ route('admin.brands.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="titlePermission">{{ __("Brand Name") }}</label>
                <input type="text" name="title" class="form-control form-control-sm @error('title') is-invalid @enderror" id="titlePermission" placeholder="Enter Title" value="{{ old('title') ?? '' }}">
            </div>
            <div class="form-group">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" id="customFile">
                    <label class="custom-file-label" for="customFile">{{ old('image') ?? 'Upload package Image' }}</label>
                </div>
                @error('image')
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
@section('js')

@stop
@section('plugins.Sweetalert2', true)
