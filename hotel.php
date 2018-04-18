<?php
    session_start();
 
    include 'includes/db.php';
	if(isset($_GET['hId'])) {
		$profile_hName_sql="SELECT hName FROM hotels where hId = '".$_GET['hId']."';";
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
		if(isset($_GET['hId'])) {
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
    <a class="navbar-brand abs" href="homepage.php">HoteledInn</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="navbar-nav ml-auto">
          <form class ="form-inline navbar-form" action="searchResults.php" method="POST">
            <li class="nav-item">
              <div class="ddl-select input-group-btn mr-sm-2">
                <select id="ddlsearch" class="selectpicker form-control" name="dropDown" data-style="btn-primary">
                  <option value="" data-hidden="true" class="ddl-title">Search for</option>
                  <option value="users">Users</option>
                  <option value="hotels">Hotels</option>
                  <option value="vacancies">Vacancies</option>
                  <option value="skills">Skills</option>
                </select>
              </div>
            </li>
            <li class="nav-item">
              <div class="form-group mr-sm-2">
                <input type="text" name="data" class="form-control" placeholder="Enter here">
              </div>
            </li>
            <li class="nav-item">
              <div class="form-group mr-sm-2">
                <button class="btn btn-success" name="search" type="submit">Search</button> 
              </div>
            </li>
          </form>
          <form class ="form-inline navbar-form" action="includes/logout.php" method="POST">
            <li class="nav-item">
                <button class="btn btn-success" name ="submit" type="submit">Log out</button>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="includes/logout.php">Forgot password?</a>
            </li>
          </form>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row profile">
		<div class="col-4">
			<div class="profile-sidebar" style="  border-radius: 25px;
												border: 2px solid green">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://via.placeholder.com/120/aa5555/000000" class="img-responsive" alt="">
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
							$profile_descr_sql="SELECT descr FROM hotels where hId = '".$_GET['hId']."';";
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
							$profile_address_sql="SELECT address FROM hotels where hId = '".$_GET['hId']."';";
							$profile_address_result=$conn->query($profile_address_sql);
							if ($conn && ($profile_address_result->num_rows>0)) {
								while ($profile_address_row=$profile_address_result->fetch_assoc()) {
									$profile_address = $profile_address_row['address'];
								}
							}
							echo $profile_address;
							
							echo "<BR><BR> Phone: 	";
							$profile_contactNo_sql="SELECT contactNo FROM hotels where hId = '".$_GET['hId']."';";
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
						<li class="active">
							<a href="newHotel.php">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<?php 
								$url = "editHotel.php?hId=".$_GET['hId'].";";
								echo "<a href=$url>"; ?>
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="home.php" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Home</a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		
		<div class="col-md-4">
			   <h2 style= "color:green";>Availible Vacancys </h2>
			   <?php
					$profile_vacancy_sql="SELECT * FROM vacancies where hId = '".$_GET['hId']."';";
					$profile_vacancy_result=$conn->query($profile_vacancy_sql);
					if ($conn && ($profile_vacancy_result->num_rows>0)) {
						while ($profile_vacancy_row=$profile_vacancy_result->fetch_assoc()) {
							$profile_vacancy_name = $profile_vacancy_row['vName'];
							$profile_vacancy_descr = $profile_vacancy_row['vDescr'];
							$profile_vacancy_status= $profile_vacancy_row['status'];
							$profile_vacancy_amount = $profile_vacancy_row['amount'];
							echo "<div class=\"card text-center\" style=\"width: 22rem;\">
								<div class=\"card-header success-color white-text\">$profile_vacancy_status</div>
								<div class=\"card-body\">
										<h4 class=\"card-title\">$profile_vacancy_name</h4>
										<p class=\"card-text\">$profile_vacancy_descr</p>
										<a class=\"btn btn-success btn-sm\">Go To Vacancy Application</a>
									</div>
									<div class=\"card-footer text-muted success-color white-text\">
										<p class=\"mb-0\">2 days ago</p>
									</div>
								</div>";
						}
					}
			   
			   ?>
		</div>
		<div class="col-md-4">
			<div>
			   <h2 style= "color:green";>Awards Received</h2>
			   <?php
					$profile_award_sql="SELECT * FROM hotelAwards where hId = '".$_GET['hId']."';";
					$profile_award_result=$conn->query($profile_award_sql);
					if ($conn && ($profile_award_result->num_rows>0)) {
						while ($profile_award_row=$profile_award_result->fetch_assoc()) {
							$profile_award_name = $profile_award_row['hAname'];
							$profile_award_descr = $profile_award_row['hAdescr'];
							echo "<div class=\"card\">
										<h3 class=\"card-header success-color white-text\">Featured</h4>
							          <div class=\"card-body\">
											<h4 class=\"card-title\">$profile_award_name</h4>
										<p class=\"card-text\">$profile_award_descr</p>
										<a class=\"btn btn-success\">Go To Award Website</a>
									</div>
								</div>";
						}
					}
			   
			   ?>
				
		</div>
	</div>
	</div>
	<div class="col-md-12">
	<div>
		   <h2 style= "color:green";>Menus on display</h2>
			   <?php
					$profile_menu_sql="SELECT * FROM hotelMenu where hId = '".$_GET['hId']."';";
					$profile_menu_result=$conn->query($profile_menu_sql);
					if ($conn && ($profile_menu_result->num_rows>0)) {
						while ($profile_menu_row=$profile_menu_result->fetch_assoc()) {
							$profile_menu_id = $profile_menu_row['hMId'];
							$profile_menu_name = $profile_menu_row['hMName'];

							echo "<div class=\"card\">
										<h3 class=\"card-header success-color white-text\">$profile_menu_name</h4>
									  <div class=\"card-body\">";
							$profile_dish_sql="SELECT * FROM hotelDish where hMId = '".$profile_menu_id."';";
							$profile_dish_result=$conn->query($profile_dish_sql);
							if ($conn && ($profile_dish_result->num_rows>0)) {
								while ($profile_dish_row=$profile_dish_result->fetch_assoc()) {
									$profile_dish_name = $profile_dish_row['hDName'];
									$profile_dish_descr = $profile_dish_row['hDDescr'];
									$profile_dish_price = $profile_dish_row['hDPrice'];
									echo	"<p class=\"card-text\">$profile_dish_name    :</p>
											<p class=\"card-text\">$profile_dish_descr        \$$profile_dish_price</p>";
								}
							}
							echo		"</div>
								</div>
								<br>";
						}
					}
						
					
			   
			   ?>
				
		</div>
		
		
</div>
<br>
<br>
</body>
</html>