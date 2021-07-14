var map, marker;

            function initMap(pickup_lat = 26.21420305072809, pickup_lng = 50.587485855821434, dropoff_lat = 26.2133875, dropoff_lng =50.5995514, location_lat = 26.2141984, location_lng = 50.5873585) {

                var LocationsForMap = [
                    ['pickup', pickup_lat, pickup_lng],
                    ['dropoff', dropoff_lat, dropoff_lng],
                    ['driver', location_lat, location_lng],
                ];

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
                        title: title
                    });
                    bounds.extend(myLatLng);
                }

                map.fitBounds(bounds);

            }