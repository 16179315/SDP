<?php

	session_start();
	include 'db.php';
	$hId = $_POST['hId'];
	unset($_SESSION['success']);
	if(!($_POST['inputMenuName'] == "")) {
		$name = $_POST['inputMenuName'];
		$sql = "DELETE FROM hotelMenu where hMName='$name'";
		if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
		$_SESSION['success'] = true;
			  $url = "../adminEditHotel.php?hId=".$hId;
			  header("Location: ".$url);
			  exit();
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	}
	
	else {
	  die('Could not update data:' . mysql_error());
	  $url = "../adminEditHotel.php?hId=".$hId;
	  header("Location: ".$url);
	  exit();
	}