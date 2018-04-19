<?php
  session_start();
  include 'includes/db.php';

  /*
  if($_GET['del']) {
    $delete_skill_sql="DELETE FROM userSkills WHERE uId=".$_SESSION['uId']." AND sId=".$deleteSkillId;
    $result=mysql_query($delete_skill_sql);
  }
  */
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
      <a class="navbar-brand abs" href="../index.php">HoteledIn</a>
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

<!--
    <div>
      <div class="col-md-4">
        <form class="form-horizontal" action="/includes/addSkill.php" method="post"></form>
          <div class="form-group">
            <label for="comment">Skills:</label>
            <textarea class="form-control" rows="5" id="comment" name="addSkill" id="addSkill"></textarea>
            <button type="submit" class="btn btn-primary" style="background-color: green">Update</button>
          </div> 
        </div>
      </div>
      <div class="col-md-4">
        <?php echo "<form class=\"form-horizontal\" action=\"includes/profile/changeAddress.php\" method=\"post\">";?>
          <div class="form-group">
            <?php echo "<input type\"hidden\" name=\"uId\" value='".$_GET['uId']."'>";?>
            <label for="comment">Change Address:</label>
            <input class="form-control" type="text" id="changeAddress" name="changeAddress"></input>
            <button type="submit" class="btn btn-primary" style="background-color: green" name="submit">Update</button>
          </div> 
        </form>
      </div>
      <div class="col-md-4">
        <?php echo "<form class=\"form-horizontal\" action=\"includes/profile/changeContactNo.php\" method=\"post\">";?>
          <div class="form-group">
            <?php echo "<input type\"hidden\" name=\"uId\" value='".$_GET['uId']."'>";?>
            <label for="comment">Change Contact Number:</label>
            <input class="form-control" type="text" id="changeNumber" name="changeNumber"></input>
            <button type="submit" class="btn btn-primary" style="background-color: green" name="submit">Update</button>
          </div> 
        </form>
    </div>
  </div>
-->
  <h3><b>Update information</b></h3>
  <form action="includes/profile/editBasic.php" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="changeEmail4">Email</label>
        <?php 
        $email_sql="SELECT uEmail FROM users WHERE uId='".$_SESSION['uId']."';";
        $email_result=$conn->query($email_sql);
        if ($conn && ($email_result->num_rows>0)) {
          while ($email_row=$email_result->fetch_assoc()) {
            if ($email_row['uEmail']!="NULL") {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeEmail\" placeholder=\"".$email_row['uEmail']."\">";
            } else {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeEmail\" placeholder=\"Please enter a valid email address\">";
            }
          }
        }?>
      </div>
      <div class="form-group col-md-6">
        <label for="changeNumber4">Contact Number</label>
        <?php 
        $contactno_sql="SELECT uContactNo FROM users WHERE uId='".$_SESSION['uId']."';";
        $contactno_result=$conn->query($contactno_sql);
        if ($conn && ($contactno_result->num_rows>0)) {
          while ($contactno_row=$contactno_result->fetch_assoc()) {
            if ($email_row['uContactNo']!="NULL") {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeNumber\" placeholder=\"".$contactno_row['uContactNo']."\">";
            } else {
              echo "<input type=\"text\" class=\"form-control\" name=\"changeEmail\" placeholder=\"Please enter a contact number\">";
            }
          }
        }?>      
      </div>
    </div>
    <div class="form-group">
      <label for="changeAddress">Address</label>
      <?php 
      $address_sql="SELECT uAddress FROM users WHERE uId='".$_SESSION['uId']."';";
      $address_result=$conn->query($address_sql);
      if ($conn && ($address_result->num_rows>0)) {
        while ($address_row=$address_result->fetch_assoc()) {
          if ($email_row['uAddress']!="NULL") {
            echo "<input type=\"text\" class=\"form-control\" name=\"changeAddress\" placeholder=\"".$address_row['uAddress']."\">";
          } else {
            echo "<input type=\"text\" class=\"form-control\" name=\"changeEmail\" placeholder=\"Please enter an address\">";
          }
        }
      }?>
    </div>
    <div class="form-group">
      <label for="changeBio">Bio</label>
      <textarea class="form-control" name="changeBio" rows ="3" ></textarea>
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
</form>
</body>
</html>