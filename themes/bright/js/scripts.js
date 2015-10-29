
var vids;
var search = "";
var sTop;
var l;
var fresh;

var navRotate;
var navImages;
var navCurr = 0;
var loadedData = false;

$(document).ready(function(){

	$('.facebook').click(function() {
		window.open("https://www.facebook.com/4memalcamtrust");
	});
	$('.trustpower').click(function() {
		window.open("https://www.trustpower.co.nz/communityawards");
	});
	$('.fundraise').click(function() {
		window.open("http://www.fundraiseonline.co.nz/TheMalcamCharitableTrustFounda/");
	});

	fresh = $('#menu').html();
	
	if ($('#search')) {
		var s = setInterval(searchFor($('#search').val()), 300);
	}

	SetupRotatingNav();

});


function SetupRotatingNav()
{
	rot = document.getElementById("commpartners");
	navImages = rot.getElementsByTagName("img");

	navRotate = setInterval(function() { UpdateNav(navCurr); }, 5000);
}
function changeTheme() {


		$.get ( "../theme", { t: $("#selTheme").val()  }).done(function() { refresh(); });

}
function UpdateNav(c)
{
	var count = 0;
	while(count < navImages.length ){

		if (count == c) {
			$(navImages[count]).delay(800).fadeIn("slow");

		}else{
			$(navImages[count]).fadeOut(500);
		}
		count++;
	}

	if (navCurr == navImages.length - 1) { 
		navCurr = 0;
	}else{
		navCurr++;
	}

}

function CloseFeedback() {
	$('#feedbackpopup').fadeOut('fast');
}

function ShowFeedback() {
	$('#feedbackpopup').fadeIn('slow');
	$("html, body").animate({ scrollTop: 0 }, 1000);
}

function changeTab(n) {
	var c = [ document.getElementById('admin'), document.getElementById('database'), document.getElementById('category'), document.getElementById('video'), document.getElementById('account') ];
	for(var i = 0; i < c.length; i++) {
		c[i].className = "hidden";
	}

	var x = document.getElementById(n);
	x.className = "";

	for(var j = 0; j < c.length; j++) {
		if (x == c[j]) {
			document.getElementById('amenu').getElementsByTagName('li')[j].className = "current";
		}else {
			document.getElementById('amenu').getElementsByTagName('li')[j].className = "";
		}
	}
	
}

function exportDb() {
	
	window.location.href = "export";
}

function validateform() {
	var u = document.forms[0].username.value;
	var p = document.forms[0].password.value;

	if (u == "" || p == "")
	{
		document.forms[0].getElementsByClassName('invalid')[0].style.display = "block";
	}else {
		// client side. (this literally only reloads front page of site or says incorrect login)
		$.post( "login", { username: u, password: p } ).done(function(data) {
				if (data.indexOf("#success") != -1 ) {

					window.location = "./admin";
				}else{
					document.forms[0].reset();
					document.forms[0].getElementsByClassName('invalid')[0].style.display = "block";
				}
			});
	}
	return false;
}

function feedback() {
	var n = document.forms[0].name.value;
	var e = document.forms[0].email.value;
	var s = document.forms[0].reason.value;
	var m = document.forms[0].message.value;

	var o = document.getElementById('result');
	var ov = o.innerHTML;

	o.innerHTML = "Sending...";

	$.post( "feedback", { name: n, email: e, reason: s, message: m } ).done(function(data) {
				if (data.indexOf("#sent") != -1 ) {
					o.style.color = "green";
					o.innerHTML = 'Sent!';
					setTimeout( function(){ o.innerHTML = ov; }, 2000 );
					document.forms[0].reset();
				}else{
					o.style.color = "red";
					o.innerHTML = 'Failed!';
					setTimeout( function(){ o.innerHTML = ov; }, 2000 );
				}
	});

	return false;
}

function logout() {

	$.ajax( {
		method: "GET",
		url: "logout",
		dataType: "html",
		success: refresh,
		async: false
	});

}

function refresh() {
	window.location = window.location;
}

function removeDeadLinks() {
	
	if (confirm('WARNING: Server may lag for a few seconds after initiating removal, are you sure you want to continue?')) {

		$.post("admin", { cmd: "deadlinks" }).done (function(data) { console.log(data); });
	}
	// ^ does nothing without you being logged into admin . . . 
}

function revertDatabase() {
	if (confirm('WARNING: Reverting database to last backup will remove any videos or categories added after last backup, are you sure you want to continue?')) {
		$.post("resetdb", {}).done (function(data) { alert(data); });
	}
	// ^ also does nothing without being logged into admin; however, this one will record your location and isp details.
}



function dropPrevious(p) {
	var c = document.getElementById("content");
	var e = c.getElementsByClassName("p");
	
	while(e[0]) {
		c.removeChild(e[0]);
	}
	loadIn(p);

}
function navTo(p,isMobile) {
	loadedData = false;
	$.ajax( {
		method: "GET",
		url: "display?p=" + p,
		dataType: "html",
		success: saveData,
		async: false
	});
	

}
function viewCat(p) {

	$.ajax( {
		method: "GET",
		url: "update?par=" + p,
		dataType: "html",
		success: updateData,
		async: false
	});




}

function updateData(data) {
	$('#menu').html(data);
	$('#back').click( function() { 
				$('#menu').html(fresh); 
				ResetClickables(); } );
	ResetClickables();

}

function doImportDB() {
	var p = new FormData($('form')[0]);


		// client side. (this literally only reloads front page of site or says incorrect login)
	$.ajax( {
			url: "import", 
			type: "POST",
			data: p,
			async: true
	});

	return false;
}

function saveData(data) {
	$('#groupcontent').html(data);
		if (l!=null)
		clearInterval(l);
		
	l = setInterval(function() {
		if ($('#search').val() != search) {
			search = $('#search').val().toLowerCase();
			searchFor($('#search').val().toLowerCase());
		}
	}, 300); // search timer :3

	$(".thumbtext").each( function (i) {
		if($(this).width() > $(".thumbnail").width()) {
			$(this).changeElementType("marquee");
		}
	});

	if(isMobile){
		$(".menuBarItem").each(function() { $(this).hide();});
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
		
		$("#icolmenu").removeClass("hidden");
		$('#menuBar').show();
	
		ResetClickables();
	}

	loadedData = true;
}

function loadIn(p) {

	$.post( "parse", { page: p } ).done(function(data) {
				$('#content').append(data);
				$('#loading').css("display", "none");
				vids = document.getElementsByTagName("td");
	
			});
}

function GetVideo(v,c, p) {
	$.ajax( {
		method: "GET",
		url: "watch?vid=" + v + "&c=" + c,
		dataType: "html",
		success: showVid,
		async: false
	});
	
}

function showVid(data)
{
	//$('#fade').fadeIn("fast");
	$('#theVideo').html("<img src=\"./images/close.png\" id=\"videoPopupClose\" />" + data);
	
	$('#videoPopup').fadeIn("fast");
	
	$('#videoPopupClose').click(function()
	{
		//$('#fade').fadeOut("fast");
		$('#videoPopup').fadeOut('fast');
		$('#theVideo').html("");
	});
}

function searchFor(v) {
	if (v!=null){
	var nv = v.toLowerCase();
	$(".thumbnail").each( function (i) {
		if($(this).children('.thumbtext').html().toLowerCase().indexOf(nv) > -1) {
			$(this).fadeIn('fast');
		}else{
			$(this).fadeOut('fast');
		}
	});
	}
}

function gotoLink(link)
{
	window.open(link);
}