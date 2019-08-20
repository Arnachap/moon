@component('mail::message')
<h1>Bonjour {{ $data['username'] }}</h1>
<p>
    Votre commande Moon vient d'être validé. Elle est en cours de préparation, et vous sera envoyée dans les meilleurs délais.
    <br>Un email vous sera envoyé dès l'envoi de votre commande.
</p>

<p>En attendant, vous pouvez suivre l'avancée votre commande sur votre compte Moon, ou sur le lien ci-dessous !</p>
<p><a href="https://moon-noeudpap.fr/order/{{ $data['order_id'] }}">Suivre votre commande</a></p>
<br>
<p>Cordialement,
    <br>l'équipe Moon.
</p>
@endcomponent
