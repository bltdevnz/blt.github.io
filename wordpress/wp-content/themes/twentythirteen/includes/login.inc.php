<?php
	include ("db.inc.php");
	session_start();


	function LoggedIn() {
		
		if (isset($_SESSION['loggedin'])) {
			return true;
		}else{
			return false;
		}
	}

	function TryLogin($user, $pass) {
		// strip tease
		$u = strip_tags($user);
		$u = mysql_real_escape_string($u);
		$p = strip_tags($pass);
		$p = mysql_real_escape_string($p);
		$p = md5($p);

		$ret = mysql_query("SELECT * FROM admin WHERE (user = '$u' and pass = '$p');");
		
		if (mysql_num_rows($ret) > 0) {
			$_SESSION['loggedin'] = $u;
			
			$fetch = mysql_fetch_assoc($ret);
			$_SESSION['uid'] = $fetch['adminID'];
			$_SESSION['email'] = $fetch['email'];
			return true;
		}
		mysql_free_result($ret);

		return false;

	}

	function GetUserName() {
		return $_SESSION['loggedin'];
	}
	function GetEmail() {
		return $_SESSION['email'];
	}

	function SendHash($email) {
		$email = mysql_real_escape_string($email);
		$email = strip_tags($email);

		$ret = mysql_query("SELECT * FROM admin WHERE (email = '$email');");

		if (mysql_num_rows($ret) > 0) {

			echo ("<p>An email regarding how to change your password has been sent!</p>");
			MailReset($email);
			header ("refresh: 5; url=./");

		}else {

			echo ("<p>That email doesn't exist in our database.</p>");
			header ("refresh: 3; url=./");
		}
	}
	function GenerateHash() {

		$hash = date("Y.i-d,H:i:s");

		$hash .= ceil(rand(0,10000));

		$hash = md5($hash);
		return $hash;
	}
	function MailReset($email) {
		$ret = mysql_query("SELECT * FROM admin WHERE (email = '$email');");
                $tmp = mysql_fetch_assoc($ret);
		$uID = $tmp['adminID'];
		$user = $tmp['user'];
		$pass = $tmp['pass'];
		$hash = $tmp['resetHash'];
                $site = "http://".$_SERVER['HTTP_HOST']."/preview";
		$link = "$site/reset-$uID-$hash";
		$changeMsg = "<img src=\"$site/images/logo.png\" alt=\"4ME\"><br><big>Hi $user,</big><br /><p>It's unfortunate that you forgot your password.</p><br><p>To reset go to $link</p><br><br>Thanks,<br>4 Me";
		mail($email, "Change Password for 4 Me", $changeMsg, "Content-type:text/html;\r\nFrom: noreply@malcam4me.kiwi");
	}
	
?>