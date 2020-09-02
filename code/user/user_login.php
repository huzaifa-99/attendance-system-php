<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>

	<!--Bootstrap Link-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!--External CSS start-->
	<link rel="stylesheet" type="text/css" href="../style.css">
	<!--CSS end-->

</head>
<body>
<center>
	<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
		  <ul class="navbar-nav">
		  	<span class="navbar-text"><strong>Attendence System</strong></span>
		  </ul>
	</nav>
	<u><h1 class="panelf align-h">User Login</h1></u>
	<form class="panelf" method="post" action="">
		<input type="email" name="loginemail" id="loginemail" placeholder="Email" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required><br>
		<input type="password" name="loginpass" id="loginpass" placeholder="Password" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required><br>
		<input type="submit" name="login" id="login" value="Login" class="panelf-50 align-t-50 btn btn-primary col col-lg-10 col-xl-10 col-md-10 col-sm-10">
	</form>
	<?php
			require_once('../makeconnection.php');
			//this 0x1
			//to this 0x1
		if(isset($_POST['loginemail']) && $_POST['loginemail'] !== ""){$loginemail = $_POST['loginemail'];}
		if(isset($_POST['loginpass']) && $_POST['loginpass'] !== ""){$loginpass = $_POST['loginpass'];}
		if(isset($_POST['login']))
		{
			//0x1 block was here first but it was not logging the user off whenever this very page was reloaded
			/*if user is already online then first log him off*/
			session_start();
			if(isset($_SESSION["Email"]))
			{
			$status2 = 'Online';
			$sqlq23 = "SELECT Status FROM user_status WHERE Id='{$_SESSION['Id']}' AND Logout_time='' AND Status='$status2'";
			$resultsqlq23 = mysqli_query($conntodb,$sqlq23);
			if (mysqli_num_rows($resultsqlq23)==1) {
				$status3 = 'Offline';
				$sqlq23 = "UPDATE user_status SET Status='$status3',Logout_time=NOW() WHERE Id='{$_SESSION['Id']}' AND Logout_time=''";
				$resultsqlq23 = mysqli_query($conntodb,$sqlq23);
				if ($resultsqlq23) {
					session_destroy();
				}
				elseif (!$resultsqlq23) {
					header("Location: couldnotmakeuseroffline.php");
				}
			}
			elseif (mysqli_num_rows($resultsqlq23)>0) {
				header("Location .manyonlinestatusfound.php");
			}
			}
			/*now log him in again*/

			$sqlq3 = "SELECT Id,Email,Password FROM user_reg_data WHERE Email='$loginemail' AND Password='$loginpass'";
			$resultsqlq3 = mysqli_query($conntodb,$sqlq3);
			if (mysqli_num_rows($resultsqlq3)==1) {
				session_start();
				$row1 = mysqli_fetch_assoc($resultsqlq3);
				$_SESSION['Id']=$row1["Id"];
				$_SESSION['Email']=$loginemail;
				$_SESSION['Password']=$loginpass;
				$status1='Online';
				$sqlq21 = "INSERT INTO user_status (Id,Email,Password,Login_time,Status) VALUES ('{$_SESSION['Id']}','{$_SESSION['Email']}','{$_SESSION['Password']}',NOW(),'$status1')";
				$resultsqlq21 = mysqli_query($conntodb,$sqlq21);
				if ($resultsqlq21) {
					header("location: user_services.php");
				}
				elseif (!$resultsqlq21) {
					# code...
				}
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