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
		// Hier werden die DB verlinkung und die Navigation eingefügt
			// navigation.php ist für Navigation
			// datenbank.php ist für die Verbindung zu Datenbank 
        include "navigation.php";
        include "datenbank.php";
        
		// Hier wird geprüft ob der ein User angemeldet ist, falls nicht kriegt er eine Rückmeldung für die Anmeldung
		if(!isset($_SESSION['userid'])) {
			die('Bitte zuerst <a href="login.php">einloggen</a>');
		}
		//Hier werden die Daten aus der Datenbank gelesen
        $edit_id = $_POST['produkt_nr']; 
        
        $sql = "SELECT ID, Name, Artikelnummer, Bild, Beschreibung FROM artikel WHERE id = '$edit_id' LIMIT 1";
         foreach ($pdo->query($sql) as $row) {
                $produkt_id = $row['ID'];
				$produkt_name = $row['Name'];
				$produkt_artikelnummer = $row['Artikelnummer'];
                $produkt_bild = $row['Bild'];
                $produkt_beschreibung = $row['Beschreibung'];
        }
        
    ?>
	<!-- Hier wird das Formular erstellt welches für die Artikelbearbeitung gebraucht wird -->
	<!-- Das Formular wird mit den vorhandenen Daten mittels echo befüllt -->
	
    <form action="edit_db_save.php?eid=<?php echo $produkt_id;?>" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input type="text" class="form-control" name="inputprodukt" value="<?php echo $produkt_name; ?>">
            </div>
        </div>
		<div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Artikelnummer</label>
            <input type="text" class="form-control" name="inputnummer" value="<?php echo $produkt_artikelnummer; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputPassword4">Beschreibung</label>
            <input type="text" class="form-control" name="inputbeschreibung" value="<?php echo $produkt_beschreibung; ?>">
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
