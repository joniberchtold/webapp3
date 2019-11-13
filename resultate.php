<!DOCTYPE html>
<html lang="de">
    <?php
        include "navigation.php";
        include "datenbank.php";
        
        $suchstring = $_POST["searchtext"];
        
    ?>
    

    <body>
        <?php
            if (strlen($suchstring) < 3)
            {
                echo "<div id='produkt'>Suchstring ist zu kurz</div>";
            }else{
            
                $sql = "SELECT ID, Name, Artikelnummer, Bild, Beschreibung FROM artikel WHERE Name LIKE '%$suchstring%' or Beschreibung LIKE '%$suchstring%'";
                
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
			<div id="produkt_nummer"><?php echo $produkt_artikelnummer; ?>"</div>
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