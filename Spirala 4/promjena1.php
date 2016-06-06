<!DOCTYPE html>

<?php 
$veza = new PDO("mysql:dbname=eventp;host=127.10.81.2;charset=utf8", "admin", "admin");
 $veza->exec("set names utf8");
 ?>
<?php include 'logovanje.php' ?>
<?php include 'dodajKorisnika.php' ?>




<html>

  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>EventPage</title>
    <script type="text/javascript" src="kod.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
<?php 
 $veza = new PDO("mysql:dbname=eventp;host=127.10.81.2;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8"); ?>


<div id="krug1" class="krug"></div>
    <ul class="meni">
      <li class="logo">EventPage</li>
      <li class="item"> <a href="index.php "> Početna </a> </li>
      <li class="item"><a href="news.php">Novosti</a> </li>
      <li class="item"><a href="contact.php">Kontakt</a> </li>
      <li class="active"> <a href="help.php">Ponude</a></li>
       <li class="item">
        <?php 
      if($_SESSION['logovan']=="1")
      {?>
         <a href="novosti.php">Dodaj Novost</a>
        
      <?php } ?>

      </li>
     
    </ul>

<div class="galerija">
 
 	<form action="promjena1.php" method="post">
 		<li> Ime prezime: <input type="text" name="imeprezime" >  </li>
 		<li> Username: <input type="text" name="noviuser" >  </li>
 		<li> Password: <input type="password" name="novipas" >  </li>
    <li> Ponovite password: <input type="password" name="novipas2" >  </li>
 		<li> <input type="submit" name="uk" value="Dodaj korisnika"></li>
    <li> <input type="hidden" name="unesikorisnika" value="korisnikunos" > </li>
 	</form>
</div>
<div id="pomocni"></div>

  </body>



</html>
