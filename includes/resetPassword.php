<?php
    if (isset($_GET["email"]) && isset($_GET["token"])) {
        include 'db.php';

        $email = mysqli_real_escape_string($conn, $_GET["email"]);
        $token = mysqli_real_escape_string($conn, $_GET["token"]);

        $sql1 = "SELECT uId FROM users WHERE uEmail = '$email' AND token='$token';";
        $result1 = mysqli_query($conn, $sql1);
        $resultCheck1 = mysqli_num_rows($result1);
        $sql2 = "SELECT hId FROM hotels WHERE email = '$email' AND token='$token';";
        $result2 = mysqli_query($conn, $sql2);
        $resultCheck2 = mysqli_num_rows($result2);
		if ($resultCheck1 < 1 && $resultCheck2 < 1) {
			header("Location: ../?invalidTokenOrEmail?email=$email&token=$token");
            exit();
		} else {
            if ($resultCheck1 > 0) {
                $a = "qwertyuiopasdfghjklzxcvbnm";
                $a = str_shuffle($a);
                $a = substr($a, 0, 5);
                $password = sha1($a);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                $sql = "UPDATE users SET uPassword='$hashedPassword', token='' WHERE uEmail='$email';";
                mysqli_query($conn, $sql);

                echo "Your new password is: $password";
            }
            else {
                $a = "qwertyuiopasdfghjklzxcvbnm";
                $a = str_shuffle($a);
                $a = substr($a, 0, 5);
                $password = sha1($a);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                $sql = "UPDATE hotels SET password='$hashedPassword', token='' WHERE email='$email';";
                mysqli_query($conn, $sql);
    
                echo "Your new password is: $password";
            }
        }
    }

?>
