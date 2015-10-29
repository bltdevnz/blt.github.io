<?php
	include("login.inc.php");
	include("theme.inc.php");
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
			salt			VARCHAR(155)	NOT NULL,


	
			PRIMARY KEY(adminID)
		)
	");
	$ret = mysql_query("CREATE TABLE views
		(
			viewID		INT	NOT NULL AUTO_INCREMENT,
			lastView	BIGINT,
			PRIMARY KEY(viewID)
		)
	");
	}		
     function NewCategoryForm(){
			$results = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc FROM categories;");
			$options = "";
			while($row = mysql_fetch_row($results))
			{
				$options .= "<option value=\"$row[0]\">$row[1]</option>";
			}

$retVal = ('

<form action="add" method="post" onsubmit="return Confirmation();">

	<div class="detail">Name : <span><input type="text" name="catName"></span></div>
	<div class="detail">Color : <span><input type="color" name="catColor" /></span></div>
  <div class="detail"><span><input type="submit" name="catSubmitted" value="Submit Category"></span></div>
  
</form>
');

	return $retVal;
	
	}
	     function NewVideoForm(){
			$results = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc FROM categories;");
			$options = "";
			while($row = mysql_fetch_row($results))
			{
				$options .= "<option value=\"$row[0]\">$row[1]</option>";
			}

$retVal = ('

<form action="add" method="post" onsubmit="return Confirmation();">
	<div class="detail">Title : <span><input type="text" name="vidName"></span></div>
	<div class="detail">URL : <span><input type="text" name="vidURL" /></span></div>
	<div class="detail">Category : 
	<span>
	<select name="categoryID">
		'. $options .'
	</select>
	</span>
	</div>
  <div class="detail"><span><input type="submit" name="vidSubmitted" value="Submit Video"></span></div>
</form>
');

	return $retVal;
	
	}
 function RemoveCategoryForm(){
			$results = mysql_query("SELECT categoryID, categoryName, categoryColor, categoryDesc FROM categories;");
			$options = "";
			while($row = mysql_fetch_row($results))
			{
				$options .= "<option value=\"$row[0]\">$row[1]</option>";
			}

$retVal = ('

<form action="delete" method="post" onsubmit="return Confirmation();">
	<div class="detail">Category : 
	<span>
	<select name="categoryID">
		'. $options .'
	</select>
	</span>
	</div>
  <div class="detail"><span><input type="submit" name="vidSubmitted" value="Remove Category"></span></div>
</form>
');

	return $retVal;
	
	}
	 function RemoveVideoForm(){
			$results = mysql_query("SELECT videoID, videoTitle FROM videos ORDER BY videoTitle ASC;");
			$options = "";
			$id = "";
			while($row = mysql_fetch_row($results))
			{
				if ($id == "") { 
					$id = $row[0];
				}
				$options .= "<option value=\"$row[0]\">$row[1]</option>";
			}

$retVal = ('

<form action="delete" method="post" onsubmit="return Confirmation();">
	<div class="detail">Video : 
	<span>
	<select name="videoID" onchange="updateImage()" id="deleteVidSelect">
		'. $options .'
	</select>
	</span>
	</div>
	<div class="detail"><span><img id="dp" src="'. GetThumb($id) .'" /><br /><br />
	<input type="submit" name="vidSubmitted" value="Remove Video"></span></div>
</form>
');

	return $retVal;
	
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
     function CreateAdmin($user, $pass, $email, $fname, $lname, $salt)
     {
		
		$q = "INSERT INTO admin (user, pass, email, firstName, lastName, salt) values ('$user', '$pass', '$email', '$fname', '$lname', '$salt');";
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
					$cats = array($t[2] + 2);
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
				<input type=\"submit\" value=\"Restore from File\" name=\"submit\">
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



	function HasChildren($categoryID) {
		$results = mysql_query("SELECT categoryParent FROM categories WHERE categoryID != ".$categoryID." and categoryParent = ".$categoryID.";");
		if (mysql_num_rows($results) > 0) {
			return true;
		} else {
			return false;
		}
	}
	function CheckForFirstView(){
		$q = mysql_query("SELECT lastView FROM views");
		$res = mysql_fetch_assoc($q);
		$lv = $res["lastView"];
		if (!mysql_num_rows($q) > 0) {
			mysql_query("INSERT INTO views(lastView) VALUES (". (time() + 86400) .");");
			ScanDeadLinks();
		}else{
			if ($lv < time()) {
				mysql_query("UPDATE views SET lastView = ". (time() + 86400) .";");
				ScanDeadLinks();
			}
		}
		
	}

	function ScanDeadLinks() {

<<<<<<< HEAD


		$results = mysql_query("SELECT videoUrl FROM videos");
		$valid = 0;
		$invalid = 0;

=======
		$q = mysql_query("SELECT categoryName, categoryColor, categoryDesc FROM categories WHERE (categoryID = ".$categoryID.");");

		$f = mysql_fetch_object($q);
		$title = $f->categoryName;
		$color = $f->categoryColor;
		$desc = $f->categoryDesc;
		echo ("
			<big id=\"title\" style=\"box-shadow: inset 0px 0px 15px ".$color." !important;\">".$title."</big>
			<big id=\"subtitle\" style=\"box-shadow: inset 0px 0px 15px ".$color." !important; text-transform: none; text-shadow: none; letter-spacing: 0px !important;\">".$desc."</big>
		<table>");
>>>>>>> origin/master
		while($row = mysql_fetch_row($results))
		{
			if (ValidLink($row[0])) {
				$valid++;
			}else{
				$q = mysql_query("DELETE FROM videos WHERE videoURL = '".$row[0]."';");
				$invalid++;
			}
		}
	
		return "found $valid live links and $invalid dead links.";
	}
	function DeleteVideo($vID) {
		$q = mysql_query("DELETE FROM videos WHERE videoID = $vID;");
	}
	function DeleteCategory($cID) {
		$q = mysql_query("DELETE FROM categories WHERE categoryID = $cID;");
	}
	function GetThumb($vid) {
		$vids = mysql_query("SELECT videoUrl FROM videos WHERE (videoID = ".$vid.")");
		$thevid = mysql_fetch_object($vids);
		$vidurl = $thevid->videoUrl;
		if ($vidurl != "") {
		$cs = explode("/", $vidurl);
		$ret = "http://img.youtube.com/vi/".$cs[4]."/mqdefault.jpg";
		}else{ $ret = "404"; }
		return $ret;
		
	}
	function EmbedVideo($link) {
		if (!strpos($link, "embed"))
		{
			$cs = explode("v=", $link);
			
			
			return "http://www.youtube.com/embed/" . $cs[1];
		}
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
		$vids = mysql_query("SELECT vid_cat.videoID FROM categories JOIN vid_cat on categories.categoryID = vid_cat.categoryID JOIN videos on vid_cat.videoID = videos.videoID WHERE categories.categoryID = '$cat' ORDER BY videoTitle ASC;");
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