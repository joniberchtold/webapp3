<?php
    $del_id = $_GET['did']; 
    
    include "datenbank.php";
    
    $sql = "DELETE FROM artikel where id = " . $del_id;
    $pdo->query($sql);
    
    header("location: shop.php");    
?>
