<?php
	include('session.php');
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
	</style>

	<title>Telefon Rehberi</title>
	
</head>

<body background="img/wallpaper5.jpg">
	
	<table align="center" cellspacing="30" style="font-size:30px;">
		
		<tr>
			<td> <img src="img/icons/back.png" width="80" height="50"> </img> <a href="index.php" target=""> Geri Dön </a> </td>
		</tr>
		
	</table>
	
	<div id="rehber" align="center">
		<img src="img/icons/telefon.png" width="80" height="50">
	</div>
	</br> </br> </br>
	
	<div id="icerik">
		
		<table align="center" cellspacing="30" style="font-size:30px;">
			
			<tr>
				<td> <img src="img/icons/add_icon.png" width="80" height="50"> </img> <a href="rehber/kisi_ekle.php" target=""> Kişi Ekle </a> </td>
				<td> <img src="img/icons/update_icon.png" width="80" height="50"> </img> <a href="rehber/kisi_guncelle.php" target=""> Kişi Güncelle </a> </td>
				<td> <img src="img/icons/delete_icon.png" width="80" height="50"> </img> <a href="rehber/kisi_sil.php" target=""> Kişi Sil </a> </td>
			</tr>
			
		</table>
		
		<?php
			$dosya=fopen("rehber/$login_user/kisilerim.txt",'r') or die("Dosya Açılamadı!");
		    //style="border: 1px solid black; text-align:center;
			print("<h3 align=\"center\"> Rehberinizde Kayıtlı Olan Kişiler: </h3>");
			print("<table align=\"center\" width=\"50%\" border=\"6\" cellspacing=\"0\" cellpadding=\"0\" background=\"img/wallpaper6.jpg\" style=\"border: 1px solid black; text-align:center; font-size:20px; \" >");
			
			print("<tr>");
			print("<th> ADI </th>");
			print("<th> SOYADI </th>");
			print("<th> NUMARASI </th>");
			print("<th> ADRESİ </th>");
			print("<th> MAİL ADRESİ </th>");
			print("</tr>");
			//$kisiBilgileri=Array();
			  
			while( !feof($dosya) )
			{
				$bilgiler=fgets($dosya);
				$kisiBilgileri=explode("	",$bilgiler,5);
				print("<tr align=\"center\">");
				print("<td>". @$kisiBilgileri[0] ."</td>");
				print("<td>". @$kisiBilgileri[1] ."</td>");
				print("<td>". @$kisiBilgileri[2] ."</td>");
				print("<td>". @$kisiBilgileri[3] ."</td>");
				print("<td>". @$kisiBilgileri[4] ."</td>");
				print("</tr>");
			}
			print("</table>");
			fclose($dosya);
		?>
		
	</div>
	
</body>

	<script type="text/JavaScript">
				
	</script>

</html>