<?php
	session_start();
	if(isset($_SESSION['loggedin'])) {
		$_SESSION['loggedin'] = null;
	}
	header("location: ./");

?>