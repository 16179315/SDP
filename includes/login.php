<?php

session_start();
$emptyField = false;

if (isset($_POST['submit'])) {
	
	$dbServerName = "sql2.freemysqlhosting.net:3306";
	$dbUsername = "sql2228932";
	$dbPassword = "rQ8*iQ8!";
	$dbName = "sql2228932";
	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	
	if(empty($email)) {
		$_SESSION['emailEmpty'] = true;
		$emptyField = true;
	}
	if (empty($password)) {
		$_SESSION['passwordEmpty'] = true;
		$emptyField = true;
	}
	if ($emptyField) {
		header("Location: ../?emptyFields");
		exit();
	}
	else {
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
				$_SESSION['uId'] = $row[uId];
				$_SESSION['uFirst'] = $row[uFirstName];
				$_SESSION['uLast'] = $row[uLastName];
				$_SESSION['uEmail'] = $row[uEmail];
				$_SESSION['loggedIn'] = true;
				header("Location: ../profile.php");
				exit();
			}
		}
	}
	
} else {
	exit();
}


?>