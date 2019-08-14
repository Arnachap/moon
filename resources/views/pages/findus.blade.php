@extends('layouts.app')

@section('title')
    Où nous trouver ?
@endsection

@section('content')
    <div id="map" style="height: 100vh; width: 100%;"></div>

    <script>
        function initMap() {
            
            var nancy = {lat: 48.692598, lng: 6.187003};
            
            var map = new google.maps.Map(
                document.getElementById('map'),
                {zoom: 9, center: nancy}
            );

            // Le Repère
            var leRepere = {lat: 48.690784, lng: 6.180264};

            var leRepereInfos = new google.maps.InfoWindow({
                content : '<h3 class="text-center">Le Repère</h3>' + 
                '<p class="text-center">27 Rue de la Visitation,<br>54000 Nancy</p>' +
                '<a href="https://goo.gl/maps/4doUzt2tcpy2m9cE8" target="_blank" class="text-center text-info">Voir dans Google Maps</a>'
            });
            
            var leRepereMarker = new google.maps.Marker({position: leRepere, map: map});
            leRepereMarker.addListener('click', function() {
                leRepereInfos.open(map, leRepereMarker);
            });

            // Pépites
            var pepites = {lat: 48.174046, lng: 6.446367};

            var pepitesInfos = new google.maps.InfoWindow({
                content : '<h3 class="text-center">Pépites</h3>' + 
                '<p class="text-center">12 Quai du Musée,<br>88000 Épinal</p>' +
                '<a href="https://goo.gl/maps/hWPZgvGhtvGLGbc48" target="_blank" class="text-center text-info">Voir dans Google Maps</a>'
            });

            var pepitesMarker = new google.maps.Marker({position: pepites, map: map});
            pepitesMarker.addListener('click', function() {
                pepitesInfos.open(map, pepitesMarker);
            });

            // Dot Store
            var dotStore = {lat: 48.581185, lng: 7.747399};

            var dotStoreInfos = new google.maps.InfoWindow({
                content : '<h3 class="text-center">Dot Store</h3>' + 
                '<p class="text-center">1 Rue du Miroir,<br>67000 Strasbourg</p>' +
                '<a href="https://goo.gl/maps/vJbeDwm3ohy9evmt5" target="_blank" class="text-center text-info">Voir dans Google Maps</a>'
            });

            var dotStoreMarker = new google.maps.Marker({position: dotStore, map: map});
            dotStoreMarker.addListener('click', function() {
                dotStoreInfos.open(map, dotStoreMarker);
            });

            // La Fabrique Textile
            var laFabriqueTextile = {lat: 48.675106, lng: 5.890725};

            var laFabriqueTextileInfos = new google.maps.InfoWindow({
                content : '<h3 class="text-center">La Fabrique Textile</h3>' + 
                '<p class="text-center">12 Rue Lafayette,<br>54200 Toul</p>' +
                '<a href="https://g.page/lafabriquetextiletoul?shares" target="_blank" class="text-center text-info">Voir dans Google Maps</a>'
            });

            var laFabriqueTextileMarker = new google.maps.Marker({position: laFabriqueTextile, map: map});
            laFabriqueTextileMarker.addListener('click', function() {
                laFabriqueTextileInfos.open(map, laFabriqueTextileMarker);
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap"></script>
@endsection