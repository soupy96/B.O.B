<?php 

	session_start(); // Start the session.

	//This is the PHP include
	$pageTitle = 'Mortgage';
	include ('includes/header.php'); 

	//This is the math the completes the rates in the chart.
	define('PRIME_RATE',2.700);
	$rate1YrOpen=number_format(PRIME_RATE + 1.3,3);
	$rate5YrClosed=number_format(PRIME_RATE +.4,3);
	$rate1YrClosed=number_format(PRIME_RATE,3);
?>

<h4 class="title">Mortgage Rates</h4>

<?php

	//This is the code that says whatever the prime rate for the Bank of Brandon is at the time
	echo ('<h3>Today\'s Prime Rate for Bank of Brandon is ' . number_format(PRIME_RATE,3) . '%</h3>'); 

?>

<table class="rates">
	<tr>
		<td>
		
		</td>
		<td>
			Posted Rates
		</td>
	</tr>
	<tr>
		<td>
			Variable Rate
		</td>
		<td>
			
		</td>
	</tr>
	<tr>
		<td>
			1 Year (Open)
		</td>
		<td>
			<?php echo $rate1YrOpen . '%'; ?>
		</td>
	</tr>
	<tr>
		<td>
			5 Year (Closed)
		</td>
		<td>
			<?php echo $rate5YrClosed . '%'; ?>
		</td>
	</tr>
	<tr>
		<td>
			1 Year (Closed)
		</td>
		<td>
			<?php echo $rate1YrClosed . '%'; ?>
		</td>
	</tr>
</table>
<p>
	<b>*These rates can change at anytime*</b>
</p>
<?php 

	//This the PHP include for the footer
	include ('includes/footer.php');

?>