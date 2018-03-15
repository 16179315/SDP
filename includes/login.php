<?php

if (isset($_POST['submit'])) {
	
	$dbServerName = "sql11.freemysqlhosting.net:3306";
	$dbUsername = "sql11225471";
	$dbPassword = "cbgPE8apID";
	$dbName = "sql11225471";
	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	
	if(empty($email) || empty($password)) {
		header("Location: ../?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE uEmail = '$email';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../?login=no_user");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				$hashedPasswordCheck = password_verify($password, $row['uPassword']);
			}
			if ($hashedPasswordCheck == false) {
				header("Location: ../?login=error");
				exit();
			} elseif ($hashedPasswordCheck == true) {
				header("Location: ../?login=success");
				exit();
			}
		}
	}
	
} else {
	exit();
}


?>