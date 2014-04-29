<?php include_once "global.php"?>

<?php
	
	
	@ $name;
	@ $email;
	@ $pno;
	@ $bg;
	 
	if(isset($_POST['register']))
	{
		if(isset($_POST['lgtd']) && isset($_POST['lttd']))
		{
			
			$lgtd = $_POST['lgtd'];
			$lttd = $_POST['lttd'];
		}
		if(isset($_POST['userid']) && !empty($_POST['userid']))
		{
			$email = $_POST['userid'];
			$query = "SELECT * FROM `users` WHERE email='$email'";
			$query_run  = mysql_query($query);
			$rows = mysql_num_rows($query_run);
			if($rows==0)
			{
				echo 'WRONG USERNAME';
			}
			else
			{
				$result = mysql_fetch_assoc($query_run);
				$name = $result['name'];
				$email = $result['email'];
				$bg = $result['bg'];
				$pno = $result['pno'];
			}
		}
		else
		{
			if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pno']) && isset($_POST['bg']))
			{
				$name = $_POST['name'];
				$email = $_POST['email'];
				$pno = $_POST['pno'];
				$bg = $_POST['bg'];
			}
		}
		
		echo $query1 = "INSERT INTO `notification` VALUES(DEFAULT,'$name','$email','$pno','$lttd','$lgtd','$bg',NOW())";
		$query1_run = mysql_query($query1);
		header("location:index.php");
	}
	
?>

<!DOCTYPE html>
  <html lang="en">
  <head>
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
<html>

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
	<body>
  <?php include "nav.php"; ?>
  <div align="center">
  <div class="con">
		<form action="notify1.php" method="POST">
			<input type="text" id="lttd" name="lttd" hidden>
			<input type="text" id="lgtd" name="lgtd" hidden>
		 <div class="col-xs-4">
		 Name:
		 </div>
         <div class="col-xs-6">
        	<div class="form-group">
	         <input type="text" name="name" class="form-control" >
        	</div>          
        </div>
		<div class="col-xs-4">
		 Email:
		 </div>
         <div class="col-xs-6">
        	<div class="form-group">
	         <input type="email" name="email" class="form-control" >
        	</div>          
        </div>
		<div class="col-xs-4">
		 Phone No.:
		 </div>
         <div class="col-xs-6">
        	<div class="form-group">
	         <input type="text" name="pno" class="form-control" ><br/>
        	</div>          
        </div>
		<div class="col-xs-4">
		 Blood Group:
		</div>
        <div class="col-xs-6">
        	<div class="form-group">
	        <select name="bg" class="form-control" >
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
        </div>
		
		<div class="col-xs-12">
		<div class="col-md-5"><hr></div>
		<div class="col-md-1">OR</div>
		<div class="col-md-5"><hr></div>
		 Enter Your Username
		</div>
		 <div class="form-group">
	         <input type="email" name="userid" class="form-control" >
        </div>  
		<div class="col-xs-12">
         <input type="Submit" value="Register With Us" class="btn btn-block btn-lg btn-danger" name="register">
        </div>	
			
		</form>
 </div>	
</div> 
	</body>
</html>