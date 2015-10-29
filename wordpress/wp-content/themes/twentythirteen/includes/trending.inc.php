<?php

function GetTrends()
{
	$trends = array(array(), array());
	
	$ret = mysql_query("SELECT videoTitle, videoUrl, videoPopularity FROM videos");
	while($row = mysql_fetch_row($ret)) {
		if ($trends[0] != null) {
			if ($row[2] > $trends[0][2]) {
				$trends[1] = $trends[0];
				$trends[0] = $row;

			}else{
				if ($trends[1] != null) {
					if ($row[2] > $trends[1][2]) {
						$trends[1] = $row;
					}
				}else{
					$trends[1] = $row;
				}
			}
		}else {
			$trends[0] = $row;
		}
	}
	$count = 0;

	foreach ($trends as $t) {

		if ($count == 0) {
			echo ('<div class="vidbox"><span class="first">Trending</span>');	
		}else{
			echo ('<div class="vidbox">');
		}

		echo('
			<iframe width="320" height="240" src="'.$t[1].'" frameborder="0" allowfullscreen></iframe>
			'.$t[0].'
			</div>
		');

		$count++;
	}
}

GetTrends();

?>