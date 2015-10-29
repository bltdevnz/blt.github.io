<?php
	include("includes/functional.inc.php");
	if (isset($_GET['par'])) {
		$t = $_GET['par'];
	}

	GetCategories($t);

?>