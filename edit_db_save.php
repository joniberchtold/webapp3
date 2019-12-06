<?php

    $edit_id = $_GET['eid']; 
    
    $produkt_name = $_POST["inputprodukt"];
    $produkt_beschreibung = $_POST["inputbeschreibung"];
	$produkt_artikelnummer = $_POST["inputnummer"];

    $produktbild = $_FILES["inputfile1"]["name"];
    
    if(strlen($produktbild) > 5) {
    
        $target_dir ="bilder/";
        $target_file = $target_dir . basename($_FILES["inputfile1"]["name"]);
    
        move_uploaded_file($_FILES["inputfile1"]["tmp_name"], $target_file);
    }
    

    
    include "datenbank.php";
    
    if(strlen($produktbild) > 5) {
            $sql = "UPDATE artikel SET Bild = '$produkt_bild' where ID = '$edit_id'";
            $pdo->query($sql);
    
    }
    
    $sql = "UPDATE artikel SET Artikelnummer = '$produkt_artikelnummer' where ID = '$edit_id'";
    $pdo->query($sql);
	
	$sql = "UPDATE artikel SET Name = '$produkt_name' where ID = '$edit_id'";
    $pdo->query($sql);
    
    $sql = "UPDATE artikel SET Beschreibung = '$produkt_beschreibung' where ID = '$edit_id'";
    $pdo->query($sql);
    
    header("location: confirm_edit.php");   
?>
