@extends('adminlte::page')

@section('title', $title ?? 'Users')

@section('content_header')
    <h1>{{ $title ?? 'Users' }}</h1>
@stop

@section('content')
    <p>Hey {{ Auth::user()->name }}</p>
    <table class="table table-striped" id="userTable">
        <tbody>
        @foreach($users as $user)
            <tr id="user{{$user->id}}">
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>@foreach($user->roles as $role) <span class="btn btn-outline-info">{{ $role->title }}</span> @endforeach</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td class="btn-group">
                    @can('view-user')
                        <a href="{{ route("admin.users.show", $user->id) }}" class="btn btn-outline-success btn-sm">View</a>
                    @endcan
                    @can('edit-user')
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                    @endcan
                    @can('delete-user')
                        <span id="deleteUser" data-id="{{ $user->id }}" class="btn btn-outline-danger btn-sm">Delete</span>
                    @endcan
                    @can('assign-role')
                        <a href="{{ route("admin.add-role", $user->id) }}" class="btn btn-outline-secondary btn-sm">Assign Role</a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
{{--@section('right-sidebar')@stop--}}
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
