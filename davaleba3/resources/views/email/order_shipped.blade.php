@component('mail::message')
# Introduction

The body of your message.

title - {{$data['postTitle']}}  - approved


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
