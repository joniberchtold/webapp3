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
       
		// Hier ist die Passwort vergessen Funktion 
		// Hier wird ein Random String erzeugt
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
				
		//Hier kann man einen zufälligen String eingeben sollt min 12 Zeichen haben 
		$str = md5(uniqid('vSV8H68cJ2Z4CTuY', true));
		} 
		return $str;
		}
 
 
		$showForm = true;
 
		// Hier wird die Mail erstellt und auch die Mail abgefragt 
		if(isset($_GET['send']) ) {
			if(!isset($_POST['email']) || empty($_POST['email'])) {
				$error = "<b>Bitte eine E-Mail-Adresse eintragen</b>";
			} else {
				$statement = $pdo->prepare("SELECT * FROM benutzer WHERE Email = :Email");
				$result = $statement->execute(array('Email' => $_POST['email']));
				$user = $statement->fetch(); 
 
		// Falls kein User gefunden wird erscheint hier die MEldung
		if($user === false) {
			$error = "<b>Kein Benutzer gefunden</b>";
		} else {
			//Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist 
			$passwortcode = random_string();
			$statement = $pdo->prepare("UPDATE benutzer SET passwortcode = :passwortcode, passwortcode_time = CURRENT_TIMESTAMP() WHERE UserID = :userid");
			$result = $statement->execute(array('passwortcode' => $passwortcode, 'userid' => $user['UserID']));
 
		$empfaenger = $user['Email'];
		$betreff = "Neues Passwort für deinen Account
		"; // Hier kann man den Domain Name erstetzen
		$from = "From: Vorname Nachname <absender@domain.de>"; // Hier kann man den Namen und die Absender Mail ändern
		$url_passwortcode = 'http://localhost/~demo/webapp3/passwortzuruecksetzen.php?userid='.$user['UserID'].'&code='.$passwortcode; // Hier kann man die Domain einsetzen
		$text = 'Hallo '.$user['Vorname'].',
		für deinen Account auf dem Shop wurde nach einem neuen Passwort gefragt. Um ein neues Passwort zu vergeben, rufe innerhalb der nächsten 24 Stunden die folgende Website auf:
		'.$url_passwortcode.'
 
			Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.
 
			Viele Grüße,
			Valentin und Jonas';
 
		mail($empfaenger, $betreff, $text, $from);
 
		echo "Ein Link um dein Passwort zurückzusetzen wurde an deine E-Mail-Adresse gesendet."; 
		$showForm = false;
		}
		}
		}
 
		if($showForm):
?>
		<!-- Aufforderung für Passwort eingabe -->
		<h1>Passwort vergessen</h1>
		Gib hier deine E-Mail-Adresse ein, um ein neues Passwort anzufordern.<br><br>
 
<?php
		if(isset($error) && !empty($error)) {
		echo $error;
		}
?>
		<!-- Formular für das neues Passwort zu setzen -->
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
