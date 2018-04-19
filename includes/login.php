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
		$resultUser = mysqli_query($conn, $sqlUser);
		$resultCheckUser = mysqli_num_rows($resultUser);
		$sqlHotel = "SELECT * FROM hotels WHERE email = '$email';";
		$resultHotel = mysqli_query($conn, $sqlHotel);
		$resultCheckHotel = mysqli_num_rows($resultHotel);
		if ($resultCheckUser < 1 && $resultCheckHotel < 1) {
			$_SESSION['noUserExists'] = true;
			header("Location: ../?login=no_userUser");
			exit();
		}
		else if ($resultCheckHotel < 1) {
			$row = mysqli_fetch_assoc($resultUser);
			$hashedPasswordCheck = password_verify($password, $row['uPassword']);
			if ($hashedPasswordCheck == false) {
				$_SESSION['passwordIncorrect'] = true;
				header("Location: ../?loginUserPassword=error");
				exit();
			} elseif ($hashedPasswordCheck == true) {
				$sql0 = "SELECT * FROM bannedUsers WHERE uId = ".$row[uId]."";
				$result0 = mysqli_query($conn, $sql0);
				$row0 = mysqli_fetch_assoc($result0);
				$currDate = date("Y-m-d");
				if (mysqli_num_rows($result0) > 0 && $row0['dateEnd'] > $currDate) {
					$_SESSION['userBanned'] = true;
					header("Location: ../?userBanned");
					exit();
				}
				else {
				$_SESSION['uId'] = $row[uId];
				$_SESSION['uFirst'] = $row[uFirstName];
				$_SESSION['userLoggedIn'] = true;
				$url = "../homepage.php";
				header("Location: ".$url);
				exit();
			}
			}
		}
		if ($resultCheckHotel < 1) {
			$_SESSION['noUserExists'] = true;
			header("Location: ../?login=no_hotel");
			exit();
		}
		else {
			$row = mysqli_fetch_assoc($resultHotel);
			$hashedPasswordCheck = password_verify($password, $row['password']);
			if ($hashedPasswordCheck == false) {
				$_SESSION['passwordIncorrect'] = true;
				header("Location: ../?loginHotelPassword=error");
				exit();
			} elseif ($hashedPasswordCheck == true) {
				$_SESSION['hId'] = $row[hId];
				$_SESSION['hotelLoggedIn'] = true;
				$url = "../hotel.php?hId=".$_SESSION['hId'];
				header("Location: ".$url);
				exit();
			}
		}
	}
	
} else {
	exit();
}


?>