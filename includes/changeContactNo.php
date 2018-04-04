<?php
session_start();
if(isset($_POST['changeContactNo'])) {

	include 'db.php';

	$contactNo=$_POST['changeContactNo'];
	$sql="UPDATE users 	SET uAddress='".$contactNo."' WHERE uId='".$_SESSION['uId']."';";
	mysql_query($conn, $sql);
	header("Location: ..?changeContactNo=success");
	exit();
}else{
	exit();
}
?>