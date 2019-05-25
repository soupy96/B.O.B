<?php 

session_start(); // Start the session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['regi_id'])) {

    // Need the functions:
    require ('login_functions.inc.php');
    redirect_user();    
    
} else { // Cancel the session:

	//This is the PHP include
	$pageTitle = 'Contact';
	include ('includes/member_header.php');
?> 
    <div class="ticket"><h4>Help Desk Ticket</h4></div>
    <form action="createnewinvoice.php" method="get" enctype="application/x-www-form-urlencoded">
        <p style="margin-left:-195px;"><input type="submit" value="Create Ticket" /></p>
    </form>
    <form action="viewopeninvoices.php" method="get" enctype="application/x-www-form-urlencoded">
        <p style="margin-left:-165px;"><input type="submit" value="View Open Tickets" /></p>
    </form>
    <form action="viewinvoice.php" method="get" enctype="application/x-www-form-urlencoded">
        <p style="margin-left:20px;"><input type="submit" value="  View Ticket #  " />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="invoicenum" /></p>
        <p>(Enter an existing ticket number.)</p>
    </form>
    <form action="backupinvoices.php" method="get" enctype="application/x-www-form-urlencoded">
    <p><input type="submit" value="Backup Tickets" /></p>
    </form>
<?php 
	//This the PHP include for the footer
	include ('includes/footer.php');
}
?>