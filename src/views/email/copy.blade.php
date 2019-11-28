@component('mail::message')
# Introduction

Hey {{ $name }} , you send a message to contact with codechief admin. Make sure you sent it. 

Your message was:
{{ $message }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
