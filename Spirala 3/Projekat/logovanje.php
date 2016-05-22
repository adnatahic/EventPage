<?php
  session_start();

  if (!isset($_SESSION["logovan"])){
    $_SESSION["logovan"] = "0";
      }

  $action ="prazno";

  if (isset($_POST["aktivno"])){
    $action = $_POST["aktivno"];
  }

  function login(){
    $path = "korisnici.txt";
    $file = fopen($path, "r");

    while(!feof($file))
    {
        $red = fgets($file);
        $i = strpos($red, ",", 0);
        $user = trim(substr($red, 0, $i));
        $pass = trim(substr($red, $i+1));
        if (isset($_POST["username"]) && isset($_POST["password"]) ){
          $username = $_POST["username"];
          $password = md5($_POST["password"]);
          if ($username == $user && $password == $pass){
            $_SESSION["logovan"] = "1";
          }
        }

      }
    }

  if ($action == "login"){
    login();
  }

  if ($action == "logout"){
    session_destroy();
    $_SESSION["logovan"] = "0";
  }


?>
