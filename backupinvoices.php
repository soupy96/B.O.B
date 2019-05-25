<!DOCTYPE html PUBLIC
"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Backup Ticket</title>
<link rel="stylesheet" href="css/php_styles.css" type="text/css" />
<meta http-equiv="content-type"
content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php

session_start(); // Start the session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['regi_id'])) {

	// Need the functions:
	require ('login_functions.inc.php');
	redirect_user();	
	
} else { // Cancel the session:

$Source = "Open";
$Destination = "Backups";
if (!file_exists($Destination))
	mkdir($Destination);
if (is_dir($Source)) {
	$DirEntries = scandir($Source);
	foreach ($DirEntries as $Entry) {
		if (strpos($Entry, '.txt') !== FALSE)
			copy("$Source/" . $Entry, "$Destination/" . $Entry);
	}
	echo "<p>Tickets successfully backed up.</p>";
}
else
	echo "<p>The Open directory does not exist! You must first save an ticket to create the Open directory.</p>";
}
?>
</body>
</html>
