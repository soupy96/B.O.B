<?php 

	session_start(); // Start the session.

	//This is the PHP include
	$pageTitle = 'Mortgage';
	include ('includes/header.php'); 
?>
<h4 class="titletwo">Mortgage Calculator</h4>
<?php

$DisplayForm = TRUE;
$m = "";
$p = "";
$i = "";
$n = "";
$y = "";

if (isset($_POST['Submit'])) {
	$_POST['principal'] = trim($_POST['principal']);
	$_POST['rate'] = trim($_POST['rate']);
	$_POST['years'] = trim($_POST['years']);

	if(is_numeric($_POST['principal']) && is_numeric($_POST['rate']) && is_numeric($_POST['years']) && ($_POST['years']) != 0) {
	$p = $_POST['principal'];
	$i = (($_POST['rate'])/100) / 12;
	$n = $_POST['years'] * 12;
	$top = $p*$i*(pow(1+$i,$n));
	$bottom = (pow(1+$i,$n))-1;
	$m = $top / $bottom;
	$DisplayForm = FALSE;
	} else {
	echo "<p><span style='color:red;font-weight:bold;'>You need to enter numeric values greater than zero.</span></p>\n";
	$DisplayForm = TRUE;
	}
}

if($DisplayForm) {
?>
<form name="mortgageForm" action="mortgagecalc.php" method="post">
	<feildset style="width: 25%;">
		<legend>Find Your Monthly Payment Below</legend>
		<p>Principal Amount $: <input type="text" name="principal" id="principal" value="<?php if (isset($_POST['Submit'])) echo $_POST['principal']; ?>" /> </p>
		<p>Interest Rate %: <input type="text" name="rate" id="rate" value="<?php if(isset($_POST['Submit'])) echo $_POST['rate']; ?>" /> </p>
		<p>Length in Years: <input type="text" name="years" id="years" value="<?php if (isset($_POST['Submit'])) echo $_POST['years']; ?>" /></p>
		<p><input type="reset" value="Clear Form" id="clear" />&nbsp; &nbsp;<input type="submit" name="Submit" value="Send Form" /> </p>
	</feildset>
</form>

<?php 
echo "<span style='background-color:#000000;padding-top:3px;padding-bottom:3px;margin-left:540px;'<p><a href=\"mortgagecalc.php\">Try again?</a></p>\n";
}
else {
	echo "<p>Thank you for using the BOB Mortgage Calculator.</p>";
	echo "<h5>Your monthly payments would approximately be: <span style='color:blue,font-weight:bold;'>$". number_format($m,2). "</span></h5>";
	echo "<span style='background-color:#000000;padding-top:3px;padding-bottom:3px;margin-left:540px;'<p><a href=\"mortgagecalc.php\">Try again?</a></p>\n";
}
?>
<script type="text/javascript">
	function blank () {
		document.getElementById("principal").value = "";
		document.getElementById("rate").value = "";
		document.getElementById("years").value = "";
	}
	document.getElementById("clear").onclick = blank;
</script>
<?php 

	//This the PHP include for the footer
	include ('includes/footer.php');

?>