<?php 

	session_start(); // Start the session.

	//This is the PHP include
	$pageTitle = 'Bank of Brandon';
	include ('includes/header.php');

	// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('includes/mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
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
	
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO registration (regi_fname, regi_lname, regi_phone, regi_address, regi_postal, regi_email, regi_pass, regi_date) VALUES ('$fn', '$ln', '$ph', '$ad', '$pt', '$e', SHA1('$p'), NOW() )";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h4>Thank you!</h4>
		<p>You are now registered.<br><br> Go to another page to get more info or click Registration to register more users.</p><p><br /></p>';	
		
		} else { // If it did not run OK.
			
			// Public message:
			echo '<h4>System Error</h4>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		include ('includes/footer.php'); 
		exit();
		
	} else { // Report the errors.
	
		echo '<h4>Error!</h4>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>
	
<h4>Register</h4>
<p style="width:50%;margin-left:25%;">To become a registered user of the Bank of Brandon insert the required fields below. We will not sell or give out any of your personal information. Your email will be used to provide you with information about your account with the Bank of Brandon.</p>
<br>
<p><span style="color:red;">*</span> = Required</p>
<form class="database" action="registration.php" method="post">
	<p style="text-align:left;"><span style="color:red;">*</span>First Name: <br><br><input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
	<p style="text-align:left;"><span style="color:red;">*</span>Last Name: <br><br><input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
	<p style="text-align:left;"><span style="color:red;">*</span>Phone Number: <br><br><input type="text" name="regi_phone" size="15" maxlength="40" value="<?php if (isset($_POST['regi_phone'])) echo $_POST['regi_phone']; ?>" /></p>
	<p style="text-align:left;"><span style="color:red;">*</span>Address: <br><br><input type="text" name="regi_address" size="15" maxlength="40" value="<?php if (isset($_POST['regi_address'])) echo $_POST['regi_address']; ?>" /></p>
	<p style="text-align:left;"><span style="color:red;">*</span>Postal Code: <span style="color:red;margin-left:2%;">As shown: A1B2C3</span><br><br><input type="text" name="regi_postal" size="15" maxlength="40" value="<?php if (isset($_POST['regi_postal'])) echo $_POST['regi_postal']; ?>" /></p>
	<p style="text-align:left;"><span style="color:red;">*</span>Email Address: <br><br><input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p style="text-align:left;"><span style="color:red;">*</span>Password: <br><br><input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
	<p style="text-align:left;"><span style="color:red;">*</span>Confirm Password: <br><br><input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
	<p style="text-align:left;"><input type="submit" name="submit" value="Register" /></p>
</form>
<a class="view" href="viewusers.php"><img src="imgs/user.png"></a>
<?php 

	//This the PHP include for the footer
	include ('includes/footer.php');

?>
