<?php
	
	include('../session.php');
	header('Content-Type: text/html; charset=utf-8');
	
	$error='';
	$konum="$login_user/notlar";
	
	if( isset($_POST['not']) )
	{
		$dosyaAdi=$_POST['not'];
		
		if($dosyaAdi=="-1")
			$error='Silinecek Notu Seçiniz!';
		
		else
		{
			$sonuc=unlink("$konum/$dosyaAdi");
			if($sonuc==true)
				$error='Silme İşlemi Başarıyla Gerçekleşmiştir!';
				
			else
				$error='Silme İşlemi Gerçekleştirilememiştir!';	
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
			<td> <img src="../img/icons/back.png" width="80" height="50"> </img> <a href="../notlar.php" target=""> Geri Dön </a> </td>
		</tr>
		
	</table>
	
	<div id="rehber" align="center">
		<u><h2> Not Sil </h2></u>
	</div>
	
	<h4 align="center"> Silinecek Notu Seçiniz! </h4>

	<div id="icerik" align="center">
		<?php
			
			$dosyalar=scandir($konum);
			$uzunluk=count($dosyalar);
		?>
		<form method="POST" action="">
			
			<table align="center" cellspacing="30" style="font-size:25px;" background="../img/wallpaper4.jpg">
				
				<tr align="left">
					<td> 
						<select name="not">
							<option value="-1" selected>Not Seçiniz!</option>
							<?php for($i=2;$i<$uzunluk;$i++)
							{  
							?> 
								
								<option value="<?php echo $dosyalar[$i]; ?>" > <?php echo $dosyalar[$i]; ?> </option>
                 
							<?php
							} 
							?>
						</select>
					</td>
				</tr>
					
				<tr align="center">
					<td align="center"> 
						<input type="submit" value="Notu Sil" /> 
						<input type="button" value="İptal" onclick="window.location.href='../notlar.php' " /> 
					</td>
	
				</tr>
				
			</table>
			
		</form>
		<br/>
	</div>
	
	
	<?php
	
		$dosyalar=scandir($konum);
		$uzunluk=count($dosyalar);
	
		print("<h3 align=\"center\"> Kayıtlı Olan Notlar: </h3>");
		print("<table align=\"center\" width=\"50%\" border=\"6\" cellspacing=\"0\" cellpadding=\"0\" background=\"../img/wallpaper6.jpg\" style=\"border: 1px solid black; text-align:center; font-size:20px; \" >");
		print("<tr>");
		print("<th> NOT ADI </th>");
		print("<th> NOT İÇERİĞİ </th>");
		print("</tr>");
		
		for($i=2;$i<$uzunluk;$i++)
		{
			$dosya=fopen("$login_user/notlar/$dosyalar[$i]",'r') or die("Dosya Açılamadı!");	
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