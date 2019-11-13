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
       

?>

<?php

if(!isset($_COOKIE['eu-cookie'])) {
	echo '<div id="eu-cookie-message">';
	echo		'<form action="" method="post">';
	echo	'	Durch Verwendung dieser Webseite stimmst du der Cookie-Nutzung zu. <input type="submit" value="akzeptieren" name="btnCookieOk" />';
	echo	'</form>';
	echo	'</div>';
}
?>

<?php
if(isset($_POST['btnCookieOk'])){
   setcookie('eu-cookie', '1', time()+1209600);
}
?>



  </body>
</html>