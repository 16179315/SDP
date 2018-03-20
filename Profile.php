<?php
	session_start();

	$dbServerName = "sql11.freemysqlhosting.net:3306";
	$dbUsername = "sql11225471";
	$dbPassword = "cbgPE8apID";
	$dbName = "sql11225471";
	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);


	/*
	$bio=mysql_query("SELECT uBio FROM users WHERE uId = '".$_SESSION['uId']."';", $conn);
	$address=mysql_query($conn, "SELECT uAddress FROM users WHERE uId = '".$_SESSION['uId']."';");
	$bio="SELECT uBio FROM users where uId = '$_SESSION['uId']';"
	*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		<?php
			echo $_SESSION['uFirst']." ".$_SESSION['uLast'];
		?>
	</title>
	<!--
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link href="style.css" rel="stylesheet">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  -->
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="sticky-footer-navbar.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand abs" href="../index.php">HoteledInn</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="navbar-nav ml-auto">
		<form class ="form-inline navbar-form" action="includes/login.php" method="POST">
            <li class="nav-item">
				<div class="form-group mr-sm-2">
					<input type="text" name="email" class="form-control" placeholder="Email">
				</div>
            </li>
			<li class="nav-item mr-sm-2">
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>
            </li>
			<li class="nav-item">
				<button class="btn btn-success" name ="submit" type="submit">Log in</button>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="forgotPassword.php">Forgot password?</a>
            </li>
		</form>
        </ul>
    </div>
	</nav>

	<div class="center">
		<img align="left" class="banner" src="http://via.placeholder.com/1000x200px">
		<img class="profile-picture" src="http://via.placeholder.com/120/aa5555/000000">
		<div class="name">
			<h2>
				<?php
					echo $_SESSION['uFirst']." ".$_SESSION['uLast'];
				?>
			</h2>
		</div>
		<div class="container">
			<div class="col-sm-8">
		    	<div data-spy="scroll" class="tabbable-panel">
		        	<div class="tabbable-line">
		          		<ul class="nav nav-tabs">
				            <li class="nav-item active">
				              	<a href="#tab_details" class="nav-link" role="tab" data-toggle="tab">Details</a>
				            </li>
				            <li class="nav-item">
				              	<a href="#tab_contact" class="nav-link" role="tab" data-toggle="tab">Contact info</a>
				            </li>
				            <li class="nav-item">
				              	<a href="#tab_skills" class="nav-link" role="tab" data-toggle="tab">Skills</a>
				            </li>
				            <li class="nav-item">
				              	<a href="#tab_experience" class="nav-link" role="tab" data-toggle="tab">Experience</a>
				            </li>
		          		</ul>
		          		<div class="tab-content">
		            		<div role="tabpanel" class="tab-pane active" id="tab_details">
				              	<p>
					                User Bio
				              	</p>
		            		</div>
		            		<div role="tabpanel" class="tab-pane" id="tab_contact">
					           	<p>
					            	User Address
					            </p>
		                 	</div>
		            		<div role="tabpanel" class="tab-pane" id="tab_skills">
			              		<p>
			                		User Skills
			              		</p>
		            		</div>
		            		<div role="tabpanel" class="tab-pane" id="tab_experience">
			              		<p>
			                		User Experience
			              		</p>
		            		</div>
		          		</div>
		        	</div>
		      	</div>
		  	</div>
		</div>
	</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>