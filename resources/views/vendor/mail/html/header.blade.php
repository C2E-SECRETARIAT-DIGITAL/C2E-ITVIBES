<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'IT VIBES')
<img src="{{ url('img/itvibes_alpha.png') }}" class="logo" alt="IT VIBES Logo" width="200" height="200">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
