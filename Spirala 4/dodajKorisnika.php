<?php

if(isset($_POST['unesikorisnika']))
{
  
	if(isset($_POST['imeprezime'],$_POST['noviuser'], $_POST['novipas'], $_POST['novipas2']))
	{
    echo '<script type="text/javascript">alert("poookusaj222!");</script>';
		if(trim($_POST['novipas'])==trim($_POST['novipas2']))
		{
			$novas= md5($_POST['novipas']);
      $imep=$_POST['imeprezime'];
      $us=$_POST['noviuser'];
      echo '<script type="text/javascript">alert("poookusaj!");</script>';
			$proslo= " INSERT INTO korisnik(ime_prezime, kor_ime, sifra) VALUES ('".$imep."', '".$us."', '".$novas."') ";
			if(!$proslo)
        {
          print("greska");
        }
        $veza->exec($proslo);

		}
		
		}
	

}

 ?>