<?php
	include('session.php');
	header('Content-Type: text/html; charset=utf-8');
	//$user_name = $_SESSION["username"];
?>
 
 
<!DOCTYPE html>
<html>
	
<head>

	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	
	<style type="text/css">
		
		body
		{
			background-color:3333CC;
		}
		
		a:link
		{
			text-decoration:none;
			font-weight:bold;
			color:#801a00;
		}
		
		a:active
		{
			color:#801a00;
		}
		
		a:visited
		{
			color:#801a00;
		}
		
		
	</style>

	<title>Profil Sayfası</title>
	
</head>

<body background="img/wallpaper5.jpg" onload="tarihYaz() ; saatOlustur()">

	<div id="profil" align="left">
		
		<u><h1 align="center" style="font-size:50px; color:#000000">Profil Sayfası</h1></u>
		
		<div align="center" style="font-size:36px; font-weight:bold; color:#000000;">
			<b> Hoş Geldiniz <?php echo $login_session; ?> </b>  
		</div>

	</div> 
	</br> </br> </br> </br> 
	<table align="center"  cellspacing="30" style="font-size:30px;">
		
		<tr>
			<td> <img src="img/icons/profil.png" width="80" height="50"> </img> <a href="index.php" target=""> Profilim </a> </td>
			<td> <img src="img/icons/telefon.png" width="80" height="50"> </img> <a href="rehber.php" target=""> Telefon Rehberi </a> </td>
			<td> <img src="img/icons/takvim.png" width="80" height="50"> </img> <a href="takvim.php" target=""> Takvim </a> </td>
			<td> <img src="img/icons/note.png" width="80" height="50"> </img> <a href="notlar.php" target=""> Notlar </a> </td>
			<td> <img src="img/icons/logout.png" width="80" height="50"> </img> <b id="logout"><a href="logout.php"> Çıkış Yap </a></b> </td>
		</tr>
		
	</table>
	
	</br> </br> </br>  
	<div align="center" style="font-size:36px; font-weight:bold; color:#801a00;">
			
			<u><span id="spanTarih" > </span></u>
			</br>
			<span id="spanSaat" style="font-size:85px;"> </span>
			
	</div>
	
	</br>
	
	<div align="center" style="font-size:36px; font-weight:bold; color:black;">
		<b> Kullanıcı : <?php echo $login_user; ?> </b>
	</div>
	
	
</body>

	<script type="text/JavaScript">
				
		function tarihYaz()
		{
			var t=new Date();
			var gun=t.getDate();
			var ay=t.getMonth() + 1;
			var yil=t.getFullYear();
			var tarih=( (gun<10) ? '0' : '' ) + gun + '.' + ( (ay<10) ? '0' : '' ) + ay + '.' + yil; 
			spanTarih.innerHTML=tarih;
		}
				
		function saatOlustur()
		{
			var zaman=new Date();
			var saat=zaman.getHours();
			var dakika=zaman.getMinutes();
			var saniye=zaman.getSeconds();
			suankiZaman=saat + ':' + ( (dakika<10) ? '0' : '' ) + dakika + ':' + ( (saniye<10) ? '0' : '' ) + saniye;
			spanSaat.innerHTML=suankiZaman;
			
			setTimeout("saatOlustur()",1000);
		}
		
	</script>

</html>