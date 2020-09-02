<?php
require_once('../makeconnection.php');/*yahan py aik logout wala system krna hai*/
$sqlq31 = "SELECT * FROM user_reg_data WHERE Id='{$_SESSION['Id']}'";
$resultsqlq31 = mysqli_query($conntodb,$sqlq31);
if($resultsqlq31)
{
	while($row=mysqli_fetch_array($resultsqlq31)){
	echo '<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top"><ul class="navbar-nav">
		  	<span class="navbar-text"><strong>Attendence System</strong></span><span class="navbar-text">'.$row['Email'].'</span><img src="data:image/jpeg;base64,'.base64_encode($row['Image_Data']).'" class="img-thumbnail" style="height:40px;width:40px;"></ul>
	</nav>';
}
}
elseif (!$resultsqlq31) {
	echo "Could Not Display Profile Pic";
}
?>