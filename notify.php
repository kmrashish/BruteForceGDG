<?php include "global.php"; ?>
<?php
	
	if(isset($_POST['notify']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pno = $_POST['pno'];
		$bg = $_POST['bg'];
		$lttd = $_POST['lttd'];
		$lgtd = $_POST['lgtd'];
		@$showpno;
		if(isset($_POST['givepno']))
		{
			$showpno = 0;
		}
		else
		{
			$showpno=1;
		}
		
		$query = "INSERT INTO `users` VALUES(DEFAULT,'$name','$email','$pno','$lttd','$lgtd','$bg','$showpno')";
		$query_run = mysql_query($query);
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
	</head>
  <body>
  <?php include "nav.php"; ?>
  <div class="col-md-2"></div>
  <div class="col-md-10">
  <?php
    $id=$_GET['id'];
	echo $id;
	echo $_GET['lt'];
	echo $_GET['lg'];
  ?>
  <form action="register.php" method="POST">
			<input type="text" id="lttd" name="lttd" hidden>
			<input type="text" id="lgtd" name="lgtd" hidden>
	  <div class="col-xs-4">
		 Name:
		 </div>
         <div class="col-xs-6">
        	<div class="form-group">
	         <input type="text" name="name" class="form-control" required>
        	</div>          
        </div>
		<div class="col-xs-4">
		 Email:
		 </div>
         <div class="col-xs-6">
        	<div class="form-group">
	         <input type="email" name="email" class="form-control" required>
        	</div>          
        </div>
		<div class="col-xs-4">
		 Phone No.:
		 </div>
         <div class="col-xs-6">
        	<div class="form-group">
	         <input type="text" name="pno" class="form-control" required><br/>
        	</div>          
        </div>
		<div class="col-xs-4">
		 Blood Group:
		</div>
        <div class="col-xs-6">
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
        </div>
		<div class="col-xs-12">
		<label class="checkbox" for="checkbox1">
            <span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span><input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
           Don't Show my Phone Number
         </label>
		</div>
		<div class="col-xs-12">
		<div class="col-md-5"><hr></div>
		<div class="col-md-1">OR</div>
		<div class="col-md-5"><hr></div>
		 Enter Your Username
		</div>
		
		<div class="col-xs-12">
         <input type="Submit" value="Register" class="btn btn-block btn-lg btn-inverse" name="register">
        </div>	
			
		</form> 
  
  </div>
  </body>
  </html>