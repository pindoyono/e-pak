<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('material/img/kaltara.png')}}" class="logo" alt="E-pak Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
