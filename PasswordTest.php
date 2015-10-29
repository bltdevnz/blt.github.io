<?php
	include("includes/functional.inc.php");
	

?>
<head></head>
<body>
	<form method="post" action="">
	<h2> Encrypting passwords</h2>

	<p> insert password <input type="text" name="new_password" /> <input type="submit" name="submited" value="Submit"></p>
	</form>
	<?php 
	
	$tempPassword = "P@ssw0rd";
	echo("	<h4> Password: $tempPassword</h4>");
	
	$new_password= $_POST['new_password'];
	$submited= $_POST['submited'];
	
	if (isset($submited)){
		if (!empty($new_password)) {
			$salt = generateRandomString();	// needs to be stored in database
			
			$oldPassword = hashPassword($tempPassword, $salt); 
			$newPassword = hashPassword($new_password, $salt); // needs to be stored in database
			$correct = comparePassword($oldPassword, $newPassword);
			if ($correct == true)
			{
				echo("Password is correct - ".hashPassword($new_password, $salt));
			}
			else
			{
				echo("incorrect password - ".hashPassword($new_password, $salt));
			}
		}

	}
?>
	
</body>
</html>