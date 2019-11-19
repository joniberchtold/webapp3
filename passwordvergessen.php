<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Titel</title>
  </head>
  <body>
 <?php 
     include "navigation.php";
	include "datenbank.php";
       
 
function random_string() {
 if(function_exists('random_bytes')) {
 $bytes = random_bytes(16);
 $str = bin2hex($bytes); 
 } else if(function_exists('openssl_random_pseudo_bytes')) {
 $bytes = openssl_random_pseudo_bytes(16);
 $str = bin2hex($bytes); 
 } else if(function_exists('mcrypt_create_iv')) {
 $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
 $str = bin2hex($bytes); 
 } else {
 //Bitte euer_geheim_string durch einen zufälligen String mit >12 Zeichen austauschen
 $str = md5(uniqid('vSV8H68cJ2Z4CTuY', true));
 } 
 return $str;
}
 
 
$showForm = true;
 
if(isset($_GET['send']) ) {
 if(!isset($_POST['email']) || empty($_POST['email'])) {
 $error = "<b>Bitte eine E-Mail-Adresse eintragen</b>";
 } else {
 $statement = $pdo->prepare("SELECT * FROM benutzer WHERE Email = :Email");
 $result = $statement->execute(array('Email' => $_POST['email']));
 $user = $statement->fetch(); 
 
 if($user === false) {
 $error = "<b>Kein Benutzer gefunden</b>";
 } else {
 //Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist 
 $passwortcode = random_string();
 $statement = $pdo->prepare("UPDATE benutzer SET passwortcode = :passwortcode, passwortcode_time = CURRENT_TIMESTAMP() WHERE UserID = :userid");
 $result = $statement->execute(array('passwortcode' => $passwortcode, 'userid' => $user['UserID']));
 
 $empfaenger = $user['Email'];
 $betreff = "Neues Passwort für deinen Account auf www.php-einfach.de"; //Ersetzt hier den Domain-Namen
 $from = "From: Vorname Nachname <absender@domain.de>"; //Ersetzt hier euren Name und E-Mail-Adresse
 $url_passwortcode = 'http://localhost/passwortzuruecksetzen.php?userid='.$user['UserID'].'&code='.$passwortcode; //Setzt hier eure richtige Domain ein
 $text = 'Hallo '.$user['Vorname'].',
für deinen Account auf www.php-einfach.de wurde nach einem neuen Passwort gefragt. Um ein neues Passwort zu vergeben, rufe innerhalb der nächsten 24 Stunden die folgende Website auf:
'.$url_passwortcode.'
 
Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.
 
Viele Grüße,
dein PHP-Einfach.de-Team';
 
 mail($empfaenger, $betreff, $text, $from);
 
 echo "Ein Link um dein Passwort zurückzusetzen wurde an deine E-Mail-Adresse gesendet."; 
 $showForm = false;
 }
 }
}
 
if($showForm):
?>
 
<h1>Passwort vergessen</h1>
Gib hier deine E-Mail-Adresse ein, um ein neues Passwort anzufordern.<br><br>
 
<?php
if(isset($error) && !empty($error)) {
 echo $error;
}
?>
 
<form action="?send=1" method="post">
E-Mail:<br>
<input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>"><br>
<input type="submit" value="Neues Passwort">
</form>
 
<?php
endif; //Endif von if($showForm)
?>
  </body>
</html>