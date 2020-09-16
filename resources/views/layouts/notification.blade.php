@if(Session::has('success'))
    <x-alert type="success" message="{{ $message ?? Session::get('message') }}" title="something" class="mt-4"/>
@endif
@if(Session::has('warning'))
    <x-alert type="warning" message="{{ $message ?? Session::get('message') }}" title="Are you sure" class="mt-4"/>
@endif
@if((Session::has('error')) || (Session::has('danger')))
    <x-alert type="danger" message="{{ $message ?? Session::get('error') }}" title="Sorry" class="mt-4"/>
@endif
