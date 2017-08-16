@component('mail::message')
# Account Activation

Dear {{$user->name}},

Please click the link below to activate your account.

@component('mail::button', ['url' =>
    route('auth.activate', [
        'token' => $user->activation_token,
        'email' => $user->email
    ])])
Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
