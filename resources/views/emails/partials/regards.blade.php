Thanks,<br>
@if(__setting('site_title'))
{{ __setting('site_title') }}
@else
{{ config('app.name') }}
@endif