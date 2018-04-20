<?php 
session_start();
if (isset($_POST['vacancyRemove']) && isset($_POST['option'])) {
    include "db.php";
    $vidArray = explode(" ", $_POST['option']);
    $vId = $vidArray[0];
    $sql2 = "SELECT * FROM vacancies WHERE vId = $vId";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        $sql = "DELETE FROM vacancies WHERE vId = $vId";
        $result = mysqli_query($conn, $sql);
        $_SESSION['successfulVacancyRemove'] = true;
        header("Location: ../admin.php?succ$vId");
        exit();
    } else {
        $_SESSION['unsuccessfulVacancyRemove'] = true;
        header("Location: ../admin.php?error$vId");
        exit();
    }
}
?>