<?php
    session_start();
 
    include 'includes/db.php';
	if(isset($_SESSION['hId'])) {
		$profile_hName_sql="SELECT hName FROM hotels where hId = '".$_SESSION['hId']."';";
		$profile_hName_result=$conn->query($profile_hName_sql);
		if ($conn && ($profile_hName_result->num_rows>0)) {
				while ($profile_hName_row=$profile_hName_result->fetch_assoc()) {
					$profile_hName = $profile_hName_row['hName'];
			}
		}
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>
        <?php
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
	
	
<!-- Notification -->
<?php if (isset($_SESSION['success'])) ?>

	<div class="alert alert-success alert-dismissable ml-4 mr-4 mt-4">
	<strong>You have successfully edited your details</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	  </button>
	</div>

<?php unset($_SESSION['success']); ?>



<div class="container">
    <div class="row profile">
		<div class="col-md-4">
			<div class="profile-sidebar" style="  border-radius: 25px;
												border: 2px solid green">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
				<?php

				 $sql = "select hImg from hotelImage where hId='".$_SESSION['hId']."';";
				 $result = mysqli_query($conn,$sql);
				 $row = mysqli_fetch_array($result);
			     $image_src = "includes/upload/hotelImages/";
				 $image_src = $image_src."".$row['hImg'];
				 
				?>
				<img src='<?php echo $image_src; ?>' >
				
	</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php 
							echo $profile_hName;
						?>
					</div>
					<div class="profile-usertitle-job">
						<?php
							$profile_descr_sql="SELECT descr FROM hotels where hId = '".$_SESSION['hId']."';";
							$profile_descr_result=$conn->query($profile_descr_sql);
							if ($conn && ($profile_descr_result->num_rows>0)) {
								while ($profile_descr_row=$profile_descr_result->fetch_assoc()) {
									$profile_descr = $profile_descr_row['descr'];
								}
							}
							echo $profile_descr;
							?>
					</div>
					<div style="text-align:left; padding:20px;">
						<?php
							echo "<BR><BR> Address: 	";
							$profile_address_sql="SELECT address FROM hotels where hId = '".$_SESSION['hId']."';";
							$profile_address_result=$conn->query($profile_address_sql);
							if ($conn && ($profile_address_result->num_rows>0)) {
								while ($profile_address_row=$profile_address_result->fetch_assoc()) {
									$profile_address = $profile_address_row['address'];
								}
							}
							echo $profile_address;
							
							echo "<BR><BR> Phone: 	";
							$profile_contactNo_sql="SELECT contactNo FROM hotels where hId = '".$_SESSION['hId']."';";
							$profile_contactNo_result=$conn->query($profile_contactNo_sql);
							if ($conn && ($profile_contactNo_result->num_rows>0)) {
								while ($profile_contactNo_row=$profile_contactNo_result->fetch_assoc()) {
									$profile_contactNo = $profile_contactNo_row['contactNo'];
								}
							}
							echo $profile_contactNo;
							
							
					
						?>
					</div>
					
				</div>

				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul>
						<li>
							<?php 
							$url = "hotel.php";
							echo "<a href=$url>"; ?>
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class = "col-md-8">
		  <h3>Add an image</h3>
			<div class="container">
			 	<div class="row">
			  		<div class="col-md-7">
						<form method="post" action="includes/uploadImage.php" enctype='multipart/form-data'>
							<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_SESSION['hId']."'>"; ?>

			  				<input type='file' name='file' />
			  				<input type='submit' value='Upload Image' name='but_upload'>
						</form>
					</div>
				</div>
			
<br>
<h3>Alter basic information</h3>	
<form action="includes/editBasic.php" method="POST">
<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_SESSION['hId']."'>"; ?>
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
    <textarea class="form-control" name="inputDescription" rows ="3" ></textarea>
  </div>
  <button type="submit" name = "submit" class="btn btn-primary" style="background-color: green">Update Information</button>
</form>
<br>
<h3>Add a menu </h3>
<form action="includes/createMenu.php" method="POST">
<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_SESSION['hId']."'>"; ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputMenuName4">Menu Name</label>
      <input type="text" class="form-control" name="inputMenuName" placeholder="Menu Name">
    </div>
	</div>
    <div class="form-group col-md-6">    
		<button type="submit" class="btn btn-primary" style="background-color: green">Create Menu</button>
    </div>

</form>

<br>
<h3>Add a dish to a menu</h3>
<form action="includes/addDish.php" method="POST">
<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_SESSION['hId']."'>"; ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputMenuName">Menu Name</label>
      <input type="text" class="form-control" name="inputMenuName" placeholder="Menu Name">
    </div>
	    <div class="form-group col-md-6">
      <label for="inputDishName">Dish Name</label>
      <input type="text" class="form-control" name="inputDishName" placeholder="Dish Name">
    </div>
	</div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputDishDescr">Dish Description</label>
      <textarea class="form-control" name="inputDishDescr" placeholder="Dish Description"></textarea>
    </div>
	<div class="form-group col-md-6">
      <label for="inputDishPrice">Dish Price</label>
      <input type="number" class="form-control" name="inputDishPrice" placeholder="Dish Price"/>
    </div>
	</div>
	
    <div class="form-group col-md-6">    
		<button type="submit" class="btn btn-primary" style="background-color: green">Add Dish</button>
    </div>

</form>

<br>
<h3>Add an Award</h3>
<form action="includes/addAward.php" method = "POST">
<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_SESSION['hId']."'>"; ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAwardName4">Award Name</label>
      <input type="text" class="form-control" name="inputAwardName" placeholder="Award Name">
    </div>
	</div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAwardDescr4">Award Description</label>
      <textarea class="form-control" name="inputAwardDescr" placeholder="Award Description"></textarea>
    </div>
	</div>
    <div class="form-group col-md-6">    
		<button type="submit" class="btn btn-primary" style="background-color: green">Add Award</button>
    </div>

</form>

<br>
<h3>Add a Vacancy</h3>
<form action="includes/addVacancy.php" method="POST">
<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_SESSION['hId']."'>"; ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputVacancyName4">Vacancy Name</label>
      <input type="text" class="form-control" name="inputVacancyName" placeholder="Vacancy Name">
    </div>
	<div class="form-group col-md-6">
      <label for="inputVacancyAmount4">Amount of vacancies available</label>
      <input type="number" class="form-control" name="inputVacancyAmount" placeholder="Vacancy Amount"/>
    </div>
	</div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputVacancyDescr4">Vacancy Description</label>
      <textarea class="form-control" name="inputVacancyDescr" placeholder="Vacancy Description"></textarea>
    </div>
	</div>
    <div class="form-group col-md-6">    
		<button type="submit" class="btn btn-primary" style="background-color: green">Add Vacancy</button>
    </div>
  </div>
</form>
<h3>Delete a Menu</h3>
<form action="includes/deleteMenu.php" method="POST">
<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_SESSION['hId']."'>"; ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputMenuName">Menu Name</label>
      <input type="text" class="form-control" name="inputMenuName" placeholder="Menu Name">
    </div>
	</div>
    <div class="form-group col-md-6">    
		<button type="submit" class="btn btn-primary" style="background-color: green">Delete Menu</button>
    </div>
</form>
<h3>Delete an Award</h3>
<form action="includes/deleteAward.php" method="POST">
<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_SESSION['hId']."'>"; ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAwardName">Award Name</label>
      <input type="text" class="form-control" name="inputAwardName" placeholder="Award Name">
    </div>
	</div>
    <div class="form-group col-md-6">    
		<button type="submit" class="btn btn-primary" style="background-color: green">Delete Award</button>
    </div>

</form>
<h3>Delete a Vacancy</h3>
<form action="includes/deleteVacancy.php" method="POST">
<?php echo "<input type=\"hidden\" name=\"hId\" value= '".$_SESSION['hId']."'>"; ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputVacancyName">Vacancy Name</label>
      <input type="text" class="form-control" name="inputVacancyName" placeholder="Vacancy Name">
    </div>
	</div>
    <div class="form-group col-md-6">    
		<button type="submit" class="btn btn-primary" style="background-color: green">Delete Vacancy</button>
    </div>

</form>
</form>

</body>
<br>
<footer class="page-footer">
      <div class="container">
      	<div class="row">
      		<div class="col-md-10">
      			<span class="text-muted">Footer information</span>
       		</div>
      	</div>
</footer>
</html>