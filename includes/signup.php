<?php
session_start();
$_SESSION['errors'] = array();



if (isset($_POST['submit'])) {
	
	include 'db.php';
	
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$passwordConfirm = mysqli_real_escape_string($conn, $_POST['passwordConfirm']);
	$emptyField = false;
	
	//Validation
	
	//Not empty
	if(empty($_POST['firstName'])) {
		array_push($_SESSION["errors"], "You have not completed the first name field.");
		$emptyField = true;
	}
	if(empty($_POST['lastName'])) {
		array_push($_SESSION["errors"], "You have not completed the last name field.");
		$emptyField = true;
	}

	if(empty($_POST['email'])) {
		array_push($_SESSION["errors"],"You have not completed the email field.");
		$emptyField = true;
	}
	if(empty($_POST['password'])) {
		array_push($_SESSION["errors"],"You have not completed the password field.");
		$emptyField = true;
	}
	if ($emptyField) {
		header("Location: ../?emptyField");
		exit();
	}
	else {
		//First and last name correct
		if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
			array_push($_SESSION["errors"],"Your first or last name is not valid, please only enter alphabetical characters.");
			header("Location: ../?signup=invalid");
			exit();
		} else {
			//Email valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				array_push($_SESSION["errors"],"Your email is not valid. Please only enter a valid email.");
				header("Location: ../?signup=invalid");
				exit();
			} else {
				if (strcmp($password, $passwordConfirm) != 0) {
					array_push($_SESSION["errors"],"Your passwords do not match.");
					header("Location: ../?signup=invalid");
					exit();
				}
		        else {
					//Hashing password
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				//Create the user entry in the DB
				$sql = "INSERT INTO users(uFirstName, uLastName, uPassword, uEmail) VALUES ('$firstName', '$lastName', '$hashedPassword', '$email');";
				mysqli_query($conn, $sql);
				header("Location: ..?signup=success");
				$_SESSION['accountCreated'] = true;
				exit();
				}
			}
		}
	}
	
} else {
	exit();
}

?>