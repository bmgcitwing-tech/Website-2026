<?php


	$to = $_POST['person_email'];
	$subject = "Contact Mail from BM Global Careers";

	$message = '<html><body><b>Dear (Candidate '.$_POST['person_name'].'),<br></b><p>Thank you for contacting BM Global Careers.<br/>Please accept this standard response as notification of receipt of your booking with us.<br/>You will be speaking with one of our counsellors on your scheduled appointment. <br/>Meanwhile, if you would like to know more interesting facts about studying in the UK, please visit the website http://bmglobalcareers.com/videos.php or http://youtube.com/britainilmaduraikaran</p><p>Looking forward to speak to you! </p><div><img src="http://bmglobalcareers.com/images/new_logo.PNG" style="width:150px;height:auto;"></div><div><p>Vijay Senthilvel BE, MS (MBS UK),<br>Managing Director<br>Manchester, UK</p></div></body></html>';

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <admissions@bmglobalcareers.com>' . "\r\n";
	//$headers .= 'Cc: myboss@example.com' . "\r\n";

	$result = mail($to,$subject,$message,$headers);
	//$result=1;
	
$json = array("op" =>$result);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json); 
				
?>