<?php 
include('Crypto.php');
include_once 'dbconnect.php';
require_once("phpmailer/PHPMailerAutoload.php");
?>
<?php

	error_reporting(0);
	
	$workingKey='';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{
		
		
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$mail->Host = 'focus.superdnssite.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 465;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'ssl';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "noreply@abhaya.org.in";

		//Password to use for SMTP authentication
		$mail->Password = "@bhay@20!7";

		//Set who the message is to be sent from
		$mail->setFrom('noreply@abhaya.org.in', 'no-reply');

		//Set an alternative reply-to address
		//$mail->addReplyTo('replyto@example.com', 'First Last');

		//Set who the message is to be sent to
		$mail->addAddress($email, $firstname);

		//Set the subject line
		$mail->Subject = 'Donation Recieved - #'.$txnid;

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//~ $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

		//Replace the plain text body with one created manually
		$mailContent = 'Thanks for showing interest in our foundation. We had recieved donations on the name of <b>'.$firstname.' '.$lastname.'</b>.<br/> <br/> <br/> <b>Here are the donation details as follows:</b><br/>';
		$mailContent .= 'Amount Donated: '.$amount."<br/>";
		$mailContent .= 'Mode of Payment: '.$mode."<br/>";
		$mailContent .= 'Payment made on: '.$initiated_on."<br/>";
		$mailContent .= 'Paid with bank: '.$bankcode."<br/>";
		$mailContent .= 'Bank Transaction ID: '.$bank_ref_num."<br/>";
		$mail->Body  = $mailContent;
		$mail->AltBody = $mailContent;

		//Attach an image file
		//~ $mail->addAttachment('images/phpmailer_mini.png');

		//send the message, check for errors
		if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
		}
		echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		
	}
	else if($order_status==="Aborted")
	{
		echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($order_status==="Failure")
	{
		echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
?>
