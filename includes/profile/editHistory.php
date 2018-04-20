<?php 
session_start();
include '../db.php';
$id=$_POST['jHid'];
if(isset($_POST['deleteJob']) && $_POST['deleteJob']=='YES') {
	$remove_sql="DELETE FROM jobHistory WHERE jHid='".$id."';";
	$retval=mysqli_query($conn, $remove_sql);
	if (!$retval) {
		die("Could not add skill".mysqli_error($conn));
	}
}
if(isset($_POST['jobName']) && $_POST['jobName']!="") {
	$job=$_POST['jobName'];
	$sql="UPDATE jobHistory SET jName='".$job."' WHERE jHid='".$id."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update job name".mysqli_error($conn));
	}
}
if(isset($_POST['hName']) && $_POST['hName']!="") {
	$hotel=$_POST['hName'];
	$test_sql="SELECT hId FROM hotels WHERE hName='".$hotel."';";
	$test_result=mysqli_query($conn, $test_sql) or die(mysqli_error($conn));
	$testCheck = mysqli_num_rows($test_result);
	if ($testCheck==1) {
		while($hotel_row=$test_result->fetch_assoc()) {
			$sql="UPDATE jobHistory SET hId='".$hotel_row['hId']."' WHERE jHid='".$id."';";
			$retval=mysqli_query($conn, $sql);
			if (!$retval) {
				die("Could not update job name".mysqli_error($conn));
			}
		}
	}
}
if(isset($_POST['fromDate']) && $_POST['fromDate']!="") {
	$from=$_POST['fromDate'];
	$sql="UPDATE jobHistory SET fromDate='".$from."' WHERE jHid='".$id."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update job name".mysqli_error($conn));
	}
}
if(isset($_POST['toDate']) && $_POST['toDate']!="") {
	$to=$_POST['toDate'];
	$sql="UPDATE jobHistory SET toDate='".$to."' WHERE jHid='".$id."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update job name".mysqli_error($conn));
	}
}
if(isset($_POST['jobDesc']) && $_POST['jobDesc']!="") {
	$desc=$_POST['jobDesc'];
	$sql="UPDATE jobHistory SET jobDesc='".$desc."' WHERE jHid='".$id."';";
	$retval=mysqli_query($conn, $sql);
	if (!$retval) {
		die("Could not update job name".mysqli_error($conn));
	}
}
header("Location:../../EditProfile.php");
exit();
?>	