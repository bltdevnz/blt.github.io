<?php
	include ("./includes/admin/header.inc.php");

	if (!isset($_POST['email'])) {
		if (isset($_GET['uid']) && isset($_GET['hash']))
		{
			$us = $_GET['uid'];
			$pw = $_GET['hash'];
			echo ("<form action=\"changepassword\" method=\"post\">
				<div id=\"login\">
					New Password : <br /><br />
					<input type=\"hidden\" name=\"uid\" value=\"$us\" />
					<input type=\"hidden\" name=\"pwo\" value=\"$pw\" />
					<input type=\"password\" name=\"password\" style=\"width: 100%;\" /><br /><br />
					<small>* There are no restrictions on password; however, blank password won't suffice.</small>
					<input type=\"submit\" value=\"Change Password\" style=\"float: right;\" />
			
				</div>
			</form>
		
			");
		}else{ 
			echo ("<form method=\"post\">
				<div id=\"login\">
					What is your email ?<br /><br />
			
					<input type=\"text\" name=\"email\" style=\"width: 100%;\" /><br /><br />
					<input type=\"submit\" value=\"Change Password\" style=\"float: right;\" />
			
				</div>
			</form>
		
			");
		}
	}else{
		
		SendHash($_POST['email']);
	}
	
	include ("./includes/admin/footer.inc.php");

?>