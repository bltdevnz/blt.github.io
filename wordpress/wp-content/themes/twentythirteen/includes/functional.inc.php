<?php
	include("login.inc.php");
	
	function CreateTables(){
		$ret = mysql_query("CREATE TABLE videos
		(
			videoID			INT	       	NOT NULL AUTO_INCREMENT,
			videoTitle		VARCHAR(60)	NOT NULL,
			videoUrl		VARCHAR(180)	NOT NULL,
			videoDesc		TEXT,
			videoPopularity		INT		NOT NULL,
	
			PRIMARY KEY(videoID)
		)
	");
	$ret = mysql_query("CREATE TABLE vid_cat
		(
			videoID			INT		NOT NULL,
			categoryID		INT		NOT NULL,
			PRIMARY KEY(videoID, categoryID)
		)
	");
	$ret = mysql_query("CREATE TABLE categories
		(
			categoryID		INT	       	NOT NULL AUTO_INCREMENT,
			categoryName		VARCHAR(60)	NOT NULL,
			categoryDesc		TEXT,
			categoryColor		VARCHAR(20)	NOT NULL,
			categoryPopularity	INT		NOT NULL,
			categoryImage		BLOB,
			categoryParent		INT,
			
			PRIMARY KEY(categoryID)
		)
	");
	$ret = mysql_query("CREATE TABLE admin
		(
			adminID			INT	       	NOT NULL AUTO_INCREMENT,
			user			VARCHAR(20)	NOT NULL,
			pass			VARCHAR(155)	NOT NULL,
			email			VARCHAR(125)	NOT NULL,
			firstName		VARCHAR(28)	NOT NULL,
			lastName		VARCHAR(28)	NOT NULL,
			resetHash		VARCHAR(155)	NOT NULL,


	
			PRIMARY KEY(adminID)
		)
	");
	}		
     function CreateCategory($name, $desc, $color, $parent = NULL)
     {		
		if ($parent != NULL) {
			$q = "INSERT INTO categories (categoryName, categoryDesc, categoryColor, categoryPopularity, categoryParent) values ('$name', '$desc', '$color', 0, '$parent');";

		}else{
			$q = "INSERT INTO categories (categoryName, categoryDesc, categoryColor, categoryPopularity) values ('$name', '$desc', '$color', 0);";
		}
		mysql_query($q);
     }
     function CreateVideo($title, $url, $desc, $catIDs)
     {
		$q = "INSERT INTO videos (videoTitle, videoUrl, videoDesc, videoPopularity) values ('$title', '$url', '$desc', 0);";
		mysql_query($q);

		$vID = mysql_insert_id();


		foreach ($catIDs as $catID) {
			$q = "INSERT INTO vid_cat (videoID, categoryID) values ('$vID', '$catID');";
			mysql_query($q);
		}
     }
     function CreateAdmin($user, $pass, $email, $fname, $lname, $hash)
     {
		
		$q = "INSERT INTO admin (user, pass, email, firstName, lastName, resetHash) values ('$user', '$pass', '$email', '$fname', '$lname', '$hash');";
		mysql_query($q);
     }
     function CreatePost($title, $msg, $date, $userID)
     {
		$q = "INSERT INTO posts (postTitle, postData,  postDate, adminID) values ('$title', '$msg', '$date', '$userID');";
		mysql_query($q);
     }
	 // if $s = false then it's an import
	 // $path represents path to import data.
     function Seed($s = true, $path = "") 
     {
	$section = "videos";
	if ($s == true){
      	$csv = fopen("seed.csv", "r");
	}else{
		$csv = fopen($path, "r");
	}
	while (! feof($csv)) {
		$t = fgetcsv($csv);
		if (strpos($t[0], '*') === false){ 
			if ($section == "videos") {
				if (strpos($t[2],",") > -1) {
					$cats = explode(",", $t[2]);

					array_walk($cats, function(&$value, $key) { $value += 2; });
					if ($cats == null) { $cats = array(0); }
				}else{
					$cats = array($t[2]);
				}
				
				
	
				CreateVideo($t[0], strpos($t[1], '&') != null ? substr($t[1],0, strpos($t[1], '&')) : $t[1], '', $cats);
			}else {
				if ($t[0] != "")
					CreateCategory($t[0], '', $t[1]);
			}
		}else {
			if (strpos($t[0], 'Categories'))
			{
				$section = "categories";
			}else{
				$section = "videos";
			}
		}
	}
	fclose($csv);
     }
	
	
	function ImportForm() {
		$form = "
			<form method=\"post\" action=\"import.php\" enctype=\"multipart/form-data\">
				<input type=\"file\" name=\"data\">
				<input type=\"submit\" value=\"Import\" name=\"submit\">
			</form>
		";
		
		return $form;
	}
	function Import($i) {
		$ts = date("m-d-y-H-i-s");
		$tar = "imports/i" . basename($i["name"]) . $ts . ".csv";
		if ($i["size"] < 1200000) {
			move_uploaded_file($i["tmp_name"], $tar);
			ImportIntegrity($tar);
		}else{
			die("File was too big - must be below 1mb.");
		}
		$ret = mysql_query("DROP TABLE videos");
		$ret = mysql_query("DROP TABLE categories");
		$ret = mysql_query("DROP TABLE vid_cat");
		CreateTables();
		Seed(false, $tar);


	}
	function ImportIntegrity($path)
	{

	$section = "videos";

	$csv = fopen($path, "r");
	
	$total = 0;
	$integrity = 0;
	
	while (! feof($csv)) {
		$t = fgetcsv($csv);
		if (strpos($t[0], '*') === false){ 
			if ($section == "videos") {
				
				if (strpos(",", $t[2])  > -1) {
					$cats = explode(",", $t[2]);

					array_walk($cats, function(&$value, $key) { $value += 2; }); 
					if ($cats == null) { $cats = array(0); }
				}else{
					$cats = $t[2];
				}
			
				if ($t[0] == "" || $t[1] == "") { $integrity++; }
				if ($cats == "") { $total++; $integrity++; }
				if (strpos($t[0],"https") > -1) { $integrity += 3; $total += 5; }
				
				$total++;
			}else {
				if ($t[1] == "" || $t[2] == ""){
					$integrity++;
				}
				$total++;
			}
		}else {
			if (strpos($t[0], 'Categories'))
			{
				$section = "categories";
			}else{
				$section = "videos";
			}
		}
	}
	fclose($csv);
	
	echo ( floor((($total - $integrity) / $total) * 100));
     
	}
     function ExportDB() {
		// Categories First :
		$retVal = "* Categories *,* Colour *,* ID *\n";
		$cats = mysql_query("SELECT categoryID, categoryName, categoryColor FROM categories;");
		while($row = mysql_fetch_row($cats))
		{
			$retVal .= ($row[1] . "," . $row[2] . "," . ($row[0] - 2) . "\n");
		}

		// Videos Next :
		$retVal .= "* Videos *,* Video DIRECT Link *,* ID *\n";
		$vids = mysql_query("SELECT videoTitle, videoUrl, categories.categoryID FROM videos JOIN vid_cat on videos.videoID = vid_cat.videoID JOIN categories on vid_cat.categoryID = categories.categoryID ");
		while($row = mysql_fetch_row($vids))
		{
			if (strpos($row[1], "http") > -1) {
				$retVal .= ("\"".$row[0] . "\"," . $row[1] . "," . $row[2] . "\n");
			}
		}
		// Create a time stamp to generate a time based name.
		$ts = date("m-d-y-H-i-s");
		$fn = "e".$ts.".csv";
		


		file_put_contents("./exports/".$fn, $retVal);
		
		
		header("location: download.php?l=".$fn);
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
						echo ("<div class=\"menuItem parent\" id=\"".$row[0]."\" style=\"background: ".$row[2]."\"><img src=\"".GetThumb(GetFirstVid($row[0]))."\" />".$row[1]."</div>");

					}else{
						echo ("<div class=\"menuItem\" id=\"".$row[0]."\" style=\"background: ".$row[2]."\"><img src=\"".GetThumb(GetFirstVid($row[0]))."\" />".$row[1]."</div>");
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


	function HasChildren($categoryID) {
		$results = mysql_query("SELECT categoryParent FROM categories WHERE categoryID != ".$categoryID." and categoryParent = ".$categoryID.";");
		if (mysql_num_rows($results) > 0) {
			return true;
		} else {
			return false;
		}
	}
	function GetVideos($categoryID) {

		
		$results = mysql_query("SELECT videoID FROM vid_cat WHERE (categoryID = ".$categoryID.");");

		$q = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc FROM categories WHERE (categoryID = ".$categoryID.");");

		$f = mysql_fetch_object($q);
		$cid = $f->categoryID;
		$title = $f->categoryName;
		$color = $f->categoryColor;
		$desc = $f->categoryDesc;



		echo ("<div id=\"videoPopup\"><div id=\"theVideo\"><img src=\"./images/close.png\" id=\"videoPopupClose\" /></div></div>
			<div id=\"misc\">
			<div id=\"title\" style=\"border-bottom: 5px solid ".$color." !important;border-top: 5px solid ".$color." !important;\">".$title."</div>
			<div id=\"subtitle\" style=\"border-bottom: 2px solid ".$color." !important; text-transform: none; text-shadow: none; letter-spacing: 0px !important;\">".$desc."</div>
		<input type=\"text\" id=\"search\" placeholder=\"Search\" />
		</div>
		<div id=\"vidz\"><table>");
		while($row = mysql_fetch_row($results))
		{
			$vids = mysql_query("SELECT videoTitle FROM videos WHERE (videoID = ".$row[0].") ORDER BY videoTitle;");
			if(GetThumb($row[0]) != "404") {
				echo ("<tr>
					<td>
						
						<a href=\"javascript:;\" onclick=\"GetVideo(".$row[0].",".$categoryID.", '".$pageName."')\">".mysql_fetch_object($vids)->videoTitle."</a>
					</td>
			       </tr>");
			}
		}
		echo ("</table></div>");
		mysql_free_result($results);
	}
	function GetVideoThumbs($catName) {
		$q = mysql_query("SELECT categoryID FROM categories WHERE (categoryName = '".$catName."');");
		$f = mysql_fetch_object($q);
		$categoryID = $f->categoryID;

		$results = mysql_query("SELECT videoID FROM vid_cat WHERE (categoryID = ".$categoryID.");");

		$q = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc FROM categories WHERE (categoryID = ".$categoryID.");");

		$f = mysql_fetch_object($q);
		$cid = $f->categoryID;
		$title = $f->categoryName;
		$color = $f->categoryColor;
		$desc = $f->categoryDesc;

		echo ("<div id=\"videoPopup\"><div id=\"theVideo\"></div></div>
			<div id=\"misc\">
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
	function ScanDeadLinks() {



		$results = mysql_query("SELECT videoUrl FROM videos");
		$valid = 0;
		$invalid = 0;

		while($row = mysql_fetch_row($results))
		{
			if (ValidLink($row[0])) {
				$valid++;
			}else{
				$q = mysql_query("UPDATE videos SET videoURL = '' WHERE videoURL = '".$row[0]."';");
				$invalid++;
			}
		}
	
		return "found $valid live links and $invalid dead links.";
	}
	function GetThumb($vid) {
		$vids = mysql_query("SELECT videoUrl FROM videos WHERE (videoID = ".$vid.")");
		$thevid = mysql_fetch_object($vids);
		$vidurl = $thevid->videoUrl;
		if ($vidurl != "") {
		$cs = explode("/", $vidurl);
		$ret = "http://img.youtube.com/vi/".$cs[4]."/2.jpg";
		}else{ $ret = "404"; }
		return $ret;
		
	}
	function ValidLink($link) {
		if ($link != "") {
			$cs = explode("/", $link);
			$ret = "http://img.youtube.com/vi/".$cs[4]."/2.jpg";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $ret);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);
			curl_setopt($ch, CURLOPT_HEADER, 1);

			$response = curl_exec($ch);

			$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
			$header = substr($response, 0, $header_size);
			$body = substr($response, $header_size);

			if (strpos($header, '404')) 
				return false;
			else
				return true;
		}else{
			return false;
		}
	}
	function GetFirstVid($cat) {
		$vids = mysql_query("SELECT vid_cat.videoID FROM categories JOIN vid_cat on categories.categoryID = vid_cat.categoryID JOIN videos on vid_cat.videoID = videos.videoID WHERE categories.categoryID = '$cat';");
		$res = mysql_fetch_assoc($vids);

		return $res['videoID'];
	}

	function HasParent($categoryID) {
		$results = mysql_query("SELECT categoryParent from categories where categoryID = ".$categoryID.";");
		if (mysql_fetch_object($results)->categoryParent == NULL) {
			return false;
		}else{
			return true;
		}
	}

?>