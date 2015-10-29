<?php

    $host ="localhost";
    $user = "malcam4me";
    $password = "fH74jp9T6SG1";
    $connection = mysql_connect($host, $user, $password)
                    or die("Failed to connect to mysql server because : ".mysql_error());
    $database = "malcam4me";
	
    $db = mysql_select_db($database, $connection) or 
            die("Failed to connect to database.");
	
?>