<?php
	
	include('../session.php');
	header('Content-Type: text/html; charset=utf-8');
	$bugun = getdate();
	
	$tarih=$bugun['mday']. "." .$bugun['mon']. "." .$bugun['year']. "-" .$bugun['hours']. "_" .$bugun['minutes']. "_" .$bugun['seconds']; 
	
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
		$dosya = fopen("$login_user/notlar/$tarih.txt","w");
		
		$girilenNot=$_POST['girilenNot'];
		
		$kontrol1=fwrite($dosya,$girilenNot);
		$kontrol2=fwrite($dosya,"<br>\r\n");
		
		if($kontrol1 && $kontrol2)
			print("<p> Girilen Not Başarıyla Kaydedilmiştir! </p>");
		else
			print("Girilen Not Kaydedilememiştir!");
		
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
		
		h3
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
		<u><h2> Not Ekleme </h2></u>
	</div>
	
	<h3 align="center"> Eklenecek Notu Giriniz! </h3>

	</br>
	
	<div id="icerik" align="center">
		
		<form method="POST" action="">
			
			<table align="center" cellspacing="30" style="font-size:25px;" background="../img/wallpaper4.jpg">
				
				<tr align="left">
					<th> Not : </th>
					<td> <textarea rows="10" cols="50" placeholder="Notunuzu Giriniz" maxlength="500" name="girilenNot"></textarea>  </td>
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