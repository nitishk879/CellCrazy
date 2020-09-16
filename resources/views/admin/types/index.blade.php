@extends('adminlte::page')

@section('title', $title ?? 'Types')

@section('content_header')
    <h1>{{ $title ?? 'Types' }}</h1>
@stop

@section('content')
    <table class="table table-striped" id="typeTable">
        <thead>
        <tr>
            <th>Name</th>
            <th>Items</th>
            <th>Settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>{{ $type->items_count }}</td>
                <td class="btn-group btn-group-sm">
                    @can("view-type")
                        <a href="{{ route("admin.types.show", $type->id) }}" class="btn btn-outline-success btn-sm">View</a>
                    @endcan
                    @can("edit-type")
                        <a href="{{ route("admin.types.edit", $type->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                    @endcan
                    @can("delete-type")
                        <span id="cantype" class="btn btn-outline-danger btn-sm">Delete</span>
                    @endcan
{{--                    @can('edit-category')--}}
{{--                        <a href="{{ route("admin.add-category", $type->id) }}" class="btn btn-outline-secondary btn-sm">Assign Categories</a>--}}
{{--                    @endcan--}}
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
