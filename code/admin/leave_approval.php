<!DOCTYPE html>
<html>
<head>
	<title>Leave Approval</title>
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
	<u><h1 class="panelf align-h">Leave Approval</h1></u>
	<?php
	require_once('../makeconnection.php');
	$sqlq27 = "SELECT * FROM user_leave";
	$resultsqlq27 = mysqli_query($conntodb,$sqlq27);
	if(mysqli_num_rows($resultsqlq27)==0)
	{
		echo " Note : No Leave Messages Are Left For Approval";
	}
	elseif (mysqli_num_rows($resultsqlq27)>0) {
		while ($row = mysqli_fetch_assoc($resultsqlq27)) {
			echo "<table><td><tr>Id ".$row["Id"]."</tr><tr> With Email ".$row["Email"]."</tr><tr> Wanted ".$row["Attendence_Status"]."</tr><tr> on ".$row["Timee"].".</tr><tr> the Reason submitted was ( ".$row["Reason"]." ).</tr></td></table>";
		}
	}
	?>
	<form action="" method="post">
		<input type="text" name="leaveapproveid" id="leaveapproveid" placeholder="Id" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="text" name="leaveapprovetime" id="leaveapprovetime" placeholder="Date" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="submit" name="leaveapprovesubmit" id="leaveapprovesubmit" value="Approve Leave" class="panelf-50 align-t-50 btn btn-success col col-lg-10 col-xl-10 col-md-10 col-sm-10">
	</form>
	<?php
	if (isset($_POST['leaveapproveid']) && $_POST['leaveapproveid']!=="") {$leaveapproveid = $_POST['leaveapproveid'];}
	if (isset($_POST['leaveapprovetime']) && $_POST['leaveapprovetime']!=="") {$leaveapprovetime = $_POST['leaveapprovetime'];}
	if (isset($_POST['leaveapprovesubmit'])) {
			$sqlq28 = "SELECT * FROM user_leave WHERE Id='$leaveapproveid' AND Timee='$leaveapprovetime'";
			$resultsqlq28 = mysqli_query($conntodb,$sqlq28);
			if (mysqli_num_rows($resultsqlq28)==0) {
				echo "The Id/Date You Entered Didnot Apply For A leave";
			}
			elseif (mysqli_num_rows($resultsqlq28)>0) {
				$row = mysqli_fetch_assoc($resultsqlq28);
				$leaveapproveemail = $row["Email"];
				$leaveapprovepassword = $row["Password"];
				$sqlq29 = "DELETE FROM user_leave WHERE Id='$leaveapproveid' AND Timee='$leaveapprovetime'";
				$resultsqlq29 = mysqli_query($conntodb,$sqlq29);
				if (!$resultsqlq29) {
					echo "could not delete record from user_leave";
				}
				elseif ($resultsqlq29) {
					$leave='leave';
					$sqlq30 = "INSERT INTO user_attend (Id,Email,Password,Attendence,Timee) VALUES ('$leaveapproveid','$leaveapproveemail','$leaveapprovepassword','$leave','$leaveapprovetime')";
					$resultsqlq30 = mysqli_query($conntodb,$sqlq30);
					if (!$resultsqlq30) {
						echo "Could not leave into user_attend table";
					}
					elseif ($resultsqlq30) {
						echo "The Id Has Been Approved For Leave";
					}
				}
			}
	/*
		$sqlq28 = "DELETE FROM user_leave WHERE Id='$leaveapproveid' AND Timee='$leaveapprovetime'";
		$resultsqlq28 = mysqli_query($conntodb,$sqlq28);
		if(!$resultsqlq28){
			echo "error1";
			echo "The Id You Entered could not be approved for leave".$sqlq28;
		}
		elseif ($resultsqlq28) {
			$sqlq30 = "SELECT *  FROM user_attend WHERE Id='$leaveapproveid'";
			$resultsqlq30 = mysqli_query($conntodb,$sqlq30);
			if (mysqli_num_rows($resultsqlq30)==0) {
				echo "The Id You Entered Doesnot Exist In The Database";
			}
			elseif (mysqli_num_rows($resultsqlq30)>0)
			{
				$row=mysqli_fetch_assoc($resultsqlq30);
				$leaveapproveemail=$row["Email"];
				$leaveapprovepassword=$row["leaveapprovepassword"];
				$leave='Leave';
						$sqlq31 = "SELECT * FROM user_attend WHERE Id='$leaveapproveid' AND Timee='$leaveapprovetime'";
						$resultsqlq31 = mysqli_query($conntodb,$sqlq31);
						if (mysqli_num_rows($resultsqlq31)>0) {
							echo "This Id Has Already Been Approved";
						}
						elseif (mysqli_num_rows($resultsqlq31)==0) {
							$sqlq29 = "INSERT INTO user_attend (Id,Email,Password,Attendence,Timee) VALUES ('$leaveapproveid','$leaveapproveemail','$leaveapprovepassword','$leave','$leaveapprovetime')";
							$resultsqlq29 = mysqli_query($conntodb,$sqlq29);
							if(!$resultsqlq29)
							{
								echo "could not upload leave to user_attend table";
							}
							elseif ($resultsqlq29) {
								echo "The Id You Entered Has Been Approved For Leave";
							}
						}
			}
		}
	*/}
	?>
	</center>
</body>
</html>