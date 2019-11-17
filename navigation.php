 <?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Titel</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Startseite <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="registrieren.php">Registieren</a>
      </li>
	 
            <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>	  
	  
	              <li class="nav-item">
        <a class="nav-link" href="add.php">Hinzufügen</a>
      </li>	  
	  
	      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
	  
	  
	  <li> <?php print_r($_SESSION); ?> </li>
    </ul>
        <form class="form-inline my-2 my-lg-0" action="resultate.php" method="POST">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchtext">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
  </div>
</nav>

  </body>
</html>