<?php
session_start();

if (isset($_POST['signup'])) {
	
	include 'db.php';
	if (!empty($_POST['firstName'])) {
		$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
		$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$passwordConfirm = mysqli_real_escape_string($conn, $_POST['passwordConfirm']);
		//Hashing password
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		//Create the user entry in the DB
		$sql = "INSERT INTO users(uFirstName, uLastName, uPassword, uEmail) VALUES ('$firstName', '$lastName', '$hashedPassword', '$email');";
		mysqli_query($conn, $sql);
		$sql2 = "SELECT uId from users WHERE uEmail = '$email';";
		$result = mysqli_query($conn, $sql2);
		$row = mysqli_fetch_assoc($result);
		$sql3 = "INSERT INTO userImage(uId, img) VALUES (".$row['uId'].", 'default.jpg');";
		mysqli_query($conn, $sql3);
		header("Location: ..?signupUser=success");
		$_SESSION['accountCreated'] = true;
		exit();
	}
	else {
		$firstName = mysqli_real_escape_string($conn, $_POST['companyName']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$passwordConfirm = mysqli_real_escape_string($conn, $_POST['passwordConfirm']);
		//Hashing password
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		//Create the user entry in the DB
		$sql = "INSERT INTO hotels(hName, password, email) VALUES ('$firstName', '$hashedPassword', '$email');";
		mysqli_query($conn, $sql);
		$sql2 = "SELECT hId from hotels WHERE email = '$email';";
		$result = mysqli_query($conn, $sql2);
		$row = mysqli_fetch_assoc($result);
		$sql3 = "INSERT INTO userImage(hId, hImg) VALUES (".$row['hId'].", 'default.jpg');";
		mysqli_query($conn, $sql3);
		header("Location: ..?signupHotel=success");
		$_SESSION['accountCreated'] = true;
		exit();
	}
	exit();
} else {
	header("Location: ..?nosubmitbut");
	exit();
}

?>