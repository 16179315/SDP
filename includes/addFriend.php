<?php
session_start();
if(isset($_GET['uId'])) {

	include 'db.php';

	$sql="INSERT INTO friends(uid1, uid2) VALUES ('".$_SESSION['uId']."', '".$_GET['uId'].";";
	mysql_query($conn, $sql);
	header("Location: ..?addFriend=success");
	exit();
}else{
	exit();
}
?>