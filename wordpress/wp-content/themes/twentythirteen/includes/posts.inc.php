<?php


	function EditPost($pID,$aID,$title,$data)
	{
		$title = mysql_real_escape_string($title);
		$data = mysql_real_escape_string($data);
		$data = nl2br($data);
		$data = strip_tags($data, "<a><b><img><i><u><super><sub><big><small><code><br><ul><ol><li>");
		$q = mysql_query("UPDATE posts SET adminID = '$aID', postTitle = '$title', postData = '$data', postDate = '".date('Y-m-d')."' WHERE postID = '$pID';");

	}
	function EditTitle($cID, $nTitle)
	{
		$title = mysql_real_escape_string($nTitle);
		$title = nl2br($title);
		$title = strip_tags($title, "<a><b><img><i><u><super><sub><big><small><code><br><ul><ol><li>");
		$q = mysql_query("UPDATE categories SET categoryDesc = '$title' WHERE categoryID = '$cID'");

	}
	function NewPost($aID,$title,$data)
	{
		$title = mysql_real_escape_string($title);
		$data = mysql_real_escape_string($data);
		$data = nl2br($data);
		$data = strip_tags($data, "<a><b><img><i><u><super><sub><big><small><code><br><ul><ol><li>");
		CreatePost ($title,$data,date('Y-m-d'),$aID);
	}

	function RemovePost($pID)
	{
		$q = mysql_query ("DELETE FROM posts WHERE postID = '".$pID."';");
	}

?>