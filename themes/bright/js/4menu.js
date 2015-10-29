var menuItems = [];
var menu;
var grpContent;
var isMobile = false;
var last;
var fullOnMobile = false;
window.onload = function() {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 		isMobile = true;
		fullOnMobile = true;
		
	}
	ResetClickables();
	ResizeDemButtons();


	ResizeHandle();

};

$(window).resize(function() {

	ResetClickables();
	ResizeHandle();
});

function ResizeHandle(){

	if ($(window).width() <= 728 && isMobile == false && fullOnMobile == false) {
		isMobile = true;
		if (document.getElementById("icolmenu")) {
			$("#icolmenu").removeClass("hidden");
			$(".menuBarItem").each(function() { $(this).hide();});
		}

		if (last != null) ReformMenu(last);

	}else if($(window).width() > 728 && isMobile == true && fullOnMobile == false){
		isMobile = false;
		if (document.getElementById("icolmenu")) {
			$("#icolmenu").addClass("hidden");
			$(".menuBarItem").each(function() { $(this).show();});
		}

		if (last != null) ReformMenu(last);
	}
	
}

function ResizeDemButtons() {

	for (var i = 0; i < menuItems.length; i++){
		var xOff = "15%";
		var yOff = (100 / Math.ceil(menuItems.length / 4)) + "%";
		menuItems[i].style.width = xOff;
		menuItems[i].style.minWidth = xOff;
		menuItems[i].style.height = yOff;
		menuItems[i].style.minHeight = yOff;

		menuItems[i].style.margin = "10px";
		

	}
	
}
function ResetClickables() {
	menu = document.getElementById("menu");
	grpContent = document.getElementById("groupcontent");
	$("#icolmenu").unbind("click");
	$("#icolmenu").click (function() { $(".menuBarItem").each(function() { $(this).slideToggle("fast");}); });

	menuItems = menu.getElementsByClassName("menuItem");

	for (var i = 0; i < menuItems.length; i++){
		if (menuItems[i].className.indexOf("parent") > 0) {
			menuItems[i].onclick = (function(p,g) { return function() { viewCat(g); } })(menuItems[i], i);
		}else{

			menuItems[i].onclick = (function(p) { return function() { navTo(p.id, isMobile); ReformMenu(p);  } })(menuItems[i]);

		}
	}

	
}

/* New Menu handler : */
function ReformMenu(mI) {
	var i = 0;
	while(loadedData == false) {
		i++;
	}
	$("#menu").fadeOut("fast");
	if (isMobile == false){

		grpContent.style.display = "flex";
		$('#menuBar').show();


		
	}else{
		if (document.getElementById("icolmenu")) {
			document.getElementById("icolmenu").style.display="inline-block";
			$(".menuBarItem").each(function() { $(this).hide();});
		}
		grpContent.style.display = "flex";
	}
	last = mI;

	ResetClickables();


}
/* OLD Menu handler : 
function ReformMenu(mI) {
	if (isMobile == false) {
		menu.style.width = "20%";
		menu.style.height = "100%";
	}else{
		menu.style.width = "100%";
		menu.style.height = "120%";
		document.getElementById("footer").style.zIndex = "0";
		
		
		
	}


	for (var i = 0; i < menuItems.length; i++){
		menuItems[i].style.width = "100%";
		menuItems[i].style.minWidth = "100%";

		menuItems[i].style.height = (100 / menuItems.length) + "%";
		menuItems[i].style.minHeight = (100 / menuItems.length) + "%";
		menuItems[i].style.margin = "0";
		menuItems[i].style.border = "0";
		
		if (isMobile == true) { menuItems[i].style.lineHeight = "60px"; }else{ menuItems[i].style.lineHeight = "initial"; }


	}
	$(".menuItem img").each( function (i) { $(this).fadeOut("fast"); } );

	menu.style.margin = "0px";
	menu.style.padding = "none";
	grpContent.style.opacity = "1";
	if (isMobile == false){
		document.getElementById("icolmenu").style.display="none";
		grpContent.style.display = "flex";
		grpContent.style.width = "100%";
		
	}else{
		document.getElementById("icolmenu").style.display="inline-block";
		
		menu.style.display = "none";
		grpContent.style.display = "block";
		grpContent.style.width = "100%";
		
	}
	menu.style.display = "none";
	last = mI;

} 
*/