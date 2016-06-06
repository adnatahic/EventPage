<?php
include 'logovanje.php'; 

 $veza = new PDO("mysql:dbname=eventp;host=127.10.81.2;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8"); 



if(isset($_POST['promijeniSifru11']))
{
	if(isset($_POST['nova1'],$_POST['nova2']))
	{
		if($_POST['nova1']==$_POST['nova2'])
		{
			$nova= md5($_POST['nova1']);
			$br=2;
			$proslo= $veza->exec(" 
        UPDATE korisnik set sifra='".$nova."' where id='".$br."' 
        ");
			if($proslo) echo "Uspješno promijenjena šifra!";
		}
		else echo "Nije promijenjena šifra!";
	}

}

 ?>

 <!DOCTYPE html>
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
            
            <li>  </li>
            <li> </li>

            
          </ul>
       </form>
       <?php } ?>
      </li>
    </ul>

<div class="galerija">
 
 	<form action="promjena.php" method="post">
 		<li> Stara šifra: <input type="text" name="stara">  </li>
 		<li> Nova šifra: <input type="password" name="nova1">  </li>
 		<li> Potvrdite šifru: <input type="password" name="nova2">  </li>
 		<li> <input type="submit" name="promjenaSifre" value="Promijeni Sifru"></li>
    <li> <input type="hidden" name="promijeniSifru11" value="promsifr" ></li>
 	
 </form>
</div>
<div id="pomocni"></div>

  </body>



</html>
