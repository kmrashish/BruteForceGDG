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
			<div class="col-md-6">
			<form method="POST" action="savealife.php">
			<input type="text" id="lttd" name="lttd" hidden>
			<input type="text" id="lgtd" name="lgtd" hidden>    			
			<input type="submit" value="Save A Life" class="btn btn-block btn-lg btn-danger" name="submit">
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
		    
		    $query="SELECT * FROM notification WHERE (lttd < $lttdp1 OR lttd > $lttdm1) AND (lgtd < $lgtdp1 OR lgtd > $lgtdm1)   ";
			$query_run=mysql_query($query);
			
		
			 while($result=mysql_fetch_assoc($query_run))
			 {			
			 
			 echo '<a href="#" class="list-group-item">';
				echo '  <b>Name</b> '.$result['name'].'<br>';
               echo '  <b>Blood Group</b> '.$result['bg'].'<br>';
				echo '  <b>Email</b> '.$result['email'].'<br>';

				echo '  <b>Phone</b> '.$result['pno'].'<br>';

				echo '</a>';
				 } 
				
			}
			?>
	</div>
	</div>


			