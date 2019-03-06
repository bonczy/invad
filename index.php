<?php
	session_start();
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		$_SESSION['zalogowany']=false;
					unset($_SESSION['id']);
					unset($_SESSION['user']);
					unset($_SESSION['score']);
	}
	$SESSION['haslo'] = '';
	$SESSION['login'] = '';
	if ((isset($_SESSION['udanarejestracja'])) && ($_SESSION['udanarejestracja']==true))
	{
		if ((isset($_SESSION['login'])) && ($_SESSION['login']==true))
		{
		$SESSION['login'] =  $_SESSION['login'];
		unset($_SESSION['login']);
		}
		if ((isset($_SESSION['haslo'])) && ($_SESSION['haslo']==true))
		{
			$SESSION['haslo'] = $_SESSION['haslo'];
			unset($_SESSION['haslo']);
		};
	//	echo $_SESSION['login'].'  '.$_SESSION['haslo'];
	};
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Kosmiczna inwazja</title>
</head>

<body>
	
	<br /><br />	
	<a href="rejestracja.php">Rejestracja - załóż darmowe konto!</a>
	<br /><br />
	<form action="zaloguj.php" method="post">

		Login: <br /> <input type="text" name="login" 
		value=
		<?=
		$SESSION['login'];
		?>
		> <br />
		
		Hasło: <br /> <input type="password" name="haslo" 
		value=
		<?=
		$SESSION['haslo'];
		?>
		>
		<br />
	 	 <br /><br />

		<input type="submit" value="Zaloguj się" />
	
	</form>
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>
</body>
</html>