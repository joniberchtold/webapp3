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
       

?>



<?php
       // Hier werden 2 zufällige Artikel angezeigt 
	   $sql = "SELECT ID, Name, Artikelnummer, Bild, Beschreibung FROM artikel ORDER BY rand() LIMIT 2";
        foreach ($pdo->query($sql) as $row) {
                $produkt_id = $row['ID'];
				$produkt_name = $row['Name'];
				$produkt_artikelnummer = $row['Artikelnummer'];
                $produkt_bild = $row['Bild'];
                $produkt_beschreibung = $row['Beschreibung'];
        ?>
            
			<!-- Anzeige von Produkten -->
			<div id="produkt">
            <div id="produkt_titel"><h1><?php echo $produkt_name; ?></h1></div>
            <div id="produkt_bild"><img src="bilder/<?php echo $produkt_bild; ?>" /></div>
			<div id="produkt_nummer"><?php echo $produkt_artikelnummer; ?></div>
            <div id="produkt_beschreibung"><?php echo $produkt_beschreibung; ?></div>

<?php 
		}
		
?>

</body>
</html>
