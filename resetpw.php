<?php
<<<<<<< HEAD
	include ("./includes/admin/header.inc.php");
=======
	include ("./includes/header.inc.php");
>>>>>>> origin/master

	if (!isset($_POST['email'])) {
		if (isset($_GET['uid']) && isset($_GET['hash']))
		{
			$us = $_GET['uid'];
			$pw = $_GET['hash'];
			echo ("<form action=\"changepassword\" method=\"post\">
<<<<<<< HEAD
				<div id=\"login\">
					New Password : <br /><br />
					<input type=\"hidden\" name=\"uid\" value=\"$us\" />
					<input type=\"hidden\" name=\"pwo\" value=\"$pw\" />
					<input type=\"password\" name=\"password\" style=\"width: 100%;\" /><br /><br />
					<small>* There are no restrictions on password; however, blank password won't suffice.</small>
					<input type=\"submit\" value=\"Change Password\" style=\"float: right;\" />
			
				</div>
=======
				<p>
					New Password<br />
					<input type=\"hidden\" name=\"uid\" value=\"$us\" />
					<input type=\"hidden\" name=\"pwo\" value=\"$pw\" />
					<input type=\"password\" name=\"password\" style=\"width: 100%;\" /><br />
					<input type=\"submit\" value=\"Change Password\" style=\"float: right;\" />
			
				</p>
>>>>>>> origin/master
			</form>
		
			");
		}else{ 
			echo ("<form method=\"post\">
<<<<<<< HEAD
				<div id=\"login\">
					What is your email ?<br /><br />
			
					<input type=\"text\" name=\"email\" style=\"width: 100%;\" /><br /><br />
					<input type=\"submit\" value=\"Change Password\" style=\"float: right;\" />
			
				</div>
=======
				<p>
					What is your email ?<br />
			
					<input type=\"text\" name=\"email\" style=\"width: 100%;\" /><br />
					<input type=\"submit\" value=\"Change Password\" style=\"float: right;\" />
			
				</p>
>>>>>>> origin/master
			</form>
		
			");
		}
	}else{
		
		SendHash($_POST['email']);
	}
	
<<<<<<< HEAD
	include ("./includes/admin/footer.inc.php");
=======
	include ("./includes/footer.inc.php");
>>>>>>> origin/master

?>