@extends('frontend.layouts.master')
@section('title', 'Find Uzi')
@push('custom_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endpush
@section('header')
    @include('frontend.partials.header2')
@endsection
@section('content')
    <div class="Ingredients">
        <!-- FInd Uzi banner -->
        <section class="find-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="find-content">
                            <h1>{{ $banner->site_name ?? 'find uzi' }}</h1>
                            <p>{!! $banner->banner_description ??
                                'WE BROUGHT UZI TO YOUR NEIGHBORHOOD. TRY OUR PRODUCTS TO EXPERIENCE THE NEW WAY TO BUZZ. PLEASE CONTACT YOUR RETAILER TO ENSURE PRODUCTS ARE IN STOCK. ALL PRODUCTS ARE SUBJECT TO AVAILABILITY. PLEASE CONTACT YOUR RETAILER TO ENSURE PRODUCTS ARE IN STOCK.' !!}</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section class="main-map">
            <div class="container">
                <div class="map">
                    <div class="row">
                        <div class="col-lg-8 col-sm-6 col-md-8 col-12">
                            <div class="map-content rounded-left">
                                <div id="map" class="rounded-left" style="height: 590px; width: 100%; border-radius: 30px 0 0px 30px;"></div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-sm-12 col-md-4 col-12">
                            <div class="inner-sub-content">
                                <div class="map-item-filed">
                                    <img src="{{ asset('front/assets/images/circle.png') }}" class="img-fluid"
                                        alt="">
                                    <label>
                                        <select id="productDropdown">
                                            <option value="">Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>

                                <div class="map-item-filed">
                                    <img src="{{ asset('front/assets/images/circle.png') }}" class="img-fluid"
                                        alt="">
                                    <label>
                                        <select id="locationDropdown" name="myBrowser">
                                            <option value="">Select Location</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->location }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                                <div class="map-item-wrapper" style="max-height: 400px; overflow-y: auto;">
                                    {{-- map-item-content elements will be injected here --}}
                                    <div class="map-item-content">
                                        <img src="{{ asset('front/assets/images/large-circle.png') }}" class="img-fluid"
                                            alt="">
                                        <div class="map-inner-content">
                                            <h4>SAFEWAY</h4>
                                            <p>9619 ROEHAMPTON STREET HARRISBURG, PA 17109</p>
                                        </div>
                                        <a class="inner-btn" href="#!">View</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section class="find-uzi-images">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($logos as $data)
                        <div class="col-lg-2 col-sm-2 col-md-2  col-12">
                            <div class="find-uzi-inner-image">
                                <img src="{{ asset('front/assets/images/find-uzi/' . $data->company_logo) }}"
                                    class="img-fluid">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="inner-footer">


        </section>

    </div>
@endsection
@section('footer')
    @include('frontend.partials.footer')
@endsection

@push('custom_js')
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHPUXXuMgK_aPOQo0qllRwRME6gO03Q3I&callback=initMap" async
        defer></script> --}}

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialize map
        var map = L.map('map').setView([38.7946, -97.5348], 4); // Default center and zoom level

        // Load OSM tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Array to store markers
        var markers = [];

        // Function to add a marker
        function addMarker(lat, lon, popupText) {
            var marker = L.marker([lat, lon]).addTo(map).bindPopup(popupText);
            markers.push(marker);
        }

        // Function to clear all markers
        function clearMarkers() {
            markers.forEach(function(marker) {
                map.removeLayer(marker);
            });
            markers = [];
        }

        // Function to fetch and display markers
        function fetchAndDisplayMarkers(productId, locationId) {
            if (!productId || !locationId) {
                clearMarkers();
                return;
            }

            $.ajax({
                url: `/api/product-locations/${productId}/${locationId}`,
                method: 'GET',
                success: function(product) {
                    clearMarkers();
                    console.log(product);

                    // Clear and prepare the info box container
                    $('.map-item-content').remove(); // Remove existing entries

                    if (!product.product_locations || !product.product_locations.length) {
                        // Show "Location not found" message
                        const noLocationHtml = `
                            <div class="map-item-content">
                                <div class="map-inner-content">
                                    <h4>Product not found</h4>
                                </div>
                            </div>
                        `;
                        $('.map-item-wrapper').append(noLocationHtml);
                        return;
                    }

                    product.product_locations.forEach(function(productLocation) {
                        const coordinates = productLocation.location_coordinates;

                        if (!coordinates || !coordinates.length) return;

                        coordinates.forEach(function(coord) {
                            // Add marker
                            addMarker(parseFloat(coord.latitude), parseFloat(coord.longitude),
                                coord.place);

                            // Add info card for each coordinate
                            const contentHtml = `
                            <div class="map-item-content">
                                <img src="/front/assets/images/large-circle.png" class="img-fluid" alt="">
                                <div class="map-inner-content">
                                    <h4>${product.name}</h4>
                                    <p>${coord.place}</p>
                                </div>
                                <a class="inner-btn view-marker-btn" 
                                   href="#!" 
                                   data-lat="${coord.latitude}" 
                                   data-lng="${coord.longitude}" 
                                   data-place="${coord.place}">View</a>
                            </div>
                        `;
                            $('.map-item-wrapper').append(contentHtml);
                        });
                    });

                    // Center map on the first coordinate of the first location
                    const firstCoord = product.product_locations[0].location_coordinates[0];
                    map.setView([parseFloat(firstCoord.latitude), parseFloat(firstCoord.longitude)], 7);
                },
                error: function() {
                    alert('Error fetching location data.');
                }
            });
        }

        // Listen to changes on both dropdowns
        $('#productDropdown, #locationDropdown').on('change', function() {
            const productId = $('#productDropdown').val();
            const locationId = $('#locationDropdown').val();
            fetchAndDisplayMarkers(productId, locationId);
        });

        // Delegate event after dynamic elements added
        $(document).on('click', '.view-marker-btn', function(e) {
            e.preventDefault();

            const lat = parseFloat($(this).data('lat'));
            const lon = parseFloat($(this).data('lng'));
            const place = $(this).data('place');

            clearMarkers();

            // Add the specific marker
            addMarker(lat, lon, place);

            // Center the map on this location
            map.setView([lat, lon], 12);
        });
    </script>

    {{-- <script>
        let map;
        let markers = [];

        function initMap() {
            const defaultCenter = {
                lat: 38.7946,
                lng: -97.5348
            };
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: defaultCenter,
                mapTypeId: 'roadmap'
            });
        }

        function addMarker(position, title) {
            const marker = new google.maps.Marker({
                position,
                map,
                title
            });
            markers.push(marker);
        }

        function clearMarkers() {
            markers.forEach(marker => marker.setMap(null));
            markers = [];
        }

        function fetchAndDisplayMarkers(productId, locationId) {
            if (!productId || !locationId) {
                clearMarkers();
                return;
            }
            // url: `/api/product-locations`,
            // console.log(productId, locationId);
            $.ajax({
                url: `/api/product-locations/${productId}/${locationId}`,
                method: 'GET',
                success: function(product) {
                    clearMarkers();
                    console.log(product);

                    // Clear and prepare the info box container
                    $('.map-item-content').remove(); // Remove existing entries

                    if (!product.product_locations || !product.product_locations.length) {
                        alert('Product not available in this location.');
                        return;
                    }

                    product.product_locations.forEach(productLocation => {
                        const coordinates = productLocation.location_coordinates;

                        if (!coordinates || !coordinates.length) return;

                        coordinates.forEach(coord => {
                            // Add marker
                            addMarker({
                                    lat: parseFloat(coord.latitude),
                                    lng: parseFloat(coord.longitude)
                                },
                                coord.place
                            );

                            // Add info card for each coordinate
                            const contentHtml = `
                                <div class="map-item-content">
                                    <img src="/front/assets/images/large-circle.png" class="img-fluid" alt="">
                                    <div class="map-inner-content">
                                        <h4>${product.name}</h4>
                                        <p>${coord.place}</p>
                                    </div>
                                    <a class="inner-btn view-marker-btn" 
                                    href="#!" 
                                    data-lat="${coord.latitude}" 
                                    data-lng="${coord.longitude}" 
                                    data-place="${coord.place}">View</a>
                                </div>
                            `;
                            // $('.inner-sub-content').append(contentHtml);
                            $('.map-item-wrapper').append(contentHtml);

                        });
                    });

                    // Center map on the first coordinate of the first location
                    const firstCoord = product.product_locations[0].location_coordinates[0];
                    map.setCenter({
                        lat: parseFloat(firstCoord.latitude),
                        lng: parseFloat(firstCoord.longitude)
                    });
                    map.setZoom(7);
                },
                error: function() {
                    alert('Error fetching location data.');
                }
            });
        }

        // Listen to changes on both dropdowns
        $('#productDropdown, #locationDropdown').on('change', function() {
            const productId = $('#productDropdown').val();
            const locationId = $('#locationDropdown').val();
            // console.log(productId, locationId);
            fetchAndDisplayMarkers(productId, locationId);
        });

        // Delegate event after dynamic elements added
        $(document).on('click', '.view-marker-btn', function(e) {
            e.preventDefault();

            const lat = parseFloat($(this).data('lat'));
            const lng = parseFloat($(this).data('lng'));
            const place = $(this).data('place');

            clearMarkers();

            const position = {
                lat,
                lng
            };
            addMarker(position, place);

            map.setCenter(position);
            map.setZoom(12);
        });
    </script> --}}
@endpush
