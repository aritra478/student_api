@component('mail::message')
# Hello {{ $user->name }}

Your application has been submitted successfully.

**Acknowledgement No:** {{ $user->acknowledgement_no }}

Please find the attached PDF copy of your application.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
