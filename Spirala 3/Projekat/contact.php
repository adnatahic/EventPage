<!DOCTYPE html>
<?php include 'logovanje.php' ?>
<html>

<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8">
  <title>EventPage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="kod.js"></script>
</head>

<body onload="FormaLoad()">

  <div id="krug1" class="krug"></div>
  <ul class="meni">
    <li class="logo">EventPage</li>
    <li class="item"> <a href="index.php "> Početna </a> </li>
    <li class="item"><a href="news.php">Novosti</a> </li>
    <li class="active"><a href="contact.php">Kontakt</a> </li>
    <li class="item"> <a href="help.php">Ponude</a></li>
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
<table class="forma">
  <tr >
    <th colspan="2">Forma za kontakt:</th>
  </tr>
  <tr>
    <td ><label>Ime:</label></td>
    <td> <input type="text" class="textbox" id="ime" onkeydown="FunkcijaZaIme()"></td>
  </tr>
  <tr>
    <td><label>Prezime:</label></td>
    <td><input type="text" class="textbox" id="prezime" onkeydown="FunkcijaZaPrezime()"> </td>
  </tr>
  <tr>
  <td><label>Drzava:</label></td>
  <td>
      <select onchange="ProvjeriKojiSelekt()" id="ponude">
        <option value="bih">BiH</option>
        <option value="hrvatska">Hrvatska</option>
        <option value="srbija">Srbija</option>
      </select>
    </td>
  </tr>
  <tr>
    <td><label>Broj telefona:</label>  </td>
    <td> <label id="pozivni"> </label> <input type="text" class="textbox" id="telefon" onkeydown="FunkcijaZaTelefon()"> </td>
  </tr>
  <tr>
    <td><label>Email:</label>  </td>
    <td> <label id="mail"> </label> <input type="email" class="textbox" id="email"> </td>
  </tr>
  <tr>
    <td> <label> Pitanje :</label></td>
    <td></td>
  </tr>
  <tr>
      <td colspan="2"><textarea name="name" rows="5" cols="30"></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td>
      <input type="button" name="name" value="Pošalji" class="dugme">
    </td>
    </tr>
</table>
</div>
</body>

</html>
