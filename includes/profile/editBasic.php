<?php 
session_start();
include '../db.php';
$uId=$_SESSION['uId'];
if(isset($_POST['changeEmail'])) {
	$email=$_POST['changeEmail'];
	$sql="UPDATE users SET uEmail='".$email."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update email".mysqli_error($conn));
	}
}
if(isset($_POST['changeNumber'])) {
	$number=$_POST['changeNumber'];
	$sql="UPDATE users SET uContactNo='".$number."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update number".mysqli_error($conn));
	}
}
if(isset($_POST['changeAddress'])) {
	$address=$_POST['changeAddress'];
	$sql="UPDATE users SET uAddress='".$address."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update address".mysqli_error($conn));
	}
}
if(isset($_POST['changeBio'])) {
	$bio=$_POST['changeAddress'];
	$sql="UPDATE users SET uBio='".$bio."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update bio".mysqli_error($conn));
	}
}
$url="../../EditProfile.php?uId=".$uId;
header("Location ".$url);
exit();
?>
	
	
	
	