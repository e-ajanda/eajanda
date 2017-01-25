<?php	session_start();
	    
	header('Content-Type: text/html; charset=utf-8');

	$dosya = fopen('kullanicilar.txt', 'r') or die("Dosya Açılamadı!");
	
	$user_check=$_SESSION['login_user'];
	
	$kontrol=0;
	while( !feof($dosya) )
	{
		$bilgiler=fgets($dosya);
		$kisiBilgileri=explode("	",$bilgiler);
		if( $user_check==$kisiBilgileri[0])
		{
			$login_user = $kisiBilgileri[0];
			$login_session = $kisiBilgileri[2]. " " .$kisiBilgileri[3];
		}
	}

	if(!isset($login_session))
	{
		fclose($dosya);
		header('Location: index.php'); // Redirecting To Home Page
	}
?>