<?php

	function GetVideos($categoryID) {
		global $pageName;
		
		$results = mysql_query("SELECT videoID FROM vid_cat WHERE (categoryID = ".$categoryID.");");

		$q = mysql_query("SELECT categoryName, categoryColor FROM categories WHERE (categoryID = ".$categoryID.");");

		$f = mysql_fetch_object($q);
		$title = $f->categoryName;
		$color = $f->categoryColor;
		echo ("
			<big id=\"title\" style=\"box-shadow: inset 0px 0px 15px ".$color." !important;\">".$title."</big>
		<table>");
		while($row = mysql_fetch_row($results))
		{
			$vids = mysql_query("SELECT videoTitle FROM videos WHERE (videoID = ".$row[0].") ORDER BY videoTitle;");
			echo ("<tr>
					<td>
						
						<a href=\"javascript:;\" onclick=\"GetVideo(".$row[0].",".$categoryID.", '".$pageName."')\">".mysql_fetch_object($vids)->videoTitle."</a>
					</td>
			       </tr>");
		}
		echo ("</table>");
		mysql_free_result($results);
	}

?>