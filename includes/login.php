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
		$sqlUser = "SELECT * FROM users WHERE uEmail = '$email';";
		$sqlHotel = "SELECT * FROM hotels WHERE email = '$email';";
		$resultUser = mysqli_query($conn, $sqlUser);
		$resultCheckUser = mysqli_num_rows($resultUser);
		$resultHotel = mysqli_query($conn, $sqlHotel);
		$resultCheckHotel = mysqli_num_rows($resultHotel);
		if ($resultCheckUser < 1 && $resultCheckHotel < 1) {
			// no user exists
			$_SESSION['noUserExists'] = true;
			header("Location: ../?login=no_user");
			exit();
		} else {
			if ($resultCheckHotel == 1) {
				if ($row = mysqli_fetch_assoc($resultHotel)) {
					// user exists
					$hashedPasswordCheck = password_verify($password, $row['password']);
				}
			}
			if ($resultCheckUser == 1) {
				if ($row = mysqli_fetch_assoc($resultUser)) {
					// user exists
					$hashedPasswordCheck = password_verify($password, $row['uPassword']);
				}
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