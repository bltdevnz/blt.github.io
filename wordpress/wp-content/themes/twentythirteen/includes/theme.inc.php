<?php

$themes = array(
	"Light" => "4me",
	"Dark" => "dark",
	"Dream" => "dream",
	"Alien" => "fun"
	
	);
// Theme Name => CSS File

$theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : "4me";
function GetTheme() {
	global $theme;

	echo ('<link rel="stylesheet" href="./css/'.$theme.'.css" type="text/css" />');
}

function Themes() {
	global $themes, $theme, $pageName;
	echo ("
			<form action=\"change-theme\" method=\"post\" name=\"changeTheme\">
				<input type=\"hidden\" name=\"lastPage\" value=\"".$pageName."\" />
				<select name=\"theme\" id=\"theme\">
	");

	foreach ($themes as $themeName => $cssFile) {
		$selected = "";

		if ($cssFile == $theme) 
			$selected = "selected";

		echo ("
					<option value=\"".$cssFile."\" ".$selected.">".$themeName."</option>
		");
	}

	echo ("
				</select>
			</form>
	");
}


function ChangeTheme($newTheme) {
	global $theme;

			$theme = $newTheme;
			$_SESSION['theme'] = $theme;

}

?>