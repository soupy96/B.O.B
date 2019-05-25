<?php # Script 12.1 - login_page.inc.php
// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

// Include the header:
$page_title = 'Login';
include ('includes/header.php');

// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '<h4>Error!</h4>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p>Please try again.</p>';
}

// Display the form:
?><h4>Login</h4>
<form class="database" action="login.php" method="post">
	<p style="text-align:left;">Email Address:<br><br><input type="text" name="regi_email" size="20" maxlength="60" /> </p>
	<p style="text-align:left;">Password:<br><br><input type="password" name="regi_pass" size="20" maxlength="20" /></p>
	<p style="text-align:left;"><input type="submit" name="submit" value="Login" /></p>
</form>

<?php include ('includes/footer.php'); ?>