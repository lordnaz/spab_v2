@component('mail::message')
# Order Created!

Kindly refer below order details.

@component('mail::panel')
Order No : # {{ $details['trx_id'] }}
<br>
Trading No : # {{ $details['trading_no'] }}
<br>
Amount (MYR): # {{ $details['amount_sent'] }}
<br>
Amount (USD): # {{ $details['amount_receive'] }}
<br>
Requested By: {{ $details['requester'] }}
@endcomponent


@component('mail::button', ['url' => 'http://eastcoast.asia/', 'color' => 'success'])
Login
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent

