<?php
    if (isset($_POST["submit"])) {
        $dbServerName = "sql11.freemysqlhosting.net:3306";
        $dbUsername = "sql11225471";
        $dbPassword = "cbgPE8apID";
        $dbName = "sql11225471";
        $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $sql = "SELECT * FROM users WHERE uEmail = '$email';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../?no_user_exists_with_that_email");
			exit();
		} else {
            $token = bin2hex(openssl_random_pseudo_bytes(256));
            //send email with URL

            $conn->query("UPDATE users SET token='$token' WHERE uEmail='$email'");

        }

    }