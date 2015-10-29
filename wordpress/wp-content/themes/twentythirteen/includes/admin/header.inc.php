

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>4Me</title>

	<link rel="stylesheet" href="./css/4me.css" type="text/css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<script src="./js/jquery-2.1.4.min.js"></script>

	<script src="./js/scripts.js"></script>
	<script src="./js/mobile.js"></script>
	<script>
(function($) {
    $.fn.changeElementType = function(newType) {
        var attrs = {};

        $.each(this[0].attributes, function(idx, attr) {
            attrs[attr.nodeName] = attr.nodeValue;
        });

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

  ga('create', 'UA-67010706-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
		<div id="fade"></div>
	<div id="container">
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
