<?php
error_reporting(0);

 
$to    = "admission@bodkesclasses.in"; 
$server_email = 'pratik@bodkesclasses.in';  // server mail

 
$name     = $_POST["first_name"];
$email    = $_POST["email"];
$website  = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$website = dirname($website); 

if (isset($email) && isset($name)) {

	$subject  = "New Application from $name"; // <--- Contact for Subject here.
 
	$msg      = 'Hello Admin, <br/> <br/> Here are the application details:';
	$msg     .= ' <br/> <br/> <table border="1" cellpadding="6" cellspacing="0" style="border: 1px solid  #eeeeee;">';
	foreach ($_POST as $label => $value) {
	    $msg .= "<tr><td width='100'>". ucfirst($label) . "</td><td width='300'>" . $value . " </tr>";
	}
	$msg      .= " </table> <br> --- <br>This e-mail was sent from $website";
 


date_default_timezone_set('Etc/UTC');

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->setFrom($server_email, $name);

$mail->addReplyTo($email, $name);

$mail->addAddress($to);

$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $msg;


if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "success";
}
 

} 

 

?>