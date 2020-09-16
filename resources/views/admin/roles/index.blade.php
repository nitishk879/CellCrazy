@extends('adminlte::page')

@section('title', $title ?? 'Roles')

@section('content_header')
    <h1>{{ $title ?? 'Roles' }}</h1>
@stop

@section('content')
    <p>Hey {{ Auth::user()->name }}</p>
    <table class="table table-striped" id="nameTable">
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->title }}</td>
                <td>{{ $role->name }}</td>
                <td class="btn-group btn-group-sm">
                    @can('view-role')
                        <a href="{{ route("admin.roles.show", $role->id) }}" class="btn btn-outline-success btn-sm">View</a>
                    @endcan
                    @can('edit-role')
                        <a href="{{ route("admin.roles.edit", $role->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                    @endcan
                    @can('delete-role')
                        <span id="canRole" class="btn btn-outline-danger btn-sm">Delete</span>
                    @endcan
                    @can('edit-permission')
                        <a href="{{ route("admin.add-permission", $role->id) }}" class="btn btn-outline-secondary btn-sm">Assign Permissions</a>
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
