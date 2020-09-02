<!DOCTYPE html>
<html>
<head>
	<title>Edit Atendence</title>

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
	<u><h1 class="panelf align-h">Edit Attendence</h1></u>
	<form method="post" action="">
		<input type="text" name="editid" id="editid" placeholder="Id" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="text" name="edittime" id="edittime" placeholder="Date" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="text" name="editattendence" id="editattendence" placeholder="Attendence ( Present / Absent / Leave ) " class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>	
		<input type="submit" name="uploadedit" id="uploadedit" value="Edit Attendence" class="panelf-50 align-t-50 btn btn-success col col-lg-10 col-xl-10 col-md-10 col-sm-10">
	</form>
	<?php
	require_once('../makeconnection.php');
	if(isset($_POST['editid']) && $_POST['editid']!==""){$editid = $_POST['editid'];}
	if (isset($_POST['edittime']) && $_POST['edittime']!=="") {$edittime=$_POST['edittime'];}
	if (isset($_POST['editattendence']) && $_POST['editattendence']!=="") {$editattendence=$_POST['editattendence'];}
	if (isset($_POST['uploadedit'])) 
	{
		$sqlq17 = "SELECT Id FROM user_reg_data WHERE Id = '$editid'";
		$resultsqlq17 = mysqli_query($conntodb,$sqlq17);
		if(mysqli_num_rows($resultsqlq17)>0)
		{
			$sqlq13 = "UPDATE user_attend SET Attendence = '$editattendence' WHERE Id='$editid' AND Timee='$edittime'";
			$resultsqlq13=mysqli_query($conntodb,$sqlq13);
			if($resultsqlq13)
			{
				echo "Attendence Updated";
			}
			elseif (!$resultsqlq13) {
				echo "The Record You Are Trying To Update Doesnot Exist";
			}
		}
		elseif (mysqli_num_rows($resultsqlq17)==0) {
			echo "The Id You Entered Is Not Registered To The Database";
		}
	}
	?>
</center>
</body>
</html>