<?php
	include ("./includes/login.inc.php");
	include ("./includes/posts.inc.php");
	if (!isset($_SESSION['loggedin'])) { header("location: ./"); }
	
	if (!isset($_POST['delMode'])) {
		if (isset($_POST['editMode'])) {
			$x = $_POST;
			EditPost($x['postID'], $_SESSION['uid'], $x['title'], nl2br($x['post']));
		}else {
			$x = $_POST;
			NewPost($_SESSION['uid'], $x['title'], nl2br($x['post']));
		}
	}else {
		$x = $_POST;
		RemovePost($x['postID']);
	}
	header("location: ./");
?>