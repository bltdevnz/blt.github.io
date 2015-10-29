<?php

	include("./includes/functional.inc.php");
	include("./includes/login.inc.php");
	if (!LoggedIn()) { die("Your location, and ISP details have been stored to our intruder list. <br /><big>You do not have appropriate access!</big>"); }
	echo ("<p>Dropping tables...</p>");
	$ret = mysql_query("DROP TABLE videos");
	$ret = mysql_query("DROP TABLE categories");
	$ret = mysql_query("DROP TABLE vid_cat");
	$ret = mysql_query("DROP TABLE admin");
	$ret = mysql_query("DROP TABLE views");
	echo ("<p>Dropped tables.</p>");
	

	echo ("<p>Setting up database...");
	CreateTables();


	Seed();



	echo ("<p>Creating default admin accounts...</p>");
	$salt = generateRandomString();
	CreateAdmin("4me", hashPassword("grass123", $salt), "bltdev4me@gmail.com", "4", "me", $salt);

	

	echo ("<p><big>Setup Complete!</big></p>");
?>