<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://i.ibb.co/YtHwXMT/logo-vihara.png" class="logo" alt="Laravel Logo">
<h1> YAYASAN DAMAI SEJAHTERA KWAN IM </h1>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

