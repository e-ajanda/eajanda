<?php
	
	include('../session.php');
	header('Content-Type: text/html; charset=utf-8');
	
	$error='';$error2='';
	
	
	/*
	[seconds] => 40
    [minutes] => 58
    [hours]   => 21
    [mday]    => 17
    [mon]     => 6
    [year]    => 2003
	*/
	
	if(isset($_POST['girilenNot']))	
	{
		$girilenNot=$_POST['girilenNot'];
		if(strlen($girilenNot)==0)
			$error2='Not Alanı Boş Geçilemez!';
		
		else
		{
			$bugun=getdate();
			$tarih=$bugun['mday']. "." .$bugun['mon']. "." .$bugun['year']. "-" .$bugun['hours']. "_" .$bugun['minutes']. "_" .$bugun['seconds']; 
			$dosya = fopen("$login_user/notlar/$tarih.txt","w");
			
			$kontrol1=fwrite($dosya,$girilenNot);
			$kontrol2=fwrite($dosya,"\r\n");
			
			if($kontrol1 && $kontrol2)
				$error="Girilen Not Başarıyla Kaydedilmiştir!";
				
			else
				$error="Girilen Not Kaydedilememiştir!";
			
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
			<td> <img src="../img/icons/back.png" width="80" height="50"> </img> <a href="../notlar.php" target=""> Geri Dön </a> </td>
		</tr>
		
	</table>
	
	<div id="rehber" align="center">
		<u><h2> Not Ekle </h2></u>
	</div>
	
	<h4 align="center"> Eklenecek Notu Giriniz! </h4>

	</br>
	
	<div id="icerik" align="center">
		
		<form method="POST" action="">
			
			<table align="center" cellspacing="30" style="font-size:20px;" background="../img/wallpaper4.jpg">
				
				<tr align="left">
					<th> NOT : </th>
					<td> <textarea rows="10" cols="50" placeholder="Eklenecek Notunuzu Giriniz!" maxlength="500" name="girilenNot" style="resize:none;"></textarea>  </td>
				</tr>
						
				<tr align="center">
					<td>  </td>
					<td> <input type="submit" value="Kaydet" /> <input type="reset" value="Temizle" />  </td>
				</tr>
				
				<tr>
					<td align="center" colspan="3">
						<span style="color:red; font-size:16px; "><?php echo $error; ?><?php echo $error2; ?></span> <br>
					</td>
				<tr>
				
			</table>
			
		</form>
		
	</div>
	
</body>

	<script type="text/JavaScript">
				
	</script>

</html>