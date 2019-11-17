
<!DOCTYPE html>
<html lang="de">
    <?php
	include "datenbank.php";
	include "navigation.php";
	
    ?>
  <body>
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
