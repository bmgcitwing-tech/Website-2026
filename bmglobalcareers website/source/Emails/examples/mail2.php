<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

require '../PHPMailerAutoload.php';
//require 'emailsformat/Config/config.php';
$emailsent = $_GET['email'];
$idIndiviual = $_GET['idIndiviual'];
// finding up line



//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('admin@draftmycv.com', 'DraftMyCV');
$mail->AddCC('admin@draftmycv.com', 'DraftMyCV - Admin'); 
//Set an alternative reply-to address
//print_r($gettingupLine);
//exit;
//Set who the message is to be sent to
$mail->addAddress($emailsent, '');
//Set the subject line
$mail->Subject = 'Your DraftMyCV.com order !!';
//Read an HTML message body from an external file, convert referenced images to embedded,

//echo 'http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/welcomeMail.php?idemail='.$emailsent.'';
//exit;

ob_start(); //STARTS THE OUTPUT BUFFER
$_GET['idemail'] = $emailsent;

if(isset($idIndiviual) && !empty($idIndiviual))
{
include('invoice.php'); 
}else{
 include('invoiceEmail.php');    
}
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
//$mail->addAttachment('Invoice Format_Draftmycv.pdf');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    ?>
    <script>alert('Invoice Email sent successfully! check your email for more details');</script>
  <script>
        window.location = "https://draftmycv.com/index.php";
</script>
  
    <?php echo "Message sent!";
}
