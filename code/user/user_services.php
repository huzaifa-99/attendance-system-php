<!DOCTYPE html>
<html>
<head>
	<title>User Services</title>

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
	require_once('display_user_profile_pic.php');
	?>
	<u><h1 class="panelf align-h">User Services</h1></u>
	<a href="mark_attendence.php"><button class="panelf align-t btn btn-primary col col-lg-4 col-xl-3 col-md-12 col-sm-12">Mark<br>Attendence</button></a>
	<a href="mark_leave.php"><button class="panelf align-t btn btn-primary col col-lg-4 col-xl-3 col-md-12 col-sm-12">Mark<br>Leave</button></a>
	<a href="view_attendence.php"><button class="panelf align-t btn btn-primary col col-lg-4 col-xl-3 col-md-12 col-sm-12">View<br>Attendence</button></a>
	<a href="update_registeration_info.php"><button class="panelf-50-25 align-t-50 btn btn-primary col col-lg-12 col-xl-9 col-md-12 col-sm-12">Update Registeration Info</button></a><br>
	<a href="user_logout.php"><button class="panelf-50-25 align-t-50 btn btn-primary col col-lg-12 col-xl-9 col-md-12 col-sm-12">Logout</button></a><br><br>
</center>
</body>
</html>