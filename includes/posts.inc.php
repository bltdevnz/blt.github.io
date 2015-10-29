<?php


	function EditPost($pID,$aID,$title,$data)
	{
		$title = mysql_real_escape_string($title);
		$data = mysql_real_escape_string($data);
		$data = nl2br($data);
		$data = strip_tags($data, "<a><b><img><i><u><super><sub><big><small><code><br>");
		$q = mysql_query("UPDATE posts SET adminID = '$aID', postTitle = '$title', postData = '$data', postDate = '".date('Y-m-d')."' WHERE postID = '$pID';");

	}

	function NewPost($aID,$title,$data)
	{
		$title = mysql_real_escape_string($title);
		$data = mysql_real_escape_string($data);
		$data = nl2br($data);
		$data = strip_tags($data, "<a><b><img><i><u><super><sub><big><small><code><br>");
		CreatePost ($title,$data,date('Y-m-d'),$aID);
	}

	function RemovePost($pID)
	{
		$q = mysql_query ("DELETE FROM posts WHERE postID = '".$pID."';");
	}

?>