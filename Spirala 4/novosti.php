<!DOCTYPE html>

<?php $veza = new PDO("mysql:dbname=eventp;host=127.10.81.2;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");  ?>
<?php include 'logovanje.php' ?> 
<?php include 'dodajNovost.php' ?> 

<html>

  <head>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="kod.js"></script>
      <meta charset="utf-8">
      <title>EventPage</title>
  </head>

  <body>
    <div id="krug1" class="krug"></div>
    <ul class="meni">
      <li class="logo">EventPage  </li>
      <li class="item"> <a href="index.php "> Početna </a> </li>
      <li class="item"><a href="news.php">Novosti</a> </li>
      <li class="item"><a href="contact.php">Kontakt</a> </li>
      <li class="item"> <a href="help.php">Ponude</a></li>
      <li class="active">
        <?php 
      if($_SESSION['logovan']=="1")
      {?>
         <a href="novosti.php">Dodaj Novost</a>
        
      <?php } ?>

      </li>
       </ul>
    
     <?php 
      if($_SESSION['logovan']=="0")
      {?>
          
          <form id="login" action="index.php" method="post" accept-charset="utf-8">
          <ul class="loginInput">
            <li>

            <input type="username" name="username" placeholder="username" required></li>
            <li>
            <input type="password" name="password" placeholder="password" required></li>
            <li>
            <input type="submit" value="Login"></li>
            <li> <input type="hidden" value="login" name="aktivno"> </li>
          </ul>
        </form>
        
      <?php } ?>

       <?php if($_SESSION['logovan']=="1")
      { ?>
        <form id="logout" action="index.php" method="post" accept-charset="utf-8">
          <ul class="loginInput">
            <li>
            <input type="submit" value="logout"></li>
            <li> <input type="hidden" value="logout" name="aktivno"> </li>
          </ul>
        </form>
       <?php } ?>

       
       <form class="dodajNovosti" action="novosti.php" method="post" accept-charset="utf-8">
         <ul id="formNovosti">
         <li> <input id="textbox1" type="naziv" name="naziv" placeholder="Naziv" required></li>
        <li> <input id="textbox1" type="link" name="link" placeholder="Link eventa" required> </li>
        <li> <input id="textbox1" type="slika" name="slika" placeholder="Url slike" required> </li>
         <li> <input id="textbox1" type="tekst" name="tekst" placeholder="Dodatni opis" required> </li>
         <li> <input type="text" id="code" placeholder="Dvoslovni kod države" name="code" onkeydown="ValidirajServis()"> </li>
        <li> <input type="text" id="pozivni" placeholder="(Pozivni)Broj" name="pozivni" onblur="ValidirajServis()"></li>
        <li> Datum održavanja: <input type="date" name="datum"></li>
        <li>  Omogućeni komentari: <input type="checkbox" name="mozeKom"></li>
         <li>
            <input type="submit" value="Dodaj" onclick="PozoviMe()"></li>
            <li> <input type="hidden" value="login" name="uneseno""> </li>
         </ul>
       </form>


</body>
</html>