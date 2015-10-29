<?php
	include("./includes/functional.inc.php");

	if (isset($_POST['page'])) {
		include("./pages/".$_POST['page'].".inc.php");
	}else {
		echo ("Page not found.");
	}

?>