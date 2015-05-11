<?php
	include ("./includes/header.inc.php");

	if (!isset($_POST['email'])) {
		if (isset($_GET['uid']) && isset($_GET['hash']))
		{
			$us = $_GET['uid'];
			$pw = $_GET['hash'];
			echo ("<form action=\"changepassword\" method=\"post\">
				<p>
					New Password<br />
					<input type=\"hidden\" name=\"uid\" value=\"$us\" />
					<input type=\"hidden\" name=\"pwo\" value=\"$pw\" />
					<input type=\"password\" name=\"password\" style=\"width: 100%;\" /><br />
					<input type=\"submit\" value=\"Change Password\" style=\"float: right;\" />
			
				</p>
			</form>
		
			");
		}else{ 
			echo ("<form method=\"post\">
				<p>
					What is your email ?<br />
			
					<input type=\"text\" name=\"email\" style=\"width: 100%;\" /><br />
					<input type=\"submit\" value=\"Change Password\" style=\"float: right;\" />
			
				</p>
			</form>
		
			");
		}
	}else{
		
		SendHash($_POST['email']);
	}
	
	include ("./includes/footer.inc.php");

?>