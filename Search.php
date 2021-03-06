<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
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
          <form class ="form-inline navbar-form" action="searchResults.php" method="POST">
            <li class="nav-item">
              <div class="ddl-select input-group-btn mr-sm-2">
                <select id="ddlsearch" class="selectpicker form-control" name="dropDown" data-style="btn-primary">
                  <option value="" data-hidden="true" class="ddl-title">Search for</option>
                  <option value="users">Users</option>
                  <option value="hotels">Hotels</option>
                  <option value="vacancies">Vacancies</option>
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
          <form class ="form-inline navbar-form" action="includes/logout.php" method="POST">
            <li class="nav-item">
                <button class="btn btn-success" name ="submit" type="submit">Log out</button>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="includes/logout.php">Forgot password?</a>
            </li>
          </form>
        </ul>
    </div>
</nav>

<div class ="container">
  
</div>

<footer class="footer">
      <div class="container">
        <span class="text-muted">Footer information</span>
      </div>
</footer>
  
</body>

</html>