var datum= new Date();
var objave1= new Array(new Date(2016,datum.getMonth()+1,datum.getDate(),datum.getHours()-1,datum.getMinutes()-2,0,0),new Date(2016,datum.getMonth()+1,datum.getDate(),datum.getHours()-2,datum.getMinutes()-3,0,0), new Date(2016,datum.getMonth()+1,datum.getDate(),datum.getHours()-3,datum.getMinutes()-2,0,0));	
var mjeseci= new Array(31,28,31,30,31,30,31,31,30,31,30,31);
var objave= new Array();
var zaProvjereDan=0;
var zaProvjereMjeseca=0;
var zaProvjereSedmice=0;
var velicina;


function funkcijaZaMeni() 
{
    document.getElementById("novostiPregled").classList.toggle("show");
}

var xhttp;

function ValidirajServis()
{
	var kod = document.getElementById("code");
	var pozivni = document.getElementById("pozivni");
	if(kod.value.length == 2 && pozivni.value.length >= 4)
	{
		if(window.XMLHttpRequest)
		{
			xhttp = new XMLHttpRequest();
			xhttp.open("GET", "https://restcountries.eu/rest/v1/alpha?codes=" + kod.value, true);
			xhttp.send();
			xhttp.onreadystatechange = function() 
			{
	  			if (xhttp.readyState  == 4 && xhttp.status == 200)
	  			{
	  				var servis = JSON.parse(xhttp.responseText);
	  				if(servis != null)
	  				{
	  					var pozivniB = pozivni.value.substring(1,4);  					
	  					var ostatak = pozivni.value.substring(4, pozivni.value.length).length;
	  					
		  				if (servis[0].callingCodes == pozivniB && ostatak==8)
		  				{				
		  					kod.style.backgroundColor = 'white';
		  					pozivni.style.backgroundColor = 'white';		
		  				}
		  				else 
		  				{				
		  					kod.style.backgroundColor = 'red';
		  					pozivni.style.backgroundColor = 'red';	  						  						  
		  				}  		
	  				} 
	  						 						

	  			}
			}
		}
	}
	else
	{
		kod.style.backgroundColor='red';
		pozivni.style.backgroundColor='red';

	}
}


window.onclick = function(event) 
{
  if (!event.target.matches('.pregledi')) 
  {

    var dropdowns = document.getElementsByClassName("novostiRaspored");
    var i;
    for (i = 0; i < dropdowns.length; i++) 
    {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) 
      {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function PozoviFunkciju()
{
	
	/*for(var i=0;i<objave.length;i++)
	{
		var date= objave[i].innerHTML;
		var date_sec = Number(date.substr(17,2));
		var date_min = Number(date.substr(14,2));
		var date_hour = Number(date.substr(11,2));
		var date_year = Number(date.substr(6,4));
		var date_month = Number(date.substr(3,2))-1;
		var date_day = Number(date.substr(0,2));

	
		var d = new Date(date_year, date_month, date_day, date_hour, date_min, date_sec);
		objave[i].innerHTML= d;
	}*/
}


function funkcijaZaNovosti()
{
	objave= document.getElementsByClassName("novostiniz");

	velicina= objave.length;
	

	
		for(var i=0; i<velicina; i++)
		{
			var dodatniBrojac= i+1;
			var sekunde=0, minute=0, sati=0;
			var string="novost"+dodatniBrojac; 
			var dan=0;
			
			var date= objave[i].innerHTML;
			var date_sec = Number(date.substr(17,2));
			var date_min = Number(date.substr(14,2));
			var date_hour = Number(date.substr(11,2));
			var date_year = Number(date.substr(6,4));
			var date_month = Number(date.substr(3,2))-1;
			var date_day = Number(date.substr(0,2));

	
			var novi = new Date(date_year, date_month+1, date_day, date_hour, date_min, date_sec);
			
			if(datum.getDate()==novi.getDate() && (datum.getMonth()+1)==novi.getMonth() && datum.getYear()==novi.getYear())
			{
				
				if(datum.getHours()==novi.getHours() && datum.getMinutes()==novi.getMinutes())
				{
					document.getElementById(string).innerHTML="Novost objavljena prije par sekundi.";
				}
				else if(datum.getHours()==novi.getHours())
				{
					minute= datum.getMinutes()- novi.getMinutes();
					if(minute>4) document.getElementById(string).innerHTML="Novost objavljena prije " + minute + " minuta.";
					else if(minute==1) document.getElementById(string).innerHTML="Novost objavljena prije " + minute +" minutu.";
					else if(minute<0) document.getElementById(string).innerHTML=novi.getDate()+"."+novi.getMonth()+"."+novi.getFullYear()+"." + novi.getHours()+":"+novi.getMinutes();
					else document.getElementById(string).innerHTML="Novost objavljena prije " + minute +" minute.";
				}
				else
				{
					sati= datum.getHours()-novi.getHours();
					string= "novost"+ dodatniBrojac;
					if(sati>4) document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(sati)+ " sati.";
					else if(sati==1) document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(sati) +" sat.";
					else if(sati<0) document.getElementById(string).innerHTML=novi.getDate()+"."+novi.getMonth()+"."+novi.getFullYear()+". " + novi.getHours()+":"+novi.getMinutes();
					else document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(sati) +" sata.";

				}
			
				
			
			}
			else if(datum.getYear()==novi.getYear() && (datum.getMonth()+1)==novi.getMonth())
			{
				dan= datum.getDate()- novi.getDate();
				if(parseInt(dan/7) >0)
				{
					if(parseInt(dan/7)>4)document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7) + " sedmica.";
					else if(parseInt(dan/7)==1) document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7)+ " sedmicu.";
					else document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7)+ " sedmice.";
				}
				else if(dan <0 )document.getElementById(string).innerHTML=novi.getDate()+"."+novi.getMonth()+"."+novi.getFullYear()+". " + novi.getHours()+":"+novi.getMinutes();				
				else
				{
					if(dan>1) document.getElementById(string).innerHTML="Novost objavljena prije " + dan+ " dana.";
					else document.getElementById(string).innerHTML="Novost objavljena prije " + dan +" dan.";	
				}
			}
			else if(datum.getYear()==novi.getYear())
			{
				dan=novi.getDate();
				var godina= datum.getFullYear();
				if(novi.getMonth()+1==2 || datum.getMonth()+1==2)
				{
					if((godina%4==0 || godina%400==0) && godina%100!=0) mjeseci[1]=29;
				}
				dan+=mjeseci[novi.getMonth()]-novi.getDate();
				for(var j= novi.getMonth()+1; j< datum.getMonth();j++) dan+=mjeseci[j];
				dan+=datum.getDate();
				
				if(parseInt(dan/7)>4)document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7) + " sedmica.";
				else if(parseInt(dan/7)==1) document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7)+ " sedmicu.";
				else if(dan<0) document.getElementById(string).innerHTML=datum.getDate()+"."+datum.getMonth()+"."+datum.getFullYear()+". " + datum.getHours()+":"+datum.getMinutes();
				else document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7)+ " sedmice.";

			}
			else
			{
				document.getElementById(string).innerHTML=novi.getDate()+"."+novi.getMonth()+"."+novi.getFullYear()+"." + novi.getHours()+":"+novi.getMinutes();
			}
			string="";
		}

}

function PregledDana()
{
	resetujSve();
	zaProvjereDan=1;
	var string;
	var brojac=0;
	var sakrij;
	objave= document.getElementsByClassName("novostiniz");

	velicina= objave.length;
	for(var i=0;i<velicina;i++)
	{
			var date= objave[i].innerHTML;
			var date_sec = Number(date.substr(17,2));
			var date_min = Number(date.substr(14,2));
			var date_hour = Number(date.substr(11,2));
			var date_year = Number(date.substr(6,4));
			var date_month = Number(date.substr(3,2))-1;
			var date_day = Number(date.substr(0,2));

	
			var novi = new Date(date_year, date_month+1, date_day, date_hour, date_min, date_sec);
			brojac=i+1;
		if(datum.getYear()!=novi.getYear() || datum.getMonth()+1!=novi.getMonth() || datum.getDate()!=novi.getDate())
		{
			string= brojac+ "n";
			sakrij= document.getElementById(string);
			sakrij.style.display = 'none';
		}
		string="";
	}
}

function PregledSedmice()
{
	resetujSve();
	var dan=0;
	var string;
	var brojac=0;
	var sakrij;
	var kojiDan= datum.getDay();
	objave= document.getElementsByClassName("novostiniz");

	velicina= objave.length;

	for(var i=0;i<velicina;i++)
	{	
		var date= objave[i].innerHTML;
			var date_sec = Number(date.substr(17,2));
			var date_min = Number(date.substr(14,2));
			var date_hour = Number(date.substr(11,2));
			var date_year = Number(date.substr(6,4));
			var date_month = Number(date.substr(3,2))-1;
			var date_day = Number(date.substr(0,2));

	
			var novi = new Date(date_year, date_month+1, date_day, date_hour, date_min, date_sec);
		if(datum.getYear()!=novi.getYear() || Math.abs(datum.getMonth()-novi.getMonth()) >1 ) continue;
		brojac=i+1;

		if(datum.getMonth()+1==novi.getMonth()) dan= datum.getDate()- novi.getDate();
		else 
		{
			dan+=mjeseci[novi.getMonth()]-novi.getDate();
			for(var j= novi.getMonth()+1; j< datum.getMonth()+1;j++) dan+=mjeseci[j];
			dan+=datum.getDate();
		}
		
		string=brojac +"n";
		if(kojiDan==0)
		{
			if(dan>6)
			{
				sakrij=document.getElementById(string);
				sakrij.style.display = 'none';
			}
		}
		else 
		{
			if(dan> kojiDan || dan<0)
			{
				sakrij=document.getElementById(string);
				sakrij.style.display = 'none';
			}
		}
		string="";
		dan=0;
	}
}

function PregledMjeseca()
{
	resetujSve();
	var string="";
	var brojac=0;
	var sakrij;
	objave= document.getElementsByClassName("novostiniz");

	velicina= objave.length;

	for(var i=0; i<velicina; i++)
	{
		var date= objave[i].innerHTML;
			var date_sec = Number(date.substr(17,2));
			var date_min = Number(date.substr(14,2));
			var date_hour = Number(date.substr(11,2));
			var date_year = Number(date.substr(6,4));
			var date_month = Number(date.substr(3,2))-1;
			var date_day = Number(date.substr(0,2));

	
			var novi = new Date(date_year, date_month+1, date_day, date_hour, date_min, date_sec);
		brojac=i+1;
		string=brojac +"n";
		sakrij=document.getElementById(string);
		if(datum.getYear()!=novi.getYear() || datum.getMonth()+1!=novi.getMonth())
		{
			sakrij.style.display = 'none';
		}
		string="";
	}
}

function resetujSve()
{
	var string="";
	var brojac=0;
	var prikazi;
	objave= document.getElementsByClassName("novostiniz");
	velicina= objave.length;
	for(var i=0;i<velicina;i++)
	{
		brojac=i+1;
		string= brojac+"n";
		prikazi= document.getElementById(string);
		prikazi.style.display='block';
		string="";
	}
}

function FunkcijaZaIme()
{
	var ime= document.getElementById("ime").value;
	var patern= /^[a-zA-Z]+$/;
	var proslo= patern.test(ime);
	var imeTB= document.getElementById("ime");
	if(proslo==false)
	{
		imeTB.style.backgroundColor="red";
	}
	else imeTB.style.backgroundColor="white";
	proslo=true;


	var prezime= document.getElementById("prezime").value;
	var email= document.getElementById("email");
	if(ime!="" && prezime!="")
	{
		email.readOnly=true;
		email.style.backgroundColor="gray";
	}
	else 
	{ 
		email.readOnly=false;
		email.style.backgroundColor="white";
	}

}

function FunkcijaZaPrezime()
{
	var prezime= document.getElementById("prezime").value;
	var patern= /^[a-zA-Z]+$/;
	var proslo= patern.test(prezime);
	var imeTB= document.getElementById("prezime");
	if(proslo==false)
	{
		imeTB.style.backgroundColor="red";
	}
	else imeTB.style.backgroundColor="white";
	proslo=true;
	var ime= document.getElementById("ime").value;
	var email= document.getElementById("email");
	if(ime!="" && prezime!="")
	{
		email.readOnly=true;
		email.style.backgroundColor="gray";
	}
	else 
	{ 
		email.readOnly=false;
		email.style.backgroundColor="white";
	}
}

function FormaLoad()
{
	var labela= document.getElementById("pozivni");
}

function ProvjeriKojiSelekt()
{
	 var selekt = document.getElementById("ponude").selectedIndex;
    var objekat = document.getElementById("ponude").options;
	var pozivni=document.getElementById("pozivni");
	if(objekat[selekt].index ==0) pozivni.innerHTML="+387";
	else if(objekat[selekt].index==1) pozivni.innerHTML="+385";
	else pozivni.innerHTML="+381";

	var ime= document.getElementById("ime").value;
	var prezime= document.getElementById("prezime").value;
	var email= document.getElementById("email");
	if(ime!="" && prezime!="")
	{
		email.readOnly=true;
		email.style.backgroundColor="gray";
	}
	else 
	{ 
		email.readOnly=false;
		email.style.backgroundColor="white";
	}

}

function FunkcijaZaTelefon()
{
	var telefon= document.getElementById("telefon").value;
	var patern=/^[0-9]+$/;
	var proslo= patern.test(telefon);
	var telefon1= document.getElementById("telefon");
	if(proslo==false)
	{
		telefon1.style.backgroundColor="red";
	}
	else telefon1.style.backgroundColor="white";
	proslo=true;

	var ime= document.getElementById("ime").value;
	var prezime= document.getElementById("prezime").value;
	var email= document.getElementById("email");
	if(ime!="" && prezime!="")
	{
		email.readOnly=true;
		email.style.backgroundColor="gray";
	}
	else 
	{ 
		email.readOnly=false;
		email.style.backgroundColor="white";
	}
}