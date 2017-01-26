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

	<title>Notlar</title>
	
</head>

<body background="img/wallpaper5.jpg">
	
	<table align="center" cellspacing="30" style="font-size:30px;">
		
		<tr>
			<td> <img src="img/icons/back.png" width="80" height="50"> </img> <a href="index.php" target=""> Geri Dön </a> </td>
		</tr>
		
	</table>
	
	<div id="rehber" align="center">
		<img src="img/icons/note.png" width="80" height="50">
	</div>
	
	</br> </br> </br>
	
		<table align="center" cellspacing="30" style="font-size:30px;">
		
		<tr>
			<td> <img src="img/icons/add_icon.png" width="80" height="50"> </img> <a href="rehber/not_ekle.php" target=""> Not Ekle </a> </td>
			<td> <img src="img/icons/delete_icon.png" width="80" height="50"> </img> <a href="rehber/not_sil.php" target=""> Not Sil </a> </td>
		</tr>
			
	</table>

	<?php

		/*
		$dir = "rehber/$login_user/notlar";
		$dh  = opendir($dir);
		while (false !== ($filename = readdir($dh))) 
		{
			$files[] = $filename;
		}
		print(count($files));
		print_r($files);
		*/

		$konum="rehber/$login_user/notlar";
		$dosyalar=scandir($konum);
		$uzunluk=count($dosyalar);
		
		print("<h3 align=\"center\"> Kayıtlı Olan Notlar: </h3>");
		print("<table align=\"center\" width=\"50%\" border=\"6\" cellspacing=\"0\" cellpadding=\"0\" background=\"img/wallpaper6.jpg\" style=\"border: 1px solid black; text-align:center; font-size:20px; \" >");
		print("<tr>");
		print("<th> NOT ADI </th>");
		print("<th> NOT İÇERİĞİ </th>");
		print("</tr>");
		
		for($i=2;$i<$uzunluk;$i++)
		{
			$dosya=fopen("rehber/$login_user/notlar/$dosyalar[$i]",'r') or die("Dosya Açılamadı!");	
			print("<tr align=\"left\">");
			print("<th align=\"center\">". $dosyalar[$i]."</th>");
			while( !feof($dosya) )
			{
				$notlar=fgets($dosya);	
				if(strlen($notlar)!=0)
					print("<td>". $notlar."</td>");	
			}
			print("</tr>");
			fclose($dosya);
		}
		print("</table>");
		
		?>
		
</body>

	<script type="text/JavaScript">
				
	</script>

</html>