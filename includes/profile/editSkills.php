<?php 
session_start();
include 'db.php';
$uId=$_POST['uId']
if(isset($_POST['changeOrganisation'])) {
	if($_POST['changeOrganisation']=='checked') {
		$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=2;";
		$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $resultCheck = mysqli_num_rows($sql_result);
        if ($resultCheck<1) {
        	$add_sql="INSERT INTO userSkills (uId, sId) VALUES ('".$uId."',2);";
			$retval=mysqli_query($conn, $sql);
			if (!$retval) {
				die("Could not add skill".mysqli_error($conn));
			}
        }
	}
}
if(isset($_POST['changeNumber'])) {
	$uId=$_POST['uId']
	$number=$_POST['changeNumber'];
	$sql="UPDATE users SET uContactNo='".$number."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update number".mysqli_error($conn));
	}
}
if(isset($_POST['changeAddress'])) {
	$uId=$_POST['uId']
	$address=$_POST['changeAddress'];
	$sql="UPDATE users SET uAddress='".$address."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update address".mysqli_error($conn));
	}
}
if(isset($_POST['changeBio'])) {
	$uId=$_POST['uId']
	$bio=$_POST['changeAddress'];
	$sql="UPDATE users SET uBio='".$bio."' WHERE uId='".$uId."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update bio".mysqli_error($conn));
	}
}
$url="../EditProfile.php?uId=".$uId;
header("Location ".$url);
exit();
?>