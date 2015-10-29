<?php
<<<<<<< HEAD
	include(GetThemeDirectory(false)."/theme.inc.php");
	function GetThemes() {
		$themes = array();
		$r = scandir('themes/');
		foreach($r as $theme) {
			if($theme === '.' or $theme === '..') continue;
			if(is_dir('themes/'.$theme)){
				array_push($themes, $theme);
			}
		}
		return $themes;
	}
	function GetThemeDirectory($echo = true) {
		$themes = GetThemes();
		if (isset($_SESSION['theme'])) {
			if(!file_exists("themes/".$_SESSION['theme']) or $_SESSION['theme'] === '.'){
				$_SESSION['theme'] = $themes[0];
			}
		}else{
			$_SESSION['theme'] = $themes[0];
		}
		$ret = "themes/".$_SESSION['theme'];
		if ($echo == true) {
			echo $ret;
		}else{
			return $ret;
		}
		
	}
	function GetThemeSelect() {
		$themes = GetThemes();
		echo("<select id=\"selTheme\" onchange=\"changeTheme()\">");
		foreach($themes as $theme) {
			if ($_SESSION['theme'] === $theme) {
				echo ("<option value=\"$theme\" class=\"themes\" SELECTED>$theme</option>");
			}else{
				echo ("<option value=\"$theme\" class=\"themes\">$theme</option>");
			}
		}
		echo("</select>");
=======

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
>>>>>>> origin/master
	}

?>