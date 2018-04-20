<?php 
session_start();
include '../db.php';
$uId=$_SESSION['uId'];
if(isset($_POST['changeFirstName']) && $_POST['changeFirstName']!="") {
	$firstName=$_POST['changeFirstName'];
	$sql="UPDATE users SET uFirstName='".$firstName."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update first name".mysqli_error($conn));
	}
}
if(isset($_POST['changeLastName']) && $_POST['changeLastName']!="") {
	$lastName=$_POST['changeLastName'];
	$sql="UPDATE users SET uLastName='".$lastName."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update last name".mysqli_error($conn));
	}
}
if(isset($_POST['changeEmail']) && $_POST['changeEmail']!="") {
	$email=$_POST['changeEmail'];
	$sql="UPDATE users SET uEmail='".$email."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update email".mysqli_error($conn));
	}
}
if(isset($_POST['changeNumber']) && $_POST['changeNumber']!=0) {
	$number=$_POST['changeNumber'];
	$sql="UPDATE users SET uContactNo='".$number."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update number".mysqli_error($conn));
	}
}
if(isset($_POST['changeAddress']) && $_POST['changeAddress']!="") {
	$address=$_POST['changeAddress'];
	$sql="UPDATE users SET uAddress='".$address."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update address".mysqli_error($conn));
	}
}
if(isset($_POST['changeBio']) && $_POST['changeBio']!="") {
	$bio=$_POST['changeBio'];
	$sql="UPDATE users SET uBio='".$bio."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update bio".mysqli_error($conn));
	}
}
header("Location:../../EditProfile.php");
exit();
?>	