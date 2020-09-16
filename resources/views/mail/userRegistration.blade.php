@component('mail::message')
# New Registration details

<strong>User Name</strong>: {{ $user->name ?? '' }}<br>
<strong>Email Address</strong>: {{ $user->email ?? '' }}<br>
<strong>Phone Number</strong>: {{ $user->phone ?? '' }}<br>

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
