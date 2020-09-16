<div class="alert alert-{{ $type ?? __('warning') }} alert-dismissible fade show" role="alert">
    <strong>{{ $title ?? __('Holy guacamole') }}!</strong> {{ $message ?? __('You should check in on some of those fields below.') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
