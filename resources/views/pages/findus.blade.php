@extends('layouts.app')

@section('title')
    Où nous trouver ?
@endsection

@section('content')
    <div id="map" style="height: 100vh; width: 100%;"></div>

    <script>
        function initMap() {
            
            var nancy = {lat: 48.692598, lng: 6.187003};

            var leRepere = {lat: 48.690915, lng: 6.180229}
            var leRepereInfos = new google.maps.InfoWindow({
                content : '<h3 class="text-center">Le Repère</h3>' + 
                '<p class="text-center">27 Rue de la Visitation,<br>54000 Nancy</p>' +
                '<a href="https://www.google.fr/maps/place/LE+REP%C3%88RE/@48.6907767,6.1780616,17z/data=!3m1!4b1!4m5!3m4!1s0x4794986d8bb9e4cd:0xf40ac42ff6376fd3!8m2!3d48.6907732!4d6.1802503" target="_blank" class="text-center text-info">Voir dans Google Maps</a>'
            });
            
            var map = new google.maps.Map(
                document.getElementById('map'),
                {zoom: 8, center: nancy}
            );
            
            var leRepereMarker = new google.maps.Marker({position: leRepere, map: map});
            leRepereMarker.addListener('click', function() {
                leRepereInfos.open(map, leRepereMarker);
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap"></script>
@endsection