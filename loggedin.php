<?php # Script 12.13 - loggedin.php #3
// The user is redirected here from login.php.

session_start(); // Start the session.

// If no session value is present, redirect the user:
// Also validate the HTTP_USER_AGENT!
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {

	// Need the functions:
	require ('login_functions.inc.php');
	redirect_user();	

}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';
include ('includes/header.php');

// Print a customized message:
echo "<h4>Logged In!</h4>
<p>You are now logged in, {$_SESSION['regi_fname']}!</p>
<p class='loggedin'><a href=\"logout.php\">Logout</a></p>";

include ('includes/footer.php');
?>