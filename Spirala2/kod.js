function funkcijaZaMeni() 
{
    document.getElementById("novostiPregled").classList.toggle("show");
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
var datum= new Date();
var objave= new Array(new Date(2016,datum.getMonth()+1,3,12,30,32,0), new Date(2016,datum.getMonth()+1,3,1,28,50,0), new Date(2016,datum.getMonth()+1,1,3,20,30,0),new Date(2016,datum.getMonth(),20,7,30,50,0),new Date(2016,datum.getMonth()+1,2,4,15,50,0), new Date(2016,datum.getMonth()+1,1,5,15,30,0),new Date(2016,datum.getMonth()+1,1,7,56,15,0),new Date(2016,datum.getMonth()+1,2,7,30,46,0), new Date(2016,datum.getMonth(),12,15,32,15,0),new Date(2016,datum.getMonth(),15,19,10,10,0), new Date(2016,datum.getMonth(),15,7,56,15,0), new Date(2016,datum.getMonth()+1,3,22,08,15,0));	
var mjeseci= new Array(31,28,31,30,31,30,31,31,30,31,30,31);
var zaProvjereDan=0;
var zaProvjereMjeseca=0;
var zaProvjereSedmice=0;


function funkcijaZaNovosti()
{
	
	
		for(var i=0; i<12; i++)
		{
			var dodatniBrojac= i+1;
			var sekunde=0, minute=0, sati=0;
			var string= "novost"+ dodatniBrojac; 
			var dan=0;
			

			if(datum.getDate()==objave[i].getDate() && (datum.getMonth()+1)==objave[i].getMonth() && datum.getYear()==objave[i].getYear())
			{
				
				if(datum.getHours()==objave[i].getHours() && datum.getMinutes()==objave[i].getMinutes())
				{
					document.getElementById(string).innerHTML="Novost objavljena prije par sekundi.";
				}
				else if(datum.getHours()==objave[i].getHours())
				{
					minute= datum.getMinutes()- objave[i].getMinutes();
					if(minute>4) document.getElementById(string).innerHTML="Novost objavljena prije " + minute + " minuta.";
					else if(minute==1) document.getElementById(string).innerHTML="Novost objavljena prije " + minute +" minutu.";
					else if(minute<0) document.getElementById(string).innerHTML=objave[i].getDate()+"."+objave[i].getMonth()+"."+objave[i].getFullYear()+"." + objave[i].getHours()+":"+objave[i].getMinutes();
					else document.getElementById(string).innerHTML="Novost objavljena prije " + minute +" minute.";
				}
				else
				{
					sati= datum.getHours()-objave[i].getHours();
					string= "novost"+ dodatniBrojac;
					if(sati>4) document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(sati)+ " sati.";
					else if(sati==1) document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(sati) +" sat.";
					else if(sati<0) document.getElementById(string).innerHTML=objave[i].getDate()+"."+objave[i].getMonth()+"."+objave[i].getFullYear()+". " + objave[i].getHours()+":"+objave[i].getMinutes();
					else document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(sati) +" sata.";

				}
			
				
			
			}
			else if(datum.getYear()==objave[i].getYear() && (datum.getMonth()+1)==objave[i].getMonth())
			{
				dan= datum.getDate()- objave[i].getDate();
				if(parseInt(dan/7) >0)
				{
					if(parseInt(dan/7)>4)document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7) + " sedmica.";
					else if(parseInt(dan/7)==1) document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7)+ " sedmicu.";
					else document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7)+ " sedmice.";
				}
				else if(dan <0 )document.getElementById(string).innerHTML=objave[i].getDate()+"."+objave[i].getMonth()+"."+objave[i].getFullYear()+". " + objave[i].getHours()+":"+objave[i].getMinutes();				
				else
				{
					if(dan>1) document.getElementById(string).innerHTML="Novost objavljena prije " + dan+ " dana.";
					else document.getElementById(string).innerHTML="Novost objavljena prije " + dan +" dan.";	
				}
			}
			else if(datum.getYear()==objave[i].getYear())
			{
				dan=objave[i].getDate();
				var godina= datum.getFullYear();
				if(objave[i].getMonth()+1==2 || datum.getMonth()+1==2)
				{
					if((godina%4==0 || godina%400==0) && godina%100!=0) mjeseci[1]=29;
				}
				dan+=mjeseci[objave[i].getMonth()]-objave[i].getDate();
				for(var j= objave[i].getMonth()+1; j< datum.getMonth();j++) dan+=mjeseci[j];
				dan+=datum.getDate();
				
				if(parseInt(dan/7)>4)document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7) + " sedmica.";
				else if(parseInt(dan/7)==1) document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7)+ " sedmicu.";
				else if(dan<0) document.getElementById(string).innerHTML=datum.getDate()+"."+datum.getMonth()+"."+datum.getFullYear()+". " + datum.getHours()+":"+datum.getMinutes();
				else document.getElementById(string).innerHTML="Novost objavljena prije " + parseInt(dan/7)+ " sedmice.";

			}
			else
			{
				document.getElementById(string).innerHTML=objave[i].getDate()+"."+objave[i].getMonth()+"."+objave[i].getFullYear()+"." + objave[i].getHours()+":"+objave[i].getMinutes();
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
	for(var i=0;i<12;i++)
	{
		brojac=i+1;
		if(datum.getYear()!=objave[i].getYear() || datum.getMonth()+1!=objave[i].getMonth() || datum.getDate()!=objave[i].getDate())
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

	for(var i=0;i<12;i++)
	{	
		if(datum.getYear()!=objave[i].getYear() || Math.abs(datum.getMonth()-objave[i].getMonth()) >1 ) continue;
		brojac=i+1;

		if(datum.getMonth()+1==objave[i].getMonth()) dan= datum.getDate()- objave[i].getDate();
		else 
		{
			dan+=mjeseci[objave[i].getMonth()]-objave[i].getDate();
			for(var j= objave[i].getMonth()+1; j< datum.getMonth()+1;j++) dan+=mjeseci[j];
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

	for(var i=0; i<12; i++)
	{
		brojac=i+1;
		string=brojac +"n";
		sakrij=document.getElementById(string);
		if(datum.getYear()!=objave[i].getYear() || datum.getMonth()+1!=objave[i].getMonth())
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
	for(var i=0;i<12;i++)
	{
		brojac=i+1;
		string= brojac +"n";
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