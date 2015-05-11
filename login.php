<?php

	include ("./includes/login.inc.php");


	if (isset($_POST['username']) && isset($_POST['password'])) {
		
		$user = $_POST['username'];
		$pass = $_POST['password'];
	}else {
		die("<div id=\"failed\">#failed</div>");
	}

	$lo = TryLogin($user, $pass);

	if ($lo == false) {

		echo ("<div id=\"failed\">#failed</div>");
	}else{
		echo ("<div id=\"success\">#success</div>");
	}
	
?>