@component('mail::message')
# {{ __('login.hello') }}!

{{ __('login.enter_the_code') }}:

@component('mail::panel')
{{$code}}
@endcomponent

Regards,<br>
JobPilot
@endcomponent
