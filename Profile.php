<?php
    session_start();
 
    $dbServerName = "sql11.freemysqlhosting.net:3306";
    $dbUsername = "sql11225471";
    $dbPassword = "cbgPE8apID";
    $dbName = "sql11225471";
	$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
	$uid = $_SESSION['uId'];
 
    //$bio=mysqli_query($conn, "SELECT uBio FROM users where uId = ''$_SESSION[uId]'';");
    //$address=mysqli_query($conn, "SELECT uAddress FROM users where uId = '$_SESSION[uAddress]';");
?>
 
<html>
<head>
    <title>
        <?php
            echo $_SESSION['uFirst']." ".$_SESSION['uLast'];
        ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
 
    <div class="center">
        <img align="left" class="banner" src="http://via.placeholder.com/1000x200px">
        <img class="profile-picture" src="http://via.placeholder.com/120/aa5555/000000">
        <div class="name">
            <h2>
                <?php
                    echo $_SESSION['uFirst']." ".$_SESSION['uLast'];
                ?>
            </h2>
        </div>
        <div class="container">
            <div class="col-sm-8">
                <div data-spy="scroll" class="tabbable-panel">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a href="#tab_details" class="nav-link" role="tab" data-toggle="tab">Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_contact" class="nav-link" role="tab" data-toggle="tab">Contact info</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_skills" class="nav-link" role="tab" data-toggle="tab">Skills</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_experience" class="nav-link" role="tab" data-toggle="tab">Experience</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab_details">
                                <p>
                                    <?php
										//echo $bio;
										echo "info"
                                    ?>
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab_contact">
                                <p>
                                    <?php
										//echo $address;
										echo "info"
                                    ?>
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab_skills">
                                <p>
                                   
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab_experience">
                                <p>
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>