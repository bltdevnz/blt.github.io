<?php
	include("./includes/login.inc.php"); // include login for later ( and to be able to use session  )
	include("./includes/theme.inc.php");

	if (isset($_POST['theme'])) {
		
		ChangeTheme($_POST['theme']);
		$last = isset($_POST['lastPage']) && $_POST['lastPage'] != "" ? $_POST['lastPage'] : "index";

		if ($last == "index") {
			header("location: ./");
		}else{
			header("location: ".$last."");
		}
	}else{
		header("location: ./");
	}
?>