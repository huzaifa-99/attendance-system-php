<!DOCTYPE html>
<html>
<head>
	<title>Add Atendence</title>

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
	<u><h1 class="panelf align-h">Add Attendence</h1></u>
	<form method="post" action="">
		<input type="text" name="addid" id="addid" placeholder="Id" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="text" name="addtime" id="addtime" placeholder="Date" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="text" name="addattendence" id="addattendence" placeholder="Attendence ( Present / Absent / Leave )" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>	
		<input type="submit" name="uploadadd" id="uploadadd" value="Add Attendence" class="panelf-50 align-t-50 btn btn-success col col-lg-10 col-xl-10 col-md-10 col-sm-10">
	</form>
	<?php
		require_once('../makeconnection.php');
		if(isset($_POST['addid']) && $_POST['addid']!==""){$addid = $_POST['addid'];}
		if (isset($_POST['addattendence']) && $_POST['addattendence']!=="") {$addattendence=$_POST['addattendence'];}
		if (isset($_POST['addtime']) && $_POST['addtime']!=="") {$addtime=$_POST['addtime'];}
		if (isset($_POST['uploadadd'])) {
			$sqlq14 = "SELECT * FROM user_attend WHERE Timee='$addtime' AND Id='$addid'";
			$resultsqlq14 = mysqli_query($conntodb,$sqlq14);
			if (mysqli_num_rows($resultsqlq14)==1) {
				echo "This Attendence Is Already In Record";
			}
			elseif (mysqli_num_rows($resultsqlq14)==0) {
				$sqlq15 = "SELECT Email,Password FROM user_reg_data WHERE Id='$addid'";
				$resultsqlq15 = mysqli_query($conntodb,$sqlq15);
				if(mysqli_num_rows($resultsqlq15)>0)
				{
					$row = mysqli_fetch_assoc($resultsqlq15);
					$rowemail = $row["Email"];
					$rowpassword = $row["Password"];
					$sqlq16 ="INSERT INTO user_attend (Id,Email,Password,Attendence,Timee) VALUES ('$addid','$rowemail','$rowpassword','$addattendence','$addtime')";
					$resultsqlq16 = mysqli_query($conntodb,$sqlq16);
					if ($resultsqlq16) {
						echo "Attendence Added";
					}
					elseif (!$resultsqlq16) {
						echo "Could Not Add Attendence";
					}
				}
				elseif (mysqli_num_rows($resultsqlq15)==0) {
					echo "The Id Number You Entered Is Not Registered";
				}
			}
			elseif (mysqli_num_rows($resultsqlq14)>0) {
				echo "Many Attendence Of The Entered Date Were Found";
			}
		}
		?>
		</center>
</body>
</html>