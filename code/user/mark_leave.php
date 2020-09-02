<!DOCTYPE html>
<html>
<head>
	<title>Mark Leave</title>

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
<u><h1 class="panelf align-h">Mark Leave</h1></u><br>
<form action="" method="post">
	<input type="text" name="reasonforleave" id="reasonforleave" placeholder="Reason For Leave" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
	<input type="submit" name="submitreasonlforleave" id="submitreasonlforleave" value="Submit Leave" class="panelf-50 align-t-50 btn btn-primary col col-lg-10 col-xl-10 col-md-10 col-sm-10">
</form>
<?php
	$leave='Leave';
	date_default_timezone_set('Asia/Karachi');
	$timee= date('Y-m-d');
	$sqlq6 = "SELECT Timee FROM user_attend WHERE Timee='$timee' AND Email='{$_SESSION['Email']}'";
	$resultsqlq6  = mysqli_query($conntodb,$sqlq6);
	if (mysqli_num_rows($resultsqlq6)==0) {
		$sqlq26 = "SELECT Timee FROM user_leave WHERE Timee='$timee' AND Email='{$_SESSION['Email']}'";
		$resultsqlq26 = mysqli_query($conntodb,$sqlq26);
		if(mysqli_num_rows($resultsqlq26)>0)
		{
			echo "You Have Already Applied For Leave Today";	
		}
		elseif (mysqli_num_rows($resultsqlq26)==0) {

					if(isset($_POST['reasonforleave']) && $_POST['reasonforleave']!==""){$reasonforleave=$_POST['reasonforleave'];}
					if(isset($_POST['submitreasonlforleave']))
					{
					$sqlq7 = "INSERT INTO user_leave (Id,Email,Password,Attendence_Status,Timee,Reason) VALUES ('{$_SESSION['Id']}','{$_SESSION['Email']}','{$_SESSION['Password']}','$leave','$timee','$reasonforleave')";
					$resultsqlq7 = mysqli_query($conntodb,$sqlq7);
					if($resultsqlq7)
					{
						echo "Today's Leave Marked";
						return true;
					}
					else{
						echo "My_Sql Error : ".$sqlq7;
					}
					}


		}
	}
	elseif (mysqli_num_rows($resultsqlq6)==1) {
		$present='Present';
		$sqlq8 = "SELECT Attendence FROM user_attend WHERE Timee='$timee' AND Email='{$_SESSION['Email']}' AND Attendence='$present'";
		$resultsqlq8 = mysqli_query($conntodb,$sqlq8);
		if (mysqli_num_rows($resultsqlq8)==0) {
			echo "Today's Leave Marked";
			//echo "<script>alert('You Have Already Leaved Today');</script>";
			return false;
		}
		elseif (mysqli_num_rows($resultsqlq8)==1) {
			echo "<script>alert('You Are Already Present Today')</script>";
			//header('Location: user_services.php');
			//echo "<script>alert('You Are Already Present Today');</script>";
			return false;
		}
		
	}
?>
</center>
</body>
</html>
