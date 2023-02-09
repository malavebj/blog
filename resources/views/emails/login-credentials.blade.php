@component('mail::message')
# Your credentials to {{config('app.name')}}

Plasse, use this credentials to login in the system.

@component('mail::table')
|Username  |Password  |
|:----------|:----------|
|{{$user->email}}|{{$password}}|
@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
