<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Titel</title>
  </head>
  <body>
  
   <?php
        // Hier werden die DB verlinkung und die NAvigation eingefügt
        include "navigation.php";
       

?>

 <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Benutzername</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Passwort</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Vorname</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
	    <div class="form-group col-md-6">
      <label for="inputPassword4">Nachname</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
	  
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress"></label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Adresse</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">PLZ</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
	<div class="form-group col-md-6">
      <label for="inputEmail4">E-Mail</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
	<div class="form-group col-md-6">
      <label for="inputEmail4">Telefonnummer</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
  
   
  </div>
 
  <button type="submit" class="btn btn-primary">Sign in</button>
  
  <a href="login.php">Haben Sie bereits ein Login? Klicken Sie hier.</a>
</form>
  </body>
</html>