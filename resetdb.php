<?php

	include("./includes/functional.inc.php");
	include("./includes/login.inc.php");
	if (!LoggedIn()) { die("Your location, and ISP details have been stored to our intruder list. <br /><big>You do not have appropriate access!</big>"); }
	echo ("<p>Dropping tables...</p>");
	$ret = mysql_query("DROP TABLE videos");
	$ret = mysql_query("DROP TABLE categories");
	$ret = mysql_query("DROP TABLE vid_cat");
	$ret = mysql_query("DROP TABLE admin");
<<<<<<< HEAD
	$ret = mysql_query("DROP TABLE views");
	echo ("<p>Dropped tables.</p>");
	
=======
	$ret = mysql_query("DROP TABLE posts");
	echo ("<p>Dropped tables.</p>");
	
	echo ("<p>Creating videos table...</p>");
	$ret = mysql_query("CREATE TABLE videos
		(
			videoID			INT	       	NOT NULL AUTO_INCREMENT,
			videoTitle		VARCHAR(60)	NOT NULL,
			videoUrl		VARCHAR(180)	NOT NULL,
			videoDesc		VARCHAR(250),
			videoPopularity		INT		NOT NULL,
	
			PRIMARY KEY(videoID)
		)
	");
	echo ("<p>Creating video category link...</p>");
	$ret = mysql_query("CREATE TABLE vid_cat
		(
			videoID			INT		NOT NULL,
			categoryID		INT		NOT NULL,
			PRIMARY KEY(videoID, categoryID)
		)
	");
	echo ("<p>Creating categories table...</p>");
	$ret = mysql_query("CREATE TABLE categories
		(
			categoryID		INT	       	NOT NULL AUTO_INCREMENT,
			categoryName		VARCHAR(60)	NOT NULL,
			categoryDesc		VARCHAR(250)	NOT NULL,
			categoryColor		VARCHAR(20)	NOT NULL,
			categoryPopularity	INT		NOT NULL,
			
			PRIMARY KEY(categoryID)
		)
	");
	echo ("<p>Creating admin table...</p>");
	$ret = mysql_query("CREATE TABLE admin
		(
			adminID			INT	       	NOT NULL AUTO_INCREMENT,
			user			VARCHAR(20)	NOT NULL,
			pass			VARCHAR(155)	NOT NULL,
			email			VARCHAR(80)	NOT NULL,
			firstName		VARCHAR(28)	NOT NULL,
			lastName		VARCHAR(28)	NOT NULL,
			resetHash		VARCHAR(155)	NOT NULL,
>>>>>>> origin/master

	echo ("<p>Setting up database...");
	CreateTables();

<<<<<<< HEAD
=======
	
			PRIMARY KEY(adminID)
		)
	");
	echo ("<p>Creating posts table...</p>");
	$ret = mysql_query("CREATE TABLE posts
		(
			postID			INT	       	NOT NULL AUTO_INCREMENT,
			postTitle		TEXT		NOT NULL,
			postData		TEXT		NOT NULL,
			postDate		DATETIME	NOT NULL,
			adminID			INT			NOT NULL,

			PRIMARY KEY(postID)
		)
	");
	echo ("<p>Creating catagories...</p>");
	CreateCategory('Social and Community Services', 'blah', 'blue');
	CreateCategory('Service Industries', 'services in industry', 'lightblue');
	CreateCategory('Primary Industries', 'primary industry', 'green');
	CreateCategory('Creative Industries', 'creative', 'yellow');
	CreateCategory('Construction and Infrastructure', 'constuct', 'orange');
	CreateCategory('Manufacturing and Technology', 'manual tech', 'red');
	
	echo ("<p>Creating default admin accounts...</p>");
	CreateAdmin("test", md5('testicle'), "timcamo@gmail.com", "timmy", "timtim");
	
	echo ("<p>Adding default posts...</p>");
	CreatePost ("SAMPLE POST", "This is a sample post automated on database reset. :)", date('Y-m-d'), 1);
	CreatePost ("LaCie", "Lardidardi we like da LaCie", date('Y-m-d'), 1);
	
>>>>>>> origin/master

	Seed();



	echo ("<p>Creating default admin accounts...</p>");
	$salt = generateRandomString();
	CreateAdmin("4me", hashPassword("grass123", $salt), "bltdev4me@gmail.com", "4", "me", $salt);

	

	echo ("<p><big>Setup Complete!</big></p>");
?>