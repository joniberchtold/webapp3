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
        include "navigation.php";
		include "datenbank.php";
       

?>
	<?php

 
if(!isset($_GET['userid']) || !isset($_GET['code'])) {
 die("Leider wurde beim Aufruf dieser Website kein Code zum Zurücksetzen deines Passworts übermittelt");
}
 
$userid = $_GET['userid'];
$code = $_GET['code'];
 
//Abfrage des Nutzers
$statement = $pdo->prepare("SELECT * FROM benutzer WHERE UserID = :userid");
$result = $statement->execute(array('userid' => $userid));
$user = $statement->fetch();
 
//Überprüfe dass ein Nutzer gefunden wurde und dieser auch ein Passwortcode hat
if($user === null || $user['passwortcode'] === null) {
 die("Es wurde kein passender Benutzer gefunden");
}
 
if($user['passwortcode_time'] === null || strtotime($user['passwortcode_time']) < (time()-24*3600) ) {
 die("Dein Code ist leider abgelaufen");
}
 
 
//Überprüfe den Passwortcode
if($code != $user['passwortcode']) {
 die("Der übergebene Code war ungültig. Stell sicher, dass du den genauen Link in der URL aufgerufen hast.");
}
 
//Der Code war korrekt, der Nutzer darf ein neues Passwort eingeben
 
if(isset($_GET['send'])) {
 $passwort = $_POST['passwort'];
 $passwort2 = $_POST['passwort2'];
 
 if($passwort != $passwort2) {
 echo "Bitte identische Passwörter eingeben";
 } else { //Speichere neues Passwort und lösche den Code
 $passworthash = password_hash($passwort, PASSWORD_DEFAULT);
 $statement = $pdo->prepare("UPDATE benutzer SET Passwort = :passworthash, passwortcode = NULL, passwortcode_time = NULL WHERE UserID = :userid");
 $result = $statement->execute(array('passworthash' => $passworthash, 'userid'=> $userid ));
 
 if($result) {
 die("Dein Passwort wurde erfolgreich geändert");
 }
 }
}
?>
 
<h1>Neues Passwort vergeben</h1>
<form action="?send=1&amp;userid=<?php echo htmlentities($userid); ?>&amp;code=<?php echo htmlentities($code); ?>" method="post">
Bitte gib ein neues Passwort ein:<br>
<input type="password" name="passwort"><br><br>
 
Passwort erneut eingeben:<br>
<input type="password" name="passwort2"><br><br>
 
<input type="submit" value="Passwort speichern">
</form>
  
  </body>
</html>
