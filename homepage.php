<?php
    session_start();

    if (!(isset($_SESSION['userLoggedIn']) || isset($_SESSION['hotelLoggedIn']))) {
        header("Location: ../index.php");
        exit();
    }
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
        </form>
          <li class="nav-item">
          <a class="nav-link" href="#">Jobs</a>
        </li>
          <li class="nav-item">
                <a class="nav-link" href="connections.php">Connections</a>
            </li>
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
          <li class="nav-item">
                  <a class="btn btn-primary" role="button" href="includes/logout.php">Log out</a>
          </li>
      </ul>
  </div>
</nav>
    
    <div class="container">
        <div class="row">
            <div class = "col-lg-2">
                <div class = "p-2">
                    <div class = "p-2"><?php
                    include 'includes/db.php';
                    $sql4 = "SELECT img FROM userImage WHERE uId = ".$_SESSION['uId'].";";
                    $result4 = mysqli_query($conn, $sql4);
                    $imageRow1 = mysqli_fetch_assoc($result4);
                    $image1 = $imageRow1["img"];
                    $dirName1 = "images/profile/".$image1;
                    echo '<img class="profile-picture" src="'.$dirName1.'" />';
                    //$imageData1 = base64_encode(file_get_contents($image1));
                    //echo '<img class="profile-picture" src="data:image/png;base64,'.$imageData1.'">';
                    ?></div>
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
                        <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["vName"];?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php
                                    $sql1 = "SELECT hName FROM hotels NATURAL JOIN vacancies WHERE vId = ".$row["vId"].";";
                                    $result1 = mysqli_query($conn, $sql1);
                                    $row1 = mysqli_fetch_assoc($result1);
                                    echo $row1["hName"];
                                ?></h6>
                                <p class="card-text"><?php echo $row["vDescr"];?></p>
                                <a href="#" class="card-link">Link to vacancy</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class = "col-xs-2 ml-2">
                <div class = "d-flex flex-column p-2">
                <?php
                    include 'includes/db.php';
                    $sql2 = "SELECT * FROM users WHERE uId <> ".$_SESSION['uId']." AND uId NOT IN (SELECT uid2 FROM friends WHERE uid1 = ".$_SESSION['uId'].") ;";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                        <div class = "d-flex flex-column">
                        <div class = "d-flex flex-column p-2"><?php
                            $sql3 = "SELECT img FROM userImage WHERE uId = ".$row2['uId'].";";
                            $result3 = mysqli_query($conn, $sql3);
                            $imageRow = mysqli_fetch_assoc($result3);
                            $image = $imageRow["img"];
                            $dirName = "images/profile/".$image;
                            echo '<img class="profile-picture" src="'.$dirName.'" />';
                            //$imageData = base64_encode(file_get_contents($image));
                            //echo '<img class="profile-picture" src="data:image/png;base64,'.$imageData.'">';
                        ?></div>
                        <div class = "d-flex flex-column p-2"><?php echo $row2["uFirstName"]; echo " "; echo $row2["uLastName"];?></div>
                        <div class = "d-flex flex-column p-2">
                        <a class="btn btn-outline-primary" href="addConnection.php?uId2=<?= $row2['uId']?>" role="button">Add connection</a>
                        </div>
                        <hr width="100%">
                    <?php } ?>
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