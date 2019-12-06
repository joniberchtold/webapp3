<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Startseite <span class="sr-only">(current)</span></a>
        </li>
         <?php if(!isset($_SESSION['userid'])) {?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registrieren.php">Registieren</a>
            </li>
        <?php } ?>
        
        <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
        </li>	  
	  
	    <li class="nav-item">
            <a class="nav-link" href="add.php">Hinzufügen</a>
        </li>	  
        <?php if(isset($_SESSION['userid'])) {?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        <?php } ?>
    </ul>
    
    <form class="form-inline my-2 my-lg-0" action="resultate.php" method="POST">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchtext">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
 </div>
</nav>

<?php
if(isset($_POST['btnCookieOk'])){
   setcookie('eu-cookie', '1', time()+1209600);
}else{
    if(!isset($_COOKIE['eu-cookie'])) {
        echo '<div id="eu-cookie-message">';
        echo		'<form action="#" method="post">';
        echo	'	Durch Verwendung dieser Webseite stimmst du der Cookie-Nutzung zu. <input type="submit" value="akzeptieren" name="btnCookieOk" />';
        echo	'</form>';
        echo	'</div>';
    }
}

?>
