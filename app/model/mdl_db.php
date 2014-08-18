<?php

	// mysql_query("SET NAMES 'utf8'");
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'starterdaily');

	$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
	$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
	$path = "uploads/";
	$perpage=10;
	$base_url = "http://localhost/starterdaily";
	$rowsPerPage=10;
?>
