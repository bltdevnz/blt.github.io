<?php
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
	}

?>