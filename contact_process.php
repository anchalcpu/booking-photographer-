<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "vendor1/autoload.php";

    $from = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $number = $_POST['number'];
    $cmessage = $_POST['message'];

	$emailid = 'anchalchaudhary00@gmail.com';
	$mail = new PHPMailer(true); 


    $logo = '../img/logo.png';
    $link = '#';
	try { 
		$mail->isSMTP();                                             
	
		$mail->SMTPDebug = 2;                                        
		$mail->Host       = 'mail.honeymooniq.in';   
		$mail->Port       = 587;                     
		$mail->SMTPAuth   = true;                              
		 $mail->Username   = 'noreply@honeymooniq.in';                  
		$mail->Password   = 'Panipat@123';                         
		$mail->SMTPSecure = 'tls';                               
	  
		$mail->setFrom('noreply@honeymooniq.in', 'contact Form');
		$mail->addAddress($emailid, $name);     // Add a recipient
	
		$mail->isHTML(true);                                   
		$mail->Subject = $subject; 
	
	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";
	$mail->Body =  html_entity_decode($body);

	$mail->send();
	$message="MAil Send";
}
	catch(Exception $e){
		$message= "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 

	}
?>