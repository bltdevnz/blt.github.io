	
<?php
	include("./includes/functional.inc.php");
	include("./includes/login.inc.php");
	if (LoggedIn()) {
	$submittedCategory = mysql_real_escape_string(strip_tags($_POST['catSubmitted']));
	$catID = mysql_real_escape_string(strip_tags($_POST['categoryID']));
	if (isset($submittedCategory)){
		if (!empty($catID)) {
			DeleteCategory($catID);
			echo ("Deleted category");
		}
	}

	$submittedVideo = strip_tags($_POST['vidSubmitted']);
	$vidID = mysql_real_escape_string(strip_tags($_POST['videoID']));
	if (isset($submittedVideo)){
		if (!empty($vidID)) {
			DeleteVideo($vidID);
			echo ("Deleted video");
		}
	}
	}else{
		die("Unauthorized access.");
	}
	header("location: admin");
	


?>