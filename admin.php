<?php
	include("./includes/admin/header.inc.php");

	if (LoggedIn()) {
		if (isset($_POST['cmd'])) {
			$cmd = $_POST['cmd'];

			if ($cmd == "deadlinks") {
				ScanDeadLinks();
			}
		}
		echo ("
		<ul id=\"amenu\">
			<li class=\"current\"  onclick=\"changeTab('admin')\">Home</li>
			<li onclick=\"changeTab('database')\">Database</li>
			<li onclick=\"changeTab('category')\">Add Category</li>
			<li onclick=\"changeTab('video')\">Add Video</li>
			<li onclick=\"changeTab('removecat')\">Remove Category</li>
			<li onclick=\"changeTab('removevid')\">Remove Video</li>
			<li onclick=\"changeTab('account')\">Manage Account</li>
			<li class=\"logout\" onclick=\"logout()\">Logout</li>
	
		</ul>
		<div id=\"admin\">
			"); include("getstats.php"); echo ("
		</div>
		<div class=\"hidden\" id=\"database\">
			
		
				<div id=\"importData\">
					".ImportForm()."
				</div>

			<div class=\"button\" id=\"btnExportDB\" onclick=\"exportDb()\">Backup Database</div>
			<div class=\"button\" id=\"btnRevert\" onclick=\"revertDatabase()\">Restore Database to Original</div>

		</div>
		<div class=\"hidden\" id=\"account\">
			<div class=\"detail\">Username : <span>".GetUserName()."</span></div>
			<div class=\"detail\">Password : <span>Change Password</span></div>
			<div class=\"detail\">Email : <span>".GetEmail()."</span></div>
			<small>&nbsp; Double Click to change.</small>
		</div>
		<div class=\"hidden\" id=\"category\">
			
			".NewCategoryForm()."

		</div>
		<div class=\"hidden\" id=\"video\">
			
			".NewVideoForm()."
			
		</div>
		<div class=\"hidden\" id=\"removecat\">

			".RemoveCategoryForm()."

		</div>
		<div class=\"hidden\" id=\"removevid\">

			".RemoveVideoForm()."
			

		</div>
		");
	}else{
		echo ("<div id=\"login\">
				<h5>Login</h5>
				<form method=\"post\" onsubmit=\"return validateform();\">
					<label for=\"user\">Username : </label><input type=\"text\" name=\"username\" /> <br /><br />
					<label for=\"pass\">Password : </label><input type=\"password\" name=\"password\" /> <br /> <br /> <br />
					<span class=\"invalid\">Invalid username or password.</span>
					<input type=\"submit\" value=\"Login\" /><br />
					<small><a href=\"resetpassword\">Forgot Password?</a></small>
				</form>
		</div>");
	}
	include("./includes/admin/footer.inc.php");

?>