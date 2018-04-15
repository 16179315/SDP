<?php

if(isset($_POST['submit'])) {
	$dbServerName = "sql11.freemysqlhosting.net:3306";
	$dbUsername = "sql11225471";
	$dbPassword = "cbgPE8apID";
	$dbName = "sql11225471";
	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
	
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
        echo "File is not an image.";
		$uploadOk = 0;
	}
}
?>

