<!DOCTYPE html>
<html>
<head>
	<title>View Loggedin Students</title>
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
	<u><h1 class="panelf align-h">Admin Panel</h1></u>
	<u><h1 class="panelf align-h">Loggedin Students</h1></u>
	<?php
		require_once('../makeconnection.php');
		$sqlq24 = "SELECT * FROM user_status WHERE Status='Online'";
		$resultsqlq24 = mysqli_query($conntodb,$sqlq24);
		if(mysqli_num_rows($resultsqlq24)>0)
		{
			echo "<br>The Following People Are Online<br><br><br>";
			while ($row=mysqli_fetch_assoc($resultsqlq24)) {
				echo "<table><td><tr>Id :".$row["Id"]."</tr><br>"."<tr> Email :".$row["Email"]."</tr><br>"."<tr> Login_Time :".$row["Login_time"]."</tr><br>"."<tr> Status :".$row["Status"]."</tr><br></td></table><br><br>";
			}
		}
		elseif (mysqli_num_rows($resultsqlq24)<1) {
			echo "No One Is Online";
		}
	?>
	</center>
</body>
</html>