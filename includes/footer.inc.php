</div>

<<<<<<< HEAD
		</div>
	</div>
			<div id="footer"> 
				<div id="commpartners">
					<div id="theme">
					<?php GetThemeSelect(); ?>
					</div>
					
					<img src="images/omc-logo.png" alt="otago motor club" title="Otago Motor Club" />
					<img src="images/voda-logo.png" alt="vodafone" title="Vodafone" onclick="gotoLink('http://www.vodafone.co.nz/');" />	
					<img src="images/mtfj-logo.png" alt="mayors taskforce for jobs" title="Mayors Taskforce for Jobs" onclick="gotoLink('http://www.mayorstaskforceforjobs.co.nz/');" />
					<img src="images/reap-logo.png" alt="reap" title="REAP" onclick="gotoLink('http://www.reapanz.org.nz/');" />
					<img src="images/jtb-logo.png" alt="just the job" title="Just the Job" onclick="gotoLink('http://www.justthejob.co.nz/');" />
					<img src="images/cyclone-logo.png" alt="cyclone" title="Cyclone" onclick="gotoLink('https://www.cyclone.co.nz/');" />
					<img src="images/op-logo.png" alt="otago polytechnic" title="Otago Polytechnic" onclick="gotoLink('http://www.op.ac.nz/');"/>
					<img src="images/ComConnectLogo.jpg" alt="trustpower community connect" class="trustpower" />
					<img src="images/fundraiseonlne_logo.jpg" alt="fundraise online" class="fundraise" />
					<img src="images/fb.png" alt="facebook" class="facebook" />
					<img src="images/bltdev.png" alt="site by blt development" title="All development was done by BLT Development." />
					<div id="feedback" onclick="ShowFeedback();">
						Feedback!
					</div>

				</div>	
			</div>
			

=======

		</div>
		<div class="clear"></div>

		<div id="footer">
			Theme : 
			<?php Themes(); ?>
			<br />
			&COPY; Copyright - 4 Me - Theme by BLT Development
		</div>
>>>>>>> origin/master

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
