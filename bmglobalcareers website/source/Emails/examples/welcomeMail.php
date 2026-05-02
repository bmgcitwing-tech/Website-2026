<?php 
include ('connection.php');
//echo 'YES';
$qsetting=mysqli_query($conn, "select * from tbl_counselling_appointments order by ban_id desc");
$setting=mysqli_fetch_array($qsetting);
//echo 'yes coming'.print_r($qsetting);
//print_r($setting_r);
//exit;
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Use the latest (edge) version of IE rendering engine -->
<meta name="x-apple-disable-message-reformatting">
<!-- Disable auto-scale in iOS 10 Mail entirely -->
<title>Welcome - [Plain HTML]</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500" rel="stylesheet">
<style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        table table table {
            table-layout: auto;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        *[x-apple-data-detectors],
        /* iOS */
        .x-gmail-data-detectors,
        /* Gmail */
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        img.g-img+div {
            display: none !important;
        }

        /* What it does: Prevents underlining the button text in Windows 10 */
        .button-link {
            text-decoration: none !important;
        }

        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            .email-container {
                min-width: 375px !important;
            }
        }
    </style>
<style>
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }

        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

        /* Media Queries */
        @media screen and (max-width: 480px) {
            .fluid {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }

            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }

            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }

            table.center-on-narrow {
                display: inline-block !important;
            }

            .email-container p {
                font-size: 17px !important;
                line-height: 22px !important;
            }
        }
    </style>
</head>
<body width="100%" bgcolor="#F1F1F1" style="margin: 0; mso-line-height-rule: exactly;">
<center style="width: 100%; background: #F1F1F1; text-align: left;">
  <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;"> (Optional) This text will appear in the inbox preview, but not the email body. </div>
  <div style="max-width: 680px; margin: auto;" class="email-container">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;" class="email-container">
      <tr>
        <td bgcolor="#fbbd18"><table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
              <td style="padding: 30px 40px 30px 40px; text-align: center;"><span style="color:#fff; font-size: 30px"><img src="https://www.wmpl.live/bmglobal/images/new_logo.PNG" height="150"></span> </td>
            </tr>
          </table></td>
      </tr>
      
      
      <!-- INTRO : END -->
      <!-- CTA : BEGIN -->
      <tr align="justify">
        <td bgcolor="#000000"><table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
              <td style="padding: 40px 40px 5px 40px; text-align: justify;"><h2 style="margin: 0; font-family: 'Montserrat', sans-serif; font-size: 15px; line-height: 24px; color: #ffffff; font-weight: bold;">Hi, <?php echo $setting['name']; ?> <br> New User Enrolled For Appointment <br><br>  Counselling Center : <b style="text-decoration:none;"><?php echo $setting['center_id']; ?></b>  <br><br>  Counselling Timing : <b><?php echo $setting['timiings']; ?>&nbsp;&nbsp;<?php echo str_replace("^","'",$setting['duration']); ?></b> 
              <br><br>  Person Name : <b><?php echo $setting['person_name']; ?></b> 
              
             <br><br>  Person Email : <b><?php echo $setting['person_email']; ?></b> 
              
              
              <br><br>  Person Phone : <b><?php echo $setting['person_phone']; ?></b> 
              
              <br><br>  Date Of Appointment : <b><?php echo date("d M Y", strtotime($setting['date_of_selection'])); ?></b> 
              <br><br>
              </h2></td>
            </tr>
            
            <tr>
              <td valign="middle" align="center" style="text-align: center; padding: 0px 20px 40px 20px;"><!-- Button : BEGIN -->
                <table role="presentation" align="center" cellspacing="0" cellpadding="0" border="0" class="center-on-narrow">
                  <tr>
                    <td style="border-radius: 50px; background: #ffffff; text-align: center;" class="button-td"><a href="https://www.wmpl.live/bmglobal/" style="background: #ffffff; border: 15px solid #ffffff; font-family: 'Montserrat', sans-serif; font-size: 14px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 50px; font-weight: bold;" class="button-a"> <span style="color:#26a4d3;" class="button-link">&nbsp;&nbsp;&nbsp;&nbsp;visit Website&nbsp;&nbsp;&nbsp;&nbsp;</span> </a> </td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
      
    </table>
  </div>
</center>
</body>
</html>

