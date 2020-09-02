<!DOCTYPE html>
<html>
<head>
	<title>Generate Full Report showing attendence</title>

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
	<u><h1 class="panelf align-h">Admin Panel</h1></u>
	<u><h1 class="panelf align-h">Generate Full System Report</h1></u>
	<form method="post" action="">
		<input type="text" name="fromdate" id="fromdate" placeholder="Generate Report From Date" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="text" name="todate" id="todate" placeholder="Generate Report To Date" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="submit" name="generate" id="generate" value="Generate Report" class="panelf-50 align-t-50 btn btn-success col col-lg-10 col-xl-10 col-md-10 col-sm-10">
	</form><br><br>
	<?php
	require_once('../makeconnection.php');
	if( isset($_POST['fromdate']) && $_POST['fromdate'] !== ""){$fromdate = $_POST['fromdate'];}
	if( isset($_POST['todate']) && $_POST['todate'] !== ""){$todate = $_POST['todate'];}
	if (isset($_POST['generate'])) {
		$sqlq12 = "SELECT * From user_attend WHERE Timee >='$fromdate' AND Timee <='$todate' ORDER BY Timee ASC";
		$resultsqlq12 = mysqli_query($conntodb,$sqlq12);
		if(mysqli_num_rows($resultsqlq12)>0)
		{
			echo "<table>Full Attendence Report";
			while ($row = mysqli_fetch_assoc($resultsqlq12)) {
				echo "<tr><td>User Id</td><td>".$row["Id"]."</td><td> Was </td><td>".$row["Attendence"]."</td><td> on </td><td>".$row["Timee"]."</td></tr>";
			}
			echo "</table><br><br><br><br><br>";
			return true;
		}
		elseif (mysqli_num_rows($resultsqlq12)<0) {
			echo "No Data Found From Database<br>";
			return false;
		}
	}
	?>
	</center>
</body>
</html>