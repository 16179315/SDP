<?php

	session_start();
	$success = true;
	include 'db.php';
	$hId = $_POST['hId'];
	
	if(!($_POST['inputVacancyName'] == "")) {
		$name = $_POST['inputVacancyName'];
		$sql = "DELETE FROM vacancies where vName='$name'";
		if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
			  $url = "../editHotel.php?hId=".$hId;
			  header("Location: ".$url);
			  exit();
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	}
	
	else {
	  die('Could not update data:' . mysql_error());
	  $url = "../editHotel.php?hId=".$hId;
	  header("Location: ".$url);
	  exit();
	}