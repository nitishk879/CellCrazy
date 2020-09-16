@extends('adminlte::page')

@section('title', $title ?? 'Edit User')

@section('content_header')
    <h1>{{ $title ?? 'Edit User' }}</h1>
@stop

@section('content')
    <p>Hey {{ Auth::user()->name }}</p>
    <form class="" action="{{ route('admin.users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="userName">Name</label>
                <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" id="userName" placeholder="Enter Full Name" value="{{  $user->name ?? old('name') ?? '' }}">
            </div>
            <div class="form-group">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="userEmail">Email</label>
                <input type="text" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="userEmail" placeholder="Enter Email Address" value="{{ $user->email ?? old('email') ?? '' }}">
            </div>
            <div class="form-group">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="userPhone">Phone</label>
                <input type="text" name="phone" class="form-control form-control-sm @error('phone') is-invalid @enderror" id="userPhone" placeholder="Enter Phone" value="{{ $user->phone ??  old('phone') ?? '' }}">
            </div>
            <div class="form-group">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
    </form>
    <table class="table table-striped" id="nameTable">
        <tbody>
        <tr>
            <td>{{ $user->name ?? ''}}</td>
            <td>{{ $user->email ?? ''}}</td>
            <td>{{ $user->phone ?? ''}}</td>
        </tr>
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
