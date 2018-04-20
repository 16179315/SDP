<!DOCTYPE html>
<html lang="en">
<head>
  <title>
        <?php
		session_start();
		if(isset($_SESSION['hId'])) {
            echo $profile_hName;
        }
		else{
            echo $_SESSION['hName'];
		}
        ?>
</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="profile.css" rel="stylesheet">
  <link href="sticky-footer-navbar.css" rel="stylesheet">
  
  
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	`  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand abs" href="../index.php">HoteledInn</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapsingNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="includes/logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
	
	<?php if (isset($_SESSION['success'])) {
		if($_SESSION['success']==true) {

	echo "<div class=\"alert alert-success alert-dismissable ml-4 mr-4 mt-4\">
	<strong>You have successfully edited your details</strong>
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
	<span aria-hidden=\"true\">&times;</span>
	  </button>
	</div>";

	unset($_SESSION['success']); }}?>
	


	
	<?php
		include 'includes/db.php';
		$hId = $_GET['hId'];
		$profile_descr_sql="SELECT hName FROM hotels where hId = '".$_GET['hId']."';";
		$profile_descr_result=$conn->query($profile_descr_sql);
		if ($conn && ($profile_descr_result->num_rows>0)) {
			while ($profile_descr_row=$profile_descr_result->fetch_assoc()) {
				$profile_descr = $profile_descr_row['hName'];
			}
		}
		echo "<h2>Edit the details of $profile_descr</h2><BR><BR>";

	?>
	

	<h3>Alter basic information</h3>	
	<form action="includes/editBasicHotel.php" method="POST">
	<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_GET['hId']."'>"; ?>
	  <div class="form-row">
		<div class="form-group col-md-6">
		  <label for="inputEmail4">Email</label>
		  <input type="email" class="form-control" name="inputEmail" placeholder="Email">
		</div>
		<div class="form-group col-md-6">
		  <label for="inputContactNumber4">Contact Number</label>
		  <input type="number" class="form-control" name="inputContactNumber" placeholder="Contact Number">
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputAddress">Address</label>
		<input type="text" class="form-control" name="inputAddress" placeholder="1234 Main St">
	  </div>
	  <div class="form-group">
		<label for="inputDescription">Description</label>
		<input class="form-control" name="inputDescription" rows ="3" >
	  </div>
	  <button type="submit" name = "submit" class="btn btn-primary" style="background-color: green">Update Information</button>
	</form>
	
	<h3>Delete a Menu</h3>
	<form action="includes/adminDeleteMenu.php" method="POST">
	<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_GET['hId']."'>"; ?>
	  <div class="form-row">
		<div class="form-group col-md-12">
		  <label for="inputMenuName">Menu Name</label>
		  <input type="text" class="form-control" name="inputMenuName" placeholder="Menu Name">
		</div>
		</div>
		<div class="form-group col-md-12">    
			<button type="submit" class="btn btn-primary" style="background-color: green">Delete Menu</button>
		</div>
	</form>
	<h3>Delete an Award</h3>
	<form action="includes/adminDeleteAward.php" method="POST">
	<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_GET['hId']."'>"; ?>
	  <div class="form-row">
		<div class="form-group col-md-12">
		  <label for="inputAwardName">Award Name</label>
		  <input type="text" class="form-control" name="inputAwardName" placeholder="Award Name">
		</div>
		</div>
		<div class="form-group col-md-12">    
			<button type="submit" class="btn btn-primary" style="background-color: green">Delete Award</button>
		</div>

	</form>
	
	</body>
</html>