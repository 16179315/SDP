<?php
if (isset($_POST['submit'])) {
	
	$dbServerName = "sql11.freemysqlhosting.net:3306";
	$dbUsername = "sql11225471";
	$dbPassword = "cbgPE8apID";
	$dbName = "sql11225471";
	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
	
	$skills=mysqli_real_escape_string($conn, $_POST['skills']);

	if (empty($skills)) {
		# code...
		header("Location: ../?content=empty");
		exit();
	} else {
		if (!preg_match("/^[a-zA-Z0-9]*$/", $firstName)) {
			header("Location: ../?content=invalid");
			exit();
		} else {
			$sql="UPDATE "
		}
	}
?>