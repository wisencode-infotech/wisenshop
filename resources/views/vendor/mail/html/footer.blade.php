<tr>
<td>
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell" align="center">
@if(__setting('email_footer_content'))
{{ Illuminate\Mail\Markdown::parse(__setting('email_footer_content')) }}
@else
{{ Illuminate\Mail\Markdown::parse($slot) }}
@endif
</td>
</tr>
</table>
</td>
</tr>
