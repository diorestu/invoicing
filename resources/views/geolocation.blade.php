<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moving Marker Geolocation</title>
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script>
        // Function to initialize the map and marker
        function initMap() {
            // Initial map options
            var mapOptions = {
                center: {
                    lat: 0,
                    lng: 0
                }, // Initial center, you can set this to the user's current location
                zoom: 15 // Adjust the zoom level as needed
            };

            // Create a new map
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            // Create a marker with an initial position
            var marker = new google.maps.Marker({
                position: {
                    lat: 0,
                    lng: 0
                },
                map: map,
                title: 'Moving Marker'
            });

            // Update marker position based on geolocation
            function updateMarkerPosition(position) {
                var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                marker.setPosition(latLng);
                map.setCenter(latLng);
            }

            // Handle geolocation errors
            function handleGeolocationError(error) {
                console.error('Error getting geolocation:', error.message);
            }

            // Get the user's current location periodically
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(updateMarkerPosition, handleGeolocationError, {
                    enableHighAccuracy: true,
                    maximumAge: 30000, // 30 seconds
                    timeout: 27000 // 27 seconds
                });
            } else {
                console.error('Geolocation is not supported by this browser.');
            }
        }
    </script>

    <!-- Include the Google Maps JavaScript API with your API key -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn3JGAbQ9x5_umeWpD9wd3vAxaGK6kv5U&callback=initMap"></script>
</body>

</html>
