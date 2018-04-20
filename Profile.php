<?php
    session_start();
 
    include 'includes/db.php';
	if(isset($_GET['uId'])) {
		$profile_hName_sql="SELECT * FROM users where uId = '".$_GET['uId']."';";
		$profile_hName_result=$conn->query($profile_hName_sql);
		if ($conn && ($profile_hName_result->num_rows>0)) {
				while ($profile_hName_row=$profile_hName_result->fetch_assoc()) {
					$profile_hName = $profile_hName_row['uFirstName'];
					$profile_address = $profile_hName_row['uAddress'];
					$profile_contactNo = $profile_hName_row['uContactNo'];
			}
		}
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>
        <?php
		if(isset($_GET['uId'])) {
            echo $profile_hName;
        }
		else{
            echo $_SESSION['uId'];
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
                  <option value="users">Hotels</option>
                  <option value="jobHistory">Vacancies</option>
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
		<div class="col-md-4">
			<div class="profile-sidebar" style="  border-radius: 25px;
												border: 2px solid green">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
				<?php
					if(isset($_GET['uId'])) {
						 $sql = "select img from userImage where uId='".$_GET['uId']."';";
						 $result = mysqli_query($conn,$sql);
						 $row = mysqli_fetch_array($result);
						 $image_src = "images/profile/userImages/";
						 $image_src = $image_src."".$row['img'];
					}
					else {
						 $sql = "select img from userImage where uId='".$_SESSION['uId']."';";
						 $result = mysqli_query($conn,$sql);
						 $row = mysqli_fetch_array($result);
						 $image_src = "images/profile/userImages/";
						 $image_src = $image_src."".$row['img'];
					}
				 
				?>
				<img src='<?php echo $image_src; ?>' >
	</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php 
						if(isset($_GET['uId'])) {
							echo $profile_hName;
						}
						else {
							$profile_descr_sql="SELECT uFirstName FROM users where uId = '".$_SESSION['uId']."';";
							$profile_descr_result=$conn->query($profile_descr_sql);
							if ($conn && ($profile_descr_result->num_rows>0)) {
								while ($profile_descr_row=$profile_descr_result->fetch_assoc()) {
									$profile_descr = $profile_descr_row['uFirstName'];
								}
							}
							echo $profile_descr;
							
							$profile_descr_sql="SELECT uLastName FROM users where uId = '".$_SESSION['uId']."';";
							$profile_descr_result=$conn->query($profile_descr_sql);
							if ($conn && ($profile_descr_result->num_rows>0)) {
								while ($profile_descr_row=$profile_descr_result->fetch_assoc()) {
									$profile_descr = $profile_descr_row['uLastName'];
								}
							}
							echo $profile_descr;
						}
						?>
					</div>
					<div style="text-align:left; padding:20px;">
						<?php
							if(isset($_GET['uId'])) {
								echo "<BR><BR> Address: 	";
								$profile_address_sql="SELECT uAddress FROM users where uId = '".$_GET['uId']."';";
								$profile_address_result=$conn->query($profile_address_sql);
								if ($conn && ($profile_address_result->num_rows>0)) {
									while ($profile_address_row=$profile_address_result->fetch_assoc()) {
										$profile_address = $profile_address_row['uAddress'];
									}
								}
								echo $profile_address;
								
								echo "<BR><BR> Phone: 	";
								$profile_contactNo_sql="SELECT uContactNo FROM users where uId = '".$_GET['uId']."';";
								$profile_contactNo_result=$conn->query($profile_contactNo_sql);
								if ($conn && ($profile_contactNo_result->num_rows>0)) {
									while ($profile_contactNo_row=$profile_contactNo_result->fetch_assoc()) {
										$profile_contactNo = $profile_contactNo_row['uContactNo'];
									}
								}
								echo $profile_contactNo;
							}
							else {
								echo "<BR><BR> Address: 	";
								$profile_address_sql="SELECT uAddress FROM users where uId = '".$_SESSION['uId']."';";
								$profile_address_result=$conn->query($profile_address_sql);
								if ($conn && ($profile_address_result->num_rows>0)) {
									while ($profile_address_row=$profile_address_result->fetch_assoc()) {
										$profile_address = $profile_address_row['uAddress'];
									}
								}
								echo $profile_address;
								
								echo "<BR><BR> Phone: 	";
								$profile_contactNo_sql="SELECT uContactNo FROM users where uId = '".$_SESSION['uId']."';";
								$profile_contactNo_result=$conn->query($profile_contactNo_sql);
								if ($conn && ($profile_contactNo_result->num_rows>0)) {
									while ($profile_contactNo_row=$profile_contactNo_result->fetch_assoc()) {
										$profile_contactNo = $profile_contactNo_row['uContactNo'];
									}
								}
								echo $profile_contactNo;
							}	
							
							
					
						?>
					</div>
					
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<?php 
					if(isset($_GET['uId'])) {
						echo "<div class=\"profile-userbuttons\">
							   <button type=\"button\" class=\"btn btn-success btn-sm\">Connect</button>
						    </div>";
					}
				?>
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
							if(!(isset($_GET['uId']))) {
									$url = "editProfile.php";
									echo "<a href=$url>
								<i class=\"glyphicon glyphicon-user\"></i>
								Account Settings </a>";
							}
							?>
							
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-md-4">
			   <h2 style= "color:green";>Job History </h2>
			   <?php
					if(isset($_GET['uId'])) {
						$profile_vacancy_sql="SELECT * FROM jobHistory where uId = '".$_GET['uId']."';";
						$profile_vacancy_result=$conn->query($profile_vacancy_sql);
						if ($conn && ($profile_vacancy_result->num_rows>0)) {
							while ($profile_vacancy_row=$profile_vacancy_result->fetch_assoc()) {
								$profile_vacancy_name = $profile_vacancy_row['jName'];
								$profile_vacancy_descr = $profile_vacancy_row['jHdescr'];
								$profile_vacancy_status= $profile_vacancy_row['status'];
								$profile_vacancy_amount = $profile_vacancy_row['amount'];
								$profile_vacancy_uId = $profile_vacancy_row['uId'];
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
					}
					else {
						$profile_vacancy_sql="SELECT * FROM jobHistory where uId = '".$_SESSION['uId']."';";
						$profile_vacancy_result=$conn->query($profile_vacancy_sql);
						if ($conn && ($profile_vacancy_result->num_rows>0)) {
							while ($profile_vacancy_row=$profile_vacancy_result->fetch_assoc()) {
								$profile_vacancy_name = $profile_vacancy_row['jName'];
								$profile_vacancy_descr = $profile_vacancy_row['jHdescr'];
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
					}
			   
			   ?>
		</div>
		<div class="col-md-4">
			<div>
			   <h2 style= "color:green";>Academic Degrees</h2>
			   <?php
					if(isset($_GET['uId'])) {
						$profile_award_sql="SELECT * FROM userQualification where uId = '".$_GET['uId']."';";
						$profile_award_result=$conn->query($profile_award_sql);
						if ($conn && ($profile_award_result->num_rows>0)) {
							while ($profile_award_row=$profile_award_result->fetch_assoc()) {
								$profile_degree_id = $profile_award_row['aDid'];
								$profile_degree_date = $profile_award_row['dateRec'];
								$profile_award_sql="SELECT * FROM academicDegree where aDid = $profile_degree_id";
								$profile_award_result=$conn->query($profile_award_sql);
								if ($conn && ($profile_award_result->num_rows>0)) {
									while ($profile_award_row=$profile_award_result->fetch_assoc()) {
										$profile_degree_name = $profile_award_row['aDname'];
										$profile_degree_descr = $profile_award_row['aDdescr'];
									echo "<div class=\"card\">
												<h3 class=\"card-header success-color white-text\">Featured</h4>
											  <div class=\"card-body\">
													<h4 class=\"card-title\">$profile_degree_name</h4>
												<p class=\"card-text\">$profile_degree_descr</p>
												<a class=\"btn btn-success\">Go To Award Website</a>
											</div>
										</div>";
									}
								}
							}
						}
					}
					else {
					if(isset($_GET['uId'])) {
						$profile_award_sql="SELECT * FROM userQualification where uId = '".$_SESSION['uId']."';";
						$profile_award_result=$conn->query($profile_award_sql);
						if ($conn && ($profile_award_result->num_rows>0)) {
							while ($profile_award_row=$profile_award_result->fetch_assoc()) {
								$profile_degree_id = $profile_award_row['aDid'];
								$profile_degree_date = $profile_award_row['dateRec'];
								$profile_award_sql="SELECT * FROM academicDegree where aDid = $profile_degree_id";
								$profile_award_result=$conn->query($profile_award_sql);
								if ($conn && ($profile_award_result->num_rows>0)) {
									while ($profile_award_row=$profile_award_result->fetch_assoc()) {
										$profile_degree_name = $profile_award_row['aDname'];
										$profile_degree_descr = $profile_award_row['aDdescr'];
									echo "<div class=\"card\">
												<h3 class=\"card-header success-color white-text\">Featured</h4>
											  <div class=\"card-body\">
													<h4 class=\"card-title\">$profile_degree_name</h4>
												<p class=\"card-text\">$profile_degree_descr</p>
												<a class=\"btn btn-success\">Go To Award Website</a>
											</div>
										</div>";
									}
								}
							}
						}
					}
					}
			   
			   ?>
				
		</div>
	</div>
		<div class="col-md-4">
			<div>
			   <h2 style= "color:green";>Skills</h2>
			   <?php
					if(isset($_GET['uId'])) {
						$profile_award_sql="SELECT * FROM userSkills where uId = '".$_GET['uId']."';";
						$profile_award_result=$conn->query($profile_award_sql);
						if ($conn && ($profile_award_result->num_rows>0)) {
							while ($profile_award_row=$profile_award_result->fetch_assoc()) {
								$profile_degree_id = $profile_award_row['sId'];
								$profile_award_sql="SELECT * FROM skills where sId = $profile_degree_id";
								$profile_award_result=$conn->query($profile_award_sql);
								if ($conn && ($profile_award_result->num_rows>0)) {
									while ($profile_award_row=$profile_award_result->fetch_assoc()) {
										$profile_degree_name = $profile_award_row['sTitle'];
										$profile_degree_descr = $profile_award_row['sDescr'];
									echo "<div class=\"card\">
												<h3 class=\"card-header success-color white-text\">Featured</h4>
											  <div class=\"card-body\">
													<h4 class=\"card-title\">$profile_degree_name</h4>
												<p class=\"card-text\">$profile_degree_descr</p>
												<a class=\"btn btn-success\">Go To Award Website</a>
											</div>
										</div>";
									}
								}
							}
						}
					}
					else {
					if(isset($_GET['uId'])) {
						$profile_award_sql="SELECT * FROM userSkills where uId = '".$_GET['uId']."';";
						$profile_award_result=$conn->query($profile_award_sql);
						if ($conn && ($profile_award_result->num_rows>0)) {
							while ($profile_award_row=$profile_award_result->fetch_assoc()) {
								$profile_degree_id = $profile_award_row['sId'];
								$profile_award_sql="SELECT * FROM skills where sId = $profile_degree_id";
								$profile_award_result=$conn->query($profile_award_sql);
								if ($conn && ($profile_award_result->num_rows>0)) {
									while ($profile_award_row=$profile_award_result->fetch_assoc()) {
										$profile_degree_name = $profile_award_row['sTitle'];
										$profile_degree_descr = $profile_award_row['sDescr'];
									echo "<div class=\"card\">
												<h3 class=\"card-header success-color white-text\">Featured</h4>
											  <div class=\"card-body\">
													<h4 class=\"card-title\">$profile_degree_name</h4>
												<p class=\"card-text\">$profile_degree_descr</p>
												<a class=\"btn btn-success\">Go To Award Website</a>
											</div>
										</div>";
									}
								}
							}
						}
					}
					}
			   
			   ?>
				
		</div>
		</div>
	</div>		
    </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>