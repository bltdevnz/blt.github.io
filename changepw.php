<?php

<<<<<<< HEAD
	include ("./includes/admin/header.inc.php");

=======
	include ("./includes/header.inc.php");
>>>>>>> origin/master
	$npw = mysql_real_escape_string(strip_tags($_POST['password']));
	$uid = mysql_real_escape_string(strip_tags($_POST['uid']));
	$pwo = mysql_real_escape_string(strip_tags($_POST['pwo']));

<<<<<<< HEAD
	
	$ret = mysql_query("SELECT * FROM admin WHERE adminID = '$uid'");
	$res = mysql_fetch_assoc($ret);
	$user = $res['user'];
	$pass = $res['pass'];
	
	if ($npw != "" and !empty($npw)) {
	$salt = generateRandomString();
	$npw = hashPassword($npw, $salt);

	$p = mysql_query("UPDATE admin SET pass = '$npw', salt = '$salt' WHERE adminID = '$uid' and salt = '$pwo';");
	if (mysql_affected_rows($connection) > 0){
		echo ("<div id=\"login\">Password was changed! <a href=\"admin\">Go to admin</a>.</div>");
	}else{
		echo ("<div id=\"login\">No password was affected, invalid password reset link possibly. <a href=\"#\" onclick=\"history.back();\">Go Back</a>.</div>");
	}
	}else{
		echo ("<div id=\"login\">You didn't enter a passsword! <a href=\"#\" onclick=\"history.back();\">Go Back</a>.</div>");
	}
	include ("./includes/admin/footer.inc.php");
=======
	$npw = md5($npw);
	$p = mysql_query("UPDATE admin SET pass = '$npw' WHERE adminID = '$uid' and resetHash = '$pwo';");
	if (mysql_affected_rows($connection) > 0){
		echo ("<p>Password was changed!</p>");
	}else{
		echo ("<p>No password was affected, invalid password reset link possibly.</p>");
	}
	include ("./includes/footer.inc.php");
>>>>>>> origin/master
?>