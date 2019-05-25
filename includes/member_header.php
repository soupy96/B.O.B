<!DOCTYPE html>
<html>
<head>
<title>Bank of Brandon</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/javascript.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/zebrastripes.js" ></script>
</head>
<body>
<div class="wrapper">
	<div class="colour">
		<div class="header">
			<img class="logo" src="imgs/boblogo.png" alt="Bank of Brandon Logo" />
			<h1>Bank of Brandon</h1>
			<div class="socialmedia">
				<a href="https://www.facebook.com" target="_blank"><img class="icon" src="imgs/fbicon.png" alt="Fcebook icon" /></a>
				<a href="https://www.twitter.com" target="_blank"><img class="icon" src="imgs/ticon.png" alt="Twitter icon" /></a>
				<a href="https://www.linkedin.com" target="_blank"><img class="icon" src="imgs/linkicon.png" alt="Linkedin icon" /></a>
			</div>
			<div class="login">
				<a href="logout.php">Logout</a>
			</div>
			<div class="loginname">
				<?php
					echo "<p>You are logged in as, {$_SESSION['regi_fname']}!</p>";
				?>
			</div>
		</div>
		<nav>
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="#">About</a>
				</li>
				<li>
					<a href="rates.php">Mortgage Rates</a>
				</li>
				<li>
					<a href="mortgagecalc.php">Mortgage Calculator</a>
				</li>
				<li>
					<a href="#">Products and Services</a>
				</li>
				<li>
					<a href="registration.php">Registration</a>
				</li>
				<li>
					<a href="password.php">Change your Password</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</nav>
	</div>
