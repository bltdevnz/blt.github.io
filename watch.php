<?php


<<<<<<< HEAD
	include('./includes/functional.inc.php');
=======
	include('./includes/header.inc.php');
>>>>>>> origin/master

	if (!isset($_GET['vid'])) { header("location: ./"); }
	$vID = $_GET['vid'];
	$cID = $_GET['c'];
	
	$q = mysql_query ("SELECT categoryColor, categoryName FROM categories WHERE (categoryID = ".$cID.");");
	$cat = mysql_fetch_object($q);

	$qa = mysql_query ("SELECT videoTitle, videoUrl, videoPopularity FROM videos WHERE (videoId = ".$vID.");");
	$ret = mysql_fetch_object($qa);

	
	mysql_free_result($qa);

	mysql_free_result($q);

	
	




	$color = $cat->categoryColor;
	$title = $cat->categoryName;
	$vidTitle = $ret->videoTitle;
	$vidUrl = $ret->videoUrl;
	$pop = $ret->videoPopularity - -1;

	mysql_query("UPDATE videos SET videoPopularity=".$pop." WHERE (videoID = ".$vID.");");



	echo ("
					<big id=\"subtitle\" style=\"background: ".$color." !important;\">".$vidTitle."</big>
					<iframe width=\"100%\" height=\"480\" src=\"".$vidUrl."\" frameborder=\"0\" allowfullscreen></iframe>
<<<<<<< HEAD
=======
					<a href=\"javascript:window.history.back();\">Go Back</a>
				</p>
>>>>>>> origin/master
				
	");



?>