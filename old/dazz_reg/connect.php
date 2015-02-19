<?php
/*
author: Luc Pitre<pitreluc@gmail.com>
created: 15 December 2014
purpose: connect to database and its host
*** first created when working in the "awe" folder when creating dazzling discoveries database  ***
*/

	define('DB_NAME', 'awesome');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	

	$con=mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die("cannot select database");

?>