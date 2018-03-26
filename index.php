<?php
	session_start();
	if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
		header("Location: ../profile.php");
		exit();
	}

	$error_css = '';
	$loginError = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log In </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="sticky-footer-navbar.css" rel="stylesheet">
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
		<form class ="form-inline navbar-form" action="includes/login.php" method="POST">
            <li class="nav-item">
					<div class="form-group mr-sm-2">
						<input type="text" name="email" class="form-control" placeholder="Email" style="<?php echo $error_css; ?>">
					</div>
            </li>
			<li class="nav-item mr-sm-2">
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" style="<?php echo $error_css; ?>">
					</div>
            </li>
			<li class="nav-item">
					<button class="btn btn-success" name ="submit" type="submit">Log in</button>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="forgotPassword.php">Forgot password?</a>
            </li>
		</form>
        </ul>
    </div>
</nav>

<?php if (isset($_SESSION['errors'])): ?>

	<div class="alert alert-danger">
    <h3>You have not completed the form correctly. The error(s) are as follows.</h3>
    <ol>
        <?php foreach($_SESSION['errors'] as $error): ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
	</ol>
	</div>

	<?php unset($_SESSION['errors']); ?>
<?php endif; ?>

<div class ="container">
	<div class="row justify-content-center pt-5">
		<div class="col-md-auto">
		<form action="includes/signup.php" method="POST">
		<div class="form-group">
			<label for="usr">First Name</label>
			<input type="text" name="firstName" class="form-control" >
		</div>
		<div class="form-group">
			<label for="usr">Last Name</label>
			<input type="text" name = "lastName" class="form-control">
		</div>
		<div class="form-group">
			<label for="pwd">Email</label>
			<input type="text" name = "email" class="form-control">
		</div>
		<div class="form-group">
			<label for="pwd">Password</label>
			<input type="password" name = "password" class="form-control">
		</div>
		<div class="form-group">
			<label for="pwd">Confirm Password</label>
			<input type="password" name = "passwordConfirm" class="form-control">
		</div>
		<button class="btn btn-success btn-block" type="submit" name ="submit">Create Account</button>
		</form>
		</div>
	</div>
</div>

<footer class="footer">
      <div class="container">
        <span class="text-muted">Footer information</span>
      </div>
</footer>
	

</body>
</html>