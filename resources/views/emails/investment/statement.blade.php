@component('mail::message')
# Your Cytonn Investment Statement

Dear client, please find the statement attached.

@component('mail::button', ['url' => route('home')])
View in App
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
