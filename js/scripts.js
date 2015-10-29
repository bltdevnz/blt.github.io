var easteregg = "";
var og = "";

// JQUERY STUFF ----------------------------------------------------------------------------------------------------------------
$(document).ready(function(){
	$('#theme').on("change", function() { document.changeTheme.submit(); });
	$('#footer').dblclick(function(){
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
					duration: 3000 },
					'linear'
				);
				easteregg = "";
			}else if (easteregg == "imag") {
				$('#container').animate({ borderSpacing: -360 }, {
					step: function (n,f) { $(this).css('transform', 'rotate(' + n + 'deg)'); },
					duration: 5000 },
					'linear'
				);
				easteregg = "";
			}else{
				easteregg = "";
			}
		}
	}, 200);

	$('#loginBtn').click(function() {
		var oTop = $(document).scrollTop() + ($('#login').height());
		var cLeft = $(document).width() / 2 - ($('#login').width() / 2);
		$('#login').css( {
			position: "absolute",
			top: oTop,
			left: cLeft
    			
		});
		$('#blur').fadeIn("fast");
		$('#login').fadeIn("slow");
		$('body').css( "overflow-y", "hidden" );
	});

	$('#close_login').click(function() {
		$('#blur').fadeOut("slow");
		$('#login').fadeOut("fast");
		$('body').css( "overflow-y", "visible" );
	});
	$('#blur').click(function() {
		$('#blur').fadeOut("slow");
		$('#login').fadeOut("fast");
		$('body').css( "overflow-y", "visible" );
	});

});



// REGULAR STUFF ---------------------------------------------------------------------------------------------------------------

window.onload = function() {
	document.getElementById('wheela').onclick =  function() { navTo('social'); };
	document.getElementById('wheelb').onclick =  function() { navTo('mantech'); };
	document.getElementById('wheelc').onclick =  function() { navTo('construct'); };
	document.getElementById('wheeld').onclick =  function() { navTo('creative'); };
	document.getElementById('wheele').onclick =  function() { navTo('primary'); };
	document.getElementById('wheelf').onclick =  function() { navTo('service'); };
	document.getElementById('actuallogo').onclick = function() { navTo('./'); };
}

function validateform() {
	var u = document.forms[1].username.value;
	var p = document.forms[1].password.value;

	if (u == "" || p == "")
	{
		document.forms[1].getElementsByClassName('invalid')[0].style.display = "block";
	}else {
		// changing this will only give you a client side ego bud.(this literally only reloads front page of site or says incorrect login)
		$.post( "login.php", { username: u, password: p } ).done(function(data) {
				if (data.indexOf("#success") != -1 ) {

					window.location = "./";
				}else{
					document.forms[1].reset();
					document.forms[1].getElementsByClassName('invalid')[0].style.display = "block";
				}
			});
	}
	return false;
}
function deletePost(id) {
	var pNode = event.srcElement.parentNode;
	var dm = "yes";
	$.post( "posts", { delMode: dm, postID: id } ).done(function(data) {
				pNode.parentNode.removeChild(pNode);
			});

}
function addPost() {
	event.srcElement.style.display = "none";
	var frmPost = document.createElement("form");
	frmPost.name = 'frmPostBlock';
	frmPost.action = 'posts'; // lawl
	frmPost.method = 'post';

	frmPost.innerHTML = '<p><input id="subtitle" type="text" name="title" style="width: 100%;" /><br /><textarea name="post" style="width: 100%; height:220px;" /></textarea><br /><input type="submit" value="Save Post" /><input type="button" value="Cancel" onclick="cancelPost()" /></p>';
	
	document.getElementById('content').appendChild(frmPost);

}

function editPost(id) {
	var post = event.srcElement.parentNode;
	
	var postTitle = post.children['subtitle'].innerHTML;
	var postPost = post.children['post'].innerHTML;
	var frmEdit = document.createElement("form");
	og = og != "" ? og : post.innerHTML;

	frmEdit.name = 'frmEditBlock';
	frmEdit.action = 'posts'; // lawl
	frmEdit.method = 'post';

	frmEdit.innerHTML = '<input type="hidden" name="editMode" value="yes"><input type="hidden" name="postID" value="' + id + '" /><input type="text" id="subtitle" name="title" style="width: 100%;" value="' + postTitle + '" /><br />';
	frmEdit.innerHTML += '<textarea name="post" style="width: 100%; height:220px;" />' + postPost + '</textarea><br />';
	frmEdit.innerHTML += '<input type="submit" value="Update" />';

	var cancel = document.createElement("input");
	cancel.type = 'button';
	cancel.value = 'Cancel';
	cancel.onclick = function () { post.innerHTML = og; og = ""; };
	frmEdit.appendChild(cancel);
	
	post.innerHTML = "";
	post.appendChild(frmEdit);
}

function cancelPost() {

	document.getElementById('content').removeChild(document.frmPostBlock);
	document.getElementById('addBtn').style.display = "block";

}

function navTo(p) {
	window.location = p;
}

function GetVideo(v,c, p) {

	window.location = p + "-" + v + "," + c;
}