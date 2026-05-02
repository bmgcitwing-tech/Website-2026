<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */

require '../PHPMailerAutoload.php';
require 'config.php';
  $userLoggedIN = mysql_query("SELECT * FROM promotional_emails ORDER BY   mail_id DESC LIMIT 0, 1");
	// echo "SELECT * FROM member_details WHERE email = '".$_GET['idemail']."' ORDER BY  member_id DESC LIMIT 0, 1";
	 //exit;
	  $fetch = mysql_fetch_array($userLoggedIN);
	$subject = $fetch['subject'];
	//$emailAttachments = explode('=>', $fetch['attachments']);
	//$destination_array = explode(',', $string_version)
	
 $lastListMembers = mysql_query("SELECT * FROM member_details ORDER BY `member_id` ASC ");
 while($row232 = mysql_fetch_array($lastListMembers))
 {
$emailsent345 = $row232['email'];
//$emailsent345 = 'sagar456gupta@gmail.com';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('info@letztravel.net', 'Letz Travel World');
//Set an alternative reply-to address
//$mail->addReplyTo('admin@letztravel.net', 'Admin');
//$mail->AddCC('admin@letztravel.net', 'Admin'); 
//$mail->AddCC('Ayush.consultancy1@gmail.com', 'Franchisee'); 
//Set who the message is to be sent to
$mail->addAddress($emailsent345, 'Letz Travel Member');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,

//echo 'http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/PromotionMail.php';
//exit;
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/PromotionMail.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
/*if(!empty($emailAttachments))
{
    foreach($emailAttachments as $row) 
	{	
     $mail->addAttachment('http://letztravel.net/indiaTour/Admin/Application/'.$row.'');
  }
} */
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    ?>
   
    <?php echo "Message sent!";
}

}


// sending emails to referees	
 $lrefer_friendsListMembers = mysql_query("SELECT * FROM refer_friends ORDER BY memberID ASC ");
 while($row456 = mysql_fetch_array($lrefer_friendsListMembers))
 {
$emailsent = $row456['friendsEmail'];
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('info@letztravel.net', 'Letz Travel World');
//Set an alternative reply-to address
//$mail->addReplyTo('admin@letztravel.net', 'Admin');
//$mail->AddCC('admin@letztravel.net', 'Admin'); 
//$mail->AddCC('Ayush.consultancy1@gmail.com', 'Franchisee'); 
//Set who the message is to be sent to
$mail->addAddress($emailsent, 'Letz Travel Member');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,

//echo 'http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/PromotionMail.php';
//exit;
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/PromotionMail.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//Attach an image file
if(!empty($emailAttachments))
{
    foreach($emailAttachments as $row) 
	{	
     $mail->addAttachment('http://letztravel.net/indiaTour/Admin/Application/'.$row.'');
  }
}

//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    ?>
   
    <?php echo "Message sent!";
}

}
?>
<script>alert("EMail Has Been Sent Sucsessfully To All Members");</script>
<script>window.location='http://letztravel.net/indiaTour/Admin/Application/promotional_email.php';</script>
