<?php
	
	include('../session.php');
	header('Content-Type: text/html; charset=utf-8');
	
	$error='';$error2='';$error3='';
	$bulunanAd="";$bulunanSoyad="";
	$bulunanNumara="";$bulunanAdres="";
	$bulunanEmail="";
	
	if( isset($_POST['girilenAd']) && isset($_POST['girilenSoyad']) )
	{
		$arananAd=$_POST['girilenAd'];
		$arananSoyad=$_POST['girilenSoyad'];
		
		if(strlen($arananAd)==0 || strlen($arananSoyad)==0)
			$error3='Aranacak Alanlar Boş Geçilemez!';
		
		else
		{
			$kontrol=0;
			$dosya=fopen("$login_user/kisilerim.txt",'r') or die("Dosya Açılamadı!");
			while( !feof($dosya) )
			{
				$bilgiler=fgets($dosya);
				$kisiBilgileri=explode("	",$bilgiler,5);
				if( $arananAd==@$kisiBilgileri[0] && $arananSoyad==@$kisiBilgileri[1] )
				{
					$bulunanAd=@$kisiBilgileri[0];
					$bulunanSoyad=@$kisiBilgileri[1];
					$bulunanNumara=@$kisiBilgileri[2];
					$bulunanAdres=@$kisiBilgileri[3];
					$bulunanEmail=@$kisiBilgileri[4];
					$kontrol=1;			 
				}
			}
			if($kontrol==0)
				$error="Aranan Kişi Bulunamadı!";
				
			fclose($dosya);
		}
	}
	
	if(isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['numara']) && isset($_POST['adres']) && isset($_POST['mail']) )
	{	
		$adi=$_POST['ad'];
		$soyadi=$_POST['soyad'];
		$numarasi=$_POST['numara'];
		$adresi=$_POST['adres'];
		$mail_adresi=$_POST['mail'];
		
		if(strlen($adi)==0 || strlen($soyadi)==0 || strlen($numarasi)==0 || strlen($adresi)==0 || strlen($mail_adresi)==0)
			$error3='Güncellenecek Alanlar Boş Geçilemez!';
			
		else
		{
			$dosya=fopen("$login_user/kisilerim.txt",'r') or die("Dosya Açılamadı!");
			$kisilerDizisi=array();
			$indis=0;
			
			while( !feof($dosya) )
			{
				$bilgiler=fgets($dosya);
				$kisilerDizisi[$indis]=$bilgiler;
				$indis++;
			}
			//print_r($kisilerDizisi);
			
			fclose($dosya);

			$kontrol2=false;
			$yeniDosya=fopen("$login_user/kisilerim.txt",'w') or die("Dosya Açılamadı!");
			$uzunluk=count($kisilerDizisi);
			for($i=0;$i<$uzunluk;$i++)
			{
				$kisiBilgileri=explode("	",$kisilerDizisi[$i],5);
				//print_r($kisiBilgileri);
				
				if( $adi==@$kisiBilgileri[0] && $soyadi==@$kisiBilgileri[1] )
				{
					$kisilerDizisi[$i]=$adi ."	". $soyadi ."	". $numarasi ."	". $adresi ."	". $mail_adresi."\r\n";
					$kontrol2=true;
				}
				$kontrol1=fwrite($yeniDosya,$kisilerDizisi[$i]);
			}
			if($kontrol2)
				$error2='Kisi Başarıyla Güncellenmiştir!';
			else
				$error2='Kisi Güncellenememiştir!';
				
			
			$indis=0;
			fclose($yeniDosya);
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
		<u><h2> Kişi Güncelle </h2></u>
	</div>
	
	<h4 align="center"> Güncellenecek Kişinin Adını ve Soyadını Giriniz! </h4>

	<div id="icerik" align="center">
		
		<form method="POST" action="" name="ara">
			
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
			
		</form>
		
		<form method="POST" action="" name="guncelle">
			
			<table align="center" cellspacing="30" style="font-size:18px;" background="../img/wallpaper4.jpg">
					
				 <tr align="center">
					<th> Adı : </th>
					<td> <input type="text" name="ad" maxlength="20" value="<?php echo "$bulunanAd" ?>" /> </td>
					<th> Soyadı : </th>
					<td> <input type="text" name="soyad" maxlength="20" value="<?php echo "$bulunanSoyad" ?>" /> </td>
					<th> Numarası : </th>
					<td> <input type="text" name="numara" maxlength="11" value="<?php echo "$bulunanNumara" ?>" /> </td>
				</tr>
							
				<tr align="center">
					<th> Adresi : </th>
					<td> <input type="text" name="adres" maxlength="50" value="<?php echo "$bulunanAdres" ?>" /> </td>
					<th> Mail Adresi : </th>
					<td> <input type="text" name="mail" maxlength="30" value="<?php echo "$bulunanEmail" ?>"/> </td>
					<td align="center" colspan="6"> <input type="submit" value="Kişiyi Güncelle" /> <input type="button" value="İptal" onclick="window.location.href='../rehber.php' " />
				</tr>
				
				<tr>
					<td align="center" colspan="6">
						<span style="color:red; font-size:16px; "><?php echo $error2; ?><?php echo $error3; ?></span> <br>
					</td>
				<tr>
				
			</table>
			
		</form>
	
	</div>
	
</body>

	<script type="text/JavaScript">
				
	</script>

</html>