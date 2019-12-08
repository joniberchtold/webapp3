<?php
	//Hier wird das Add-Formular ausgelesen
    $produkt_name = $_POST["inputprodukt"];
    $produkt_beschreibung = $_POST["inputbeschreibung"];
	$produkt_artikelnummer = $_POST["inputnummer"];
	

    $produkt_bild = $_FILES["inputfile1"]["name"];
    
    $target_dir ="bilder/";
    $target_file = $target_dir . basename($_FILES["inputfile1"]["name"]);
    
    move_uploaded_file($_FILES["inputfile1"]["tmp_name"], $target_file);
    

    //Hier wird eine Verbindung mit der DB hergestellt
    include "datenbank.php";
	
	//Mittels SQL werden die Daten in die DB geschrieben
    $sql = "INSERT INTO artikel(ID, Name, Artikelnummer, Bild, Beschreibung) VALUES ('', '$produkt_name', '$produkt_artikelnummer', '$produkt_bild', '$produkt_beschreibung')";
    $pdo->query($sql);
    
	//Man wird Weitergeleitet zur Confirm Nachricht
    header("location: add_confirm.php");   
?>
