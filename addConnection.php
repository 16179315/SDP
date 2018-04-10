<?php
    session_start();
    include 'includes/db.php';
    $sql = "SELECT uid2 FROM friends WHERE uid1 = ".$_SESSION['uId']." AND uid2 = ".$_GET['uId2']."";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 0) {
        $sql2 = "INSERT INTO friends (uid1, uid2) VALUES (".$_SESSION['uId'].", ".$_GET['uId2'].")";
        $result2 = mysqli_query($conn, $sql2);
        echo "Added connection.";
    } else {
        echo "You are already connected to this user.";
    }
?>