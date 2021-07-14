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
            let map;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: -34.397, lng: 150.644 },
                    zoom: 8,
                });
            }
        </script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfLUT0sylVwLuEYuUByCre2-06bmAcFZ8&callback=initMap&libraries=visualization"
          async
        ></script>
    </body>
</html>
