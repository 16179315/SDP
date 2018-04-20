<?php
  session_start();
  include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function Delete(id) {
      window.location="EditProfile.php?delSkill="+id;
    }
  </script>
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
    
  <div class="container">
   <div class="row">
    <div class="col-md-7">
      <div class="form-group">
          <label>Upload Image</label>
          <div class="input-group">
              <span class="input-group-btn">
                  <span class="btn btn-default btn-file">
                      Browse… <input type="file" id="imgInp">
                  </span>
              </span>
              <input type="text" class="form-control" readonly>
          </div>
          <img id='img-upload'/>
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