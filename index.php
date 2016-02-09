<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ninja Gold Game</title>
	<style type="text/css">
		#wrapper {
			margin: 0px auto;
			width: 1000px;
		}
		h2, #reset {
			margin: 15px 15px;
			display: inline-block;
			vertical-align: top;
		}
		#your_gold {
			margin: 22px 800px 0px 0px;
			display: inline-block;
		}
		.places {
			margin: 15px 15px;
			padding: 0px 15px;
			height: 150px;
			width: 175px;
			border: 1px solid black;
			display: inline-block;
			vertical-align: top;
		}
		.places * {
			text-align: center;
		}
		#log {
			margin: 15px 15px;
			padding: 0px 15px;
			height: 300px;
			width: 900px;
			border: 1px solid black;
			overflow: scroll;
		}
		.green {
			color: green;
		}
		.red {
			color: red;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<h2>Your Gold: </h2>
		<div id="your_gold">
			<?php if(!isset($_SESSION['gold'])) {
					echo "0";
				} else {
					echo $_SESSION['gold'];
				} ?>
		</div>
		<div class="places">
			<h3>Farm</h3>
			<h4>(earns 10 - 20 gold)</h4>
			<form action="process.php" method="post">
				<input type="hidden" name="farm">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="places">
			<h3>Cave</h3>
			<h4>(earns 5 - 10 gold)</h4>
			<form action="process.php" method="post">
				<input type="hidden" name="cave">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="places">
			<h3>House</h3>
			<h4>(earns 2 - 5 gold)</h4>
			<form action="process.php" method="post">
				<input type="hidden" name="house">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="places">
			<h3>Casino!</h3>
			<h4>(earns/takes 0 - 50 gold)</h4>
			<form action="process.php" method="post">
				<input type="hidden" name="casino">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
		<h2>Activities:</h2>
		<div id="log">
			<?php if(isset($_SESSION['log'])) {
					foreach ($_SESSION['log'] as $message) {
						echo $message;
					}
				} ?>
		</div>
		<form action="process.php" method="post">
			<input type="hidden" name="reset">
			<input id="reset" type="submit" value="Start Over!">
		</form>
	</div>
</body>
</html>