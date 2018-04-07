<?php
    session_start();
    if (isset($_POST["submit"])) {
        include 'db.php';

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql1 = "SELECT * FROM users WHERE uEmail = '$email';";
        $sql2 = "SELECT * FROM hotels WHERE email = '$email';";
        $result1 = mysqli_query($conn, $sql1);
        $result2 = mysqli_query($conn, $sql2);
        $resultCheck1 = mysqli_num_rows($result1);
        $resultCheck2 = mysqli_num_rows($result2);
		if ($resultCheck1 < 1 && $resultCheck2 < 1) {
            $_SESSION['noUserExists'] = true;
            header("Location: ../forgotPassword.php");
		} else {
            if ($resultCheck1 > 0) {
                $token = bin2hex(openssl_random_pseudo_bytes(128));
                $conn->query("UPDATE users SET token='$token' WHERE uEmail='$email'");
                // At the moment this just sets the URL to the reset password link. This will hopefully be emailed in the future if possible.
                header("Location: ../includes/resetPassword.php?email=$email&token=$token");
                //header("Location: ../?userCheck");
                exit();
            }
            else {
            $token = bin2hex(openssl_random_pseudo_bytes(128));
            $conn->query("UPDATE hotels SET token='$token' WHERE email='$email'");
            // At the moment this just sets the URL to the reset password link. This will hopefully be emailed in the future if possible.
            header("Location: ../includes/resetPassword.php?email=$email&token=$token");
            //header("Location: ../?hotelCheck");
            exit();
            }
        }
    }
?>