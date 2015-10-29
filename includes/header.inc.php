<?php

<<<<<<< HEAD
	include("functional.inc.php");

	global $pageName;
=======
	include("login.inc.php");
	include("theme.inc.php");
>>>>>>> origin/master

?>

<html>
<head>
<<<<<<< HEAD
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>4Me</title>
	<meta name="Description" content="4 Me is a programme organised by the Malcam Foundation which is Families discovering the REAL employment opportunities.">
	<meta name="Keywords" content="jobs, 4me, youth, career, education, job, malcolm, cameron, blt, school, college, university, polytechnic, opportunity, opportunities, uni, poly, polytech, kiwi, teen, help, work, malcam, foundation, trust, malcam4me, malcam4me.kiwi, fun, enjoy, videos, information, help, how, to, get, money, in, pocket, fast, because, i, need, a, goat, in, dunedin">
=======
	<title>4 Me - Test Site</title>
	<?php GetTheme(); ?>
	<link  href="./css/all.css" rel="stylesheet"> 
	<link rel="stylesheet" href="./css/wheel.css" type="text/css" />
	<link  href="./css/fotorama.css" rel="stylesheet"> 
	<script src="./js/jquery.min.js"></script>
	
	<script src="./js/fotorama.js"></script>
	<script src="./js/scripts.js"></script>
<!--[if IE]>
	<script src="./js/ie.js"><script>
<![endif]-->
	<!--<script src="./js/facebook_sdk.js"></script>-->
>>>>>>> origin/master

	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="stylesheet" href="./<?php GetThemeDirectory(); ?>/css/4me.css" type="text/css">
	<script src="./<?php GetThemeDirectory(); ?>/js/jquery-2.1.4.min.js"></script>
	<script src="./<?php GetThemeDirectory(); ?>/js/4menu.js"></script>
	<script src="./<?php GetThemeDirectory(); ?>/js/scripts.js"></script>
	<script>
(function($) {
    $.fn.changeElementType = function(newType) {
        var attrs = {};

        $.each(this[0].attributes, function(idx, attr) {
            attrs[attr.nodeName] = attr.nodeValue;
        });

<<<<<<< HEAD
        this.replaceWith(function() {
            return $("<" + newType + "/>", attrs).append($(this).contents());
        });
    };
})(jQuery);
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
=======
	<ul id="menu">
		<?php LoggedIn(); ?>
	</ul>
>>>>>>> origin/master

  ga('create', 'UA-67010706-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
		<div id="fade"></div>
	<div id="container">
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
						<small>Your feedback helps us a lot.
							<span id="result">
								<input type="submit" value="Send" />
								<input type="reset" value="Clear" />
							</span>
						</small>

					</form>

				</div>
			</div>
		<div id="banner">
			<div id="bimg"><img src="./images/logo.png" alt="logo" onclick="refresh();" /></div>
			<div id="slog"><h5>Kids and Parents discovering REAL Employment Opportunities</h5></div>
		</div>


		<div id="content">
			<div id="colmenu">
				Menu
				<img src="./images/menuico.png" alt="expand/collapse" />
			</div>
			<div id="menu">
				<?php GetCategories(); ?>

				
	
			</div>
			<div id="groupcontent">
