				<p>
	
					"4 Me is a programme organised by the Malcam Charitable Trust Foundation helping youth between the ages of 16-25 to enter the workforce and a career pathway."
					<?php /* <span id="details">added 1/1/2015 by <a href=#>admin</a></span> */ ?>
				</p>
				
<?php
	
	$ret = mysql_query("SELECT *, DATE_FORMAT(postDate, '%d/%m/%Y') as pdate FROM posts as p JOIN admin as ad on p.adminID = ad.adminID");
	while($row = mysql_fetch_array($ret))
	{
		echo (" <p>".(isset($_SESSION['loggedin']) ? "<img src=\"./images/scrap.png\" onclick=\"deletePost(".$row['postID'].")\" alt=\"delete\" title=\"WARNING: NO GOING BACK!\nClicking this will delete post.\" />
					<img src=\"./images/edit.png\" onclick=\"editPost(".$row['postID'].")\" alt=\"edit\" title=\"Clicking this allow you to edit the post.\" />" : "")."
					<big id=\"subtitle\">".$row['postTitle']."</big>
					<span id=\"post\">".$row['postData']."</span>
					<span id=\"details\">".$row['pdate']." by <a href=#>".$row['user']."</a></span>
					
				</p>	
		");
	}	

	echo ((isset($_SESSION['loggedin']) ? "<img src=\"./images/add.png\" id=\"addBtn\" onclick=\"addPost()\" alt=\"add\" title=\"Add new post.\" />" : ""));
	mysql_free_result($ret);
?>

