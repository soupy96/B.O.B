<?php # Script 10.3 - edit_user.php
// This page is for editing a user record.
// This page is accessed through view_users.php.

session_start(); // Start the session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['regi_id'])) {

	// Need the functions:
	require ('login_functions.inc.php');
	redirect_user();	
	
} else { // Cancel the session:

$page_title = 'Edit a User';
include ('includes/header.php');
echo '<h4>Edit a User</h4>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.php'); 
	exit();
}

require ('includes/mysqli_connect.php'); 

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array();
	
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}

	// Check for a phone number:
	if (empty($_POST['regi_phone'])) {
		$errors[] = 'You forgot to enter your phone number.';
	} else {
		$ph = mysqli_real_escape_string($dbc, trim($_POST['regi_phone']));
	}

	// Check for a address:
	if (empty($_POST['regi_address'])) {
		$errors[] = 'You forgot to enter your address.';
	} else {
		$ad = mysqli_real_escape_string($dbc, trim($_POST['regi_address']));
	}

	// Check for a postal code:
	if (empty($_POST['regi_postal'])) {
		$errors[] = 'You forgot to enter your postal code.';
	} else {
		$pt = mysqli_real_escape_string($dbc, trim($_POST['regi_postal']));
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	if (empty($errors)) { // If everything's OK.
	
		//  Test for unique email address:
		$q = "SELECT regi_id FROM registration WHERE regi_email='$e' AND regi_id != $id";
		$r = @mysqli_query($dbc, $q);
		if (mysqli_num_rows($r) == 0) {

			// Make the query:
			$q = "UPDATE registration SET regi_fname='$fn', regi_lname='$ln', regi_phone='$ph', regi_address='$ad', regi_postal='$pt', regi_email='$e' WHERE regi_id=$id LIMIT 1";
			$r = @mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message:
				echo '<p>The user has been edited.</p>';	
				
			} else { // If it did not run OK.
				echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p style="display:none;">' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}
				
		} else { // Already registered.
			echo '<p class="error">The email address has already been registered.</p>';
		}
		
	} else { // Report the errors.

		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
	
	} // End of if (empty($errors)) IF.

} // End of submit conditional.

// Always show the form...

// Retrieve the user's information:
$q = "SELECT regi_fname, regi_lname, regi_phone, regi_address, regi_postal, regi_email FROM registration WHERE regi_id=$id";		
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// Create the form:
	echo '<form action="edit_user.php" method="post">
<p>First Name: <input type="text" name="first_name" size="15" maxlength="15" value="' . $row[0] . '" /></p>
<p>Last Name: <input type="text" name="last_name" size="15" maxlength="30" value="' . $row[1] . '" /></p>
<p>Phone Number: <input type="text" name="regi_phone" size="15" maxlength="30" value="' . $row[2] . '" /></p>
<p>Address: <input type="text" name="regi_address" size="15" maxlength="30" value="' . $row[3] . '" /></p>
<p>Postal Code: <input type="text" name="regi_postal" size="15" maxlength="30" value="' . $row[4] . '" /></p>
<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="' . $row[5] . '"  /> </p>
<p><input type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="id" value="' . $id . '" />
</form>';

} else { // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($dbc);
		
include ('includes/footer.php');
}
?>