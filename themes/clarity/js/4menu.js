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
		$('#search').css({'display' : 'none'});
	}
	ResetClickables();
	ResizeDemButtons();
	

	ResizeHandle();

};

$(window).resize(function() {
	ResizeHandle();
	if (isMobile){ $('#search').css({'display' : 'none'}); }
});

function ResizeHandle(){
	if ($(window).width() <= 585 && isMobile == false && fullOnMobile == false) {
		isMobile = true;
		$('#search').css({'position' : 'initial', 'width' : '100%'});

		if (last != null) ReformMenu(last);

	}else if($(window).width() > 585 && isMobile == true && fullOnMobile == false){
		isMobile = false;

		$('#search').css({'position' : 'absolute', 'width' : '20%', 'z-index' : '9998', 'background': 'white'});
		
		menu.style.display = "block";

		if (last != null) ReformMenu(last);
	}
	
}

function ResizeDemButtons() {

	for (var i = 0; i < menuItems.length; i++){
		var xOff = "25%";
		var yOff = (100 / Math.ceil(menuItems.length / 4)) + "%";
		menuItems[i].style.width = xOff;
		menuItems[i].style.minWidth = xOff;
		menuItems[i].style.height = yOff;
		menuItems[i].style.minHeight = yOff;

		menuItems[i].style.margin = "0";
		

	}
	
}
function ResetClickables() {
	menu = document.getElementById("menu");
	grpContent = document.getElementById("groupcontent");
$("#colmenu").click (function() { $("#menu").slideToggle("fast"); });

	menuItems = menu.getElementsByClassName("menuItem");

	for (var i = 0; i < menuItems.length; i++){
		if (menuItems[i].className.indexOf("parent") > 0) {
			menuItems[i].onclick = (function(p,g) { return function() { viewCat(g); } })(menuItems[i], i);
		}else{

			menuItems[i].onclick = (function(p) { return function() { ReformMenu(p); navTo(p.id, isMobile); } })(menuItems[i]);

		}
	}

	
}


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
		document.getElementById("colmenu").style.display="none";
		grpContent.style.display = "flex";
		grpContent.style.width = "80%";
		
	}else{
		document.getElementById("colmenu").style.display="inline-block";
		
		menu.style.display = "none";
		grpContent.style.display = "inline-block";
		grpContent.style.width = "100%";
		
	}

	last = mI;

} 