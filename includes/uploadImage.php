<?php

	session_start();
	$success = true;
	include 'db.php';
	$hId = $_POST['hId'];
	$name = $_FILES['file']['name'];
	$target_dir = "upload/hotelImages/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);

	// Select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	 // Valid file extensions
	 $extensions_arr = array("jpg","jpeg","png","gif");

	 // Check extension
	 if( in_array($imageFileType,$extensions_arr) ){
	 
		$sql = "select count(1) from hotelImage where hId='$hId'";
		$result=$conn->query($sql);
		if ($conn && ($result->num_rows>0)) {
			while ($row=$result->fetch_assoc()) {
			  $query = "Update hotelImage SET hImg = '$name' where hId = '$hId'";
			  $retval = mysqli_query($conn,$query);
			  if(! $retval ){
				  die('Could not update data: in update ' . mysql_error());
				  $url = "../editHotel.php?hId=".$hId;
				  header("Location: ".$url);
				  exit();
			  }
		  }
		}
		else {
		  // Insert record
		  $query = "insert into hotelImage(hId,hImg) values('$hId','$name')";
		  $retval = mysqli_query($conn,$query);
		  
		  if(! $retval ){
			  die('Could not update data: in here' . mysql_error());
			  $url = "../editHotel.php?hId=".$hId;
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