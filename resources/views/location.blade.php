<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>How to Add Google Map in Laravel? - ItSolutionStuff.com</title>
				<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
				<style type="text/css">
								#map {
												height: 600px;
								}
				</style>
</head>

<body>
				<div class="container mt-5">
								<h2>How to Add Google Map in Laravel? - ItSolutionStuff.com {{ $latlon['latitude'] }}
												{{ $latlon['longitude'] }}
								</h2>
								<h1 id="lat"></h1>
								<div id="map"></div>
				</div>

				<script type="text/javascript">
				    var latitude = parseFloat(@json($latlon['latitude']));
				    var longitude = parseFloat(@json($latlon['longitude']));

				    function initMap() {
				        document.getElementById("lat").innerHTML = latitude + " lat " + longitude + " lng ";
				        const myLatLng = {
				            // lat: 22.2734719,
				            lat: latitude,
				            lng: longitude
				            // lng: 70.7512559
				        };
				        const map = new google.maps.Map(document.getElementById("map"), {
				            zoom: 6,
				            center: myLatLng,
				        });

				        new google.maps.Marker({
				            position: myLatLng,
				            map,
				            title: "Hello Rajkot!",
				        });
				        calcRoute();
				    }

				    function calcRoute() {

				        var waypts = [];


				        stop = new google.maps.LatLng(-1, 36)
				        waypts.push({
				            location: stop,
				            stopover: true
				        });


				        start = new google.maps.LatLng(latitude, longitude);
				        end = new google.maps.LatLng(-1, 35.23);
				        var request = {
				            origin: start,
				            destination: end,
				            waypoints: waypts,
				            optimizeWaypoints: true,
				            travelMode: google.maps.DirectionsTravelMode.WALKING
				        };
				        directionsService.route(request, function(response, status) {
				            if (status == google.maps.DirectionsStatus.OK) {
				                directionsDisplay.setDirections(response);
				                var route = response.routes[0];

				            }
				        });
				    }

				    window.initMap = initMap;
				</script>

				<script type="text/javascript"
				    src="https://maps.google.com/maps/api/js?key=AIzaSyCvjdaPOP0uebrr8SnTFGK09gT_m6hf9J4&callback=initMap"></script>

</body>

</html>

{{-- <!DOCTYPE html>
<html>
    <head><meta name="viewport" content="initial-scale=1.0, user-scalable=no"/><meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Google Maps JavaScript API v3 Example: Directions Waypoints</title>
        <link href="https://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false">
        </script>
        <script type="text/javascript">
    var directionDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;

    function initialize() {
        directionsDisplay = new google.maps.DirectionsRenderer();
        var chicago = new google.maps.LatLng(-40.321, 175.54);
        var myOptions = {
            zoom: 20,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: chicago
        }
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        directionsDisplay.setMap(map);
        calcRoute();
    }

    function calcRoute() {

        var waypts = [];


stop = new google.maps.LatLng(-39.419, 175.57)
        waypts.push({
            location:stop,
            stopover:true});


        start  = new google.maps.LatLng(-40.321, 175.54);
        end = new google.maps.LatLng(-38.942, 175.76);
        var request = {
            origin: start,
            destination: end,
            waypoints: waypts,
            optimizeWaypoints: true,
            travelMode: google.maps.DirectionsTravelMode.WALKING
        };
        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                var route = response.routes[0];

            }
        });
    }
        </script>
    </head>
    <body onload="initialize()">
        <div id="map_canvas" style="width:70%;height:80%;">
        </div>
        <br />
        <div>

        </div>
    </body>
</html> --}}
