<?php 
	session_start();
	$success = true;
	include 'db.php';
	$hId = $_POST['hId'];
	if($_POST['inputMenuName'] == "") {
		  die('`Missing menu name' . mysql_error());
		  $url = "../editHotel.php?hId=".$hId;
		  header("Location: ".$url);
		  exit();
	}

	$name = $_POST['inputMenuName'];
	$dName = $_POST['inputDishName'];
	$descr = $_POST['inputDishDescr'];
	$price = $_POST['inputDishPrice'];
	$sqlhMId = "Select hMId from hotelMenu where hMName = '$name'";
	$hMIdresult = mysqli_query($conn,$sqlhMId);
	while ($row = $hMIdresult->fetch_assoc()) {
    $hMId = $row['hMId'];
}
	echo $hMId;
	$sql = "INSERT INTO hotelDish(hId,hMId,hDName,hDDescr,hDPrice)
			VALUES ('$hId','$hMId', '$dName','$descr', '$price')";
	$retval = mysqli_query($conn,$sql);
	if(! $retval ){
	  die('Could not update data:' . mysql_error());
	  $url = "../editHotel.php?hId=".$hId;
	  header("Location: ".$url);
	  exit();
	}

	if($success) {
		$_SESSION['success'] = true;
		$url = "../editHotel.php?hId=".$hId;
		header("Location: ".$url);
		exit();
	}
?>