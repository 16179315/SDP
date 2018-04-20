<?php 
session_start();
include '../db.php';
$uId=$_SESSION['uId'];
if(isset($_POST['changeOrganisation']) && $_POST['changeOrganisation']=='changeOrganisation') {
	$sql="SELECT * FROM userSkills WHERE uId=$uId AND sId=2;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck<1) {
    	$add_sql="INSERT INTO userSkills (uId, sId) VALUES (".$uId.",2);";
		$retval=mysqli_query($conn, $add_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
    }
} else {
	$sql="SELECT * FROM userSkills WHERE uId=$uId AND sId=2;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck==1) {
    	$remove_sql="DELETE FROM userSkills WHERE uId='".$uId."' AND sId=2;";
    	$retval=mysqli_query($conn, $remove_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
	}
}
if(isset($_POST['changeCommunication']) && $_POST['changeCommunication']=='changeCommunication') {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=3;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck<1) {
    	$add_sql="INSERT INTO userSkills (uId, sId) VALUES (".$uId.",3);";
		$retval=mysqli_query($conn, $add_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
    }
} else {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=3;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck==1) {
    	$remove_sql="DELETE FROM userSkills WHERE uId='".$uId."' AND sId=3;";
    	$retval=mysqli_query($conn, $remove_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
	}
}
if(isset($_POST['changeProblem Solving']) && $_POST['changeProblem Solving']=='changeProblem Solving') {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=4;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck<1) {
    	$add_sql="INSERT INTO userSkills (uId, sId) VALUES (".$uId.",4);";
		$retval=mysqli_query($conn, $add_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
    }
} else {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=4;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck==1) {
    	$remove_sql="DELETE FROM userSkills WHERE uId='".$uId."' AND sId=4;";
    	$retval=mysqli_query($conn, $remove_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
	}
}
if(isset($_POST['changeTeamwork']) && $_POST['changeTeamwork']=='changeTeamwork') {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=5;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck<1) {
    	$add_sql="INSERT INTO userSkills (uId, sId) VALUES (".$uId.",5);";
		$retval=mysqli_query($conn, $add_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
    }
} else {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=5;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck==1) {
    	$remove_sql="DELETE FROM userSkills WHERE uId='".$uId."' AND sId=5;";
    	$retval=mysqli_query($conn, $remove_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
	}
}
if(isset($_POST['changeComputer Literacy']) && $_POST['changeComputer Literacy']=='changeComputer Literacy') {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=6;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck<1) {
    	$add_sql="INSERT INTO userSkills (uId, sId) VALUES (".$uId.",6);";
		$retval=mysqli_query($conn, $add_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
    }
} else {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=6;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck==1) {
    	$remove_sql="DELETE FROM userSkills WHERE uId='".$uId."' AND sId=6;";
    	$retval=mysqli_query($conn, $remove_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
	}
}
if(isset($_POST['changeLeadership']) && $_POST['changeLeadership']=='changeLeadership') {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=7;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck<1) {
    	$add_sql="INSERT INTO userSkills (uId, sId) VALUES (".$uId.",7);";
		$retval=mysqli_query($conn, $add_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
    }
} else {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=7;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck==1) {
    	$remove_sql="DELETE FROM userSkills WHERE uId='".$uId."' AND sId=7;";
    	$retval=mysqli_query($conn, $remove_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
	}
}
if(isset($_POST['changeEnthusiasm']) && $_POST['changeEnthusiasm']=='changeEnthusiasm') {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=8;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck<1) {
    	$add_sql="INSERT INTO userSkills (uId, sId) VALUES (".$uId.",8);";
		$retval=mysqli_query($conn, $add_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
    }
} else {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=8;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck==1) {
    	$remove_sql="DELETE FROM userSkills WHERE uId='".$uId."' AND sId=8;";
    	$retval=mysqli_query($conn, $remove_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
	}
}
if(isset($_POST['changeCommitment']) && $_POST['changeCommitment']=='changeCommitment') {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=9;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck<1) {
    	$add_sql="INSERT INTO userSkills (uId, sId) VALUES (".$uId.",9);";
		$retval=mysqli_query($conn, $add_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
    }
} else {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=9;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck==1) {
    	$remove_sql="DELETE FROM userSkills WHERE uId='".$uId."' AND sId=9;";
    	$retval=mysqli_query($conn, $remove_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
	}
}
if(isset($_POST['changeMulti task']) && $_POST['changeMulti task']=='changeMulti task') {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=10;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck<1) {
    	$add_sql="INSERT INTO userSkills (uId, sId) VALUES (".$uId.",10);";
		$retval=mysqli_query($conn, $add_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
    }
} else {
	$sql="SELECT * FROM userSkills WHERE uId='".$uId."' AND sId=10;";
	$sql_result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($sql_result);
    if ($resultCheck==1) {
    	$remove_sql="DELETE FROM userSkills WHERE uId='".$uId."' AND sId=10;";
    	$retval=mysqli_query($conn, $remove_sql);
		if (!$retval) {
			die("Could not add skill".mysqli_error($conn));
		}
	}
}
header("Location:../../EditProfile.php");
exit();
?>