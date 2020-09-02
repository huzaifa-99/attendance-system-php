<!DOCTYPE html>
<html>
<head>
	<title>Mark Attendence</title>

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
		require_once('display_user_profile_pic.php');
	?>
	<u><h1 class="panelf align-h">Mark Attendence</h1></u>
<?php
	require_once('../makeconnection.php');
	$attendence='Present';
	date_default_timezone_set('Asia/Karachi'); // CDT
	$timee = date('Y-m-d');
	require_once('display_user_profile_pic.php');
	$sqlq4 = "SELECT Timee FROM user_attend WHERE Timee='$timee' AND Email='{$_SESSION['Email']}'";
	$resultsqlq4 = mysqli_query($conntodb,$sqlq4);
	if (mysqli_num_rows($resultsqlq4)==0) {
				$sqlq25 = "SELECT Timee FROM user_leave WHERE Timee='$timee' AND Email='{$_SESSION['Email']}'";
				$resultsqlq25=mysqli_query($conntodb,$sqlq25);
				if (mysqli_num_rows($resultsqlq25)>0) {
					echo "You Have Already Applied For Leave Today";
				}
				elseif (mysqli_num_rows($resultsqlq25)==0) {

						$sqlq5 = "INSERT INTO user_attend (Id,Email,Password,Attendence,Timee) VALUES ('{$_SESSION['Id']}','{$_SESSION['Email']}','{$_SESSION['Password']}','$attendence','$timee')";
						$resultsqlq5 = mysqli_query($conntodb,$sqlq5);
						if($resultsqlq5)
			  			{
			  				echo "Today's Attendence Marked";
			  				return true;
			  			}
			  			else
			  			{
							echo "Mysql error : ".$sqlq5;
			  			}
			  	}	


	}
	elseif (mysqli_num_rows($resultsqlq4)==1)
	{
		echo "Today's Attendence Marked";
		echo "<script>alert('You Have Already Attended Today');</script>";
		return false;
	}

	
?>
	
</center>
</body>
</html>
