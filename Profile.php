<?php
    session_start();
 
    include 'includes/db.php';
    if(isset($_GET['uId'])) {
        $profile_firstname_sql="SELECT uFirstName FROM users where uId = '".$_GET['uId']."';";
        $profile_firstname_result=$conn->query($profile_firstname_sql);
        if ($conn && ($profile_firstname_result->num_rows>0)) {
            while ($profile_firstname_row=$profile_firstname_result->fetch_assoc()) {
                $profile_firstname = $profile_firstname_row['uFirstName'];
            }
        }
        $profile_lastname_sql="SELECT uLastName FROM users where uId = '".$_GET['uId']."';";
        $profile_lastname_result=$conn->query($profile_lastname_sql);
        if ($conn && ($profile_lastname_result->num_rows>0)) {
            while ($profile_lastname_row=$profile_lastname_result->fetch_assoc()) {
                $profile_lastname = $profile_lastname_row['uLastName'];
            }
        }
    }
?>
 
<html>
<head>
    <title>
        <?php
        if(isset($_GET['uId'])) {
            echo $profile_firstname." ".$profile_lastname;
        } else {
            echo $_SESSION['uFirst']." ".$_SESSION['uLast'];
        }
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
 
    <div class="center">
        <img align="left" class="banner" src="http://via.placeholder.com/1000x200px">
        <img class="profile-picture" src="http://via.placeholder.com/120/aa5555/000000">
        <div class="name">
            <h2>
                <?php
                    if(isset($_GET['uId'])) {
                        echo $profile_firstname." ".$profile_lastname;
                    } else {
                        echo $_SESSION['uFirst']." ".$_SESSION['uLast'];
                    }
                ?>
            </h2>
        </div>
        <div class="edit-or-add-friend">
            
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
                                <a href="#tab_friends" class="nav-link" role="tab" data-toggle="tab">Friends</a>
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
                                    $bio_sql="";
                                    if(isset($_GET['uId'])) {
                                        $bio_sql="SELECT uBio FROM users where uId = '".$_GET['uId']."';";
                                    } else {
                                        $bio_sql="SELECT uBio FROM users where uId = '".$_SESSION['uId']."';";
                                    }
                                    $bio_result=$conn->query($bio_sql);
                                    if ($conn && ($bio_result->num_rows>0)) {
                                        while ($bio_row=$bio_result->fetch_assoc()) {
                                            echo $bio_row['uBio'];
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="tab_details">
                                <?php
                                $friend_sql="";
                                if(isset($_GET['uId'])) {
                                    $friend_sql="SELECT uId, uFirstName, uLastName FROM users u, friends f WHERE u\.uId=f\.uid1 AND f\.uid2 = '".$_GET['uId']."';";
                                } else {
                                    $friend_sql="SELECT uId, uFirstName, uLastName FROM users u, friends f WHERE u\.uId=f\.uid1 AND f\.uid2 = '".$_SESSION['uId']."';";
                                }
                                $friend_result=$conn->query($friend_sql);
                                if ($conn && ($friend_result->num_rows>0)) {
                                    while ($friend_row=$friend_result->fetch_assoc()) {
                                        echo
                                        "<div>
                                            <img src=\"http://via.placeholder.com/80x80px\">
                                            <a href=\"Profile.php?uId=".$friend_row['uId']."\">".$friend_row['uFirstName']." ".$friend_row['uLastName']."</p>
                                        </div>";
                                    }
                                }
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab_contact">
                                <p><b>Address</b></p>
                                <p>
                                    <?php
                                    $contact_sql="";
                                    if(isset($_GET['uId'])) {
                                        $contact_sql="SELECT uAddress, uContactNo FROM users WHERE uId = '".$_GET['uId']."';";
                                    } else {
                                        $contact_sql="SELECT uAddress, uContactNo FROM users WHERE uId = '".$_SESSION['uId']."';";
                                    }
                                    $contact_result=$conn->query($contact_sql);
                                    if ($conn && ($contact_result->num_rows>0)) {
                                        while ($contact_row=$contact_result->fetch_assoc()) {
                                            echo $contact_row['uAddress'];
                                        }
                                    }
                                    ?>
                                </p>
                                <p><b>Contact Number</b></p>
                                <p>
                                    <?php
                                    if ($conn && ($contact_result->num_rows>0)) {
                                        while ($contact_row=$contact_result->fetch_assoc()) {
                                            echo $contact_row['uContactNo'];
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                            <div role=\"tabpanel\" class=\"tab-pane\" id=\"tab_skills\">
                                <?php
                                $skill_sql="";
                                if(isset($_GET['uId'])) {
                                    $skill_sql="SELECT sTitle FROM skills s, userSkills u WHERE u.sId=s.sId AND u.uId= '".$_GET['uId']."';";
                                } else {
                                    $skill_sql="SELECT sTitle FROM skills s, userSkills u WHERE u.sId=s.sId AND u.uId= '".$_SESSION['uId']."';";
                                }
                                $skill_result=$conn->query($skill_sql);
                                if ($conn && ($skill_result->num_rows>0)) {
                                    while ($skill_row=$skill_result->fetch_assoc()) {
                                        echo "
                                            <p>
                                                <div class=\"form-group\">
                                                    <div class=\"cols-sm-10\">
                                                        <div class=\"input-group\">
                                                            <span class=\"input-group-addon\"><i class=\"fa fa-user fa\" aria-hidden=\"true\"></i></span>
                                                            <input type=\"text\" class=\"form-control\" name=\"skill\" id=\"skill\"  placeholder=\"".$skill_row['sTitle']."\" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </p>";
                                    }
                                }
                                ?>
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