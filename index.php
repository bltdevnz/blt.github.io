<?php
	include("db.inc.php");
?>
<html>
<head>
	<title>4 Me - Test Site</title>
	<link rel="stylesheet" href="4me.css" type="text/css" />
	<link rel="stylesheet" href="wheel.css" type="text/css" />
	<script src="./js/jquery.min.js"></script>
	<link  href="./fotorama.css" rel="stylesheet"> 
	<script src="./js/fotorama.js"></script>
	<script src="./js/scripts.js"></script>
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
				<img src="logo.png" id="actuallogo"  />
				
				<div class="fotorama" data-autoplay="5000" data-height="320" data-nav="false" data-transition="crossfade" data-fit="cover" data-click="false" data-swipe="false" data-arrows="false">
					
					<img src="teen1.jpg"  />
					<img src="teen2.jpg"  />
					<img src="teen3.jpg" />
				</div>
			</div>
				
		</div>

		<div id="content">
				<div id="wheelholder">
		
					<div id="thewheel">
						<div class="wheelcontainer" title="Click a category to bring up jobs for that category!">
							<img src="foreground.png" id="wheelfore" />

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

				<p>
					<big id="title">Home</big>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit ligula quis lobortis semper. Praesent id orci at risus semper malesuada. Vivamus tincidunt finibus ipsum, eget feugiat ante facilisis nec. Vivamus et ultrices enim, id auctor nibh. Curabitur laoreet in lectus ac euismod. Fusce odio lectus, convallis non lobortis vitae, eleifend vitae odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed molestie tellus. Ut lobortis mollis elit sit amet efficitur. Nam commodo, ante in tincidunt hendrerit, nulla nisl pellentesque quam, nec fermentum dui lectus ut lectus. Curabitur tristique mattis orci eget aliquam. Nulla ac magna ac nunc vehicula lobortis eget id lorem. Suspendisse potenti. Vivamus tincidunt nisl eget odio rhoncus suscipit. Donec ut dui varius, blandit libero sit amet, porta metus. Nulla sed lacinia lacus.
					
					<span id="details">added 1/1/2015 by <a href=#>admin</a></span>
				</p>
				
				<p>
					<big id="subtitle">Testing</big>
					Maecenas consectetur nunc quis eleifend venenatis. Ut ac bibendum dui. Donec at maximus quam. Ut a purus in nisl placerat cursus. Praesent eget blandit ligula. Fusce eu mollis metus, non luctus diam. Donec eu laoreet massa. Cras eget commodo dolor. Nullam a erat nunc. Sed porttitor id leo in tristique.
					<span id="details">added 1/1/2015 by <a href=#>admin</a></span>
				</p>
				<p>
					In hac habitasse platea dictumst. Suspendisse et laoreet velit. Morbi porta odio felis, ut facilisis diam venenatis a. Curabitur ac euismod libero. Sed eros mauris, sagittis in sem vitae, lacinia ornare enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed at velit imperdiet massa tempor viverra. In eget massa id metus consequat commodo at at odio. Nunc faucibus libero id nibh consequat, sit amet porta ex lobortis. Proin rhoncus erat in mauris eleifend varius.
					<span id="details">added 1/1/2015 by <a href=#>admin</a></span>
				</p>
				<p>
					Vivamus non blandit est, et laoreet eros. Phasellus eu elit ornare nulla finibus tristique a eu metus. Curabitur ac libero tristique, elementum lacus vitae, condimentum dolor. Integer porta diam eget lacus molestie ultricies. Pellentesque eget commodo nisi. Praesent ac placerat neque, non ornare sem. Mauris ac accumsan massa.
					<span id="details">added 1/1/2015 by <a href=#>admin</a></span>
				</p>
				<p>
					Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis nec eros at tellus pretium vehicula. Proin quam odio, lobortis quis diam nec, fringilla venenatis purus. Sed maximus ante et augue blandit, at hendrerit enim viverra. Suspendisse eleifend lacinia tellus. Nunc interdum justo lectus, eu euismod arcu finibus sit amet. Nullam ipsum metus, rhoncus quis ipsum in, suscipit mattis enim. Vestibulum cursus tortor quis aliquet posuere. Nullam eu sapien vulputate nisl sagittis commodo. Curabitur vestibulum dui ut augue ultricies placerat in ut libero. Integer sit amet neque ullamcorper, luctus ex id, congue dolor.
					<span id="details">added 1/1/2015 by <a href=#>admin</a></span>

				</p>


		</div>
		<div class="clear"></div>
		<div id="footer">&COPY; Copyright - 4 Me - Theme by BLT Development</div>
</div>


</body>
</html>
