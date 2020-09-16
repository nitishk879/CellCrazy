@extends('adminlte::page')

@section('title', $title ?? 'Category')

@section('content_header')
    <h1>{{ $title ?? 'Category' }}</h1>
@stop

@section('content')
    <form class="" action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="CategoryTitle">Category Title</span>
                        </div>
                        <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" id="CategoryName" placeholder="Enter Full Name" value="{{  old('name') ?? '' }}">
                    </div>
                    <div class="form-group">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="serviceCategory">Service</label>
                            </div>
                            <select class="custom-select @error('service') is-invalid @enderror" name="service" id="serviceCategory">
                                <option value="0">Choose...</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        @error('service')
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
