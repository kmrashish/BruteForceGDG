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
		width: 80%;		
        margin: 0px;
        padding: 0px;}</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	<title>SAVE A LIFE</title>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  </head>
  <body>
  <?php include "nav.php"; ?>
 <div class="col-md-2"></div>
 <div class="col-md-10">
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
			<div class="col-md-6">
			<form method="POST" action="mapme.php">
			<input type="text" id="lttd" name="lttd" hidden>
			<input type="text" id="lgtd" name="lgtd" hidden>
			
			 Blood Group:		
			
				<div class="form-group">
				<select name="bg" class="form-control" required>
				  <option value=""> Select Blood Group</option>
				  <option value="A+">A+</option>
				  <option value="A-">A-</option>
				  <option value="B+">B+</option>
				  <option value="B-">B-</option>
				  <option value="O+">O+</option>
				  <option value="O-">O-</option>
				  <option value="AB+">AB+</option>
				  <option value="AB-">AB-</option>
				</select>
				</div>          
			
			<input type="submit" value="Show me!" name="submit">
			</form>
			</div>
			<?php
			if(isset($_POST['submit'])){
			$lttd=$_POST['lttd'];
			$lgtd=$_POST['lgtd'];
			$lttdp1=$lttd+0.1;
			$lttdm1=$lttd-0.1;
			$lgtdp1=$lgtd+0.1;
			$lgtdm1=$lgtd-0.1;
			$_lt=$lttd;
			$_lg=$lgtd;
		    $bg = $_POST['bg'];
		    $query="SELECT * FROM users WHERE (lttd < $lttdp1 OR lttd > $lttdm1) AND (lgtd < $lgtdp1 OR lgtd > $lgtdm1) AND bg='$bg'  ";
			$query_run=mysql_query($query);
			
			
			 while($result=mysql_fetch_assoc($query_run))
			 {
			 $lt[]=$result['lttd'];
			 $lg[]=$result['lgtd'];
			 $name[]=$result['name'];
			 $id[]=$result['id'];
			 $email[]=$result['email'];
			 $phn[]=$result['pno'];
			}
			$lt[]=$lttd;
			$lg[]=$lgtd;
			$name[]="You";
			// print_r($lt);
			// print_r($lg);
			// print_r($name);
			}
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
google.maps.event.addDomListener(window, "resize", function() {
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center); 
});
  
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
	map.setZoom(13);
	map.setCenter(marker<?php echo $i ; ?>.getPosition());
    infowindow<?php echo $i ; ?>.open(map, marker<?php echo $i ; ?>);
    });	
	<?php } ?>
  }
var map;
google.maps.event.addDomListener(window, 'load', plotMap);

</script> 

<div id="map-canvas" ></div>
<div class="col-md-10" style="margin-top:100px">
<?php 
if(isset($_POST['submit'])){
if(sizeof($name)>1)
{
echo '<div class="list-group"><a href="#" class="list-group-item active">
    Donors
  </a>';
for($i=0;$i<sizeof($lt)-1;$i++)
{
echo '<a href="#" class="list-group-item">';
echo '  <b>Name</b> '.$name[$i];

echo '  <b>Email</b> '.$email[$i];

echo '  <b>Phone</b> '.$phn[$i];

echo '</a>';
 } 
echo '</div>';
}

}
?>
</div>
</div>

</body>	
</html>
