<!DOCTYPE html>
<?php include 'logovanje.php' ?>
<html>

  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>EventPage</title>
    <script type="text/javascript" src="kod.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>


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
      <li class="item">
         <?php 
      if($_SESSION['logovan']=="0")
      {?>
          
          <form id="login" action="news.php" method="post" accept-charset="utf-8">
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
       
        <form id="logout" action="news.php" method="post" accept-charset="utf-8">
          <ul class="loginInput">
            <li>
            <input type="submit" value="logout"></li>
            <li> <input type="hidden" value="Logout" name="aktivno"> </li>
          </ul>
        </form>
       
       <?php } ?>
      </li>
    </ul>

<div class="galerija">
  <ul class="ponude">
    <li class="nabrajanje"> Stranice koje preporučujemo: </li>
    <li class="link"><a href="https://www.kupikartu.ba/" > KupiKartu.ba </a> </li>
    <li class="link"><a href="http://sarajevo.travel/ba/dogadjaji" > Dešavanja u Sarajevu</a> </li>
    <li class="link"> <a href="http://www.ekskluziva.ba/najave" >Najave dešavanja - Ekskluziva</a></li>
  </ul>
</div>
<div id="pomocni"></div>

  </body>



</html>
