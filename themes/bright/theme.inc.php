<?php
// GetMenu creates a new better menu to allow for search and better layout.
	function GetMenu($currPage,$color) {
		$count = 1; // for navTo function
		echo ("<ul id=\"menuBar\" style=\"box-shadow: 0 -10px 5px -10px $color\">");
		echo ("
			<li id=\"icolmenu\" class=\"hidden\">
				Menu
				<img src=\"./images/menuico.png\" alt=\"expand/collapse\" />
			</li>
		");
		$results = mysql_query("SELECT categoryName, categoryColor FROM categories");
		while($row = mysql_fetch_row($results)) {

			if ($row[0] == $currPage) {
				echo ("<li class=\"menuBarItem currentPage\" style=\"text-shadow: 0px 0px 15px $row[1]\"><a href=\"javascript:;\" class=\"link\" onclick=\"navTo($count, 1)\">".$row[0]."</a></li>");
			}else{
				echo ("<li class=\"menuBarItem\" style=\"text-shadow: 0px 0px 15px $row[1]\" ><a href=\"javascript:;\" class=\"link\" onclick=\"navTo($count, 1)\">".$row[0]."</a></li>");
			}
			$count++;
		}
		echo ("<li class=\"menuBarItem\"><input type=\"text\" id=\"search\" placeholder=\"Search Category\" /></li>");
		echo ("</ul>");


	}

	function GetVideoThumbs($categoryID) {
		$results = mysql_query("SELECT videoID FROM vid_cat WHERE (categoryID = ".$categoryID.");");

		$q = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc FROM categories WHERE (categoryID = ".$categoryID.");");

		$f = mysql_fetch_object($q);
		$cid = $f->categoryID;
		$title = $f->categoryName;
		$color = $f->categoryColor;
		$desc = $f->categoryDesc;

		echo ("<div id=\"videoPopup\"><div id=\"theVideo\"></div></div>
			<div id=\"misc\">");

		GetMenu($title, $color);

		
		echo("
		
		</div>
		<div id=\"vidz\">");
		while($row = mysql_fetch_row($results))
		{
			$vids = mysql_query("SELECT videoTitle FROM videos WHERE (videoID = ".$row[0].") ");
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
			$results = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc FROM categories ORDER BY categoryPopularity;");

			while($row = mysql_fetch_row($results))
			{

				if (HasParent($row[0]) == false) {
					if (HasChildren($row[0])) {
						echo ("<div class=\"menuItem parent\" id=\"".$row[0]."\" style=\"text-shadow: 0px 0px 15px ".$row[2]."\"><img src=\"".GetThumb(GetFirstVid($row[0]))."\" /><span>".$row[1]."</span></div>");

					}else{
						echo ("<div class=\"menuItem\" id=\"".$row[0]."\" style=\"text-shadow: 0px 0px 15px ".$row[2]."\"><img src=\"".GetThumb(GetFirstVid($row[0]))."\" /><span>".$row[1]."</span></div>");
					}
					$count++;
				}
				
			}
		}else{
			$sub++;
			$results = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc, categoryParent FROM categories WHERE categoryParent = ".$sub.";");

			while($row = mysql_fetch_row($results))
			{


					echo ("<div class=\"menuItem\" id=\"".$row[0]."\" style=\"text-shadow: 0px 0px 15px ".$row[2]."\"><img src=\"".GetThumb(GetFirstVid($row[0]))."\" /><span>".$row[1]."</span></div>");

					$count++;
				
				
			}
			echo ("<div class=\"goback\" id=\"back\">Go Back</div>");

		}

		mysql_free_result($results);
	}

?>