<?php
	session_start();
	if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
		header("Location: ../profile.html");
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log In </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="../sticky-footer-navbar.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand abs" href="../index.php">HoteledInn</a>
</nav>

<?php if (isset($_SESSION['noUserExists']) && $_SESSION['noUserExists'] == true): ?>

	<div class="alert alert-danger ml-4 mr-4 mt-4">
    <h4>No user exists with that email.</h3>
	</div>

	<?php unset($_SESSION['noUserExists']); ?>
<?php endif; ?>

<div class ="container">
	<div class="row justify-content-center pt-5">
		<div class="col-md-auto">
		<form action="includes/forgotPasswordCheck.php" method="POST">
		<div class="form-group">
			<label for="pwd">Email</label>
			<input type="text" id = "email" name = "email" class="form-control">
		</div>
		<button class="btn btn-success btn-block" id = "submit" type="submit" name ="submit">Request Password</button>
		</form>
		</div>
	</div>
</div>

	

</body>

<script>
	$(document).ready(function() {
    $('#submit').click(function(event) {
		if (!($('#email').val())) {
			event.preventDefault();
			alert("Empty email field")
		}
	});
});
</script>
</html>