<?php
	session_start();
	include 'db.php';

	$address=$_POST['changeAddress'];
	$sql="UPDATE users 	SET uAddress='".$address."' WHERE uId='".$_SESSION['uId']."';";

?>