<?php
	date_default_timezone_set("America/Santiago");
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'starterdaily');
	mysql_query("SET NAMES 'utf8'");
	mysql_set_charset('utf8');

	$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
	$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
	mysql_query ("set character_set_results='utf8'");   

	$path = "uploads/";
	$perpage=10;
	$admin_url='http://localhost/starterdaily/admin/';
	$rowsPerPage=10;
?>
