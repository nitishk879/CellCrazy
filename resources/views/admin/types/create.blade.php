@extends('adminlte::page')

@section('title', $title ?? 'Type')

@section('content_header')
    <h1>{{ $title ?? 'Type' }}</h1>
@stop

@section('content')
    <form class="" action="{{ route('admin.types.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-row">
                <div class="col-md-12">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="TypeTitle">Type Title</span>
                        </div>
                        <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" id="TypeName" placeholder="Enter Full Name" value="{{  old('name') ?? '' }}">
                    </div>
                    <div class="form-group">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
    </form>
@stop
@section('right-sidebar')@stop
@section('css')@stop
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
