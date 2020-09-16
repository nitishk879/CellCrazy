@extends('adminlte::page')

@section('title', $title ?? 'Assign Role')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $title ?? 'Assign Role' }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{ $title ?? 'Assign Role' }}</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <p>Hey {{ Auth::user()->name }}</p>
    <h4>Assign Role to {{ $user->name }}</h4>
    <p>Please check Role you want to assing or uncheck Role you want to remove from.</p>
    <form class="" action="{{ route('admin.assign-role', $user->id) }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                @foreach($roles as $role)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="role[]" value="{{ $role->id }}" class="custom-control-input @error('role') is-invalid @enderror" id="{{ $role->name }}">
                        <label class="custom-control-label" for="{{ $role->name }}">{{ $role->title }}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                @error('title')
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
    <script>
        $('span#deleteUser').on('click', function (e) {
            var id = $(this).attr('data-id');
            var tr = $(this).closest("tr");
            var url = $(this).attr("action");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'delete',
                url:"/admin/users/"+id,
                success:function (data) {
                    tr.find('td').fadeOut(500, function () {
                        tr.remove();
                    });
                    Swal.fire({
                        title: 'Success!',
                        text: data,
                        icon: 'success',
                        confirmButtonText: 'Close'
                    })
                }
            });
        })
    </script>
@stop
@section('plugins.Sweetalert2', true)
