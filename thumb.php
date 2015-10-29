<?php
	include("./includes/functional.inc.php");
	
	if (isset($_GET['thumb'])) {
		echo GetThumb($_GET['thumb']);
	}

?>