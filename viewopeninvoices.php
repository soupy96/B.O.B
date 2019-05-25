<!DOCTYPE html PUBLIC
"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>View Open Tickets</title>
	<link rel="stylesheet" href="css/php_styles.css" type="text/css" />
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h1>Open Tickets</h1><hr />
<?php

session_start(); // Start the session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['regi_id'])) {

	// Need the functions:
	require ('login_functions.inc.php');
	redirect_user();	
	
} else { // Cancel the session:

$Dir = "Open";
if (is_dir($Dir)) {
	$DirEntries = scandir($Dir);
	foreach ($DirEntries as $Entry) {
		if (strpos($Entry, '.txt') !== FALSE)
			echo $Entry . "<br />";
	}
}
else
	echo "<p>The Open directory does not exist! You must first save an ticket to create the Open directory.</p>";
?>
	<hr />
	<p><a href="invoices.php">Return to Main Ticket Page</a></p>
<?php
}
?>
</body>
</html>
