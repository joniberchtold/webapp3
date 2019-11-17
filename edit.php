
<!DOCTYPE html>
<html lang="de">
    <?php
        include "navigation.php";
        include "datenbank.php";
        
        $edit_id = $_GET['eid']; 
        
        $sql = "SELECT ID, Name, Artikelnummer, Bild, Beschreibung FROM artikel WHERE id = '$edit_id' LIMIT 1";
         foreach ($pdo->query($sql) as $row) {
                $produkt_id = $row['ID'];
				$produkt_name = $row['Name'];
				$produkt_artikelnummer = $row['Artikelnummer'];
                $produkt_bild = $row['Bild'];
                $produkt_beschreibung = $row['Beschreibung'];
        }
        
    ?>
  <body>
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