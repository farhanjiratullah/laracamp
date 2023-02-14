@component('mail::message')
    # Welcome!

    Hi, {{ $user->name }}

    <br>

    Welcome to {{ config('app.name') }}, your account has been created successfully. Now you can choose your best match
    camp!

    @component('mail::button', ['url' => route('welcome')])
        Go to {{ config('app.name') }}
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
