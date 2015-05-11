<?php

	include('./includes/header.inc.php');

	$page = ""; // initial value of nothing

	if(isset($_GET['p'])) {
		$page = $_GET['p'];
	}else{
		$page = "index";
	}

	include('./pages/'.$page.'.inc.php');

	include('./includes/footer.inc.php');
?>