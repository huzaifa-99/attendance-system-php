<?php
$conntodb = mysqli_connect("localhost","root","");
mysqli_select_db($conntodb,'attendence_system_php');
if(!$conntodb)
{
	echo "Database Connection Failed";
}
?>