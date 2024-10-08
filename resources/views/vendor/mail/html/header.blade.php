@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if(__setting('email_header_logo'))
<img src="{{ asset(__setting('email_header_logo')) }}" class="logo" alt="{{ config('app.name') }}">
@elseif (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
