<?php

    $host =""; 		// details suppressed for github
    $user = "";
    $password = "";

    $connection = mysql_connect($host, $user, $password)
                    or die("Failed to connect to mysql server because : ".mysql_error());

    $database = "sheepmia_blt";
	
    $db = mysql_select_db($database, $connection) or 
            die("Failed to connect to database.");
			
     function CreateCategory($name, $desc, $color)
     {		
		$q = "INSERT INTO categories (categoryName, categoryDesc, categoryColor, categoryPopularity) values ('$name', '$desc', '$color', 0);";
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
     function CreateAdmin($user, $pass, $email, $fname, $lname)
     {
     		$pw = sha1($pass);
		$q = "INSERT INTO admin (user, pass, email, firstName, lastName) values ('$user', '$pw', '$email', '$fname', '$lname');";
		mysql_query($q);
     }

     function Seed() 
     {
      		$csv = fopen("video.csv", "r");
		while (! feof($csv)) {
			$t = fgetcsv($csv);

			$cats = explode(",", $t[2]);
			
			if ($cats == null) { $cats = array(0); }
			
			CreateVideo($t[0], strpos($t[1], '&') != null ? substr($t[1],0, strpos($t[1], '&')) : $t[1], '', $cats);
		}
		fclose($csv);
     }
?>