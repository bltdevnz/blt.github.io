<?php

	include("db.inc.php");
	
	$ret = mysql_query("DROP TABLE videos");
	$ret = mysql_query("DROP TABLE categories");
	$ret = mysql_query("DROP TABLE vid_cat");
	$ret = mysql_query("DROP TABLE admin");

	
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
	$ret = mysql_query("CREATE TABLE vid_cat
		(
			videoID			INT		NOT NULL,
			categoryID		INT		NOT NULL,
			PRIMARY KEY(videoID, categoryID)
		)
	");
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
	$ret = mysql_query("CREATE TABLE admin
		(
			adminID			INT	       	NOT NULL AUTO_INCREMENT,
			user			VARCHAR(20)	NOT NULL,
			pass			VARCHAR(35)	NOT NULL,
			email			VARCHAR(80)	NOT NULL,
			firstName		VARCHAR(28)	NOT NULL,
			lastName		VARCHAR(28)	NOT NULL,


	
			PRIMARY KEY(adminID)
		)
	");
	CreateCategory('Social and Community Services', 'blah', 'blue');
	CreateCategory('Service Industries', 'services in industry', 'lightblue');
	CreateCategory('Primary Industries', 'primary industry', 'green');
	CreateCategory('Creative Industries', 'creative', 'yellow');
	CreateCategory('Construction and Infrastructure', 'constuct', 'orange');
	CreateCategory('Manufacturing and Technology', 'manual tech', 'red');


	Seed();
?>