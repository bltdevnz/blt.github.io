<?php

    $host ="localhost";
    $user = "";
    $password = "";
    $connection = mysql_connect($host, $user, $password)
                    or die("Failed to connect to mysql server because : ".mysql_error());
    $database = "";
	
    $db = mysql_select_db($database, $connection) or 
            die("Failed to connect to database.");
	
?>