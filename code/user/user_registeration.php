<!DOCTYPE html>
<html>
<head>
	<title>User Registeration</title>

	<!--Bootstrap Link-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!--External CSS start-->
	<link rel="stylesheet" type="text/css" href="../style.css">
	<!--CSS end-->

	<!--External Js start-->
	<script type="text/javascript" src="script.js"></script>
	<!--CSS end-->


</head>
<body>
	<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
		  <ul class="navbar-nav">
		  	<span class="navbar-text"><strong>Attendence System</strong></span>
		  </ul>
	</nav>
	<center>
	<u><h1 class="panelf align-h">User Registeration</h1></u>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="text" name="fname" id="fname" placeholder="First Name" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required >
		<input type="text" name="lname" id="lname" placeholder="Last Name" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="email" name="email" id="email" placeholder="Email" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="password" name="pass1" id="pass1" placeholder="Password" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="password" name="pass2" id="pass2" placeholder="Confirm Password" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="file" name="img" id="img" placeholder="Profile Pic" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="submit" name="register" id="register" value="Signup" class="panelf-50 align-t-50 btn btn-primary col col-lg-10 col-xl-10 col-md-10 col-sm-10">
	</form>
	</center>
	<?php
		require_once('../makeconnection.php');
		if(isset($_POST['fname']) && $_POST['fname'] !== ""){$fname = $_POST['fname'];}
		if(isset($_POST['lname']) && $_POST['lname'] !== ""){$lname = $_POST['lname'];}
		if(isset($_POST['email']) && $_POST['email'] !== ""){$email = $_POST['email'];}
		if(isset($_POST['pass1']) && $_POST['pass1'] !== ""){$pass1 = $_POST['pass1'];}
		if(isset($_POST['pass2']) && $_POST['pass2'] !== ""){$pass2 = $_POST['pass2'];}
		if(isset($_POST['register']))
		{	
			if(!empty($email))
			{
				if ($pass1===$pass2) {	
				$sqlq1 = " SELECT Email FROM user_reg_data WHERE Email='$email'";
				$resultsqlq1 = mysqli_query($conntodb,$sqlq1);
				if(mysqli_num_rows($resultsqlq1)>0)
				{
					echo "<script>alert('This Email Is Already Registered');</script>";
					return false;
				} 
				else
				{
					$imgname=addslashes($_FILES["img"]["name"]);
					$imgdata=addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
					$filetype=addslashes($_FILES["img"]["type"]);
					$array = array('jpg','jpeg');
					$ext =pathinfo($imgname,PATHINFO_EXTENSION);
					if(!empty($imgname)){
			  			if(in_array($ext, $array))
			  			{
			  				$sqlq2 = " INSERT INTO user_reg_data (First_Name,Last_Name,Email,Password,Image_Name,Image_Data) VALUES ('$fname','$lname','$email','$pass1','$imgname','$imgdata')" ;
							$resultsqlq2 = mysqli_query($conntodb,$sqlq2);
							if ($resultsqlq2) {
								header("location: user_login.php");
							}
							else{
								echo "Mysql error : ".$sql1;
						  	}
			  			}
			  			else
			  			{
			  				echo "unsupported image file";
			  			}
					}
					else{
						echo "Please select the profile image";
					}
				}
				}
				elseif ($pass1!==$pass2) {
					echo "<script>alert('Your Passwords Dont Match')</script>";
				}


			}	
		}
	?>
</body>
</html>