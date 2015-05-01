var xc, yc;
var focused;
$('html').dblclick(function() {
	$('#thewheel').fadeIn("slow");
	$('#thewheel').css('z-index', 200);
	$('#thewheel').css('left', xc);
	$('#thewheel').css('top', yc);
	$('#thewheel').css('position', 'absolute');
	
});




$(document).ready(function(){
	$(document).mousemove(function(e) {
		xc = e.pageX - 310;
		yc = e.pageY - 215;
	})
	$('#thewheel').on({
	mouseleave: function() {
	focused = setTimeout(function(){
							$('#thewheel').fadeOut("slow");
						 }, 1500);
	},
	mouseenter: function() {
		clearTimeout(focused);
	}
});
});