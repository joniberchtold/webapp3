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
		
        // Hier werden die DB verlinkung und die NAvigation eingefügt
        include "navigation.php";
		include "datenbank.php";
        
    if(isset($_GET['login'])) {
        $Email = $_POST['Email'];
        $Passwort = $_POST['Passwort'];
        
        $statement = $pdo->prepare("SELECT * FROM benutzer WHERE Email = :Email");
        $result = $statement->execute(array('Email' => $Email));
        $user = $statement->fetch();
            
        //Überprüfung des Passworts
        if ($user !== false && password_verify($Passwort, $user['Passwort'])) {
            $_SESSION['userid'] = $user['UserID'];
            die('Login erfolgreich.<br>Weiter zu <a href="shop.php">Shop</a>');
        } else {
            $errorMessage = "E-Mail oder Passwort war ungültig<br>";
        }
    
    }



?>

 <?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
 
<form action="?login=1" method="post">
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="Email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="Passwort"><br>
 
<input type="submit" value="Abschicken">
<a href="passwordvergessen.php">Password Vergessen</a>





  </body>
</html>
