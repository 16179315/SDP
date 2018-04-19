<?php 
session_start();
if (isset($_POST['banhammerPerm']) && isset($_POST['option'])) {
    include "db.php";
    preg_match_all('!\d+!', $_POST['option'], $matches);
    $uId = implode('', $matches[0]);
    $date = date("Y-m-d");
    $sql2 = "SELECT * FROM bannedUsers WHERE uId = $uId";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) == 0) {
        $sql = "INSERT INTO bannedUsers (uId, dateStart, dateEnd) VALUES ('$uId', '$date', '2050-01-01');";
        $result = mysqli_query($conn, $sql);
        $_SESSION['successfulBan'] = true;
        header("Location: ../admin.php");
        exit();
    } else {
        $_SESSION['unsuccessfulBan'] = true;
        header("Location: ../admin.php");
        exit();
    }
}

else if (isset($_POST['banhammerTemp']) && isset($_POST['option']) && (!empty($_POST['banLength'])) && (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST['banLength']))) {
    include "db.php";
    preg_match_all('!\d+!', $_POST['option'], $matches);
    $uId = implode('', $matches[0]);
    $date = date("Y-m-d");
    $banLength = $_POST['banLength'];
    $sql2 = "SELECT * FROM bannedUsers WHERE uId = $uId";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) == 0) {
        $sql = "INSERT INTO bannedUsers (uId, dateStart, dateEnd) VALUES ('$uId', '$date', '$banLength');";
        $result = mysqli_query($conn, $sql);
        $_SESSION['successfulBan'] = true;
        header("Location: ../admin.php");
        exit();
    } else {
        $_SESSION['unsuccessfulBan'] = true;
        header("Location: ../admin.php");
        exit();
    }
}

else {
    $_SESSION['incorrectInputTempBan'] = true;
    header("Location: ../admin.php?buttonoroptionnotset");
    exit();
}
?>