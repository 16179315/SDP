<?php
session_start();
if(isset($_POST['changeAddress'])) {
	include 'db.php';

	$address=$_POST['changeAddress'];
	$sql="UPDATE users SET uAddress='".$address."' WHERE uId='".$_GET['uId']."';";

}

?>