<?php 


	session_start();
	$success = true;
	include 'db.php';
	$hId = $_POST['hId'];
	if(!($_POST['inputAwardName'] == "")) {
		$name = $_POST['inputAwardName'];
		$descr = $_POST['inputAwardDescr'];
		$sql = "INSERT INTO hotelAward (hId, hAname,hAdescr)
				VALUES ('$hId', '$name','$descr')";
		$retval = mysqli_query($conn,$sql);
		if(! $retval )
		{
		  die('Could not update data:' . mysql_error());
		  $url = "../editHotel.php?hId=".$hId;
		  header("Location: ".$url);
		  exit();
		}
	}
	
	if($success) {
		$_SESSION['success'] = true;
		$url = "../editHotel.php?hId=".$hId;
		header("Location: ".$url);
		exit();
	}
?>