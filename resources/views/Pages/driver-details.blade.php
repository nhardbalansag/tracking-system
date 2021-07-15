@extends('welcome')

@section('content')

<div class="container" style="margin-top: 100px">
    <div class="my-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Source</th>
                <th scope="col">Current Location</th>
                <th scope="col">Drivers Name</th>
                <th scope="col">Destination</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{ $content['order_id'] }}</th>
                <td id="source"></td>
                <td id="driverLocation"></td>
                <td>{{ $content['driver']['full_name'] }}</td>
                <td id="destination"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="map"></div>
    <div class="my-3">
        <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
    </div>
</div>

@endsection

@push('custom-scripts')
    <script>
        var map, marker;
        var LocationsForMap = [
            ['pickup', {!! $content['pickup_lat'] !!}, {!! $content['pickup_lng'] !!}],
            ['dropoff', {!! $content['dropoff_lat'] !!}, {!! $content['dropoff_lng'] !!}],
            ['driver', {!! $content['driver']['location_lat'] !!}, {!! $content['driver']['location_lng'] !!}],
        ];

        function initMap() {
            var bounds = new google.maps.LatLngBounds();
            const infowindowDropOff = new google.maps.InfoWindow();
            const infowindowDriver = new google.maps.InfoWindow();
            const geocoder_drop = new google.maps.Geocoder();
            const geocoder_driver = new google.maps.Geocoder();
            const geocoder_pick = new google.maps.Geocoder();

            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();

            var _source = document.getElementById('source');
            var _driverLocation = document.getElementById('driverLocation');
            var _destination = document.getElementById('destination');
            var originLoc, endloc;

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 50,
                center: { lat: -25.363, lng: 131.044 },
                mapTypeId: 'roadmap'
            });
            geocoder_drop
            .geocode({location: { lat: LocationsForMap[1][1], lng: LocationsForMap[1][2] }})
            .then((response) => {
                if (response.results[0]) {
                    const marker = new google.maps.Marker({
                        position: { lat: LocationsForMap[1][1], lng: LocationsForMap[1][2] },
                        map: map,
                        label: {
                            text: "dropoff",
                            fontSize: '20px',
                            fontWeight: 'bold',
                            fontFamily: 'custom-label',
                            labelClass: "labels"
                        },
                    });
                    infowindowDropOff.setContent(response.results[0].formatted_address);
                    infowindowDropOff.open(map, marker);
                    _destination.innerHTML = response.results[0].formatted_address;
                    endloc = { lat: LocationsForMap[1][1], lng: LocationsForMap[1][2] };
                } else {
                    window.alert("No results found");
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));

            geocoder_driver
            .geocode({location: { lat: LocationsForMap[2][1], lng: LocationsForMap[2][2] }})
            .then((response) => {
                if (response.results[0]) {
                    var Driver = new google.maps.Marker({
                        position: { lat: LocationsForMap[2][1], lng:  LocationsForMap[2][2] },
                        map,
                        label: {
                            text: "Driver",
                            fontSize: '20px',
                            fontWeight: 'bold',
                            fontFamily: 'custom-label',
                            labelClass: "labels"
                        },
                    });
                    infowindowDriver.setContent("Driver Name: " + "{!! $content['driver']['full_name'] !!}")
                    infowindowDriver.open(map, Driver);
                    _driverLocation.innerHTML = response.results[0].formatted_address;
                } else {
                    window.alert("No results found");
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));

            geocoder_pick
            .geocode({location: { lat: LocationsForMap[0][1], lng: LocationsForMap[0][2] }})
            .then((response) => {
                if (response.results[0]) {
                    var marker = new google.maps.Marker({
                        position: { lat: LocationsForMap[0][1], lng:  LocationsForMap[0][2] },
                        map,
                        label: {
                            text: "Pickup",
                            fontSize: '20px',
                            fontWeight: 'bold',
                            fontFamily: 'custom-label',
                            labelClass: "labels"
                        },
                    });
                    _source.innerHTML = response.results[0].formatted_address;
                    originLoc = { lat: LocationsForMap[0][1], lng: LocationsForMap[0][2] }
                } else {
                    window.alert("No results found");
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));

            for (let i = 0; i < LocationsForMap.length; i++) {
                let title = LocationsForMap[i][0]
                const myLatLng = { lat: LocationsForMap[i][1], lng:  LocationsForMap[i][2] };
                bounds.extend(myLatLng);
            }
            map.fitBounds(bounds);
            directionsRenderer.setMap(map);
            directionsService
            .route({
                origin: { lat: LocationsForMap[0][1], lng: LocationsForMap[0][2] },
                destination: { lat: LocationsForMap[1][1], lng: LocationsForMap[1][2] },
                travelMode: google.maps.TravelMode.DRIVING,
            })
            .then((response) => {
                directionsRenderer.setDirections(response);
            })
            .catch((e) => window.alert("Directions request failed due to " + status));
        }

    </script>

@endpush


