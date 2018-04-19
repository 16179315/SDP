<?php 


	session_start();
		$success = true;
	include 'db.php';
	$hId = $_POST['hId'];
	if(!($_POST['inputEmail'] == "")) {
		$email = $_POST['inputEmail'];
		$sql = "UPDATE hotels SET email = '$email' where hId = '$hId'";
		$retval = mysqli_query($conn,$sql);
		if(! $retval )
		{
		  die('Could not update data:' . mysql_error());
		  		  $url = "../editHotel.php?hId=".$hId;
		  header("Location: ".$url);
		  exit();
		}
	}
	if(!($_POST['inputContactNumber'] == "")) {
		$contactNo = $_POST['inputContactNumber'];
		$sql = "UPDATE hotels SET contactNo = '$contactNo' where hId = '$hId'";
		$retval = mysqli_query($conn,$sql);
		if(! $retval )
		{
		  die('Could not update data:' . mysql_error());
		  $url = "../newEditHotel.php?hId=".$hId;
		  header("Location: ".$url);
		  exit();
		}
	}
	if(!($_POST['inputAddress'] == "")) {
		$address = $_POST['inputAddress'];
		$sql = "UPDATE hotels SET address = '$address' where hId = '$hId'";
		$retval = mysqli_query($conn,$sql);
		if(! $retval )
		{
		  die('Could not update data: ' . mysql_error());
		  		  $url = "../newEditHotel.php?hId=".$hId;
		  header("Location: ".$url);
		  exit();
		}
	}
	if(!($_POST['inputDescription'] == "")) {
		$descr = $_POST['inputDescription'];
		echo $descr;
		$sql = "UPDATE hotels SET descr = '$descr' where $hId = '$hId'";
		$retval = mysqli_query($conn,$sql );
		if(! $retval )
		{
		  die('Could not update data:' . mysql_error());
		  		  $url = "../newEditHotel.php?hId=".$hId;
		  header("Location: ".$url);
		  exit();
		}
	}
	
	if($success) {
		$_SESSION['success'] = true;
		$url = "../newEditHotel.php?hId=".$hId;
		header("Location: ".$url);
		exit();
	}
	?>
	
	
	
	