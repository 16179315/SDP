<?php
    session_start();
    if (isset($_POST["submit"])) {
        include 'db.php';

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql = "SELECT * FROM users WHERE uEmail = '$email';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
            $_SESSION['noUserExists'] = true;
            header("Location: ../forgotPassword.php");
		} else {
            $token = bin2hex(openssl_random_pseudo_bytes(128));
            $conn->query("UPDATE users SET token='$token' WHERE uEmail='$email'");
            // At the moment this just sets the URL to the reset password link. This will hopefully be emailed in the future if possible.
            header("Location: ../includes/resetPassword.php?email=$email&token=$token");
            exit();
        }

    }
?>