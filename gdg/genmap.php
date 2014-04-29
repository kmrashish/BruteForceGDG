<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body{
        height: 100%;
        margin: 0px;
        padding: 0px
      }
	  #map-canvas {
        height: 400px;
		width: 1000px;		
        margin: 0px;
        padding: 0px
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    
  </head>
  <body>
    <center>
	<h1> Find Donors nearby </h1>
<h2 id="line1"></h2>
<p id="demo">Click the button to share location:</p>
<button onclick="getLocation()">Show map</button><br><br><div id="map-canvas"></div>
<input type="text" id="lttd">
<input type="text" id="lgtd"></center>
<script>
var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }
function showPosition(position)
  {
  //displaying the coords
  var lt=position.coords.latitude;
  var lg=position.coords.longitude;
  document.getElementById("lttd").value=lt;
  document.getElementById("lgtd").value=lg;
  x.innerHTML="Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
  
  //displaying the map
	var mapOptions = {
    zoom: 12,
    center: new google.maps.LatLng(Number(position.coords.latitude), Number(position.coords.longitude)),
	mapTypeId: google.maps.MapTypeId.HYBRID
  };
  
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions); 

	  //setting the marker for google map
  var marker1=new google.maps.Marker({
  position: new google.maps.LatLng(Number(position.coords.latitude), Number(position.coords.longitude)),
    map: map,
    }); 

	//adding info for marker
	var name1="Ashish";
  var infowindow1 = new google.maps.InfoWindow({
    content: name1
    });
    

    // Adding a click event to the marker
    google.maps.event.addListener(marker1, 'click', function() {
    // Calling the open method of the infoWindow
    infowindow1.open(map, marker1);
    });	
  }
var map;
google.maps.event.addDomListener(window, 'load', showPosition);

</script>
  </body>
</html>