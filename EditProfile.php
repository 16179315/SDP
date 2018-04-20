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
  
  <script type="text/javascript">
    function Delete(id) {
      window.location="EditProfile.php?delSkill="+id;
    }
  </script>
</head>
<body>
<<<<<<< HEAD
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
    
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="form-group">
          <h3><b>Upload Image</b></h3>
=======
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
					<div class="profile-usertitle-job">
						<?php
						if(isset($_GET['uId'])) {
							$profile_descr_sql="SELECT uBio FROM users where uId = '".$_GET['uId']."';";
							$profile_descr_result=$conn->query($profile_descr_sql);
							if ($conn && ($profile_descr_result->num_rows>0)) {
								while ($profile_descr_row=$profile_descr_result->fetch_assoc()) {
									$profile_descr = $profile_descr_row['uBio'];
								}
							}
							echo $profile_descr;
						}
						
						else {
							$profile_descr_sql="SELECT uBio FROM users where uId = '".$_SESSION['uId']."';";
							$profile_descr_result=$conn->query($profile_descr_sql);
							if ($conn && ($profile_descr_result->num_rows>0)) {
								while ($profile_descr_row=$profile_descr_result->fetch_assoc()) {
									$profile_descr = $profile_descr_row['uBio'];
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
						<li>
							<a href="Profile.php">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li class ="active">
							<?php 
							if(!(isset($_GET['uId']))) {
									$url = "editProfile.php";
									echo "<a href=$url>
									<a href=\"Profile.php\">
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

    <div class="col-md-8">
      <div class="form-group">
          <label>Upload Image</label>
>>>>>>> 45cc122cd1efdb2639f8fd5dbc09a9b1cc22e11d
          <div class="input-group">
              <form method="post" action="includes/profile/uploadImage.php" enctype='multipart/form-data'>
                <input type='file' name='file' />
                <input type='submit' value='Upload Image' name='but_upload'>
            </form>
          </div>
      	</div>
  	</div>
  </div>
  <h3><b>Update information</b></h3>
  <form action="includes/profile/editBasic.php" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="changeFirstName"><b>First Name</b></label>
        <?php 
        $firstname_sql="SELECT uFirstName FROM users WHERE uId='".$_SESSION['uId']."';";
        $firstname_result=$conn->query($firstname_sql);
        if ($conn && ($firstname_result->num_rows>0)) {
          while ($firstname_row=$firstname_result->fetch_assoc()) {
            if ($firstname_row['uFirstName']!="NULL") {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeFirstName\" placeholder=\"".$firstname_row['uFirstName']."\">";
            } else {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeFirstName\" placeholder=\"Please enter a name\">";
            }
          }
        }?>
      </div>
      <div class="form-group col-md-6">
        <label for="changeLastName"><b>Last Name</b></label>
        <?php 
        $lastname_sql="SELECT uLastName FROM users WHERE uId='".$_SESSION['uId']."';";
        $lastname_result=$conn->query($lastname_sql);
        if ($conn && ($lastname_result->num_rows>0)) {
          while ($lastname_row=$lastname_result->fetch_assoc()) {
            if ($lastname_row['uLastName']!="NULL") {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeLastName\" placeholder=\"".$lastname_row['uLastName']."\">";
            } else {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeLastName\" placeholder=\"Please enter a name\">";
            }
          }
        }?>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="changeEmail"><b>Email</b></label>
        <?php 
        $email_sql="SELECT uEmail FROM users WHERE uId='".$_SESSION['uId']."';";
        $email_result=$conn->query($email_sql);
        if ($conn && ($email_result->num_rows>0)) {
          while ($email_row=$email_result->fetch_assoc()) {
            if ($email_row['uEmail']!="NULL" || $email_row['uEmail']=="") {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeEmail\" placeholder=\"".$email_row['uEmail']."\">";
            } else {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeEmail\" placeholder=\"Please enter a valid email address\">";
            }
          }
        }?>
      </div>
      <div class="form-group col-md-6">
        <label for="changeNumber"><b>Contact Number</b></label>
        <?php 
        $contactno_sql="SELECT uContactNo FROM users WHERE uId='".$_SESSION['uId']."';";
        $contactno_result=$conn->query($contactno_sql);
        if ($conn && ($contactno_result->num_rows>0)) {
          while ($contactno_row=$contactno_result->fetch_assoc()) {
            if ($contactno_row['uContactNo']!="NULL" || $contactno_row['uContactNo']==0) {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeNumber\" placeholder=\"".$contactno_row['uContactNo']."\">";
            } else {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeNumber\" placeholder=\"Please enter a contact number\">";
            }
          }
        }?>      
      </div>
    </div>
    <div class="form-group">
      <label for="changeAddress"><b>Address</b></label>
      <?php 
      $address_sql="SELECT uAddress FROM users WHERE uId='".$_SESSION['uId']."';";
      $address_result=$conn->query($address_sql);
      if ($conn && ($address_result->num_rows>0)) {
        while ($address_row=$address_result->fetch_assoc()) {
          if ($address_row['uAddress']!="NULL" || $address_row['uAddress']=="") {
            echo "<textarea class=\"form-control\" name=\"changeAddress\" rows =\"5\" >".$address_row['uAddress']."</textarea>";
          } else {
            echo "<textarea class=\"form-control\" name=\"changeAddress\" rows =\"5\" >Please enter address...</textarea>";
          }
        }
      }?>
    </div>
    <div class="form-group">
      <label for="changeBio"><b>Bio</b></label>
      <?php 
      $bio_sql="SELECT uBio FROM users WHERE uId='".$_SESSION['uId']."';";
      $bio_result=$conn->query($bio_sql);
      if ($conn && ($bio_result->num_rows>0)) {
        while ($bio_row=$bio_result->fetch_assoc()) {
          if ($bio_row['uBio']!="NULL" || $bio_row['uBio']=="") {
            echo "<textarea class=\"form-control\" name=\"changeBio\" rows =\"5\" >".$bio_row['uBio']."</textarea>";
          } else {
            echo "<textarea class=\"form-control\" name=\"changeBio\" rows =\"5\" placeholder=\"Please enter bio...\"></textarea>";
          }
        }
      }?>
    </div>
    <button type="submit" name = "submit" class="btn btn-primary" style="background-color: green">Update Information</button>
  </form>
  <br>

  <h3><b>Edit Skills</b></h3>
  <form action="includes/profile/editSkills.php" method="POST">
    <?php
    $skill_sql="";
    $skill_sql="SELECT sTitle FROM skills;";
    $skill_result=mysqli_query($conn, $skill_sql) or die(mysqli_error($conn));
    $resultCheck = mysqli_num_rows($skill_result);
    
    
    if ($resultCheck<1) {
        exit();
    } else {
      while ($skill_row=$skill_result->fetch_assoc()) {
        $checked="";
        $userSkill_sql="SELECT sTitle FROM skills NATURAL JOIN userSkills NATURAL JOIN users WHERE uId='".$_SESSION['uId']."' AND sTitle='".$skill_row['sTitle']."';";
        $userSkill_result=mysqli_query($conn, $userSkill_sql) or die(mysqli_error($conn));
        $usresultCheck=mysqli_num_rows($userSkill_result);
        if ($usresultCheck==1) {
          $checked="checked";
        }
        echo
        "<div class=\"form-check\">
          <input type=\"checkbox\" class=\"form-check-input\" name=\"change".$skill_row['sTitle']."\" value=\"change".$skill_row['sTitle']."\" ".$checked.">
          <label class=\"form-check-label\" for=\"exampleCheck1\">".$skill_row['sTitle']."</label>
        </div>";
      }
    }
    ?>
    <button type="submit" name="submit" class="btn btn-primary" style="background-color: green">Update Skills</button>
  </form>
  <br>
  <h3><b>New Job History</b></h3>
  <form action="includes/profile/newHistory.php" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="jobName"><b>Job Name</b></label>
        <input type="text" name="jobName" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label for="hotelName"><b>Hotel Name</b></label>
        <input type="text" name="hotelName" class="form-control">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="fromDate"><b>Start Date</b></label>
        <input type="date" name="fromDate" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label for="toDate"><b>End Date</b></label>
        <input type="date" name="toDate" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="jobDesc">Job Description</label>
      <textarea class="form-control" name="jobDesc" rows="5" placeholder="Write a brief description"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="background-color: green">Submit</button>
  </form>
  <br>
  <h3><b>Edit Job History</b></h3>
  <?php
  $sql="SELECT * FROM jobHistory INNER JOIN hotels ON jobHistory.hId=hotels.hId WHERE uId='".$_SESSION['uId']."';";
  $result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck<1) {
    exit();
  } else {
    while ($job_row=$result->fetch_assoc()) {
      if (!isset($job_row['jHid']) || $job_row['jHid']!=NULL) {
        echo 
          "<p for=\"hotelName\"><b>".$job_row['jName']." at ".$job_row['hName']."<b></p>
          <form action=\"includes/profile/editHistory.php\" method=\"POST\">
            <input type=\"hidden\" name=\"jHid\" value=\"".$job_row['jHid']."\">
            <div class=\"form-row\">
              <div class=\"form-group col-md-6\">
                <input type=\"text\" name=\"jobName\" class=\"form-control\" placeholder=\"".$job_row['jName']."\">
              </div>
              <div>
                <input type=\"text\" name=\"hName\" class=\"form-control\" placeholder=\"".$job_row['hName']."\">
              </div>
            </div>
            <div class=\"form-row\">
              <div class=\"form-group col-md-6\">
                <label for=\"fromDate\">Start Date</label>
                <input type=\"date\" name=\"fromDate\" class=\"form-control\" value=\"".$job_row['fromDate']."\">
              </div>
              <div class=\"form-group col-md-6\">
                <label for=\"toDate\">End Date</label>
                <input type=\"date\" name=\"toDate\" class=\"form-control\" value=\"".$job_row['toDate']."\">
              </div>
            </div>
            <div class=\"form-group\">
              <label for=\"jobDesc\">Job Description</label>
              <textarea class=\"form-control\" name=\"jobDesc\" rows=\"5\">".$job_row['jHdescr']."</textarea>
            </div>
            <div class=\"form-check\">
              <input type=\"checkbox\" class=\"form-check-input\" name=\"deleteJob\" value=\"YES\">
              <label class=\"form-check-label\" for=\"deleteJob\">Delete Job?</label>
            </div>
            <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" style=\"background-color: green\">Update Job</button>
          </form>";
      }
    }
  }
  ?>
</form>
</body>
</html>