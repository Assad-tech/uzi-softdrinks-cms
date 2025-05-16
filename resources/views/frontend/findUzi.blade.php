@extends('frontend.layouts.master')
@section('title', 'Find Uzi')
@push('custom_css')
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
                                {{-- Goolgle Map API integrated --}}
                                <div id="map" class="rounded-left" style="height: 590px" style="border:0;"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></div>
                                {{-- <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52859625.873751506!2d-161.6458215068694!3d36.037492887324426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1726172646822!5m2!1sen!2s"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
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

                                <div class="map-item-filed-2">
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

        </section>


        <section class="find-uzi-images">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($logos as $data)
                        <div class="col-lg-2 col-sm-2 col-md-2  col-12">
                            <div class="find-uzi-inner-image">
                                <img src="{{ asset('front/assets/images/find-uzi/'.$data->company_logo) }}" class="img-fluid">
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHPUXXuMgK_aPOQo0qllRwRME6gO03Q3I&callback=initMap" async
        defer></script>

    <script>
        let map;
        let markers = [];
        let currentLocations = [];

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

        $('#productDropdown').on('change', function() {
            const productId = $(this).val();

            $.ajax({
                url: `/api/product-locations/${productId}`,
                method: 'GET',
                success: function(locations) {
                    clearMarkers();
                    currentLocations = locations; // Store for later use

                    if (locations.length === 0) {
                        alert('No locations for this product.');
                        $('#locationDropdown').html('<option value="">No locations available</option>');
                        return;
                    }

                    // Update location dropdown
                    let locationOptions = '';
                    locations.forEach(loc => {
                        locationOptions += `<option value="${loc.id}">${loc.location}</option>`;
                    });
                    $('#locationDropdown').html(locationOptions);

                    // Add markers
                    locations.forEach(loc => {
                        addMarker({
                                lat: parseFloat(loc.latitude),
                                lng: parseFloat(loc.longitude)
                            },
                            loc.location
                        );
                    });

                    map.setCenter({
                        lat: parseFloat(locations[0].latitude),
                        lng: parseFloat(locations[0].longitude)
                    });
                    map.setZoom(4);
                }
            });
        });

        $('#locationDropdown').on('change', function() {
            const locationId = $(this).val();
            const selectedLoc = currentLocations.find(loc => loc.id == locationId);

            if (selectedLoc) {
                // Clear previous markers
                clearMarkers();

                const latLng = {
                    lat: parseFloat(selectedLoc.latitude),
                    lng: parseFloat(selectedLoc.longitude)
                };

                // Add only this one marker
                addMarker(latLng, selectedLoc.location);

                // Center and zoom
                map.setCenter(latLng);
                map.setZoom(6);
            }
        });
    </script>
@endpush
