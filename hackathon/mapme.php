<?php include "global.php"; ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
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
        padding: 0px;}</style>
    <meta charset="utf-8">
    <title>Flat UI - Free Bootstrap Framework and Themes</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  </head>
  <body>
  <?php include "nav.php"; ?>
  <div align="center">
 <div class="con">
		    <script>
			var x=document.getElementById("demo");
			getLocation();
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
			}
			</script>
			
			<form method="POST" action="mapme.php">
			<input type="text" id="lttd" name="lttd" >
			<input type="text" id="lgtd" name="lgtd" >
			<input type="submit" value="Show me!">
			</form>
			<?php
			$lttd=$_POST['lttd'];
			$lgtd=$_POST['lgtd'];
			$lttdp1=$lttd+0.1;
			$lttdm1=$lttd-0.1;
			$lgtdp1=$lgtd+0.1;
			$lgtdm1=$lgtd-0.1;
			$_lt=$lttd;
			$_lg=$lgtd;
			echo $query="SELECT * FROM users WHERE lttd < $lttdp1 OR lttd > $lttdm1 ";
			$query_run=mysql_query($query);
			
			
			 while($result=mysql_fetch_assoc($query_run))
			 {
			 $lt[]=$result['lttd'];
			 $lg[]=$result['lgtd'];
			 $name[]=$result['name'];
			}
			// print_r($lt);
			// print_r($lg);
			// print_r($name);
			?>
			
<script>
//var x=document.getElementById("demo");

function plotMap()
  {
  //displaying the coords
  /* var lt=position.coords.latitude;
  var lg=position.coords.longitude; */
  /* document.getElementById("lttd").value=lt;
  document.getElementById("lgtd").value=lg; */
  
  
  //displaying the map
	var mapOptions = {
    zoom: 12,
    center: new google.maps.LatLng(<?php echo $_lt ?>,<?php echo $_lg ?>),
	mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions); 
  <?php for($i=0; $i< sizeof($lt); $i++){ ?>
	  //setting the marker for google map
  var marker<?php echo $i ; ?> =new google.maps.Marker({
  position: new google.maps.LatLng(<?php echo $lt[$i] ?>,<?php echo $lg[$i] ?>),
    map: map,
    }); 

	//adding info for marker
	var name<?php echo $i ; ?>="<?php echo $name[$i]; ?>"
  var infowindow<?php echo $i ; ?> = new google.maps.InfoWindow({
    content: name<?php echo $i ; ?>
    });
    

    // Adding a click event to the marker
    google.maps.event.addListener(marker<?php echo $i ; ?>, 'click', function() {
    // Calling the open method of the infoWindow
    infowindow<?php echo $i ; ?>.open(map, marker<?php echo $i ; ?>);
    });	
	<?php } ?>
  }
var map;
google.maps.event.addDomListener(window, 'load', plotMap);

</script> 
<div id="map-canvas"></div>
<input type="button" text="GenMap" onclick="plotMap()">
	<body>
	
</html>
