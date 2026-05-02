<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

require '../PHPMailerAutoload.php';
//require 'emailsformat/Config/config.php';


$emailsent = 'ColourGems@gmail.com';
// finding up line



//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('admin@ColourGems.com', 'ColourGems');
//Set an alternative reply-to address
//print_r($gettingupLine);
//exit;
//Set who the message is to be sent to
$mail->addAddress($emailsent, '');
//Set the subject line
$mail->Subject = 'ColourGems | ADMIN OTP TO VERFIY  !!!';
//Read an HTML message body from an external file, convert referenced images to embedded,

//echo 'http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/welcomeMail.php?idemail='.$emailsent.'';
//exit;

ob_start(); //STARTS THE OUTPUT BUFFER
$_GET['idemail'] = $emailsent;
include('mail444.php');  //INCLUDES YOUR PHP PAGE AND EXECUTES THE PHP IN THE FILE
$some_page_contents = ob_get_contents() ;  //PUT THE CONTENTS INTO A VARIABLE
ob_clean();  //CLEAN OUT THE OUTPUT BUFFER
$mail->Body = $some_page_contents;


//convert HTML into a basic plain-text alternative body
//$mail->IsHTML(true);
//$mail->msgHTML(file_get_contents('http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/welcomeMail.php?idemail='.$emailsent.''), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//$mail->addAttachment('E Book - Your CV.pdf');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    ?>
   <script>alert('You have registered successfully! Now you can login');</script>
  
    <?php echo "Message sent!";
}
