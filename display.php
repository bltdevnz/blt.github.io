<?php

	include("./includes/functional.inc.php");

	$page = ""; // initial value of nothing

	if(isset($_GET['p'])) {
		$page = $_GET['p'];
	}else{
<<<<<<< HEAD
		$page = "0";
=======
		$page = "index";
>>>>>>> origin/master
	}
	

	GetVideoThumbs($page);

?>