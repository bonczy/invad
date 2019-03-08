<?php

session_start();
require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
// Check connection

if ($polaczenie->connect_error) {
    die("Connection failed: " . $polaczenie->connect_error);
} 
$sql = "SELECT user,score FROM uzytkownicy ORDER BY score DESC LIMIT 10";
$result=mysqli_query($polaczenie,$sql);
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="">
  <title>Space Game</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="wrap">
    <header>SCORE <div id="punkty">0</div> jesteś "<?=$_SESSION['user']?>"twój rekord to <?=$_SESSION['score']?> </header>
	<div class="game-wrapper">
      <div class="game"></div>
      <div class="bocznica">
	  <table >
					<thead >
						<tr >
						<th>LP</th><th>GRACZ</th><th>PUNKTY</th>
						</tr>
					</thead>
		<tbody>
				<?php $i=1;?>
						<tr>
						<?php $row=mysqli_fetch_array($result,MYSQLI_NUM);?>
						<td><?=$i++?></td><td><?=$row[0]?></td><td><?=$row[1]?></td>
						</tr>
						<tr>
						<?php $row=mysqli_fetch_array($result,MYSQLI_NUM);?>
						<td><?=$i++?></td><td><?=$row[0]?></td><td><?=$row[1]?></td>
						</tr>
						<tr>
						<?php $row=mysqli_fetch_array($result,MYSQLI_NUM);?>
						<td><?=$i++?></td><td><?=$row[0]?></td><td><?=$row[1]?></td>
						</tr>
						<tr>
						<?php $row=mysqli_fetch_array($result,MYSQLI_NUM);?>
						<td><?=$i++?></td><td><?=$row[0]?></td><td><?=$row[1]?></td>
						</tr>
						<?php $row=mysqli_fetch_array($result,MYSQLI_NUM);?>
						<td><?=$i++?></td><td><?=$row[0]?></td><td><?=$row[1]?></td>
						</tr>
						<tr>
						<?php $row=mysqli_fetch_array($result,MYSQLI_NUM);?>
						<td><?=$i++?></td><td><?=$row[0]?></td><td><?=$row[1]?></td>
						</tr>
						<tr>
						<?php $row=mysqli_fetch_array($result,MYSQLI_NUM);?>
						<td><?=$i++?></td><td><?=$row[0]?></td><td><?=$row[1]?></td>
						</tr>
						<tr>
						<?php $row=mysqli_fetch_array($result,MYSQLI_NUM);?>
						<td><?=$i++?></td><td><?=$row[0]?></td><td><?=$row[1]?></td>
						</tr>
						<?php $row=mysqli_fetch_array($result,MYSQLI_NUM);?>
						<td><?=$i++?></td><td><?=$row[0]?></td><td><?=$row[1]?></td>
						</tr>
						<tr>
						<?php $row=mysqli_fetch_array($result,MYSQLI_NUM);?>
						<td><?=$i++?></td><td><?=$row[0]?></td><td><?=$row[1]?></td>
						</tr>
					</tbody>		
					</table>
	  </div>
	  <div class="congratulations">
	  
       <h1>Wygrałeś!</h1>
		<h1>
		
		<form action="scoreChallenge.php" method="post">

		 <input type="hidden" id="INPUTC" name = "endScoreC"/>
		
		<input class="btn" type="submit" value="Nowa gra" />
		</form>
	
		</h1>
		
      </div>
      
	   <div class="game-over" >  
		
	   
		<h1>Przegrałeś!</h1>
		<h1>
		
		<form action="scoreChallenge.php" method="post">

		 <input type="hidden" id="INPUTGO" name = "endScoreGO"/>
		
		<input class="btn" type="submit" value="Nowa gra" />
	
	</form>
	
		</h1> 
       
      </div>
	  
    </div>
    <footer><a href="index.php">Powrót do logowania!</a>  Left/right keys to move, spacebar to shoot</footer>
	
  </div>
  <script src="js/game.js"></script>
</body>
</html>
