<?php
// is adminLoggedIn set
    session_start();

    if (isset($_SESSION['adminLoggedIn'])) {
	}
	else if (isset($_SESSION['hotelLoggedIn'])) {
        if($_SESSION['hotelLoggedIn'] == true) {
            $url = "Location:../hotel.php?hId=".$_SESSION['hId'];
            header("Location: ".$url);
            exit();
		}
	}
	else if (isset($_SESSION['userLoggedIn'])) {
		if($_SESSION['userLoggedIn'] == true) {
            $url = "Location:../profile.php?uId=".$_SESSION['uId'];
            header("Location: ".$url);
            exit();
		}
    }
    else {
        $url = "Location:../index.php";
        header("Location: ".$url);
        exit();
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Admin Page</title>
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

<?php if (isset($_SESSION['successfulBan']) && $_SESSION['successfulBan']): ?>

<div class="alert alert-success alert-dismissable ml-4 mr-4 mt-4">
<strong>You have successfully banned the account.</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
  </button>
</div>

	<?php unset($_SESSION['successfulBan']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['successfulVacancyRemove']) && $_SESSION['successfulVacancyRemove']): ?>

<div class="alert alert-success alert-dismissable ml-4 mr-4 mt-4">
<strong>You have successfully removed the vacancy.</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
  </button>
</div>

	<?php unset($_SESSION['successfulVacancyRemove']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['unsuccessfulBan']) && $_SESSION['unsuccessfulBan']): ?>

<div class="alert alert-danger alert-dismissable ml-4 mr-4 mt-4">
<strong>That user is already banned.</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
  </button>
</div>

<?php unset($_SESSION['unsuccessfulBan']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['incorrectInputTempBan']) && $_SESSION['incorrectInputTempBan']): ?>

<div class="alert alert-danger alert-dismissable ml-4 mr-4 mt-4">
<strong>You have entered an invalid date.</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
  </button>
</div>

<?php unset($_SESSION['incorrectInputTempBan']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['unsuccessfulVacancyRemove']) && $_SESSION['unsuccessfulVacancyRemove']): ?>

<div class="alert alert-danger alert-dismissable ml-4 mr-4 mt-4">
<strong>There was an error whilst trying to remove the vacancy.</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
  </button>
</div>

<?php unset($_SESSION['unsuccessfulVacancyRemove']); ?>
<?php endif; ?>

    <div class="container">
    <div class = "row">
            <div class ="col-lg-12">
            <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">Ban User Permanenently</h5>
            <form action="includes/banUser.php" method="POST">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select User</label>
                    <select name="option" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                        include 'includes/db.php';
                        $sql = "SELECT uId, uFirstName, uLastName FROM users";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                        <option><?php echo $row['uFirstName']; echo " "; echo $row['uLastName'];  echo " -  uId:"; echo$row['uId']; ?></option> <?php }?>
                    </select>
            </div>
            <button class="btn btn-primary" id="banhammerPerm" name ="banhammerPerm" type="submit">Ban User</button>
            </form>
        </div>
            </div>
            </div>
        </div>
        <div class = "row">
            <div class ="col-lg-12">
            <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">Ban User Temporarily</h5>
            <form action="includes/banUser.php" method="POST">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select User</label>
                    <select name="option" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                        include 'includes/db.php';
                        $sql = "SELECT uId, uFirstName, uLastName FROM users";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                        <option><?php echo $row['uFirstName']; echo " "; echo $row['uLastName'];  echo " -  uId:"; echo$row['uId']; ?></option> <?php }?>
                    </select>
                    <input type="text" class="form-control mt-2" name = "banLength" id="banLength" placeholder="Ban expiration date (Format: YYYY-MM-DD)">
            </div>
            <button class="btn btn-primary" id="banhammerTemp" name ="banhammerTemp" type="submit">Ban User</button>
            </form>
        </div>
            </div>
            </div>
        </div>
        <div class = "row">
            <div class ="col-lg-12">
            <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">Remove Vacancy Ad</h5>
            <form action="includes/removeVacancy.php" method="POST">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Vacancy</label>
                    <select name="option" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                        include 'includes/db.php';
                        $sql = "SELECT * FROM vacancies";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                        <option><?php echo $row['vId']; echo " "; echo $row['hId'] ;echo " ";echo $row['vName']; echo " "; echo $row['vDescr']; ?></option> <?php }?>
                    </select>
            </div>
            <button class="btn btn-primary" id="vacancyRemove" name ="vacancyRemove" type="submit">Remove Vacancy</button>
            </form>
        </div>
            </div>
            </div>
        </div>
        <div class = "row">
            <div class ="col-lg-12">
            <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
            <div class="card-body">
            <h5 class="card-title">Edit Hotel Profile</h5>
            <button id="editHotelText" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <a id ="editHotelButton" href="#" class="btn btn-primary">Edit Hotel</a>
        </div>
        <div class = "row">
            <div class ="col-lg-12">
            <div class="card mr-2 mb-2 mt-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Edit User Profile</h5>
                    <button id="editUserText" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <a id ="editUserButton" href="#" class="btn btn-primary">Edit User</a>
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
    var user = "";
    $('.dropdown-menu a').on('click', function(){
	var option = $(this).text();
    var divId = $(this).closest(".dropdown-menu").attr("id");
    if (divId == "permBanDropdown") {
        document.getElementById("permBanText").innerText = option;
    }
    else if (divId == "tempBanDropdown") {
        document.getElementById("tempBanText").innerText = option;
    }
    else if (divId == "removeVacancyDropdown") {
        document.getElementById("removeVacancyText").innerText = option;
    }
    else if (divId == "editHotelDropdown") {
        document.getElementById("editHotelText").innerText = option;
    }
    else if (divId == "editUserDropdown") {
        document.getElementById("editUserText").innerText = option;
    }
    });

    $('#permBanButton').click(function() {
        user = $('#permBanText').text();
        console.log(user);
    });
    $('#tempBanButton').click(function() {
        user = $('#tempBanText').text();
        console.log(user);
    });
    $('#removeVacancyButton').click(function() {
        user = $('#removeVacancyText').text();
        console.log(user);
    });
    $('#editHotelButton').click(function() {
        user = $('#teditHotelText').text();
        console.log(user);
    });
    $('#editUserButton').click(function() {
        user = $('#editUserText').text();
        console.log(user);
    });

    function banUser() {
       document.getElementById("permBanButton").setAttribute("href", "includes/banUser.php?uId" + $('#permBanText').text());
       return false;
    }
    </script>
  </body>
</html>