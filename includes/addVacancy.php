<?php 


	session_start();
	$success = true;
	include 'db.php';
	$hId = $_POST['hId'];
	if(($_POST['inputVacancyName'] == "" || $_POST['inputVacancyDescr'] == ""  || $_POST['inputVacancyAmount'] == "" )) {
		  die('One or more inputs not filled:' . mysql_error());
		  $url = "../editHotel.php?hId=".$hId;
		  header("Location: ".$url);
		  exit();
	}

	$name = $_POST['inputVacancyName'];
	$descr = $_POST['inputVacancyDescr'];
	$amount = $_POST['inputVacancyAmount'];
	$sql = "INSERT into vacancies(hId,vName,vDescr,status,amount)
			VALUES ('$hId', '$name','$descr','Vacant','$amount')";
	$retval = mysqli_query($conn,$sql);
	if(! $retval )
	{
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