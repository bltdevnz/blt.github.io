	
<?php
	include("./includes/functional.inc.php");
	include("./includes/login.inc.php");
	if (LoggedIn()) {
	$submittedCategory = mysql_real_escape_string(strip_tags($_POST['catSubmitted']));
	$color = mysql_real_escape_string(strip_tags($_POST['catColor']));
	$catName = mysql_real_escape_string(strip_tags($_POST['catName']));
	if (isset($submittedCategory)){
		if (!empty($color) && !empty($catName)) {
			CreateCategory($catName, '', $color);
			echo ("Created category : $catName");
		}
	}

	$submittedVideo = strip_tags($_POST['vidSubmitted']);
	$vidName = mysql_real_escape_string(strip_tags($_POST['vidName']));
	$vidURL = mysql_real_escape_string(strip_tags($_POST['vidURL']));
	$catID = mysql_real_escape_string(strip_tags($_POST['categoryID']));
	if (isset($submittedVideo)){
		if (!empty($vidURL) && !empty($vidName)) {
			CreateVideo($vidName,EmbedVideo($vidURL), '', array($catID));
			echo ("Created video : $vidName");
		}
	}
	}else{
		die("Unauthorized access.");
	}

	header("location: admin");


?>