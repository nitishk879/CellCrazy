@extends('adminlte::page')

@section('title', $title ?? 'Permissions')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ $title ?? 'Permissions' }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{ $title ?? 'Permissions' }}</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <p>Hey {{ Auth::user()->name }}</p>
    <table class="table table-striped" id="nameTable">
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->title }}</td>
                <td>{{ $permission->name }}</td>
                <td class="btn-group btn-group-sm">
                    @can('view-permission')
                        <span id="canRole" class="btn btn-outline-success btn-sm">View</span>
                    @endcan
                    @can('edit-permission')
                        <span id="canRole" class="btn btn-outline-info btn-sm">Edit</span>
                    @endcan
                    @can('delete-permission')
                        <span id="canRole" class="btn btn-outline-danger btn-sm">Delete</span>
                    @endcan
                </td>
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
