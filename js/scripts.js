$( function() {
	$( ".wheelcontainer" ).tooltip({ tooltipClass: "custom-tooltip-styling" });	
	$( ".wheelcontainer" ).tooltip({ position: { my: "left+15 center", at: "right center"}});
    $( ".wheelcontainer" ).tooltip().tooltip( "open" );
});