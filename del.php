<?php
    $del_id = $_POST['produkt_nr']; 
    
    include "datenbank.php";
    
    $sql = "DELETE FROM artikel where id = " . $del_id;
    $pdo->query($sql);
    
    header("location: confirm_del.php");    
?>

