<?php 
session_start();
include '../db.php';
if (isset($_POST['jobName']) && isset($_POST['hotelName']) && isset($_POST['fromDate']) && isset($_POST['toDate']) && isset($_POST['jobDesc'])) {
	echo "all's good<br>";
	$uId=$_SESSION['uId'];
	$job=$_POST['jobName'];
	$hotel=$_POST['hotelName'];
	$from=$_POST['fromDate'];
	$to=$_POST['toDate'];
	$desc=$_POST['jobDesc'];
	$test_sql="SELECT hId FROM hotels WHERE hName='".$hotel."';";
	$test_result=mysqli_query($conn, $test_sql) or die(mysqli_error($conn));
	$testCheck = mysqli_num_rows($test_result);
	if ($testCheck==1) {
		echo "working as intended<br>";
		while($hotel_row=$test_result->fetch_assoc()) {
			$sql="INSERT INTO jobHistory (uId, hId, jName, fromDate, toDate, jHdescr) VALUES ('$uId', '".$hotel_row['hId']."', '$job', '$from', '$to', '$desc');";
			$retval=mysqli_query($conn, $sql);
			if (!$retval) {
				die("could not add job history".mysqli_error($conn));
			}
		}
	}
}
header("Location:../../EditProfile.php");
exit();
?>