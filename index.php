<?php 

	session_start(); // Start the session.

	//This is the PHP include
	$pageTitle = 'Bank of Brandon';
	include ('includes/header.php');
	
?>
	
<div class="mortgage">
	<h2 style="color:#0AA4BD;">Mortgage</h2>
	<p>Want to know our mortgage rates?</p>
	<p>Check out the link below for our updated rates.</p>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<span class="links" ><a href="rates.php">Mortgage Rates</a></span>
</div>
<div class="services">
	<h2>Products and Services</h2>
	<p>Want to know more about our products and what kind of services that we provide?</p>
	<p>Visit our FAQ's page below.</p>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<span class="links" ><a href="#">FAQ's</a></span>
</div>
<div class="contact">
	<h2 style="color:#0AA4BD;">Contact</h2>
	<p>Have a question you can try our FAQ's page <a href="#">here</a> or if you want to get in direct with a employee you can go over to our Contact page.</p>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<span class="links" ><a href="#">Contact Us</a></span>
</div>

<?php 

	//This the PHP include for the footer
	include ('includes/footer.php');

?>
