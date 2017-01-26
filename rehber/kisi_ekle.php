<?php
	
	include('../session.php');
	header('Content-Type: text/html; charset=utf-8');
	
	$error='';$error2='';
	if(isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['numara']) && isset($_POST['adres']) && isset($_POST['mail']) )
	{
		$adi=$_POST['ad'];
		$soyadi=$_POST['soyad'];
		$numarasi=$_POST['numara'];
		$adresi=$_POST['adres'];
		$mail_adresi=$_POST['mail'];
		
		if(strlen($adi)==0 || strlen($soyadi)==0 || strlen($numarasi)==0 || strlen($adresi)==0 || strlen($mail_adresi)==0)
			$error2='Eklenecek Alanlar Boş Geçilemez!';
		
		else
		{
			$dosya=fopen("$login_user/kisilerim.txt",'a') or die("Dosya Açılamadı!");
			$kisiBilgileri=$adi ."	". $soyadi ."	". $numarasi ."	". $adresi ."	". $mail_adresi;
			$kontrol1=fwrite($dosya,$kisiBilgileri);
			$kontrol2=fwrite($dosya,"\r\n");
			
			if($kontrol1 && $kontrol2)
				$error='Kisi Rehbere Başarıyla Eklenmiştir!';
			else
				$error='Kisi Rehbere Eklenememiştir!';
			
			fclose($dosya);
		}		
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
		
		h4
		{
			color:#801a00;
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
		<u><h2> Kişi Ekle </h2></u>
	</div>
	
	<h4 align="center"> Eklenecek Kişinin Bilgilerini Giriniz! </h4>

	<div id="icerik" align="center">
		
		<form method="POST" action="">
			
			<table align="center" cellspacing="30" style="font-size:20px;" background="../img/wallpaper4.jpg">
				
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
				
				<tr align="center">
					<td align="center" colspan="2">
						<span style="color:red; font-size:16px; "><?php echo $error; ?><?php echo $error2; ?></span> <br>
					</td>
				</tr>
				
			</table>
			
		</form>
		
		
		
	</div>
	
</body>

	<script type="text/JavaScript">
				
	</script>

</html>