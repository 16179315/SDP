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
		$sql = "INSERT INTO users(uFirstName, uPassword, uEmail, uHotel) VALUES ('$firstName', '$hashedPassword', '$email', 1);";
		mysqli_query($conn, $sql);
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