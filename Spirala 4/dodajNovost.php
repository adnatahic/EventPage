<?php 
 date_default_timezone_set('Europe/Sarajevo'); 

 if(isset($_POST['uneseno'])) {

       if(isset($_POST['naziv']) && isset($_POST['link']) && isset($_POST['slika']) && isset($_POST['tekst']) && isset($_POST['datum']))
       {
       	$datum_kr = date("d.m.Y H:i:s");
        $kom=0;
        if(isset($_POST['mozeKom']))
        {
           $kom=1; 
        }
        $jen=1;
        $link=htmlEntities($_POST['link'], ENT_QUOTES);
        $naziv= htmlEntities($_POST['naziv'], ENT_QUOTES);
        $opis= htmlEntities($_POST['tekst'], ENT_QUOTES);
        $link_slike= htmlEntities($_POST['slika'], ENT_QUOTES);
    

        $sql= "INSERT INTO novost (datum_kreiranja, korisnik, link, naziv, opis, url_slike, komentari) VALUES (CURRENT_TIMESTAMP,'".$jen."' , '".$link."' , '".$naziv."', '".$opis."', '".$link_slike."' , '".$kom."')";
        if(!$sql)
        {
          print("greska");
        }
        $veza->query($sql);
       }
    }

 
 ?>