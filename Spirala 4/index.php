<!DOCTYPE html>



<?php include 'logovanje.php' ?>
<?php include 'dodajNovost.php' ?>

<?php
    $veza = new PDO("mysql:dbname=eventp;host=127.10.81.2;charset=utf8", "admin", "admin");
 $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, naziv, link, url_slike,opis, korisnik, FROM_UNIXTIME( UNIX_TIMESTAMP(datum), '%d.%m.%Y %H:%i:%s') as datum1, FROM_UNIXTIME( UNIX_TIMESTAMP(datum_kreiranja), '%d.%m.%Y %H:%i:%s') as datum2 from novost order by datum2 desc");
     if (!$rezultat)
      {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     } 

  if (!isset($_SESSION["redom"]))
  {
    $_SESSION["redom"] = "0";
    }

  //if (!isset($_POST["action"]))
  //{
   // $action = $_POST["aktion"];
  //}

  if ($action == "sort"){
   $_SESSION["redom"] = "1";
  }
 ?>


<html>

  <head>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="kod.js"></script>
      <meta charset="utf-8">
      <title>EventPage</title>
  </head>

  <body onload="funkcijaZaNovosti()">
<div id="krug1" class="krug"></div>
    <ul class="meni">
      <li class="logo">EventPage  </li>
      <li class="active"> <a href="index.php "> Početna </a> </li>
      <li class="item"><a href="news.php">Novosti</a> </li>
      <li class="item"><a href="contact.php">Kontakt</a> </li>
      <li class="item"> <a href="help.php">Ponude</a></li>
      <li class="item">
        <li class="dropdown">
          <a href="#" onclick="funkcijaZaMeni()" class="pregledi"> Pregled novosti</a>
          <div id="novostiPregled" class="novostiRaspored">
            <a href="#" onclick="PregledDana()">Pregled dana</a>
            <a href="#" onclick="PregledSedmice()">Pregled sedmice</a>
            <a href="#" onclick="PregledMjeseca()">Pregled mjeseca</a>
            <a href="index.php">Sve novosti</a>
          </div>
        </li>
      </li> 
      <li class="item">
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
            <li>  <input type="hidden" name="nemaNista" value="nista"> </li>

            
          </ul>

        </form>
       
       <form id="sortOpcije" method="post" action="index.php">
        <input id="buttonabeceda" type="submit" name="abcsort" value="Sortiraj novosti abecedno"p>
         <li > <br> <a href="promjena.php"> Promijeni šifru </a> </li>
         <li > <br> <a href="promjena1.php"> Dodaj korisnika </a> </li>
        <input type="hidden" name="action2" value="sort" >
      </form>
       <?php } ?>


  <div class="galerija" >

       <?php 
      if($_SESSION['redom']=="0")
      {
        $i=1;
        foreach ($rezultat as $vijest) 
          { 
           $idd= $vijest['korisnik'];
            $korisnik= $veza->query(" SELECT ime_prezime, kor_ime from korisnik where id='".$idd."'");
            $pomocna="";

            foreach ($korisnik as $pom) {
              $pomocna= $pom['kor_ime'];
            }
             ?>

            
           <div class="novosti" id="<?php print ($i)."n"?>">
          <p> <?php print "<a href= 'nekenovosti.php?id=".(string)$vijest['id']."'>".htmlEntities($vijest['naziv'] , ENT_QUOTES) ?></p>
          <p><a href=" <?php print htmlEntities($vijest['link'], ENT_QUOTES)?>  "> <img id="slika" src="<?php print htmlEntities($vijest['url_slike'], ENT_QUOTES)?>"alt="slika1.jpg"> </a></p>
          <p> <?php print $pomocna ?> </p>
          <?php $rijec="novost".($i)?>
           <p class="novostiniz"><?php print $vijest['datum2']?></p>
           <p id="<?php print $rijec?>"> </p>
          </div>


       <?php 

        $i++; } }  ?>


  </div>

  </body>

</html>
