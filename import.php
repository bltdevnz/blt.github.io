<?php
	include("includes/functional.inc.php");
	if(!LoggedIn())	{ die ("You need to be logged in to import to database."); }

	
	if (isset($_POST['submit'])) {
		Import($_FILES['data']);
	}
	
	header("location: admin");
?>