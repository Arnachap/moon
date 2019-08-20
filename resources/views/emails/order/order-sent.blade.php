@component('mail::message')
<h1>Bonjour {{ $data['username'] }} !</h1>
<p>Votre commande Moon n°<a href="https://moon-noeudpap.fr/order/{{ $data['order_id'] }}">{{ $data['order_id'] }}</a> vient d'être envoyée. Elle vous sera livrée dans les meilleurs délais.</p>

<p>En attendant, vous pouvez suivre le suivi de la livraison sur le lien ci-dessous !</p>
<p><a href="https://www.laposte.fr/outils/suivre-vos-envois?code={{ $data['tracking_number'] }}">Suivre votre commande</a></p>
<br>
<p>Cordialement,
    <br>l'équipe Moon.
</p>
@endcomponent
