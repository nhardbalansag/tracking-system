<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
        <style>
            #map {
                height: 500px;
                width: 60%;
                margin:auto
            }

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
        <script src="{{ asset('asset/maps.js') }}"></script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfLUT0sylVwLuEYuUByCre2-06bmAcFZ8&callback=initMap&libraries=visualization"
          async
        ></script>
    </body>
</html>
