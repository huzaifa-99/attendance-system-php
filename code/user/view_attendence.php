<!DOCTYPE html>
<html>
<head>
	<title>View Attendence</title>

	<!--Bootstrap Link-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!--External CSS start-->
	<link rel="stylesheet" type="text/css" href="../style.css">
	<!--CSS end-->

	<!--External Js start-->
	<script type="text/javascript" src="script.js"></script>
	<!--CSS end-->

	<style type="text/css">
		td
		{
			border: 1px solid #000;
			padding:0px 10px 0px 10px;
			text-align: center; 
		}
	</style>

</head>
<body>
<center>
	<?php
		require_once('../makeconnection.php');
		session_start();
		require_once('../verify_user_session.php');
		require_once('display_user_profile_pic.php');
	?>
	<u><h1 class="panelf align-h">View Attendence</h1></u>
	<?php
		$sqlq9 = "SELECT Attendence,Timee FROM user_attend WHERE Email='{$_SESSION['Email']}' ORDER BY Timee ASC";
		$resultsqlq9 = mysqli_query($conntodb,$sqlq9);
		if ($resultsqlq9) {
			echo "<table>Your Attendence<br>";
			while ($row = mysqli_fetch_assoc($resultsqlq9)) {
				echo "<tr><td>You Were </td><td>".$row["Attendence"]."</td><td> on </td><td>".$row["Timee"]."</td></tr>";
			}
			echo "</table>";
		}
		else
		{
			echo "My_Sql Error : ".$sqlq9;
		}
	?>
</center>
</body>
</html>
