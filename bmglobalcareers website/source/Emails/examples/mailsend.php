<?php
/**
 * This example shows sending a message using a local sendmail binary.
 */

require '../PHPMailerAutoload.php';
require 'config.php';

$emailsent345 = 'sagar8446gupta@gmail.com';
//Create a new PHPMailer instance
$mail = new PHPMailer;
// Set PHPMailer to use the sendmail transport
$mail->isSendmail();
//Set who the message is to be sent from
$mail->setFrom('info@letztravel.net', 'Letz Travel World');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($emailsent345, '');
//Set the subject line
$mail->Subject = 'Welcome To Letz Travel World Family';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

ob_start(); //STARTS THE OUTPUT BUFFER
include('welcomeMail.php');  //INCLUDES YOUR PHP PAGE AND EXECUTES THE PHP IN THE FILE
$some_page_contents = ob_get_contents() ;  //PUT THE CONTENTS INTO A VARIABLE
ob_clean();  //CLEAN OUT THE OUTPUT BUFFER




$mail->Body = $some_page_contents;
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('LetzTravel-HappyDiwali2018.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    echo "<br>";
}
