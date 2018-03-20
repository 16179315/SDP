<?php



if (isset($_POST['submit'])) {
	
	$dbServerName = "sql11.freemysqlhosting.net:3306";
	$dbUsername = "sql11225471";
	$dbPassword = "cbgPE8apID";
	$dbName = "sql11225471";
	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
	
	
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	//Validation
	
	//Not empty
	if(empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
		header("Location: ../?signup=empty");
		exit();
	} else {
		//First and last name correct
		if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
			header("Location: ../?signup=invalid");
			exit();
		} else {
			//Email valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../?signup=invalid");
				exit();
			} else {
				//Hashing password
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				//Create the user entry in the DB
				$sql = "INSERT INTO users(uFirstName, uLastName, uPassword, uEmail) VALUES ('$firstName', '$lastName', '$hashedPassword', '$email');";
				mysqli_query($conn, $sql);
				header("Location: ..?signup=success");
				exit();
			}
		}
	}
	
} else {
	exit();
}

?>