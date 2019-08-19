@component('mail::message')

<strong>Nom :</strong> {{ $data['name'] }} <br>
<strong>Email :</strong> {{ $data['email'] }} <br>
<strong>Sujet du message :</strong> {{ $data['subject'] }} <br>

<strong>Message :</strong>

{{ $data['message'] }}

@endcomponent
