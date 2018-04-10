<?php
session_start()
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Connections</title>
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
        <?php if($_SESSION['userLoggedIn'] == true) {
            $url = "profile.php?uId=".$_SESSION['uId'];
            echo "<a class=\"nav-link\" href="."$url".">Profile</a>";
        }
        else if($_SESSION['hotelLoggedIn'] == true) {
            $url = "hotel.php?hId=".$_SESSION['hId'];
            echo "<a class=\"nav-link\" href="."$url".">Profile</a>";
        }
        ?>
        
        </li>
          <li class="nav-item">
          <a class="nav-link" href="#">Jobs</a>
        </li>
          <li class="nav-item">
                <a class="nav-link" href="connections.php">Connections</a>
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
    <div class = "col-lg-7">
    <div id = "vacancies" class = "d-flex flex-column p-2">
    <div class="card-group">
        <?php 
            include 'includes/db.php';
            $sql = "SELECT uid2 FROM friends WHERE uid1 = ".$_SESSION['uId'].";";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card mr-2 mb-2 mt-2">
            <?php $sql2 = "SELECT img FROM userImage WHERE uId = ".$row['uid2']."";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $image = $row2['img'];
                    $dirName = "images/profile/".$image;
                    echo '<img class="card-img-top" src="'.$dirName.'" alt="Profile Picture">'
                    ?>
                <div class="card-body">
                    <h5 class="card-title"><?php 
                        $sql3 = "SELECT uFirstName, uLastName FROM users WHERE uId = ".$row['uid2']."";
                        $result3 = mysqli_query($conn, $sql3);
                        $row3 = mysqli_fetch_assoc($result3);
                        echo $row3['uFirstName']." ".$row3['uLastName'];
                    ?></h5>
                    <a href="#" class="card-link">Link to profile</a>
                </div>
            </div>
        <?php } ?>
    </div>
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