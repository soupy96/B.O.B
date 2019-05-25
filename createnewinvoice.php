<!DOCTYPE html PUBLIC
"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start(); // Start the session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['regi_id'])) {

	// Need the functions:
	require ('login_functions.inc.php');
	redirect_user();	
	
} else { // Cancel the session:
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Create Ticket</title>
	<link rel="stylesheet" href="css/php_styles.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script src="js/main.js"></script>
</head>
<body>
	<h1>New Ticket</h1>
	<form action="saveinvoice.php" method="post" enctype="application/x-www-form-urlencoded">
		<table frame="border" rules="rows">
			<tr>
				<td>
					Bill To
					<br />
					<textarea name="billto" rows="4" cols="25" tabindex="1"></textarea>
				</td>
				<td style="text-align: right" colspan="3">
					<p>Ticket # <input type="text" name="invoicenum" size="28" tabindex="2" /></p>
					<p>Date <input type="text" name="date" size="28" tabindex="3" /></p>
					<p>Terms <input type="text" name="terms" size="28" tabindex="4" /></p>
				</td>
			</tr>
			<tr>
				<td>
					Product Description
					<br />
					<p><input type="text" name="description1" value="Description 1" size="34" tabindex="5" /></p>
					<p><input type="text" name="description2" value="Description 2" size="34" tabindex="8" /></p>
					<p><input type="text" name="description3" value="Description 3" size="34" tabindex="11" /></p>
				</td>
				<td>
					Quantity
					<br />
					<p><input type="text" name="quantity1" size="10" value="0" onchange="return calcTotal()" tabindex="6" /></p>
					<p><input type="text" name="quantity2" size="10" value="0" onchange="return calcTotal()" tabindex="9"/></p>
					<p><input type="text" name="quantity3" size="10" value="0" onchange="return calcTotal()" tabindex="12" /></p>
				</td>
				<td>
					Rate
					<br />
					<p><input type="text" name="rate1" size="10" value="0" onchange="return calcTotal()" tabindex="7" /></p>
					<p><input type="text" name="rate2" size="10" value="0" onchange="return calcTotal()" tabindex="10"/></p>
					<p><input type="text" name="rate3" size="10" value="0" onchange="return calcTotal()" tabindex="13" /></p>
				</td>
				<td>
					Amount
					<br />
					<p><input type="text" name="amount1" size="10" value="0" onfocus="this.blur()" tabindex="0" /></p>
					<p><input type="text" name="amount2" size="10" value="0" onfocus="this.blur()" tabindex="0" /></p>
					<p><input type="text" name="amount3" size="10" value="0" onfocus="this.blur()" tabindex="0" /></p>
				</td>
			</tr>
			<tr>
				<td colspan="4" style="text-align: right">
					TOTAL: <input type="text" name="total" size="10" value="0" onfocus="this.blur()" tabindex="0" />
				</td>
			</tr>
		</table>
		<p><input type="submit" value="Save New Ticket" tabindex="14" /><input type="reset" tabindex="15" /></p>
	</form>
	<p><a href="invoices.php">Return to Main Ticket Page</a></p>
	<?php
}
?>
</body>
</html>
