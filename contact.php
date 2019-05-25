<?php 

    session_start(); // Start the session.

	//This is the PHP include
	$pageTitle = 'Contact';
	include ('includes/header.php');

	//This is some of the code that makes the form work
	$action=@$_REQUEST['action']; 
	if ($action=="")
    	{ 
?> 
<p style="margin-top:70px;">
	Please fill out the form below to contact us. We will be in contact with you as soon as possible. Thank you.
</p>
<div class="emailform">
	<form action="contact.php" method="POST" enctype="multipart/form-data">
    	<input type="hidden" name="action" value="submit">
    	Your name:
    	<br>
    	<input name="name" type="text" value="" size="30"><br>
    	Your email:
    	<br>
    	<input name="email" type="text" value="" size="30"><br>
    	Your message:
    	<br>
    	<textarea name="message" rows="7" cols="30"></textarea><br>
    	<input type="submit" value="Send email">
    </form>
    <div id="window-resizer-tooltip">
    	<a href="http://www.123contactform.com/download/Simple-PHP-contact-form-script.php#" title="Edit settings"></a>
    	<span class="tooltipTitle">Window size: </span><span class="tooltipWidth" id="winWidth"></span> x <span class="tooltipHeight" id="winHeight"></span><br><span class="tooltipTitle">Viewport size: </span><span class="tooltipWidth" id="vpWidth"></span> x <span class="tooltipHeight" id="vpHeight"></span>
    </div>
</div>
<h6>
    To insert a help desk ticket click on the envelope. &rarr;
</h6>
<div class="contacticon">
    <a href="invoices.php"><img src="imgs/contact.png" alt="Contact" width="50px;"></a>
</div>
<?php 
//This is the rest of the code that makes the form work
    }  
else
    { 
    $name=$_REQUEST['name']; 
    $email=$_REQUEST['email']; 
    $message=$_REQUEST['message']; 
    if (($name=="")||($email=="")||($message=="")) 
        { 
        echo "All fields are required, please fill <a href=\"\">the form</a> again."; 
        } 
    else{         
        $from="From: $name<$email>\r\nReturn-path: $email"; 
        $subject="Message sent using your contact form on Bank of Brandon"; 
        mail("campbellm7293@assiniboine.net", $subject, $message, $from); 
        echo "Email sent!"; 
        } 
    }

	//This the PHP include for the footer
	include ('includes/footer.php');
?>