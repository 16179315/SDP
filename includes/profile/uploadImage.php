<?php
session_start();
$success = true;
include 'db.php';
$uId = $_SESSION['uId'];
$name = $_FILES['file']['name'];
$target_dir = "../../images/profile/";
$target_file = $target_dir.basename($_FILES["file"]["name"]);

// Select file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");

// Check extension
if( in_array($imageFileType,$extensions_arr) ) {
	$sql = "SELECT COUNT(1) FROM userImage WHERE uId='$uId';";
	$result=$conn->query($sql);
	if ($conn && ($result->num_rows>0)) {
		while ($row=$result->fetch_assoc()) {
		  $query = "UPDATE userImage SET img = '$name' where uId = '$uId';";
		  $retval = mysqli_query($conn,$query);
		  if(! $retval ){
			  die('Could not update data: in update '.mysql_error());
			  $url = "../editHotel.php?hId=".$hId;
			  header("Location: ".$url);
			  exit();
		  }
	  }
	}
	else {
	  // Insert record
	  $query = "INSERT INTO userImage(uId,img) VALUES('$uId','$name')";
	  $retval = mysqli_query($conn,$query);
	  if(! $retval ) {
		  die('Could not update data: in here' . mysql_error());
		  $url = "../editHotel.php?hId=".$uId;
		  header("Location: ".$url);
		  exit();
	  }
	}
	// Upload file
	move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

}



if($success) {
	$_SESSION['success'] = true;
	$url = "../editHotel.php?hId=".$hId;
	header("Location: ".$url);
	exit();
}


?>