<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            #map {
                height: 500px;
                width: 100%;
                margin:auto
            }

            html,
            body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
        @livewireStyles
    </head>
    <body >
        <main>
            @yield('content')
        </main>

        @livewireScripts
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfLUT0sylVwLuEYuUByCre2-06bmAcFZ8&callback=initMap&libraries=visualization"
          async>
        </script>
        <script src="http://maps.google.com/maps/api/js?sensor=false"
        type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        @stack('custom-scripts')
    </body>
</html>
