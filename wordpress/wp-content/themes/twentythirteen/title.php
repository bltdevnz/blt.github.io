<?php
	include ("./includes/login.inc.php");
	include ("./includes/posts.inc.php");

	if (!isset($_SESSION['loggedin'])) { header("location: ./"); }
	
	$x = $_POST;

	EditTitle($x['cID'], $x['post']);

	$page = $x['page'];
	
	header("location: ./$page");

?>