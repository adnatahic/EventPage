<?php

  session_start();
  
  $user_id=0;

  if (!isset($_SESSION["logovan"])){
    $_SESSION["logovan"] = "0";
      }

  $action ="prazno";

  if (isset($_POST["aktivno"])){
    $action = $_POST["aktivno"];
  }

  function login()
  {
    $veza = new PDO("mysql:dbname=eventp;host=127.10.81.2;charset=utf8", "admin", "admin");
    $veza->exec("set names utf8");

    if (isset($_POST["username"]) && isset($_POST["password"]) )
    {
      $user= $_POST["username"];
      $pass= md5($_POST["password"]);
      $korisnici= $veza->query("SELECT id, sifra, kor_ime from korisnik");
        if (!$korisnici)
        {
            $greska = $veza->errorInfo();
            print "SQL greška: " . $greska[2];
            exit();
       } 
        foreach ($korisnici as $k) 
        {
          if($k['kor_ime']==$user && $k['sifra']==$pass)
          {
           
            $_SESSION["logovan"] = "1";
            $user_id=$k['id'];
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
