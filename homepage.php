<?php
    session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

    <title>Homepage</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand abs" href="../index.php">HoteledInn</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse collapse" id="collapsingNavbar">
      <ul class="navbar-nav ml-auto">
      <form class ="form-inline navbar-form" action="includes/login.php" method="POST" novalidate="novalidate">
        <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="#">Jobs</a>
        </li>
          <li class="nav-item">
                <a class="nav-link" href="#">Connections</a>
            </li>
          <li class="nav-item">
                  <a class="btn btn-primary" role="button" href="includes/logout.php">Log out</a>
          </li>
      </form>
      </ul>
  </div>
</nav>
    
    <div class="container">
        <div class="row">
            <div class = "col-lg-2">
                <div class = "p-2">
                    <div class = "p-2"><img class="profile-picture" src="http://via.placeholder.com/120/aa5555/000000"></div>
                    <div class = "p-2">
                        <?php
                            if(isset($_SESSION['uFirst'])) {
                                echo $_SESSION['uFirst'];
                            } else {
                            echo "Name";
                            }
                    ?>
                    </div>
                </div>
            </div>
            <div class = "col-lg-8">
                <div id = "vacancies" class = "d-flex flex-column p-2">
                    <?php 
                        include 'includes/db.php';
                        $sql = "SELECT * FROM vacancies;";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class = "p-2"><?php echo $row["vName"]; echo " "; echo $row['vDescr']; ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class = "col-xs-2">
                <div class = "d-flex flex-column p-2">
                    <div class = "d-flex flex-column">
                        <div class = "d-flex flex-column p-2">
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-user"></span> Add Friend
                            </button>
                        </div>
                        <div class = "d-flex flex-column p-2"><img class="profile-picture" src="http://via.placeholder.com/120/aa5555/000000"></div>
                        <div class = "d-flex flex-column p-2">Name</div>
                    <div>
                    <div class = "d-flex flex-column">
                        <div class = "d-flex flex-column p-2">
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-user"></span> Add Friend
                            </button>
                        </div>
                        <div class = "d-flex flex-column p-2"><img class="profile-picture" src="http://via.placeholder.com/120/aa5555/000000"></div>
                        <div class = "d-flex flex-column p-2">Name</div>
                    <div>
                    <div class = "d-flex flex-column">
                        <div class = "d-flex flex-column p-2">
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-user"></span> Add Friend
                            </button>
                        </div>
                        <div class = "d-flex flex-column p-2"><img class="profile-picture" src="http://via.placeholder.com/120/aa5555/000000"></div>
                        <div class = "d-flex flex-column p-2">Name</div>
                    <div>
                    <div class = "d-flex flex-column">
                        <div class = "d-flex flex-column p-2">
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-user"></span> Add Friend
                            </button>
                        </div>
                        <div class = "d-flex flex-column p-2"><img class="profile-picture" src="http://via.placeholder.com/120/aa5555/000000"></div>
                        <div class = "d-flex flex-column p-2">Name</div>
                    <div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>