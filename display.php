<?php

	include("./includes/functional.inc.php");

	$page = ""; // initial value of nothing

	if(isset($_GET['p'])) {
		$page = $_GET['p'];
	}else{
		$page = "0";
	}
	

	GetVideoThumbs($page);

?>