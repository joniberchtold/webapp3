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
        include "navigation.php";
        include "datenbank.php";
        
		if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}

        $suchstring = $_POST["searchtext"];
        
    ?>
    

        <?php
            if (strlen($suchstring) < 3)
            {
                echo "<div id='produkt'>Suchstring ist zu kurz</div>";
                die;
            }else{
            
                $sql = "SELECT ID, Name, Artikelnummer, Bild, Beschreibung FROM artikel WHERE Name LIKE '%$suchstring%' or Artikelnummer LIKE '%$suchstring%'";
                
                $count_var = 0;
                
        foreach ($pdo->query($sql) as $row) {
                $produkt_id = $row['ID'];
				$produkt_name = $row['Name'];
				$produkt_artikelnummer = $row['Artikelnummer'];
                $produkt_bild = $row['Bild'];
                $produkt_beschreibung = $row['Beschreibung'];
				$count_var++;
        ?>
            <div id="produkt">
            <div id="produkt_titel"><h1><?php echo $produkt_name; ?></h1></div>
            <div id="produkt_bild"><img src="bilder/<?php echo $produkt_bild; ?>" /></div>
			<div id="produkt_nummer"><?php echo $produkt_artikelnummer; ?></div>
            <div id="produkt_beschreibung"><?php echo $produkt_beschreibung; ?></div>
            

        <?php
        }
        ?>
        <?php
            }
            if ($count_var == 0)
            {
                echo "<div id='produkt'>Keine Resultate gefunden</div>";
            }
        
        ?>

    </body>
</html>
