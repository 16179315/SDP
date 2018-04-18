<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Hello, world!</title>
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
                  <a class="btn btn-primary" role="button" href="includes/logout.php">Log out</a>
          </li>
        </ul>
    </div>
</nav>

    <div class="container">
        <div class = "row">
            <div class ="col-lg-12">
            <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">Ban User Permanenently</h5>
            <button id="permBanButton" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select User
            </button>
                <div class="dropdown-menu" id="permBanDropdown">
                <?php 
                include 'includes/db.php';
                $sql = "SELECT uFirstName, uLastName FROM users";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <a class="dropdown-item" href="#"><?php echo $row['uFirstName']; echo " "; echo $row['uLastName'];?></a>      
                <?php }?>       
                </div>
            <a href="#" class="btn btn-primary">Ban User</a>
        </div>
            </div>
            </div>
        </div>
        <div class = "row">
            <div class ="col-lg-12">
            <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">Ban User Temporarily</h5>
            <button id="tempBanButton" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select User
            </button>
                <div class="dropdown-menu" id="tempBanDropdown">
                <?php 
                include 'includes/db.php';
                $sql = "SELECT uFirstName, uLastName FROM users";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <a class="dropdown-item" href="#"><?php echo $row['uFirstName']; echo " "; echo $row['uLastName'];?></a>      
                <?php }?>       
                </div>
            <a href="#" class="btn btn-primary">Ban User</a>
        </div>
            </div>
            </div>
        </div>
        <div class = "row">
            <div class ="col-lg-12">
            <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">Remove Vacancy Ad</h5>
            <button id="removeVacancyButton" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select User
            </button>
                <div class="dropdown-menu" id="removeVacancyDropdown">
                <?php 
                include 'includes/db.php';
                $sql = "SELECT * FROM vacancies";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <a class="dropdown-item" href="#"><?php echo $row['vId']; echo " "; echo $row['hId'] ;echo " ";echo $row['vName']; echo " "; echo $row['vDescr'];?></a>      
                <?php }?>       
                </div>
            <a href="#" class="btn btn-primary">Remove Ad</a>
        </div>
            </div>
            </div>
        </div>
        <div class = "row">
            <div class ="col-lg-12">
            <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">Edit Hotel Profile</h5>
            <button id="editHotelButton" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select User
            </button>
                <div class="dropdown-menu"  id="editHotelDropdown">
                <?php 
                include 'includes/db.php';
                $sql = "SELECT * FROM hotels";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <a class="dropdown-item" href="#"><?php echo $row['hName']; echo " ";?></a>      
                <?php }?>       
                </div>
            <a href="#" class="btn btn-primary">Edit Hotel</a>
        </div>
        <div class = "row">
            <div class ="col-lg-12">
            <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Edit User Profile</h5>
                    <button id="editUserButton" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select User
		            </button>
		                <div class="dropdown-menu" id="editUserDropdown">
                        <?php 
                        include 'includes/db.php';
                        $sql = "SELECT uFirstName, uLastName FROM users";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <a class="dropdown-item" href="#"><?php echo $row['uFirstName']; echo " "; echo $row['uLastName'];?></a>      
                        <?php }?>       
		                </div>
                    <a href="#" class="btn btn-primary">Edit User</a>
                </div>
            </div>
            </div>
        </div>       
            </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script>
    $('.dropdown-menu a').on('click', function(){
	var option = $(this).text();
    var divId = $(this).closest(".dropdown-menu").attr("id");
    if (divId == "permBanDropdown") {
        document.getElementById("permBanButton").innerText = option;
    }
    else if (divId == "tempBanDropdown") {
        document.getElementById("tempBanButton").innerText = option;
    }
    else if (divId == "removeVacancyDropdown") {
        document.getElementById("removeVacancyButton").innerText = option;
    }
    else if (divId == "editHotelDropdown") {
        document.getElementById("editHotelButton").innerText = option;
    }
    else if (divId == "editUserDropdown") {
        document.getElementById("editUserButton").innerText = option;
    }
    });
    </script>
  </body>
</html>