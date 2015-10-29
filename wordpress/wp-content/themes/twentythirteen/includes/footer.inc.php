</div>
			<div id="feedbackpopup"  >
				<div id="feedbackpopuptitle">
					<h5>Feedback</h5><img id="feedbackpopupclose" src="images/close.png" onclick="CloseFeedback();" />
				</div>
				
				<div id="feedbackpopupcontent">
					<form method="post" onsubmit="return feedback();">
						<label for="name">Name</label>
						<input type="text" name="name" /><br />
						<label for="email">Email</label>
						<input type="email" name="email" /><br />
						<label for="reason">Subject</label>
						<select name="reason">
							<option value="Feedback on 4Me Programme">Feedback on 4Me Programme</option>
							<option value="Feedback on Website">Feedback on Website</option>
							<option value="General Enquiries">General Enquiries</option>
							<option value="Complaint">Complaint</option>
						</select><br /><br /><br />
						<label for="message">Message</label>
						<textarea name="message"></textarea>
						<small>* by sending you agree to our <a href="javascript:;" onclick="terms()">terms</a>.
							<span id="result">
								<input type="submit" value="Send" />
								<input type="reset" value="Clear" />
							</span>
						</small>
						<div id="terms">
							<h3>Terms:</h3>
							When you submit feedback all the information is sent directly to staff of Malcam Foundation, including location and IP address.<br />
							This information is only used initially to trace back any suspicious enquiries.<br />
							<br />
							Names and Emails are stored for a short period before being purged.<br />
							<br />
							You may request that the enquiry or complaint is deleted after being read by stating so in the message area.<br />
							<br />
							Please note: If you don't recieve a reply it doesn't mean we haven't read what you've said, however, we will try to reply as often as possible.
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>
			<div id="footer"> 
				<div id="commpartners">
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
					<div id="feedback" onclick="ShowFeedback();">
						Feedback!
					</div>

				</div>	
			</div>
			


</body>
</html>