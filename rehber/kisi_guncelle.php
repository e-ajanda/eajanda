<?php
	
	include('../session.php');
	header('Content-Type: text/html; charset=utf-8');
	$bulunanAd="";
	$bulunanSoyad="";
	if( isset($_POST['girilenAd']) && isset($_POST['girilenSoyad']) )
	{
		$arananAd=$_POST['girilenAd'];
		$arananSoyad=$_POST['girilenSoyad'];
		
		$kontrol=0;
		$dosya=fopen("$login_user/kisilerim.txt",'r') or die("Dosya Açılamadı!");
		while( !feof($dosya) )
		{
			$bilgiler=fgets($dosya);
			$kisiBilgileri=explode("	",$bilgiler);
			if( $arananAd==$kisiBilgileri[0] && $arananSoyad==$kisiBilgileri[1] )
			{
				$bulunanAd=$kisiBilgileri[0];
				$bulunanSoyad=$kisiBilgileri[1];
				$kontrol=1;		
				break;
			}
		}
		if($kontrol==0)
			print("Kisi Bulunamadı!");
				
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
		<u><h2> Kişi Güncelleme </h2></u>
	</div>
	
	<h3 align="center"> Güncellenecek Kişinin Adını ve Soyadını Giriniz! </h3>

	<div id="icerik" align="center">
		
		<form method="POST" action="">
			
			<table align="center" cellspacing="30" style="font-size:20px;" background="../img/wallpaper4.jpg">
				
				<tr align="left">
					<th> Adı : </th>
					<td> <input type="text" name="girilenAd" maxlength="20" /> </td>
				</tr>
					
				<tr align="left">
					<th> Soyadı : </th>
					<td> <input type="text" name="girilenSoyad" maxlength="20" /> </td>
				</tr>
						
				<tr align="center">
					
					<td>  </td>
					<td> <input type="submit" value="Kisiyi Getir" /> <input type="reset" value="Temizle" />  </td>
					
				</tr>
				
			</table>
			
			<table align="center" cellspacing="30" style="font-size:20px;" background="../img/wallpaper4.jpg">
				
				 <tr align="left">
					<th> Adı : </th>
					<td> <input type="text" name="ad" maxlength="20" value="<?php echo "$bulunanAd" ?>" /> </td>
				</tr>
					
				<tr align="left">
					<th> Soyadı : </th>
					<td> <input type="text" name="soyad" maxlength="20" value="<?php echo "$bulunanSoyad" ?>" /> </td>
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
					<td> <input type="submit" value="Güncelle" />
					
				</tr>
				
			</table>
			
		</form>
		
		
		
	</div>
	
</body>

	<script type="text/JavaScript">
				
	</script>

</html>