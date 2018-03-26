<?php
    if (isset($_GET["email"]) && isset($_GET["token"])) {
        $dbServerName = "sql2.freemysqlhosting.net:3306";
        $dbUsername = "sql2228932";
        $dbPassword = "rQ8*iQ8!";
        $dbName = "sql2228932";
        $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

        $email = mysqli_real_escape_string($conn, $_GET["email"]);
        $token = mysqli_real_escape_string($conn, $_GET["token"]);

        $sql = "SELECT uId FROM users WHERE uEmail = '$email' AND token='$token';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../?invalidTokenOrEmail");
            exit();
		} else {
            $a = "qwertyuiopasdfghjklzxcvbnm";
            $a = str_shuffle($a);
            $a = substr($a, 0, 5);
            $password = sha1($a);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET uPassword='$hashedPassword', token='' WHERE uEmail='$email';";
            mysqli_query($conn, $sql);

            echo "Your new password is: $password";
        }

    }

?>
