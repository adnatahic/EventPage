<!DOCTYPE html>
<?php include 'logovanje.php' ?>

<?php 
  $veza = new PDO("mysql:dbname=eventp;host=127.10.81.2;charset=utf8", "admin", "admin");
 $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, komentari, naziv, link, url_slike,opis, korisnik, FROM_UNIXTIME( UNIX_TIMESTAMP(datum), '%d.%m.%Y %H:%i:%s') as datum1, FROM_UNIXTIME( UNIX_TIMESTAMP(datum_kreiranja), '%d.%m.%Y %H:%i:%s') as datum2 from novost order by datum2 desc");
 ?>

 <?php 

  if(isset($_POST['koment'])) {

        $a = htmlEntities($_POST['komentar'], ENT_QUOTES);
        //$sql = "insert into komentar (autor, datum, tekst, novost) values ()";
        //$veza->query($sql);
    }


  ?>
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
          
          <form id="login" action="help.php" method="post" accept-charset="utf-8">
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
       
       <?php } ?>
      </li>
    </ul>



<div class="galerija">
  <ul class="ponude">
    <?php 
     if(isset($_REQUEST['id']))
       {
        $id = $_REQUEST['id'];
          foreach ($rezultat as $vijest)
          {
            if($vijest['id']== $id)
            {
              $i=1;
              $idd= $vijest['korisnik'];
              $korisnik= $veza->query(" SELECT id, ime_prezime, kor_ime from korisnik where id='".$idd."'");
              $pomocna="";

              foreach ($korisnik as $pom) {
                $pomocna= $pom['kor_ime'];
                $korisnik=$pom;
              }
              if($korisnik['id']== '4')
                 {
                  ?> 
                  <form action="index.php" method="post">
                    <li> <input type="submit" name="izbrisiN" value="Izbrisi novost"></li>
                    <li> <input type="hidden" name="izbrisinovost" value="korisnikunos" > </li>
                    </form>
                    <?php
                 } ?>
                <p> <?php print "<a href= 'nekenovosti.php?id=".(string)$vijest['id']."'>".htmlEntities($vijest['naziv'] , ENT_QUOTES) ?></p>
                <p><a href=" <?php print htmlEntities($vijest['link'], ENT_QUOTES)?>  "> <img id="slika" src="<?php print htmlEntities($vijest['url_slike'], ENT_QUOTES)?>"alt="slika1.jpg"> </a></p>
                
                <?php $rijec="novost".($i)?>
                 <p class="novostiniz"><?php print $vijest['datum2']?></p>
                 <p> <?php print $pomocna ?> </p>
                 <p id="<?php print $rijec?>"> </p>
                   <?php
                   $rezultat2=$veza->query(" SELECT autor, tekst from komentar where novost=".$vijest['id']);
                  foreach ($rezultat2 as $komentar) 
                  {
                    print "<p> Autor:".$komentar['autor']."</p>";
                    print "<p> Komentar:".$komentar['tekst']."</p>";      
                   
                  }

                   if($vijest['komentari']==1)
                   {
                     $id = $vijest['id'];
                      print "<form action='nekenovosti.php?id=".$vijest['id']."' method='POST'>
                    <textarea name='komentar' rows='5' cols='40'> </textarea><br>
                    <input type='hidden' name='vijest_id' value='".(string)$id."'>
                    <input type='submit' name='koment' value='Dodaj komentar:'>
                    </form>";
                   }
             
              
            }
          }

       }

     ?>
  </ul>
</div>
<div id="pomocni"></div>

  </body>



</html>
