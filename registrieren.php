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
        // Hier werden die DB verlinkung und die NAvigation eingefügt
        include "navigation.php";
       

?>

<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
    $error = false;
    $Benutzername = $_POST['Benutzername'];
    $Passwort = $_POST['Passwort'];
	$Passwort2 = $_POST['Passwort2'];
	$Vorname = $_POST['Vorname'];
	$Nachname = $_POST['Nachname'];
	$Strasse = $_POST['Strasse'];
	$Hausnummer = $_POST['Hausnummer'];
	$PLZ = $_POST['PLZ'];
	$Email = $_POST['Email'];
	$Telefonnummer = $_POST['Telefonnummer'];
 
  
    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }     
    if(strlen($Passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($Passwort != $Passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }
    
    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) { 
       
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();
        
        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }    
    }
    
    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {    
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        
        $statement = prepare("INSERT INTO users (email, passwort) VALUES (:email, :passwort)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));
        
        if($result) {        
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } 
}
 
if($showFormular) {
?>
 
<form action="?register=1" method="post">
Benutzername:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
Passwort wiederholen:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

Vorname:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

Nachname:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

Strasse:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

Huasnummer:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

PLZ:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

E-Mail:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

Telefonnummer:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>
 
<input type="submit" value="Abschicken">
</form>
 
<?php
} //Ende von if($showFormular)
?>
  </body>
</html>