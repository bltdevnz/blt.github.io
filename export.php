<?php 

include("includes/functional.inc.php");

if (!LoggedIn()) { die ("Must be logged in to admin in order to export database."); }
ExportDB();	
?>