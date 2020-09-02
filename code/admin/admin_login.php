<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<!--Bootstrap Link-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!--External CSS start-->
	<link rel="stylesheet" type="text/css" href="../style.css">
	<!--CSS end-->
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
		  <ul class="navbar-nav">
		  	<span class="navbar-text"><strong>Attendence System</strong></span>
		  </ul>
	</nav>
<center>
	<u><h1 class="panelf align-h">Admin Login</h1></u>
	<form method="post" action="">
		<input type="email" name="loginemail" id="loginemail" placeholder="Email" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="password" name="loginpass" id="loginpass" placeholder="Password" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="submit" name="login" id="login" value="Login" class="panelf-50 align-t-50 btn btn-success col col-lg-10 col-xl-10 col-md-10 col-sm-10">
	</form>
	<?php
	require_once('../makeconnection.php');
		if(isset($_POST['loginemail']) && $_POST['loginemail'] !== ""){$loginemail = $_POST['loginemail'];}
		if(isset($_POST['loginpass']) && $_POST['loginpass'] !== ""){$loginpass = $_POST['loginpass'];}
		if(isset($_POST['login']))
		{
			$sqlq10 = "SELECT Id,Email,Password FROM admin_reg_data WHERE Email='$loginemail' AND Password='$loginpass'";
			$resultsqlq10 = mysqli_query($conntodb,$sqlq10);
			if (mysqli_num_rows($resultsqlq10)==1) {
				session_start();
				$row1 = mysqli_fetch_assoc($resultsqlq10);
				$_SESSION['Id']=$row1["Id"];
				$_SESSION['Email']=$loginemail;
				$_SESSION['Password']=$loginpass;
				header("location: admin_services.php");
			}
			else{
				echo "<script>alert('Wrong Password Or Email');</script>";
				return false;
			}
		}
	?>
</center>
</body>
</html>