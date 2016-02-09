<?php

session_start();

	if(isset($_POST['reset'])) {
		session_destroy();
	}

	if(!isset($_SESSION['gold'])) {
		$_SESSION['gold'] = 0;
	}

	if(isset($_POST['farm'])) {
		$farm_gold = rand(10, 20);
		$_SESSION['gold'] = $_SESSION['gold'] + $farm_gold;
		$farm_message = "<p class='green'>You entered a farm and earned " . $farm_gold . " gold. (" . date("F jS, Y g:ia") . ")</p>";
		$_SESSION['log'][] = $farm_message;
	}

	if(isset($_POST['cave'])) {
		$cave_gold = rand(5, 10);
		$_SESSION['gold'] = $_SESSION['gold'] + $cave_gold;
		$cave_message = "<p class='green'>You entered a cave and earned " . $cave_gold . " gold. (" . date("F jS, Y g:ia") . ")</p>";
		$_SESSION['log'][] = $cave_message;
	}

	if(isset($_POST['house'])) {
		$house_gold = rand(2, 5);
		$_SESSION['gold'] = $_SESSION['gold'] + $house_gold;
		$house_message = "<p class='green'>You entered a house and earned " . $house_gold . " gold. (" . date("F jS, Y g:ia") . ")</p>";
		$_SESSION['log'][] = $house_message;
	}

	if(isset($_POST['casino'])) {
		$casino_gold = rand(0, 50);
		$chance = rand(0, 100);
		if($chance > 30) {
			$_SESSION['gold'] = $_SESSION['gold'] + $casino_gold;
			$casino_message = "<p class='green'>You entered a casino and earned " . $casino_gold . " gold. (" . date("F jS, Y g:ia") . ")</p>";
			$_SESSION['log'][] = $casino_message;
		} else {
			$_SESSION['gold'] = $_SESSION['gold'] - $casino_gold;
			$casino_message = "<p class='red'>You entered a casino and lost " . $casino_gold . " gold... Ouch... (" . date("F jS, Y g:ia") . ")</p>";
			$_SESSION['log'][] = $casino_message;
		}
	}
	
header('location:index.php');

?>