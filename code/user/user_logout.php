<!DOCTYPE html>
<html>
<head>
	<title>User Logout</title>
</head>
<body>
		<?php
		require_once('../makeconnection.php');
		session_start();
		$timestamp = date("Y-m-d H:i:s");
		$status = 'Offline';
		$sqlq22 = "UPDATE user_status SET Status='$status',Logout_time=NOW() WHERE Id='{$_SESSION['Id']}' AND Logout_time=''";
		$resultsqlq22 = mysqli_query($conntodb,$sqlq22);
		if ($resultsqlq22) {
			session_destroy();
			header("Location: ../index.php");
		}
		elseif (!$resultsqlq22) {
			echo "Could Not Log Out";
		}
		?>
</body>
</html>