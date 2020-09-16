@extends('adminlte::page')

@section('title', $title ?? 'Categories')

@section('content_header')
    <h1>{{ $title ?? 'Categories' }}</h1>
@stop

@section('content')
    <table class="table table-striped" id="categoryTable">
        <thead>
        <tr>
            <th>Name</th>
            <th>Types</th>
            <th>Settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->types_count }}</td>
                <td class="btn-group btn-group-sm">
                    @can("view-category")
                        <a href="{{ route("admin.categories.show", $category->id) }}" class="btn btn-outline-success btn-sm">View</a>
                    @endcan
                    @can("edit-category")
                        <a href="{{ route("admin.categories.edit", $category->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                    @endcan
                    @can("delete-category")
                        <span id="cancategory" class="btn btn-outline-danger btn-sm">Delete</span>
                    @endcan
{{--                    @can('edit-category')--}}
{{--                        <a href="{{ route("admin.add-category", $category->id) }}" class="btn btn-outline-secondary btn-sm">Assign Categories</a>--}}
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
