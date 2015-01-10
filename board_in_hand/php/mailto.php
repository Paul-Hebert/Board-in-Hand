<?php
	include '../../cheatsheet2.php';

	require 'PHPMailer/PHPMailerAutoload.php';

	$tooLarge = false;

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'p3plcpnl0888.prod.phx3.secureserver.net;p3plcpnl0888.prod.phx3.secureserver.net';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'paul.hebert@paulhebertdesigns.com';                 // SMTP username
	$mail->Password = $emailPass;                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->From = $_POST['email'];
	$mail->FromName = $_POST['name'];
	$mail->addAddress('paul.hebert@paulhebertdesigns.com', 'Paul Hebert');     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo($_POST['email'], $_POST['name']);
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
	    if ($_FILES['attachment']['size'] < 1048576){	
	    	$mail->AddAttachment($_FILES['attachment']['tmp_name'],$_FILES['attachment']['name']);
	    } else{
	    	$tooLarge = true;
	    }
	}

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $_POST['subject'] . ' -- ' . $_POST['name'];
	$mail->Body    = $_POST['message'];
	$mail->AltBody = $_POST['message'];

	if ($tooLarge){
		header("Location: " . $_GET['url'] . 'err=size');
		die();
	} else{
		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    header("Location: http://boardinhand.com/contact_thanks.php");
			die();
		}
	} 
?>

<script>
/*window.location = '../contact_thanks.php';*/
</script>