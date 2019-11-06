<!doctype html>
<html lang="en">
  <head>
    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--  Hier wird das Bootstrap CSS verlinkt     -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--  Hier wird mein eigenes CSS verlinkt    -->
    <link rel="stylesheet" href="css/styles.css">


  </head>
  <body>
  <?php
            
        //Hier werden die Datenbank verknüpfung und die Navigation eingefügt
        include "database.php";
        include "navigation2.php";
        
    ?>

        <h1>Wein hinzufügen</h1>
        
            <!--   Hier ist das Formular für neue Weine hinzuzufügen  Css von Bootstrap          -->
            <p>Felder mit * sind Pflichtfelder</p>

                <form action="" method="post">
                    <div class="navi1">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Weinname *</label>
                                <input class="form-control" name="weiname" required="required" placeholder="Weiname">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Kellerei</label>
                                <input class="form-control" name="kellerei" placeholder="Kellerei">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Ortschaft*</label>
                                <input class="form-control" name="ortschaft" required="required" placeholder="Ortschaft">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jahrgang (Jahrzahl)*</label>
                                <input class="form-control" name="jahrgang" required="required" placeholder="Jahrgang">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Menge (in Liter)*</label>
                                <input class="form-control" name="menge" required="required" placeholder="Menge">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Preis (in CHF)*</label>
                                <input class="form-control" name="preis" required="required" placeholder="Preis">
                            </div>

                                <button type="submit" class="button">Hinzufügen</button>
                </form>
                    </div>

<?php

// Hier werden die Werte übergeben die man oben eingibt, das @ zeichen unterdrückt die Fehlermeldungen, da am Anfang noch keine Werte drin sind

@$weiname = $_POST["weiname"];
@$kellerei = $_POST["kellerei"];
@$ortschaft = $_POST["ortschaft"];
@$jahrgang = $_POST["jahrgang"];
@$menge = $_POST["menge"];
@$preis = $_POST["preis"];

// Hier werden die obigen werte in die DB eingefügt mit einem prepare Statement

$statement = $pdo->prepare("INSERT INTO wein (weinname, kellerei, ortschaft, jahrgang, menge, preis) VALUES (:weiname, :kellerei, :ortschaft, :jahrgang, :menge, :preis)");
$statement->execute(array('weiname' => $weiname, 'kellerei' => $kellerei, 'ortschaft' => $ortschaft, 'jahrgang' => $jahrgang, 'menge' => $menge, 'preis' => $preis));   

?>

    </body>
</html>
