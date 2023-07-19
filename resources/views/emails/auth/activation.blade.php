@component('mail::message')
# Activation Email

Berikut Kode Verifikasi anda .

{{ $user->token_activation}}
{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}



Thanks,<br>
Vihara Damai Sejahtera Kwan Im
@endcomponent
