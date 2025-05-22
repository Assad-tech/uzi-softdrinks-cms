<!DOCTYPE html>
<html>

<head>
    <title>OSM with Leaflet</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialize map
        var map = L.map('map').setView([13.8, -112.9], 5); // center and zoom level

        // Load OSM tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Add multiple markers
        var markers = [{
                lat: 42.3770,
                lon: -71.1167,
                popup: "Harvard University"
            },
            {
                lat: 10.0,
                lon: -100.0,
                popup: "Marker 2"
            },
            {
                lat: 20.0,
                lon: -120.0,
                popup: "Marker 3"
            }
        ];

        markers.forEach(function(m) {
            L.marker([m.lat, m.lon]).addTo(map)
                .bindPopup(m.popup);
        });
    </script>

</body>

</html>
