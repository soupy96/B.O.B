<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Save Ticket</title>
	<link rel="stylesheet" href="css/php_styles.css" type="text/css" />
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
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
	
$BillTo = addslashes($_POST["billto"]);
$Date = addslashes($_POST["date"]);
$Terms = addslashes($_POST["terms"]);
$Description1 = addslashes($_POST["description1"]);
$Description2 = addslashes($_POST["description2"]);
$Description3 = addslashes($_POST["description3"]);
$InvoiceNum = $_POST["invoicenum"];
$Quantity1 = $_POST["quantity1"];
$Quantity2 = $_POST["quantity2"];
$Quantity3 = $_POST["quantity3"];
$Rate1 = $_POST["rate1"];
$Rate2 = $_POST["rate2"];
$Rate3 = $_POST["rate3"];
$Amount1 = $_POST["amount1"];
$Amount2 = $_POST["amount2"];
$Amount3 = $_POST["amount3"];
$Total = $_POST["total"];
$theTime = date("Y-m-d h:i:sa");
if (empty($BillTo) ||
    empty($Date) ||
    empty($Terms) ||
    empty($Description1) ||
    empty($Description2) ||
    empty($Description3))
    echo "<hr /><p>You must enter a value in each field. Click
     your browser's Back button to return to the ticket.</p><hr />";
else if (!is_numeric($InvoiceNum) ||
    !is_numeric($Quantity1) ||
    !is_numeric($Quantity2) ||
    !is_numeric($Quantity3) ||
    !is_numeric($Rate1) ||
    !is_numeric($Rate2) ||
    !is_numeric($Rate3) ||
    !is_numeric($Amount1) ||
    !is_numeric($Amount2) ||
    !is_numeric($Amount3) ||
    !is_numeric($Total))
    echo "<p>The Invoice #, Quantity, Rate, Amount, and Total fields must contain numeric values! Click
     your browser's Back button to return to the ticket.</p>";
else {
	$FixBillTo = explode("\n", $BillTo);
	$BillTo = implode("~", $FixBillTo);
	$Invoice = $BillTo . "\n";
	$Invoice .= $InvoiceNum . "\n";
	$Invoice .= $Date . "\n";
	$Invoice .= $Terms . "\n";
	$Invoice .= $Description1 . "\n";
	$Invoice .= $Description2 . "\n";
	$Invoice .= $Description3 . "\n";
	$Invoice .= $Quantity1 . "\n";
	$Invoice .= $Quantity2 . "\n";
	$Invoice .= $Quantity3 . "\n";
	$Invoice .= $Rate1 . "\n";
	$Invoice .= $Rate2 . "\n";
	$Invoice .= $Rate3 . "\n";
	$Invoice .= $Amount1 . "\n";
	$Invoice .= $Amount2 . "\n";
	$Invoice .= $Amount3 . "\n";
	$Invoice .= $Total . "\n";
	$Invoice .= $theTime . "\n";
	if (!file_exists("Open"))
		mkdir("Open");
	$InvoiceFile = fopen("Open/" . $InvoiceNum . ".txt", "w");
	if (flock($InvoiceFile, LOCK_EX)) {
		if (fwrite($InvoiceFile, $Invoice) > 0) {
			$BillTo = stripslashes($_POST["billto"]);
			$Date = stripslashes($_POST["date"]);
			$Terms = stripslashes($_POST["terms"]);
			$Description1 = stripslashes($_POST["description1"]);
			$Description2 = stripslashes($_POST["description2"]);
			$Description3 = stripslashes($_POST["description3"]);
			echo "<h1>Ticket Saved</h1>";
			echo "<hr /><br /><table frame='border' rules='rows'>";
			echo "<tr><td><strong>Bill To:</strong>";
			echo "<pre>$BillTo</pre></td>";
			echo "<td style='text-align: right;vertical-align:top;' colspan='3'>";
			echo "<strong>Ticket #</strong>: $InvoiceNum<br />";
			echo "<strong>Date</strong>: $Date<br />";
			echo "<strong>Terms</strong>: $Terms</td></tr>";
			echo "<tr>";
			echo "<td><strong>Description</strong><br />$Description1<br />$Description2<br />$Description3</td>";
			echo "<td style='text-align: right'><strong>Quantity</strong><br />$Quantity1<br />$Quantity2<br />$Quantity3</td>";
			echo "<td style='text-align: right'><strong>Rate</strong><br />$$Rate1<br />$$Rate2<br />$$Rate3</td>";
			echo "<td style='text-align: right'><strong>Amount</strong><br />$".number_format($Amount1,2)."<br />$".number_format($Amount2,2)."<br />$".number_format($Amount3,2)."</td></tr>";
	echo "<tr><td colspan='4' style='text-align: right'><strong>TOTAL</strong>: $".number_format($Total,2)."</td></tr>";
			echo "</table>";
			flock($InvoiceFile, LOCK_UN);
			fclose($InvoiceFile);
		}
		else
			echo "<p>The ticket could not be saved!</p>";
	}
	else
		echo "<p>The ticket could not be saved!</p>";
}
?>
	<p><a href="invoices.php">Return to Main Ticket Page</a></p>
	<?php
		}
	?>
</body>
</html>
