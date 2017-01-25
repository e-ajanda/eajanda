 <?php  session_start();
 
	header('Content-Type: text/html; charset=utf-8');
	$dosya = fopen('kullanicilar.txt', 'r') or die("Dosya Açılamadı!");
	$error='';
	
	if (isset($_POST['submit'])) 
	{
		if (empty($_POST['username']) || empty($_POST['password'])) 
		{
			$error = "Kullanıcı Adı ve Parola Boş Geçilemez!";
		}
		else
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$kontrol=0;
			while( !feof($dosya) )
			{
				$bilgiler=fgets($dosya);
				$kisiBilgileri=explode("	",$bilgiler);
				if( $username==$kisiBilgileri[0] && $password==$kisiBilgileri[1] )
				{
					$_SESSION['login_user']=$username; 
					$kontrol=1;		
				}
			}
			fclose($dosya);
			if($kontrol==0) 
			{
				$error = "Geçersiz Kullanıcı Adı veya Parola Girdiniz!";
			}
			if($kontrol==1)
			{
				//header("Location: sayfalar/profil.php");
				header("Location: profil.php");
			}
		}
	}
	
?>  