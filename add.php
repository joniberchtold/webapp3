<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
	<title>Shop</title>
  </head>
  <body>
    <?php
	include "datenbank.php";
	include "navigation.php";
	
	if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
	
    ?>
    <form action="add_db_save.php" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input type="text" class="form-control" name="inputprodukt" placeholder="Produkt">
            </div>
        </div>
		        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Artikelnummer</label>
            <input type="text" class="form-control" name="inputnummer" placeholder="Artikelnummer">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputPassword4">Beschreibung</label>
            <input type="text" class="form-control" name="inputbeschreibung" placeholder="Beschreibung">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="file1">Bild</label>
                <input type="file" class="form-control-file" name="inputfile1" accept="image/jpeg" />
            </div>
        </br>
        </div>

        <button type="submit" class="btn btn-primary">Fertig</button>
    </form>
  </body>
</html>
