<!DOCTYPE html>

<?php include 'logovanje.php' ?>
<?php include 'dodajNovost.php' ?>

<?php 
  if($action == "sort")
    {
      for($i=0;$i< count($matrica)-1;$i++)
      {
        if($matrica[$i][0]>$matrica[$i+1][0])
        {
          $pom= $matrica[$i][0];
          $matrica[$i][0]=$matrica[$i+1][0];
          $matrica[$i+1][0]=$pom; 
        }       
      }
    window.location.reload();
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
          </ul>

        </form>
       
       <form id="sortOpcije" method="post" action="index.php">
        <input id="buttonabeceda" type="submit" name="abcsort" value="Sortiraj novosti abecedno"p>
        <input type="hidden" name="action" value="sort">
      </form>
       <?php } ?>

        

  <div class="galerija" >

      <?php 

        for($i=0; $i<count($matrica)-1; $i++) { ?>
           <div class="novosti" id="<?php print ($i+1)."n"?>">
          <p> <?php print htmlEntities($matrica[$i][0], ENT_QUOTES) ?></p>
          <p><a href=" <?php print htmlEntities($matrica[$i][1], ENT_QUOTES)?>  "> <img id="slika" src="<?php print htmlEntities($matrica[$i][2], ENT_QUOTES)?>"alt="4.4.2016."> </a></p>
          <?php $rijec="novost".($i+1)?>
           <p class="novostiniz"><?php print $matrica[$i][4]?></p>
           <p id="<?php print $rijec?>"> </p>
          </div>
       <?php  }
        ?>


  </div>

  </body>

</html>
