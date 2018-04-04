<?php

session_start();
$emptyField = false;

if (isset($_POST['login'])) {
	
	include 'db.php';

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
			$_SESSION['noUserExists'] = true;
			header("Location: ../?login=no_user");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				$hashedPasswordCheck = password_verify($password, $row['uPassword']);
			}
			if ($hashedPasswordCheck == false) {
				$_SESSION['passwordIncorrect'] = true;
				header("Location: ../?login=error");
				exit();
			} elseif ($hashedPasswordCheck == true) {
				$_SESSION['uId'] = $row[uId];
				$_SESSION['uFirst'] = $row[uFirstName];
				$_SESSION['uLast'] = $row[uLastName];
				$_SESSION['uEmail'] = $row[uEmail];
				$_SESSION['loggedIn'] = true;
				$url = "../profile.php?uId=".$_SESSION['uId'];
				header("Location: ".$url);
				exit();
			}
		}
	}
	
} else {
	exit();
}


?>