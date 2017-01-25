<?php
	
	header('Content-Type: text/html; charset=utf-8');
	include('login.php'); // Includes Login Script
	if(isset($_SESSION['login_user']))
	{
		//header("Location: sayfalar/profil.php");
		header("Location: profil.php");
	}
	
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8"/>
	<title>E - AJANDA</title>
</head>

<body background="img/wallpaper1.jpg"> 
	<div id="main">
		<h1 align="center">E - AJANDA </h1>
		<br/> <br/> <br/> <br/> <br/> <br/> <br/>
		
		<div id="login">
			<form align="center" action="" method="POST">
				
				<table align="center" background="img/wallpaper2.jpg" style="width:40%; font-size:40px; " >
					<tr>
						<td align="center" style="font-size:25px;">
							<b>Kullanıcı Giriş Paneli</b>
						</td>
					</tr>
					
					<tr>
						<td align="center">
							<input id="username" name="username" type="text" placeholder="Kullanıcı Adı" size="35">
						<td>
					</tr>
					
					<tr>
						<td align="center">
							<input id="password" name="password" type="password" placeholder="Parola" size="35">
						</td>
					</tr>
					
					<tr>
						<td align="center">
							<input type="submit" name="submit"  value="Giriş Yap">
							<input type="reset" value="Temizle">
						</td>
					</tr>
					
					<tr>
						<td align="center">
							<span style="color:red; font-size:16px; "><?php echo $error; ?></span> <br>
						</td>
					<tr>
				</table>
			
			</form>
		</div>
	</div>
	
	<br>
	
	<div style="position:fixed; bottom:0; padding-left: 530px; text-align:center; font-weight:bold;" > 
		<i>	Ömer Yücel - Yunus Emre Küçük	© 2017 </i>
	</div> 
	
</body>

</html>