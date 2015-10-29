<?php



	function GetVideoThumbs($categoryID) {
		$results = mysql_query("SELECT videoID FROM vid_cat WHERE (categoryID = ".$categoryID.");");

		$q = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc FROM categories WHERE (categoryID = ".$categoryID.");");

		$f = mysql_fetch_object($q);
		$cid = $f->categoryID;
		$title = $f->categoryName;
		$color = $f->categoryColor;
		$desc = $f->categoryDesc;

		echo ("<div id=\"videoPopup\"><div id=\"theVideo\"></div></div>
			<div id=\"misc\">
			<div id=\"title\" style=\"background: ".$color." !important;\">".$title."</div>

		<input type=\"text\" id=\"search\" placeholder=\"Search\" />
		</div>
		<div id=\"vidz\">");
		while($row = mysql_fetch_row($results))
		{
			$vids = mysql_query("SELECT videoTitle FROM videos WHERE (videoID = ".$row[0].") ORDER BY videoTitle;");
			$vObj = mysql_fetch_object($vids);
			if(GetThumb($row[0]) != "404") {
				echo ("<div class=\"thumbnail\" onclick=\"GetVideo(".$row[0].",".$categoryID.", '".$pageName."')\">
						
						<img src=".GetThumb($row[0])." title=\"".$vObj->videoTitle."\" />
						<div class=\"thumbtext\">".$vObj->videoTitle."</div>
			       	</div>");
			}
		}
		echo ("</div>");
		mysql_free_result($results);


	}
     	function GetCategories($sub = NULL) {
		$results = NULL;
		$count = 0;
		
		if ($sub == NULL) {
			$results = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc FROM categories;");

			while($row = mysql_fetch_row($results))
			{

				if (HasParent($row[0]) == false) {
					if (HasChildren($row[0])) {
						echo ("<div class=\"menuItem parent\" id=\"".$row[0]."\" style=\"border: 1px solid ".$row[2]."\"><img src=\"".GetThumb(GetFirstVid($row[0]))."\" />".$row[1]."</div>");

					}else{
						echo ("<div class=\"menuItem\" id=\"".$row[0]."\" style=\"border: 1px solid ".$row[2]."\"><img src=\"".GetThumb(GetFirstVid($row[0]))."\" />".$row[1]."</div>");
					}
					$count++;
				}
				
			}
		}else{
			$sub++;
			$results = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc, categoryParent FROM categories WHERE categoryParent = ".$sub.";");

			while($row = mysql_fetch_row($results))
			{


					echo ("<div class=\"menuItem\" id=\"".$row[0]."\" style=\"background: ".$row[2]."\"><img src=\"".GetThumb(GetFirstVid($row[0]))."\" />".$row[1]."</div>");

					$count++;
				
				
			}
			echo ("<div class=\"goback\" id=\"back\">Go Back</div>");

		}

		mysql_free_result($results);
	}


?>