

		</div>
		<div class="clear"></div>

		<div id="footer">
			Theme : 
			<?php Themes(); ?>
			<br />
			&COPY; Copyright - 4 Me - Theme by BLT Development
		</div>

</div>
<div class="popup" id="login">
	<h5>Login<span id="close_login">x</span></h5>
	<form method="post" onsubmit="return validateform()">
		<input type="text" name="username" id="username" placeholder="Username"><br /><br />
		<input type="password" name="password" id="password" placeholder="Password"><br />
		<span class="invalid">Incorrect username/password.<br /><a href="./resetpassword">Reset Password ?</a></span><br /><br />
		<input type="submit" value="Login">
	</form>
</div>
<div id="blur"></div>
</body>
</html>
