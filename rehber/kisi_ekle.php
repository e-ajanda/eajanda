<?php
	
	include('../session.php');
	header('Content-Type: text/html; charset=utf-8');
	
	if(isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['numara']) && isset($_POST['adres']) && isset($_POST['mail']) )
	{
		$dosya=fopen("$login_user/kisilerim.txt",'a') or die("Dosya Açılamadı!");
		
		$adi=$_POST['ad'];
		$soyadi=$_POST['soyad'];
		$numarasi=$_POST['numara'];
		$adresi=$_POST['adres'];
		$mail_adresi=$_POST['mail'];
		
		$kisiBilgileri=$adi ."	". $soyadi ."	". $numarasi ."	". $adresi ."	". $mail_adresi ;
		$kontrol1=fwrite($dosya,$kisiBilgileri);
		$kontrol2=fwrite($dosya,"<br>\r\n");
		
		if($kontrol1 && $kontrol2)
			print("<p> Kisi Rehbere Başarıyla Eklenmiştir! </p>");
		else
			print("Kisi Rehbere Eklenememiştir!");
		
		fclose($dosya);
	}
	
?>


<html>
	
<head>

	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	
	<style type="text/css">
		
		a:link
		{
			text-decoration:none;
			font-weight:bold;
			color:#801a00;;
		}
		
		a:active
		{
			color:#801a00;;
		}
		
		a:visited
		{
			color:#801a00;;
		}
		
	</style>

	<title>Telefon Rehberi</title>
	
</head>

<body background="../img/wallpaper5.jpg">
	
	<table align="center" cellspacing="30" style="font-size:30px;">
		
		<tr>
			<td> <img src="../img/icons/back.png" width="80" height="50"> </img> <a href="../rehber.php" target=""> Geri Dön </a> </td>
		</tr>
		
	</table>
	
	<div id="rehber" align="center">
		<u><h2> Kişi Ekleme </h2></u>
	</div>
	
	<h3 align="center"> Eklenecel Kişinin Bilgilerini Giriniz! </h3>

	<div id="icerik" align="center">
		
		<form method="POST" action="">
			
			<table align="center" cellspacing="30" style="font-size:25px;" background="../img/wallpaper4.jpg">
				
				<tr align="left">
					<th> Adı : </th>
					<td> <input type="text" name="ad" maxlength="20" /> </td>
				</tr>
					
				<tr align="left">
					<th> Soyadı : </th>
					<td> <input type="text" name="soyad" maxlength="20" /> </td>
				</tr>
					
				<tr align="left">
					<th> Numarası : </th>
					<td> <input type="text" name="numara" maxlength="11" /> </td>
				</tr>
					
				<tr align="left">
					<th> Adresi : </th>
					<td> <input type="text" name="adres" maxlength="50" /> </td>
				</tr>
					
				<tr align="left">
					<th> Mail Adresi : </th>
					<td> <input type="email" name="mail" maxlength="30" /> </td>
				</tr>
					
				<tr align="center">
					
					<td>  </td>
					<td> <input type="submit" value="Kaydet" /> <input type="reset" value="Temizle" />  </td>
					
				</tr>
				
			</table>
			
		</form>
		
		
		
	</div>
	
</body>

	<script type="text/JavaScript">
				
	</script>

</html>