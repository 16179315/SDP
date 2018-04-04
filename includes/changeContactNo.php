<?php
	session_start();
	include 'db.php';

	$contactNo=$_POST['changeContactNo'];
	$sql="UPDATE users 	SET uAddress='".$contactNo."' WHERE uId='".$_SESSION['uId']."';";

?>