<?php
session_start();
$endScore;

if (isset($_POST['endScoreGO'])){
	echo "jest przegrany";
	echo "<br>";
	$endScore = $_POST['endScoreGO'];
	
}else
	if (isset($_POST['endScoreC']))
	{
	echo "jest wygrany";
	$endScore = $_POST['endScoreC'];
	echo "<br>";
	}

echo "<br>";
echo $endScore;
echo " punktacja po grze";
echo "<br>";
echo $_SESSION['id']." numer indentyfiatora";
echo "<br>";
echo $_SESSION['user']." uzytkownik";
echo "<br>";
echo $_SESSION['score']." dotychczasowy rekord";
echo "<br>";	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

	// Check connection
if ($polaczenie->connect_error) {
    die("Connection failed: " . $polaczenie->connect_error);
}; 
$sql = "UPDATE uzytkownicy SET score = ".$endScore." WHERE id = ".$_SESSION['id'];

echo $sql;

if ($endScore>$_SESSION['score']){
if ($polaczenie->query($sql) === TRUE) {
   echo "JD";
   $_SESSION['score']=$endScore;
   header('Location: inwazja.php');
   
   }
   
   else {
    echo "Error updating record: " . $polaczenie->error;
}
}
else{
	echo "nie pobiłeś rekordu";
	header('Location: inwazja.php');
	}
	
$polaczenie->close();
?>