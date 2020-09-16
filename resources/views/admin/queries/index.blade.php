@extends('adminlte::page')

@section('title', $title ?? 'queries')

@section('content_header')
    <h1>{{ $title ?? 'queries' }}</h1>
@stop

@section('content')
    <table class="table table-striped" id="queryTable">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Model</th>
            <th>Detail</th>
            <th>Status</th>
            <th>Updated</th>
            <th>Settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach($queries as $query)
            <tr>
                <td>{{ $query->name }}</td>
                <td>{{ $query->email ?? '' }}</td>
                <td>{{ $query->phone ?? '' }}</td>
                <td>{{ $query->model_number ?? '' }}</td>
                <td>{{ \Illuminate\Support\Str::limit($query->message, 12) ?? '' }}</td>
                <td class="text-capitalize text-success">{{ \Illuminate\Support\Str::title($query->status) ?? '' }}</td>
                <td>{{ $query->updated_at->diffForHumans() }}</td>
                <td class="btn-group btn-group-sm">
                    @can("view-query")
                        <a href="{{ route("admin.queries.show", $query->id) }}" class="btn btn-outline-success btn-sm">View</a>
                    @endcan
                    @can("edit-query")
                        <a href="{{ route("admin.queries.edit", $query->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                    @endcan
                    @can("delete-query")
                        <span id="canquery" class="btn btn-outline-danger btn-sm">Delete</span>
                    @endcan
{{--                    @can('edit-category')--}}
{{--                        <a href="{{ route("admin.add-category", $query->id) }}" class="btn btn-outline-secondary btn-sm">Assign Categories</a>--}}
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
                url:"/admin/query/"+id,
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
