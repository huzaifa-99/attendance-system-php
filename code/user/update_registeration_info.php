<!DOCTYPE html>
<html>
<head>
	<meta name="charset" content="utf-8">
	<title>Update Registeration Info</title>

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
<center>
	<?php
	require_once('../makeconnection.php');
	session_start();
	require_once('../verify_user_session.php');
	ob_start();
	require_once('display_user_profile_pic.php');
	$content = ob_get_contents();
	//echo "Your Email ".$_SESSION['Email']." Cannot Be Changed Rest Of All Data Can Be Changed";
	?>
	<u><h1 class="panelf align-h">Update Registeration Info</h1></u>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="text" name="fname" id="fname" placeholder="First_Name" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="text" name="lname" id="lname" placeholder="Last_Name" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="password" name="pass1" id="pass1" placeholder="Password" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="password" name="pass2" id="pass2" placeholder="Confirm Password" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="file" name="img" id="img" placeholder="Profile Image" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="submit" name="register" id="register" value="Update Info" class="panelf-50 align-t-50 btn btn-primary col col-lg-10 col-xl-10 col-md-10 col-sm-10">
	</form>
	</center>
	<?php
		if(isset($_POST['fname']) && $_POST['fname'] !== ""){$fname = $_POST['fname'];}
		if(isset($_POST['lname']) && $_POST['lname'] !== ""){$lname = $_POST['lname'];}
		if(isset($_POST['pass1']) && $_POST['pass1'] !== ""){$pass1 = $_POST['pass1'];}
		if(isset($_POST['pass2']) && $_POST['pass2'] !== ""){$pass2 = $_POST['pass2'];}
		if(isset($_POST['register']))
		{

				if ($pass1===$pass2) {
		
				$sqlq1 = " SELECT * FROM user_reg_data WHERE Email='{$_SESSION['Email']}'";
				$resultsqlq1 = mysqli_query($conntodb,$sqlq1);
				if(mysqli_num_rows($resultsqlq1)==0)
				{
					echo "Error";
					//echo "<script>alert('This Email Is Already Registered');</script>";
					return false;
				} 
				elseif(mysqli_num_rows($resultsqlq1)==1)
				{
					$imgname=addslashes($_FILES["img"]["name"]);
					$array = array('jpg','jpeg');
					$ext =pathinfo($imgname,PATHINFO_EXTENSION);
					if(!empty($imgname)){
			  			if(in_array($ext, $array))
			  			{
			  				$imgdata=addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
			  				$filetype=addslashes($_FILES["img"]["type"]);
			  				$sqlq2 = "UPDATE user_reg_data SET First_Name = '$fname',Last_Name = '$lname',Password = '$pass1',Image_Name='$imgname',Image_Data='$imgdata' WHERE Email='{$_SESSION['Email']}' AND Id='{$_SESSION['Id']}'" ;
							$resultsqlq2 = mysqli_query($conntodb,$sqlq2);
							if ($resultsqlq2) {
								$timestamp = date("Y-m-d H:i:s");
								$status = 'Offline';
								$sqlq22 = "UPDATE user_status SET Status='$status',Logout_time=NOW() WHERE Id='{$_SESSION['Id']}' AND Logout_time=''";
								$resultsqlq22 = mysqli_query($conntodb,$sqlq22);
								if ($resultsqlq22) {
									session_destroy();
										ob_end_clean();
									header("location: user_login.php");
								}
								elseif (!$resultsqlq22) {
									echo "Could Not Log Out";
								}
							}
							else{
								echo "Mysql error : ".$sqlq2;
						  	}
			  			}
			  			else
			  			{
			  				echo "<script>alert('Unsupported Image File');</script>";
			  			}
					}
					else{
						echo "Please select the profile image";
					}
				}	

			}
			else
			{
				echo "<script>alert('Your Passwords Dont Match');</script>";
			}






		}
	?>
</body>
</html>