<!DOCTYPE html>
<html>
<head>
	<title>Delete Attendence</title>

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
	<u><h1 class="panelf align-h">Delete Attendence</h1></u>
	<form method="post" action="">
		<input type="text" name="deleteid" id="deleteid" placeholder="Id" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="text" name="deletetime" id="deletetime" placeholder="Date" class="panelf-50 col col-lg-10 col-xl-10 col-md-10 col-sm-10 form-control" required>
		<input type="submit" name="uploaddelete" id="uploaddelete" value="Delete Attendence" class="panelf-50 align-t-50 btn btn-success col col-lg-10 col-xl-10 col-md-10 col-sm-10">
	</form>
	<?php
	require_once('../makeconnection.php');
	if(isset($_POST['deleteid']) && $_POST['deleteid']!==""){$deleteid = $_POST['deleteid'];}
		if (isset($_POST['deletetime']) && $_POST['deletetime']!=="") {$deletetime=$_POST['deletetime'];}
	if (isset($_POST['uploaddelete'])) {
		$sqlq17 = "SELECT Id FROM user_reg_data WHERE Id = '$deleteid'";
		$resultsqlq17 = mysqli_query($conntodb,$sqlq17);
		if(mysqli_num_rows($resultsqlq17)>0)
		{
			$sqlq18 = "SELECT Timee FROM user_attend WHERE Timee='$deletetime'";
			$resultsqlq18 = mysqli_query($conntodb,$sqlq18);
			if (mysqli_num_rows($resultsqlq18)>0) {
				$sqlq19 = "DELETE FROM user_attend WHERE Id='$deleteid' AND Timee='$deletetime'";
				$resultsqlq19 = mysqli_query($conntodb,$sqlq19);
				if ($resultsqlq19) {
					echo "Attendence Record Deleted";
				}
				elseif (!$resultsqlq19) {
					echo "Count Not Delete Record";
					echo "Mysql Error : ".$sqlq19;
				}
			}
			elseif (mysqli_num_rows($resultsqlq18)==0) {
				echo "The Attendence Date You Are Trying To Delete Does Not Exist In The Database";
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