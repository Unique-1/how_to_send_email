<?php
	// Import PHPMailer classes into the global namespace
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	// include library files
	require 'PHPMailer/Exception.php';
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';

	// create an instance; pass 'true' to enable exception
	$mail = new PHPMailer(true);

	// server settings
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	//this is the email that is sending the message i.e to the recipient, 
	$mail->Username = 'youremailusedforsmtp';
	$mail->Password = 'yourgmailpassword';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;

	// sender ifo
	//the email here is not the one sendng, the second parameter is working with the email in $mail->Username
	$mail->setFrom('kolaolarewaju2@gmail.com', 'Codexworld');

	// Add a recipient
	$mail->addAddress('nelsonreal659@gmail.com');

	// set email format to html
	$mail->isHTML(true);

	// mail subject
	$mail->Subject = 'Email from localhost server';

	// mail body content
	$bodyContent = '
		<h1>Second Email from Localhost</h1>
		<p>This HTML email is sent from the localhost server by <span style="color:red;">CodexWorld.</span>
		</p> 
	';
	$mail->Body = $bodyContent;

	// send email
	if($mail->send()){
		echo 'Message has been sent';
	}else{
		echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	}

?>
