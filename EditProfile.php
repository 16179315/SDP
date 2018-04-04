<?php
  session_start();
  include 'includes/db.php';

  if($_GET['del']) {
    $delete_skill_sql="DELETE FROM userSkills WHERE uId=".$_SESSION['uId']." AND sId=".$deleteSkillId;
    $result=mysql_query($delete_skill_sql);
  }
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


    <div>
      <div class="col-md-4">
    		<div class="form-group">
    			<label for="comment">Skills:</label>
          <?php
          $skill_sql="SELECT sTitle, sId FROM skills s, userSkills u WHERE u\.sId=s\.sId AND u\.uId= '".$_SESSION['uId']."';";
          $skill_result=$conn->query($skill_sql);
          if ($conn && ($skill_result->num_rows>0)) {
              while ($skill_row=$skill_result->fetch_assoc()) {
                echo "<div class=form-group>
                        <p>".$skill_row['sTitle']."</p>
                        <input type=\"button\" name=\"del-skill\" id=\"del-skill\" class=\"btn btn-dark\" onclick=\"return Delete(".$skill_row['sId'].">Delete</button>
                      </div>";
            }
          }
          ?>
          <div class="skill-row">
            <p>Add Skill</p>
            <form>
              <?php
              $new_skill_sql="SELECT sTitle, sId FROM skills WHERE sId NOT IN (SELECT sId FROM userSkills WHERE uId='".$_SESSION['uId']."');";
              $new_skill_result=$conn->query($new_skill_sql);
              if ($conn && ($new_skill_result->num_rows>0)) {
                  while ($new_skill_row=$new_skill_result->fetch_assoc()) {
                    echo "input type=\"radio\" name=\"newSkill\">".$new_skill_row['sTitle']."</input>";
                }
              }
              ?>
              <input type="submit" name="submit">
            </form>
          </div>
    			<button type="submit" class="btn btn-primary" style="background-color: green">Update</button>
  		  </div> 
      </div>
      <div class="col-md-4">
  		  <div class="form-group">
    			<label for="comment">Qualifications:</label>
    			<textarea class="form-control" rows="5" id="comment"></textarea>
    			<button type="submit" class="btn btn-primary" style="background-color: green">Update</button>
  		  </div> 
  	  </div>
      <div class="col-md-4">
    		<div class="form-group">
    			<label for="comment">Employment History:</label>
    			<textarea class="form-control" rows="5" id="comment"></textarea>
    			<button type="submit" class="btn btn-primary" style="background-color: green">Update</button>
    		</div> 
      </div>
      <div class="col-md-4">
        <form class="form-horizontal" action="/includes/changeAddress.php" method="post">
          <div class="form-group">
            <label for="comment">Change Address:</label>
            <textarea class="form-control" rows="5" id="comment" name="changeAddress"></textarea>
            <button type="submit" class="btn btn-primary" style="background-color: green" name="submit">Update</button>
          </div> 
        </form>
      </div>
      <div class="col-md-4">
        <form class="form-horizontal" action="/includes/changeContactNo.php" method="post">
          <div class="form-group">
            <label for="comment">Change Contact Number:</label>
            <textarea class="form-control" rows="5" id="comment" name="changeContactNo" id="changeContactNo"></textarea>
            <button type="submit" class="btn btn-primary" style="background-color: green" name="submit">Update</button>
          </div> 
        </form>
      </div>
    </div>
  </div>

</body>
</html>