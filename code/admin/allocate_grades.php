<!DOCTYPE html>
<html>
<head>
	<title>Allocate Grades</title>

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
	<u><h1 class="panelf align-h">Allocate Grades</h1></u>
	<form action="" method="post">
		<input type="text" name="gradeid" id="gradeid" placeholder="Enter Id" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="submit" name="generategrade" id="generategrade" value="Generate Grade" class="panelf-50 align-t-50 btn btn-success col col-lg-10 col-xl-10 col-md-10 col-sm-10">
	</form>
	<br><br>
	<?php
	require_once('../makeconnection.php');
	if (isset($_POST['gradeid']) && $_POST['gradeid']!=="") { $gradeid = $_POST['gradeid'];}
	if (isset($_POST['generategrade'])) {
	$totalattendence="";
	$sqlq20 = "SELECT Timee FROM user_attend WHERE Id='$gradeid' AND Attendence='Present'";
	$resultsqlq20 = mysqli_query($conntodb,$sqlq20);
		if (mysqli_num_rows($resultsqlq20)>25) {
			/*a*/
			echo "<h3>User Id ".$gradeid." Has grade A </h3>";
		}
		elseif (mysqli_num_rows($resultsqlq20)>19 && mysqli_num_rows($resultsqlq20)<26) {
			/*b*/
			echo "<h3>User Id ".$gradeid." Has grade B </h3>";
		}
		elseif (mysqli_num_rows($resultsqlq20)>13 && mysqli_num_rows($resultsqlq20)<20) {
			/*c*/
			echo "<h3>User Id ".$gradeid." Has grade C </h3>";
		}
		elseif (mysqli_num_rows($resultsqlq20)>8  && mysqli_num_rows($resultsqlq20)<14) {
			/*d*/
			echo "<h3>User Id ".$gradeid." Has grade D </h3>";
		}
		elseif (mysqli_num_rows($resultsqlq20)>0 && mysqli_num_rows($resultsqlq20)<9) {
			/*f*/
			echo "<h3>User Id ".$gradeid." Has grade F </h3>";
		}
		elseif (mysqli_num_rows($resultsqlq20)==0) {
			/*f*/
			echo "<h3>The ID You Entered Is Not Registered </h3>";
		}
	}
	?>
</center>
</body>
</html>