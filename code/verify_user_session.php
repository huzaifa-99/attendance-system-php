<!DOCTYPE html>
<html>
<head>
	<title>Verify User Session</title>
</head>
<body>
<?php
if(!isset($_SESSION["Email"]) && empty($_SESSION["Email"])) {
   			header("Location: user_login.php");
		}
		if(!isset($_SESSION["Id"]) && empty($_SESSION["Id"])) {
		   header("Location: user_login.php");
		}
?>
</body>
</html>