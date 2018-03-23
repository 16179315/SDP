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
  <script src="scripts/search.php"></script>

</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand abs" href="#">HoteledIn</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="navbar-nav ml-auto">
   
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
  <div class="row justify-content-center pt-5">
    <div class="row">
          <div class="form-horizontal">
            <div class="input-group">
              <div class="ddl-select input-group-btn">
                <select id="ddlsearch" class="selectpicker form-control" data-style="btn-primary">
                  <option value="" data-hidden="true" class="ddl-title">Search for</option>
                  <option value="users">Users</option>
                  <option value="organizations">Organizations</option>
                  <option value="vancancies">Vacancies</option>
                </select>
              </div>
              <input id="txtkey" class="form-control" placeholder="Enter here" aria-describedby="ddlsearch" type="text">
              <span class="input-group-btn">
               <button class="btn btn-search" type="button"><i class=""></i> Search</button>
              </span>
            </div>
          </div>
        </div>
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