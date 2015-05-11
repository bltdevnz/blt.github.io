<?php

	include ("./includes/header.inc.php");
	$npw = mysql_real_escape_string(strip_tags($_POST['password']));
	$uid = mysql_real_escape_string(strip_tags($_POST['uid']));
	$pwo = mysql_real_escape_string(strip_tags($_POST['pwo']));

	$npw = md5($npw);
	$p = mysql_query("UPDATE admin SET pass = '$npw' WHERE adminID = '$uid' and resetHash = '$pwo';");
	if (mysql_affected_rows($connection) > 0){
		echo ("<p>Password was changed!</p>");
	}else{
		echo ("<p>No password was affected, invalid password reset link possibly.</p>");
	}
	include ("./includes/footer.inc.php");
?>