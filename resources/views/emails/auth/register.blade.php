@component('mail::message')
# {{ __('register.hello') }}!

{{ __('register.enter_the_code') }}:

@component('mail::panel')
{{ $code }}
@endcomponent

Regards,<br>
JobPilot
@endcomponent
