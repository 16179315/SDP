<?php
	session_start();

	$emailCSS = '';
	$passwordCSS = '';
	$loginError = array();

	if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
		header("Location: ../profile.php");
		exit();
	}

	if (isset($_SESSION['emailEmpty']) && $_SESSION['emailEmpty'] == true) {
		$emailCSS = "border-color: red;";
	}

	if (isset($_SESSION['passwordEmpty']) && $_SESSION['passwordEmpty'] == true) {
		$passwordCSS = "border-color: red;";
	}

	unset($_SESSION['emailEmpty']);
	unset($_SESSION['passwordEmpty']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log In </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="sticky-footer-navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
		<form id="signupformm" class ="form-inline navbar-form" action="includes/login.php" method="POST" novalidate="novalidate">
            <li class="nav-item">
					<div class="form-group mr-sm-2">
						<input type="email" id="emailPopover" name="email" class="form-control required name" title="Warning" data-content="Email cannot be empty" data-toggle="popover" data-trigger="manual" data-placement="bottom" placeholder="Email">
					</div>
            </li>
			<li class="nav-item mr-sm-2">
					<div class="form-group">
						<input type="password" id="passwordPopover" name="password" data-placement="bottom" class="form-control required pass" title="Warning" data-content="Password cannot be empty" data-toggle="popover" data-trigger="manual" placeholder="Password">
					</div>
            </li>
			<li class="nav-item">
					<button class="btn btn-success" id="loginButton" name ="login" type="submit">Log in</button>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="forgotPassword.php">Forgot password?</a>
            </li>
		</form>
        </ul>
    </div>
</nav>

<?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>

	<div class="alert alert-danger ml-4 mr-4 mt-4">
    <h4>You have not completed the form correctly. The error(s) are as follows.</h3>
    <ol>
        <?php foreach($_SESSION['errors'] as $error): ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
	</ol>
	</div>

	<?php unset($_SESSION['errors']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['accountCreated']) && $_SESSION['accountCreated']): ?>

	<div class="alert alert-success">
    <h3>You are successfully registered. Please log in.</h3>
	</div>

	<?php unset($_SESSION['accountCreated']); ?>
<?php endif; ?>

<div class ="container">
	<div class="row justify-content-center pt-3 pb-3">
		<div class="col-md-auto">
		<div class="btn-group dropright">
		<button id="userTypeButton" type="button" class="btn btn-secondary">
		  Account Type
		</button>
		<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  <span class="sr-only">Toggle Dropright</span>
		</button>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="#">Regular User</a>
    		<a class="dropdown-item" href="#">Hotel</a>
		</div>
	  </div>
		<form action="includes/signup.php" method="POST">
		<div class="form-group d-none" id="companyNameDiv">
			<label for="usr">Company Name</label>
			<input type="text" name="companyName" class="form-control" >
		</div>
		<div class="form-group" id="firstNameDiv">
			<label for="usr">First Name</label>
			<input type="text" name="firstName" class="form-control" >
		</div>
		<div class="form-group" id ="lastNameDiv">
			<label for="usr">Last Name</label>
			<input type="text" name = "lastName" class="form-control">
		</div>
		<div class="form-group" id = "emailDiv">
			<label for="pwd">Email</label>
			<input type="text" name = "email" class="form-control" >
		</div>
		<div class="form-group" id="passwordDiv">
			<label for="pwd">Password (6 characters minimum)</label>
			<input type="password" name = "password" class="form-control" >
		</div>
		<div class="form-group" id ="passwordConfirmDiv">
			<label for="pwd">Confirm Password</label>
			<input type="password" name = "passwordConfirm" class="form-control">
		</div>
		<button class="btn btn-success btn-block" type="submit" name ="submit">Create Account</button>
		</form>
		</div>
	</div>
</div>
	


<script>

$(document).ready(function() {
    $('#loginButton').click(function(event) {
		if(!($('#emailPopover').val()) || !($('#passwordPopover').val())) {
			event.preventDefault();
			if(!$('#emailPopover').val()) {
				$('#emailPopover').popover('show');
			}
			if(!$('#passwordPopover').val()) {
				$('#passwordPopover').popover('show');
			}
		}
	});
})

$('.dropdown-menu a').on('click', function(){
	var option = $(this).text();
	document.getElementById("userTypeButton").innerText = option;
	if (option == "Regular User") {
		$('#firstNameDiv').fadeIn();
		$('#lastNameDiv').fadeIn();
		setTimeout(function(){
			$('#companyNameDiv').fadeOut();
			setTimeout(function(){
				$('#companyNameDiv').addClass("d-none");
			}, 400);
		}, 400);
	}
	else if (option == "Hotel" && $("#companyNameDiv").hasClass("d-none")) {
		$('#companyNameDiv').hide();
		$('#companyNameDiv').removeClass("d-none");
		$('#companyNameDiv').fadeIn();
		setTimeout(function(){
			$('#firstNameDiv').fadeOut();
			$('#lastNameDiv').fadeOut();
		}, 400);
	}
});

$('#emailPopover').blur(function(){
    if( !$(this).val() ) {
        $(this).popover('show');
    } else {
        $(this).popover('dispose');
    }
})
$('#passwordPopover').blur(function(){
    if( !$(this).val() ) {
        $(this).popover('show');
    } else {
        $(this).popover('dispose');
    }
})

;
</script>



</body>
</html>