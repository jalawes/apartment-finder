@component('mail::message')
{{ config('mail.templates.apartments.found') }}
<br>
<br>
{{ config('mail.from.name') }}
<br>
{{ config('mail.from.address') }}
<br>
<br>
{{ $apartment->url }}
@endcomponent

