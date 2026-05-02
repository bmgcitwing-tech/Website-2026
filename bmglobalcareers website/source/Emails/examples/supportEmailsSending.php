<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

require '../PHPMailerAutoload.php';
require 'config.php';
  
$emailsent345 = $_GET['emailID'];

//echo $emailsent345;
//exit;

$supportID = $_GET['support_id'];

$subject = 'Reply From Letz Travel World Support Team';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('info@letztravel.net', 'Letz Travel World Support Team');
//Set an alternative reply-to address
//$mail->addReplyTo('admin@letztravel.net', 'Admin');
//$mail->AddCC('admin@letztravel.net', 'Admin'); 
$mail->AddCC('Ayush.consultancy1@gmail.com', 'Franchisee'); 
//Set who the message is to be sent to
$mail->addAddress($emailsent345, 'Letz Travel Member');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,

//echo 'http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/PromotionMail.php';
//exit;
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/mailFormatForSupport.php?id='.$supportID.''), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    ?>
   
    <?php echo "Message sent!";
}


?>

<script>alert("Reply  Has Been Sent Sucsessfully To  Member");</script>
<script>window.location='http://letztravel.net/indiaTour/Admin/Application/supportView.php';</script>
