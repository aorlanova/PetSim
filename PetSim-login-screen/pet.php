<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Welcome to PetLand</title>
		<link href="./petgame.css" type="text/css" rel="stylesheet" />
		<link rel="icon" type="image/x-icon" href="proj2-img/dog-icon.png">
	</head>
	
	<body>
		<div class="game" style="background-image: url(proj2-img/grass.jpeg)";>
			<img src="proj2-img/cloud.png" width="100" height="50" alt="doggy" class="cloudOne">
			<img src="proj2-img/cloud.png" width="100" height="50" alt="doggy" class="cloudTwo">
			<div class="statusBar" style="background: rgb(237, 45, 45);">Your pet needs care!</div>
			<div class="leaderboard"><h3>LEADER BOARD:</h3>
			<p>Care for your pet daily for more points!</p>
			<?php
            include 'leaderboard.php';
            displayLeaderboard();
            ?>
			</div>
			<div class="pet"> 
				<img src="proj2-img/dog.png" width="100" height="200" alt="doggy">
			</div>
			<div class="careBar">
				<img src="proj2-img/bone.png" width="100" height="100">
				<h2>Care for <?php echo $_GET['petname']; ?> here!</h2> <br>
				
			</div>
		</div>
	</body>
</html>