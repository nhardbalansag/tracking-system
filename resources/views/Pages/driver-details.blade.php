@extends('welcome')

@section('content')

<div class="container">
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
                <td></td>
                <td>Otto</td>
                <td>{{ $content['driver']['full_name'] }}</td>
                <td>@mdo</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="map"></div>
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
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 50,
                center: { lat: -25.363, lng: 131.044 },
                mapTypeId: 'roadmap'
            });

            var bounds = new google.maps.LatLngBounds();

            for (let i = 0; i < LocationsForMap.length; i++) {

                let title = LocationsForMap[i][0]
                const myLatLng = { lat: LocationsForMap[i][1], lng:  LocationsForMap[i][2] };

                new google.maps.Marker({
                    position: myLatLng,
                    map,
                    label: {
                        text: title,
                        fontSize: '20px',
                        fontWeight: 'bold',
                        fontFamily: 'custom-label',
                        labelClass: "labels"
                    },
                });
                bounds.extend(myLatLng);
            }
            map.fitBounds(bounds);
        }

    </script>
@endpush

