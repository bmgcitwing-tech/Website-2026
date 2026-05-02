<?php 
	 include('Config/config.php');
	 
	 
	 //echo $_GET['idemail'];
       // exit;

	 $userLoggedIN = mysql_query("SELECT * FROM member_details  ORDER BY  member_id DESC LIMIT 0, 1");
	// echo "SELECT * FROM member_details WHERE email = '".$_GET['idemail']."' ORDER BY  member_id DESC LIMIT 0, 1";
	 //exit;
	  $fetch = mysql_fetch_array($userLoggedIN);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
<head>
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--fgmgMediaReplacePlaceholder-->
<meta name="robots" content="noindex, nofollow">
<meta charset="UTF-8">
<title>Preview</title>
</head>
<body align="center" style="-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; background: #eddda5; box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; height: 100%; line-height: 1.7; margin: 0; padding: 0; width: 100% !important" bgcolor="#eddda5">
<style type="text/css">
	img {
	max-width: 100%; display: block;
	}
	body {
	-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.7;
	}
	body {
	background-color: #01191D;
	}
	.ExternalClass {
	width: 100%;
	}
	body {
	background-color: #eddda5;
	
	}
	</style>
<table class="body-wrap" style="background: #eddda5; box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word; border:1px solid; border-radius:5px;" bgcolor="#eddda5" align="center">
  <tbody>
    <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
      <td style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top" valign="top" align="center"><table style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
          <tbody>
            <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
              <td class="container" style="box-sizing: border-box; clear: both !important; display: block !important; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0 auto; max-width: 600px !important; padding: 0; vertical-align: top" width="600" valign="top"><div class="content" style="box-sizing: border-box; display: block; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0 auto; max-width: 600px; padding: 20px">
                  <table class="main" style="background: #FFFFFF; box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
                    <tbody>
                      <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                        <td class="aligncenter" style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; text-align: center; vertical-align: top" valign="top" align="center"><div style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0" align="center"><img src="http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/headerImages.jpg" style="box-sizing: border-box; display: block; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; max-width: 100%; padding: 0" width="560"></div></td>
                      </tr>
                      <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                        <td class="content-wrap" style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 20px 20px; vertical-align: top" valign="top"><table style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                              <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                <td class="content-block" style="box-sizing: border-box; color: #545454; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0; vertical-align: top" valign="top"><h1 style="box-sizing: border-box; color: rgb(63, 63, 63); font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 28px; font-weight: bold; line-height: 1.7; margin: 0; padding: 0">Welcome To Letz Travel Family</h1></td>
                              </tr>
                              <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                <td style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top" width="514" valign="top"><table style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0" width="100%" cellspacing="0" cellpadding="0">
                                    <tbody>
                                      <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                        <td class="content-block-grid grid-left" style="box-sizing: border-box; color: #545454; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 20px 20px 0; vertical-align: top" width="50%" valign="top"> Dear <b><?php echo $fetch['name']; ?></b> ,</br>
                                          </br>
                                         
                                         Your Registration for Membership has been done Successfully.</td>
                                        <td class="content-block-grid grid-right aligncenter" style="box-sizing: border-box; color: #545454; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0 20px 20px; text-align: center; vertical-align: top" width="50%" valign="top" align="center"><div style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0" align="center"><img src="http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/logoimage.jpg" style="box-sizing: border-box; display: block; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; max-width: 100%; padding: 0" width="340"></div></td>
                                      </tr>
                                    </tbody>
                                  </table></td>
                              </tr>
                              <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                <td align="" class="content-block" style="box-sizing: border-box; color: #545454; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0; vertical-align: top" valign="top"> Your Login details for access your back office <br>Login ID  &nbsp; <b><?php echo $fetch['memberID']; ?></b>&nbsp;&nbsp; Login Password   <b><?php echo $fetch['password']; ?></b>.<br> Transaction Password  <b><?php echo $fetch['transaction_password']; ?></b>. <br> Sponser Name  <b><?php echo memberFullName($fetch['sponser_id']); ?></b>.&nbsp;&nbsp; Sponser Cell No  <b><?php echo memberPhone($fetch['sponser_id']); ?></b><br>
                                Sponser Email ID  <b><?php echo memberEmailDetails($fetch['sponser_id']); ?></b>
                                </td>
                              </tr>
                              <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                <td class="content-block aligncenter" style="box-sizing: border-box; color: #545454; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0; text-align: center; vertical-align: top" valign="top" align="center"><a href="http://letztravel.net/indiaTour/Application/booking_innovice_email.php?id=<?php echo $fetch['memberID']; ?>" target="_blank" class="btn-primary btn-block" style="background: #fe8f3d; border-radius: 5px; box-sizing: border-box; color: #FFFFFF; cursor: pointer; display: block; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-weight: bold; line-height: 2; margin: 0; padding: 10px 25px; text-align: center; text-decoration: none">View Your Invoice Details </a><a href="http://letztravel.net/" target="_blank" class="btn-primary btn-block" style="background: #669999; border-radius: 5px; box-sizing: border-box; color: #FFFFFF; cursor: pointer; display: block; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-weight: bold; line-height: 2; margin: 0; padding: 10px 25px; text-align: center; text-decoration: none">Access Website </a></td>
                              </tr>
                            </tbody>
                          </table></td>
                      </tr>
                      <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                        <td class="aligncenter" style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; text-align: center; vertical-align: top" valign="top" align="center"><div style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0" align="center"><img src="http://letztravel.net/indiaTour/Application/Emails/PHPMailer/examples/emailsformat/Welcomeletter_footer.jpg" style="box-sizing: border-box; display: block; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; max-width: 100%; padding: 0" width="560"></div></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="footer dark" style="box-sizing: border-box; clear: both; color: #999; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 20px 0; width: 100%">
                    <table style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0" width="100%">
                      <tbody>
                        <tr style="box-sizing: border-box; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                          <td class="aligncenter footer-td" style="box-sizing: border-box; color: #FFFFFF; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 20px; text-align: center; vertical-align: top" valign="top" align="center"><p class="unsubscribe" style="box-sizing: border-box; color: #111111; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: normal; line-height: 1.7; margin: 0; padding: 0"><img src="http://track8.fgmail3.com/mailget/email_tracker/open_track?temp_id=Ijc0NjIi&amp;email_id=mailget_email_id_replace&amp;s_id=mailget_s_id_replace&amp;server=replace_smtp_server&amp;type=replace_drip_type" style="box-sizing: border-box; display: block; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; max-width: 100%; opacity: 0; padding: 0" width="1" height="1" border="0"></p>
                            <p class="powered" style="box-sizing: border-box; color: #111111; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: bold; line-height: 1.7; margin: 0; padding: 0; text-transform: uppercase"></p></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
