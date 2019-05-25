<!DOCTYPE html PUBLIC
"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Tickets</title>
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

if (empty($_GET['invoicenum']))
    echo "<hr /><p>You must enter an existing ticket number. Click
     your browser's Back button to return to the Ticket page.</p><hr />";
else if (is_readable("Open/" . $_GET['invoicenum'] . ".txt")) {
	$InvoiceFields = fopen("Open/" . $_GET['invoicenum'] . ".txt", "r");
	$BillTo = fgets($InvoiceFields);
	$FixBillTo = explode("~", $BillTo);
	$BillTo = implode("\n", $FixBillTo);
	$BillTo = stripslashes($BillTo);
	$InvoiceNum = stripslashes(fgets($InvoiceFields));
	$Date = stripslashes(fgets($InvoiceFields));
	$Terms = stripslashes(fgets($InvoiceFields));
	$Description1 = stripslashes(fgets($InvoiceFields));
	$Description2 = stripslashes(fgets($InvoiceFields));
	$Description3 = stripslashes(fgets($InvoiceFields));
	$Quantity1 = stripslashes(fgets($InvoiceFields));
	$Quantity2 = stripslashes(fgets($InvoiceFields));
	$Quantity3 = stripslashes(fgets($InvoiceFields));
	$Rate1 = stripslashes(fgets($InvoiceFields));
	$Rate2 = stripslashes(fgets($InvoiceFields));
	$Rate3 = stripslashes(fgets($InvoiceFields));
	$Amount1 = stripslashes(fgets($InvoiceFields));
	$Amount2 = stripslashes(fgets($InvoiceFields));
	$Amount3 = stripslashes(fgets($InvoiceFields));
	$Total = stripslashes(fgets($InvoiceFields));
	$theTime = (fgets($InvoiceFields));
	fclose($InvoiceFields);
	echo "<h1>View Ticket</h1>";
	echo "<hr /><br /><table frame='border' rules='rows'>";
	echo "<tr><td><strong>Bill To:</strong>";
	echo "<pre>$BillTo</pre></td>";
	echo "<td style='text-align: right; vertical-align:top;' colspan='3'>";
	echo "<strong>Ticket #</strong>: $InvoiceNum<br />";
	echo "<strong>Date</strong>: $Date<br />";
	echo "<strong>Terms</strong>: $Terms</td></tr>";
	echo "<tr>";
	echo "<td><strong>Description</strong><br />$Description1<br />$Description2<br />$Description3</td>";
	echo "<td style='text-align: right'><strong>Quantity</strong><br />$Quantity1<br />$Quantity2<br />$Quantity3</td>";
	echo "<td style='text-align: right'><strong>Rate</strong><br />$$Rate1<br />$$Rate2<br />$$Rate3</td>";
	echo "<td style='text-align: right'><strong>Amount</strong><br />$".@number_format($Amount1,2)."<br />$".@number_format($Amount2,2)."<br />$".@number_format($Amount3,2)."</td></tr>";
	echo "<tr><td colspan='4' style='text-align: right'><strong>TOTAL</strong>: $".@number_format($Total,2)."</td></tr>";
	echo "</table>";
	echo "<strong>Timestamp</strong>: $theTime<br/>";
	echo "<hr /><p><a href='invoices.php'>Return to Main Ticket Page</a></p>";
	}
else
	echo "<p>Could not read the ticket!</p>";
?>
<?php
}
?>
</body>
</html>