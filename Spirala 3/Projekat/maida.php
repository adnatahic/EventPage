<!DOCTYPE html>

<!-- vise css fileova? mogu li slike u html-->
<?php
  session_start();

  if (!isset($_SESSION["logged"])){
    $_SESSION["logged"] = "0";
      }

  $action = "";

  if (isset($_POST["action"])){
    $action = $_POST["action"];
  }

  function login(){
    $path = "assets/usernames.txt";
    $a = fopen($path, "r");
    $doc = fread($a, filesize($path)) ;
    $i = strpos($doc, ",", 0);
    $user = substr($doc, 0, $i);
    $pass = substr($doc, $i+1);
    $user = trim($user);
    $pass = trim($pass);
  

  if (isset($_POST["username"]) && isset($_POST["password"]) ){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    if ($username == $user && $password == $pass){
      $_SESSION["logged"] = "1";
    }
  }

}

  if ($action == "login"){
    login();
  }

  if ($action == "logout"){
    session_destroy();
    $_SESSION["logged"] = "0";
  }

?>



<html>
  <head>
    <title>About</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <link rel="stylesheet" type="text/css" href="css/logo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- -->
  </head>

  <body>

    <?php

    if ($_SESSION["logged"] == "0"){?>

    <div id="login-wrapper">
      <form id="login" action="about.php" method="post">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="password" placeholder="Password">
          <input type="submit" value="Login" name="submit-login">
          <input type="hidden" value="login" name="action">
      </form>

    </div>  
    <?php } ?>
   

   <?php

    if ($_SESSION["logged"] == "1"){?>

    <div id="logout-wrapper">
      <form id="logout" action="about.php" method="" ethod="post">
          <input type="submit" value="logout" name="submit-logout">
          <input type="hidden" value="logout" name="action">
      </form>

    </div>  
    <?php } ?>