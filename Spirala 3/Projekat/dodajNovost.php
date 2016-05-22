<?php 
 if(isset($_POST['uneseno'])) {

       if(isset($_POST['naziv']) && isset($_POST['link']) && isset($_POST['slika']) && isset($_POST['tekst']))
       {
       	
       	$novost= htmlEntities(str_replace(",", "&#44", $_POST['tekst']),ENT_QUOTES);
       	$datum = date("d.m.Y H:i:s");
       	$list = $_POST['naziv'].",".htmlEntities($_POST['link'],ENT_QUOTES).",".htmlEntities($_POST['slika'],ENT_QUOTES).",".$novost.",".$datum.PHP_EOL;
       	$file='noveNovosti.csv';
       	$data = file_get_contents($file);
		file_put_contents($file, $list.$data);
       }
    }



    
	$file= fopen("noveNovosti.csv", "r");
	$matrica=array();
	$i=0;
    while(!feof($file))
    {
      $matrica[$i]= array();
      $podatak= fgetcsv($file);
      for($j=0;$j<5;$j++)
      {
      	$matrica[$i][$j]=$podatak[$j];
      }
      $i++;
    }

     if($action == "sort") 
     {

     	for($i=0;$i< count($matrica)-2;$i++)
     	{
     		if($matrica[$i][0]<$matrica[$i+1][0])
     		{
     			$pom= $matrica[$i][0];
     			$matrica[$i][0]=$matrica[$i+1][0];
     			$matrica[$i+1][0]=$pom; 
     		}    		
     	}
     }
    
 ?>