<!DOCTYPE html>
<?php include 'logovanje.php' ?>

<html>

<head>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <script type="text/javascript" src="kod.js"></script>
  <title>EventPage</title>
</head>

<body>
<div id="krug1" class="krug"></div>
  <ul class="meni">
    <li class="logo">EventPage</li>
    <li class="item"> <a href="index.php "> Početna </a> </li>
    <li class="active"><a href="news.php">Novosti</a> </li>
    <li class="item"><a href="contact.php">Kontakt</a> </li>
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
       
        <form id="logout" action="index.php" method="post" accept-charset="utf-8">
          <ul class="loginInput">
            <li>
            <input type="submit" value="logout"></li>
            <li> <input type="hidden" value="Logout" name="aktivno"> </li>
          </ul>
        </form>
       
       <?php } ?>
      </li>
  </ul>


  <table class="tabelarniprikaz">
    <tr >
      <th class="header" colspan="5" >Najpopularnija mjesta za provod </th>
    </tr>
    <tr >
      <th class="header" >Sarajevo</th>
      <th class="header" >Trebinje</th>
      <th class="header" >Tuzla</th>
      <th class="header" >Banja Luka</th>
      <th class="header" > Mostar </th>
    </tr>
    <tr class="neparni">
      <td>Sloga </td>
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
    </tr>
    <tr class="parni">
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
    </tr>
    <tr class="neparni">
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
    </tr>
    <tr class="parni">
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
      <td>Sloga</td>
    </tr>
  </table>
<div id="pomocni"></div>
</body>

</html>
