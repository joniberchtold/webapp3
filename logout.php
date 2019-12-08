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

		// Hier wird die Session beendet für das Logut
		session_destroy();
 
		// Meldung für die Bestätigung des Logouts
		// Link zur Startseite 
		echo "Logout erfolgreich. <br>" . "Weiter zur <a href='index.php'>Startseite</a>" ;
?>
