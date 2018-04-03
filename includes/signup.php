<?php
session_start();
$_SESSION['errors'] = array();



if (isset($_POST['signup'])) {
	
	include 'db.php';
	
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
	header("Location: ..?signup=success");
	$_SESSION['accountCreated'] = true;
	exit();
} else {
	header("Location: ..?nosubmitbut");
	exit();
}

?>