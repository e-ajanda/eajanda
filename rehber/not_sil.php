<?php
	
	include('../session.php');
	header('Content-Type: text/html; charset=utf-8');
	
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
			<td> <img src="../img/icons/back.png" width="80" height="50"> </img> <a href="../notlar.php" target=""> Geri Dön </a> </td>
		</tr>
		
	</table>
	
	<div id="rehber" align="center">
		<u><h2> Not Sil </h2></u>
	</div>
	
	<h4 align="center"> Silinecek Notu Seçiniz! </h4>

	<div id="icerik" align="center">
		
		<form method="POST" action="">
			
			<table align="center" cellspacing="30" style="font-size:25px;" background="../img/wallpaper4.jpg">
				
				<tr align="left">
					<th> Adı : </th>
					<td> <input type="text" name="ad" maxlength="20" /> </td>
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