@component('mail::message')
# Introduction
You have a new message from {{ $name }}

Message:
{{ $message }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
