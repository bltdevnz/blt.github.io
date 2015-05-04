var easteregg = "";


// JQUERY STUFF ----------------------------------------------------------------------------------------------------------------
$(document).ready(function(){
	$('#actuallogo').dblclick(function(){
		easteregg = "imag";
	});
	$('#wheela').on({ mouseenter: function() {
		easteregg = easteregg + "a";
	}});
	$('#wheelb').on({ mouseenter: function() {
		easteregg = easteregg + "b";
	}});
	$('#wheelc').on({ mouseenter: function() {
		easteregg = easteregg + "c";
	}});
	$('#wheeld').on({ mouseenter: function() {
		easteregg = easteregg + "d";
	}});
	$('#wheele').on({ mouseenter: function() {
		easteregg = easteregg + "e";
	}});
	$('#wheelf').on({ mouseenter: function() {
		easteregg = easteregg + "f";
	}});
	setInterval(function() { 
		if (easteregg.length >= 4) { 
			if (easteregg == "abde" || easteregg == "bdea") {
				$('#thewheel').animate({ borderSpacing: -360 }, {
					step: function (n,f) { $(this).css('transform', 'rotate(' + n + 'deg) scale(0.55)'); },
					duraction: 3000 },
					'linear'
				);
				easteregg = "";
			}else if (easteregg == "imag") {
				$('#container').animate({ borderSpacing: -360 }, {
					step: function (n,f) { $(this).css('transform', 'rotate(' + n + 'deg)'); },
					duraction: 5000 },
					'linear'
				);
				easteregg = "";
			}else{
				easteregg = "";
			}
		}
	}, 200);
});



// REGULAR STUFF ---------------------------------------------------------------------------------------------------------------

window.onload = function() {
	document.getElementById('wheela').onclick =  function() { navTo('social'); };
	document.getElementById('wheelb').onclick =  function() { navTo('mantech'); };
	document.getElementById('wheelc').onclick =  function() { navTo('construct'); };
	document.getElementById('wheeld').onclick =  function() { navTo('creative'); };
	document.getElementById('wheele').onclick =  function() { navTo('primary'); };
	document.getElementById('wheelf').onclick =  function() { navTo('service'); };
}

function navTo(p) {
	window.location = p + ".4me";
}
