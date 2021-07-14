<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <style>
            /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 100%;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}
        </style>
    </head>
    <body >
        <div id="map"></div>

        <!-- Async script executes immediately and must be after any DOM elements used in callback. -->

        <script>
            var map, heatmap, type;

            function initMap(latitude = 13.066239, longitude = 80.274816) {
                map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: {lat: latitude, lng: longitude},
                mapTypeId: 'roadmap'
                });

                heatmap = new google.maps.visualization.HeatmapLayer({
                    map: map,
                    radius: 30
                });
            }
        </script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfLUT0sylVwLuEYuUByCre2-06bmAcFZ8&callback=initMap&libraries=visualization"
          async
        ></script>
    </body>
</html>
