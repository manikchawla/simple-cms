<?php
	define("DB_HOST", "localhost");
	define("DB_USER", "widget_cms");
	define("DB_PASS", "secretpassword");
	define("DB_NAME", "widget_corp");
	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	if (mysql_errno()) {
		die("Database connection failed: " .
			mysql_error() .
			" (" . mysql_errno() . ")"
		);
	}
 ?>
