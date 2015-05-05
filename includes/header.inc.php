<?php
	include("db.inc.php");
	include("theme.inc.php");

?>
<html>
<head>
	<title>4 Me - Test Site</title>
	<?php GetTheme(); ?>
	<link rel="stylesheet" href="./css/wheel.css" type="text/css" />
	<script src="./js/jquery.min.js"></script>
	<link  href="./css/fotorama.css" rel="stylesheet"> 
	<script src="./js/fotorama.js"></script>
	<script src="./js/scripts.js"></script>
<!--[if IE]>
	<script src="./js/ie.js"><script>
<![endif]-->
	<!--<script src="./js/facebook_sdk.js"></script>-->

</head>
<body>
	<div id="fb-root"></div>
	<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "http://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>

	<ul id="menu">
		<li>Contact</li>
		<li>Login</li>
	</ul>

	<div id="container">
		
		<div id="header">
			<div class="logo">
				<div id="faded"></div>
				<img src="./images/logo.png" id="actuallogo"  />
				
				<div class="fotorama" data-autoplay="5000" data-height="320" data-nav="false" data-transition="crossfade" data-fit="cover" data-click="false" data-swipe="false" data-arrows="false">
					
					<img src="./images/teen1.jpg"  />
					<img src="./images/teen2.jpg"  />
					<img src="./images/teen3.jpg" />
				</div>
			</div>
				
		</div>

		<div id="content">
				<div id="wheelholder">
		
					<div id="thewheel">
						<div class="wheelcontainer" title="Click a category to bring up jobs for that category!">
							<img src="./images/foreground.png" id="wheelfore" />

							<div class="wheel" id="wheela"><span id="wheelatext">Social and Community Services</span></div>
							<div class="wheel" id="wheelb"><span id="wheelbtext">Manufacturing and Technology</span></div>
							<div class="wheel" id="wheelc"><span id="wheelctext">Construction and Infrastructure</span></div>
							<div class="wheel" id="wheeld"><span id="wheeldtext">Creative Industries</span></div>
							<div class="wheel" id="wheele"><span id="wheeletext">Primary Industries</span></div>
							<div class="wheel" id="wheelf"><span id="wheelftext">Service Industries</span></div>

						</div>
					</div>
				</div>
				<div id="vids">
					<div class="feed">
						<div class="fb-page" data-href="https://www.facebook.com/4memalcamtrust" data-width="345" data-hide-cover="true" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/4memalcamtrust"><a href="https://www.facebook.com/4memalcamtrust">4 ME</a></blockquote></div></div>
					</div>

					<div class="vidbox sponsor">
						<iframe width="320" height="240" src="https://www.youtube.com/embed/lnigc08J6FI" frameborder="0" allowfullscreen></iframe>
						Daryl Braithwaite - The Horses
					</div>

					<?php include('trending.inc.php'); ?>


				</div>