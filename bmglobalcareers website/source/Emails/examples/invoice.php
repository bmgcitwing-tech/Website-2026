<?php 

 
@ob_start();
include ('config.php');
$qsetting=mysqli_query($conn,"select * from orders ORDER BY  id DESC");
$setting=mysqli_fetch_array($qsetting);
$cartitems = $setting['pid'];
$servicesitems = $setting['combo'];
$discount_applied = $setting['discount_applied'];

$mainItemsArray = array();
// applying gst 

if($setting['state'] == 'Haryana')
{
    $active9percent = 1;
}else{
    $active9percent = 0;
}

//print_r($setting);
//echo 'YES'.$servicesitems;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html style="width:100%;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta name="x-apple-disable-message-reformatting">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="telephone=no" name="format-detection">
<title>New email template 2019-08-08</title>
<!--[if (mso 16)]>    <style type="text/css">    a {text-decoration: none;}    </style>    <![endif]-->
<!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
<!--[if !mso]><!-- -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
<!--<![endif]-->
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<style type="text/css">
@media only screen and (max-width:900px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:32px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:32px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-menu td a { font-size:16px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:inline-block!important } a.es-button { font-size:16px!important; display:inline-block!important; border-width:15px 30px 15px 30px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:1200px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } .es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }
#outlook a {
	padding:0;
}
.ExternalClass {
	width:100%;
}
.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
	line-height:100%;
}
.es-button {
	mso-style-priority:100!important;
	text-decoration:none!important;
}
a[x-apple-data-detectors] {
	color:inherit!important;
	text-decoration:none!important;
	font-size:inherit!important;
	font-family:inherit!important;
	font-weight:inherit!important;
	line-height:inherit!important;
}
.es-desk-hidden {
	display:none;
	float:left;
	overflow:hidden;
	width:0;
	max-height:0;
	line-height:0;
	mso-hide:all;
}
</style>
</head>
<body style="width:100%;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
<div class="es-wrapper-color" style="background-color:#EEEEEE;">
  <!--[if gte mso 9]><v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t"><v:fill type="tile" color="#eeeeee"></v:fill></v:background><![endif]-->
  <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;">
    <tr style="border-collapse:collapse;">
      <td valign="top" style="padding:0;Margin:0;"><table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
          <tr style="border-collapse:collapse;"> </tr>
          <tr style="border-collapse:collapse;">
            <td align="center" style="padding:0;Margin:0;"><table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="900" cellspacing="0" cellpadding="0" align="center">
                <tr style="border-collapse:collapse;">
                  <td align="left" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:15px;padding-bottom:15px;"><!--[if mso]><table width="580" cellpadding="0" cellspacing="0"><tr><td width="282" valign="top"><![endif]-->
                    <!--[if mso]></td><td width="20"></td><td width="278" valign="top"><![endif]-->
                    <!--[if mso]></td></tr></table><![endif]-->
                  </td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
          <tr style="border-collapse:collapse;"> </tr>
          <tr style="border-collapse:collapse;">
            <td align="center" style="padding:0;Margin:0;"><table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#044767;" width="900" cellspacing="0" cellpadding="0" bgcolor="#044767" align="center">
                <tr style="border-collapse:collapse;">
                  <td align="left" style="Margin:0;padding-top:35px;padding-bottom:35px;padding-left:35px;padding-right:35px;"><!--[if mso]><table width="530" cellpadding="0" cellspacing="0"><tr><td width="340" valign="top"><![endif]-->
                    <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;">
                      <tr style="border-collapse:collapse;">
                        <td class="es-m-p0r es-m-p20b" width="340" valign="top" align="center" style="padding:0;Margin:0;"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                            <tr style="border-collapse:collapse;">
                              <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;font-size:36px;font-style:normal;font-weight:bold;color:#FFFFFF;">Draft My CV</h1></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <!--[if mso]></td><td width="20"></td><td width="170" valign="top"><![endif]-->
                    <table cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                      <tr class="es-hidden" style="border-collapse:collapse;">
                        <td class="es-m-p20b" width="170" align="left" style="padding:0;Margin:0;"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                            <tr style="border-collapse:collapse;">
                              <td align="center" style="padding:0;Margin:0;padding-bottom:5px;"><table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                  <tr style="border-collapse:collapse;">
                                    <td style="padding:0;Margin:0px;border-bottom:1px solid #044767;background:rgba(0, 0, 0, 0) none repeat scroll 0% 0%;height:1px;width:100%;margin:0px;"></td>
                                  </tr>
                                </table></td>
                            </tr>
                            <tr style="border-collapse:collapse;">
                              <td style="padding:0;Margin:0;"><table cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                  <tr style="border-collapse:collapse;">
                                    <td align="left" style="padding:0;Margin:0;"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                          <td align="right" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:11px;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#FFFFFF;"><a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;font-size:13px;text-decoration:none;color:#FFFFFF;line-height:22px;" href="https://viewstripo.email/"><i>Get your smart resume now</i></a></p></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                  </td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
          <tr style="border-collapse:collapse;">
            <td align="center" style="padding:0;Margin:0;"><table class="es-content-body" width="900" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                <tr style="border-collapse:collapse;">
                  <td align="left" style="padding:0;Margin:0;padding-left:35px;padding-right:35px;padding-top:40px;"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                      <tr style="border-collapse:collapse;">
                        <td width="530" valign="top" align="center" style="padding:0;Margin:0;"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                            <tr style="border-collapse:collapse;">
                              <div class="invoice-box">
                                <div align="center" class="heading">
                                  <table cellpadding="0" cellspacing="0">
                                    <tr>
                                      <h1><b>DraftMyCV.com</b> </h1>
                                      <h2> Managed by : m & a consultants<br>
                                        Regd. Office: 486, Sector-27, Gurgaon-122009, India<br>
                                        GSTIN : 06ABSPC4191M1Z8<br>
                                      </h2>
                                    </tr>
                                    <tr class="heading">
                                      <td class="title">Website : www.draftmycv.com </td>
                                      <td class="title">&nbsp;</td>
                                      <td colspan="3"> Email : customercare@draftmycv.com</td>
                                    </tr>
                                    <tr>
                                      <td class="title">&nbsp;</td>
                                      <td class="title">&nbsp;</td>
                                      <td class="title"></td>
                                      <td class="title"></td>
                                      <td colspan="2">Original for recepient</td>
                                    </tr>
                                    <tr style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#044767; color:#fff;">
                                      <td align="center" colspan="5"><b>Tax Invoice</b> </td>
                                    </tr>
                                  </table>
                                </div>
                                <table cellpadding="0" cellspacing="0">
                                  <tr class="top">
                                    <td colspan="1"><table>
                                        <tr>
                                          <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px;"> Invoice No #: <b><?php echo $setting['invoiceNO'].$setting['id'];?></b><br>
                                            Invoice date: <?php echo date('d-m-Y', strtotime($setting['date'])); ?><br>
                                            Reverse Charge (Y/N) : N<br>
                                            State : HARYANA<br>
                                            Country : INDIA<br>
                                          </td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                  <tr class="information">
                                    <td colspan="1"><table>
                                        <tr>
                                          <td style="color:#330066; font-family:Verdana, Arial, Helvetica, sans-serif; font-stretch:expanded;"><u><b> Details of Service Receiver (Bill To)</b></u><br>
                                            <br>
                                            Name: <?php echo $setting['name']; ?><br>
                                            Address : <?php echo $setting['address']; ?>, <?php echo $setting['city']; ?><br>
                                            State : <?php echo $setting['state']; ?><br>
                                            Country : INDIA<br>
                                            GSTIN: ---<br>
                                            TRXN NO : <?php echo $setting['tid']; ?><br>
                                            Mob no : <?php echo $setting['phone']; ?><br>
                                            Email id : <?php echo $setting['email']; ?></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table>
                                <br>
                                <table id="customers">
                                  <tr align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#044767; color:#fff;">
                                    <th>Sr. NO.</th>
                                    <th>HSN/SAC</th>
                                    <th>Name of Services Supplied</th>
                                    <th>Total Value</th>
                                    <th>Discount</th>
                                    <th>Net Value</th>
                                    <th colspan="2">SGST 9% CGST 9% FOR WITH IN STATE</th>
                                    <th>IGST 18% FOR INTERSTATE</th>
                                    <th>Total</th>
                                  </tr>
                                  <?php
                      
                        //echo sort($com);
						//exit;
						$count = 0;
						$mainTotal = 0;
						$mainNetValue = 0;
						$mainGrandTotal = 0;
						$gsttotal = 0;
						$gsttotal11 = 0;
						if(empty($cartitems))
						{
						$cartitems = $setting['combo'];
						}
						//$mainPriceArray = array();
						//$mainItemsArray = explode("##",$cartitems); 
						//$mainPriceArray = explode("##",$setting['pricedetails']); 
						//print_r($mainItemsArray);
						//$cartitems = rtrim($cartitems, ',');
                        $getcosdswemf=mysqli_query($conn,"SELECT * FROM category where id IN(".$cartitems.") ORDER bY id ASC" );
                        //echo "SELECT * FROM services where id IN(".$cartitems.")";
						//echo "SELECT * FROM products where id IN(".$cartitems.") ORDER bY id ASC";
						while($result22=mysqli_fetch_array($getcosdswemf)) {
						$count++;
						?>
                                  <tr align="center" class="item">
                                    <td><?php echo $count; ?></td>
                                    <td>998399</td>
                                    <td><?php echo $result22['name'];; ?></td>
                                    <td><?php echo $result22['price'];
  $mainTotal = $mainTotal + $result22['price'];
   ?></td>
                                    <td><?php if(!empty($discount_applied)){
										  $discountedPrice1 = $result22['price'] * $discount_applied / 100;
										echo number_format((float)$discountedPrice1, 2, '.', '');  // Outputs -> 105.00
									}else{
										echo number_format((float)0, 2, '.', '');  // Outputs -> 105.00
									}  ?></td>
                                    <td><?php  $discountedpriceAfter = $result22['price'] - $discountedPrice1;
									echo number_format((float)$discountedpriceAfter, 2, '.', '');  // Outputs -> 105.00
									 ?></td>
                                    <td><?php
										if($active9percent == 1)
										{
									 $newprice = (9 / 100) * $discountedpriceAfter; 
									 if($newprice < 1)
									 {
									 //echo round($newprice);
									 echo number_format((float)$newprice, 2, '.', '');  // Outputs -> 105.00
									 $gsttotal = $gsttotal + $newprice;
									 }else{
									  echo number_format((float)$newprice, 2, '.', ''); 
									 $gsttotal = $gsttotal + $newprice;
									 }
									 
  
  }
   ?></td>
                                    <td><?php 
									if($active9percent == 1)
										{
									$newprice = (9 / 100) * $discountedpriceAfter; //echo round($newprice);
									$breakGST = $newprice;
									if($newprice < 1)
									 {
									 echo number_format((float)$newprice, 2, '.', '');  // Outputs -> 105.00
									 $gsttotal11 = $gsttotal11 + $newprice;
									 }else{
									  echo number_format((float)$newprice, 2, '.', ''); 
									 $gsttotal11 = $gsttotal11 + $newprice;
									 }
  
  }
   ?></td>
                                    <td><?php 
									if($active9percent == 0)
										{

									$newprice = (18 / 100) * $discountedpriceAfter; //echo round($newprice);
									$breakGST111 = $newprice;
									if($newprice < 1)
									 {
									 echo number_format((float)$newprice, 2, '.', '');  // Outputs -> 105.00
									 $gsttotal = $gsttotal + $newprice;
									 }else{
									  echo number_format((float)$newprice, 2, '.', ''); 
									 $gsttotal = $gsttotal + $newprice;
									 }
  		
		}
   ?></td>
                                    <td><?php 
									if($newprice < 1)
									{
									    //echo 'YES'.$newprice;
										if($active9percent == 0)
										{
									 	$final = $discountedpriceAfter + $newprice;
									     }else{
										 $final = $discountedpriceAfter + $newprice + $newprice;
										 }
									echo number_format((float)$final, 2, '.', '');  // Outputs -> 105.00
									$mainGrandTotal = $mainGrandTotal + $final;
									}else{
									    //echo 'YES'.$discountedpriceAfter.'-'.$gsttotal11.'--'.$gsttotal;
									 $final = $discountedpriceAfter+$gsttotal+$gsttotal11;
									 	echo number_format((float)$final, 2, '.', '');
									$mainGrandTotal = $mainGrandTotal + $final;
									}
  		
   ?></td>
                                  </tr>
                                  <?php 
						}
 while($result1=mysqli_fetch_array($getcosdswemf))
 {
 			$cat = $result1['cat'];
			$categories = $result1['cat'];
                         $getcosdswemfwew=mysqli_query($conn,"SELECT * FROM category where id IN(".$cat.")");
                        $ressultwwwqewew=mysqli_fetch_array($getcosdswemfwew);
                        $mainProduct=$result1['name'];
						$mainProductPrice=$result1['price'];
 $count++;
  ?>
                                  <?php } 
  	// services
  	$servicesitems = rtrim($servicesitems, ',');
	$discountedPriceAdditions = 0;
	$services=mysqli_query($conn,"SELECT * FROM services where id IN(".$servicesitems.") ORDER bY id ASC" );
                        //echo "SELECT * FROM services where id IN(".$cartitems.")";
						//echo "SELECT * FROM services where id IN(".$servicesitems.") ORDER bY id ASC" ;
 while($resultservices1=mysqli_fetch_array($services))
 {
 			$cat = $resultservices1['cat'];
			$categories = $resultservices1['cat'];
                         $getcosdswemfwew=mysqli_query($conn,"SELECT * FROM category where id IN(".$cat.")");
                        $ressultwwwqewew=mysqli_fetch_array($getcosdswemfwew);
                        $mainProduct=$resultservices1['name'];
						$mainProductPrice=$resultservices1['price'];
 $count++;
  
   ?>
                                  <tr align="center" class="item">
                                    <td><?php echo $count; ?></td>
                                    <td>998399</td>
                                    <td><?php echo $mainProduct; ?></td>
                                    <td><?php echo $mainProductPrice;
    $mainTotal = $mainTotal + $mainProductPrice;

   ?></td>
                                    <td><?php if(!empty($discount_applied)){
										  $discountedPrice = $mainProductPrice * $discount_applied / 100;
										  echo number_format((float)$discountedPrice, 2, '.', '');  // Outputs -> 105.00
										$discountedPriceAdditions = $discountedPriceAdditions + $discountedPrice;
									}else{
										echo "0";
									}  ?></td>
                                    <td><?php   $ActualPriceAfter = $mainProductPrice - $discountedPrice; 
									echo number_format((float)$ActualPriceAfter, 2, '.', '');  // Outputs -> 105.00
									?></td>
                                    <td><?php
									if($active9percent == 1)
										{

									 $newprice = (9 / 100) * $ActualPriceAfter; //echo round($newprice);
									 $breakGST = $newprice;
									 if($newprice < 1)
									 {
									 echo number_format((float)$newprice, 2, '.', '');  // Outputs -> 105.00
									 $gsttotal = $gsttotal + $newprice;
									 }else{
									 echo number_format((float)$newprice, 2, '.', '');  // Outputs -> 105.00
									 $gsttotal = $gsttotal + $newprice;
									 }
  
  }
   ?></td>
                                    <td><?php 
									if($active9percent == 1)
										{

									$newprice = (9 / 100) * $ActualPriceAfter; //echo round($newprice);
									$breakGST111 = $newprice;
									if($newprice < 1)
									 {
									 echo number_format((float)$newprice, 2, '.', '');  // Outputs -> 105.00
									 $gsttotal11 = $gsttotal11 + $newprice;
									 }else{
									 echo number_format((float)$newprice, 2, '.', '');  // Outputs -> 105.00
									 $gsttotal11 = $gsttotal11 + $newprice;
									 }
  
  }
   ?></td>
                                    <td><?php 
									if($active9percent == 0)
										{
									$newprice = (18 / 100) * $ActualPriceAfter; //echo round($newprice);
									if($newprice < 1)
									 {
									 echo number_format((float)$newprice, 2, '.', '');  // Outputs -> 105.00
									  $gsttotal = $gsttotal + $newprice;
									 }else{
									 echo number_format((float)$newprice, 2, '.', '');  // Outputs -> 105.00
									  $gsttotal = $gsttotal + $newprice;
									 }
 
  }
   ?></td>
                                    <td><?php 
									
									if($newprice < 1)
									{
									    
									 if($active9percent == 0)
										{
										//echo 'YES';
									 	$final22 = $ActualPriceAfter + $newprice;
									     }else{
										 $final22 = $ActualPriceAfter + $newprice + $newprice;
										 }
										
										//echo "<br>";
									echo number_format((float)$final22, 2, '.', '');  // Outputs -> 105.00
									//echo $value11 =  substr($final22, 0, -1);
							$mainGrandTotal = $mainGrandTotal + $value11;
									}else{
									    //echo 'YES';
									    
									if($active9percent == 0)
										{
										//echo 'YES';
									 	$final22 = $ActualPriceAfter + $newprice;
									     }else{
										 $final22 = $ActualPriceAfter + $newprice + $newprice;
										 }
										 echo number_format((float)$final22, 2, '.', '');  // Outputs -> 105.00
									  $value11 =  substr($final22, 0, -1);
										
									$mainGrandTotal = $mainGrandTotal + $final22;
									}
									
									
									
									//echo $final22 = round($newprice+$mainProductPrice);
  			
   ?></td>
                                  </tr>
                                  <?php } ?>
                                  <tr align="center" class="item">
                                    <td colspan="3">Total</td>
                                    <td><?php echo $mainTotal; ?></td>
                                    <td><?php if(!empty($discountedPriceAdditions)){
										  $maindisadded = $discountedPrice1 + $discountedPriceAdditions;
										echo number_format((float)$maindisadded, 2, '.', '');  // Outputs -> 105.00
									}else{
										echo "0";
									}  ?></td>
                                    <td><?php  $afterthatValue = $mainTotal - $maindisadded;
									echo number_format((float)$afterthatValue, 2, '.', '');  // Outputs -> 105.00
									 ?></td>
                                    <td><?php 
									if($active9percent == 1)
										{
										    
									echo substr($gsttotal, 0, -1);  // Outputs -> 105.00
									//echo $gsttotal;
									} ?></td>
                                    <td><?php 
									if($active9percent == 1)
										{
									echo substr($gsttotal11, 0, -1);  // Outputs -> 105.00
									//echo $gsttotal11;
									} ?></td>
                                    <td><?php 
									if($active9percent == 0)
										{

									//echo $gsttotal;
									echo substr($gsttotal, 0, -1);  // Outputs -> 105.00
									} ?></td>
                                    <td><b>
                                      <?php 
									//echo $mainGrandTotal;
									echo number_format((float)$mainGrandTotal, 2, '.', '');  // Outputs -> 105.00
									 ?>
                                      </b></td>
                                  </tr>
                                  <tr align="center" class="item">
                                    <td colspan="4">Total Invoice amount in words</td>
                                    <td colspan="6"><b style="color:#330033"><?php echo numtowords($mainGrandTotal); ?></b> INR Only</td>
                                  </tr>
                                  <tr align="center" class="item">
                                    <td colspan="6">Amount of Tax subject to Reverse Charges</td>
                                    <td colspan="4">Nill</td>
                                  </tr>
                                  <tr align="center" class="item">
                                    <td colspan="10">&nbsp;</td>
                                  </tr>
                                  <tr align="center" class="item">
                                    <td colspan="10"><b><i>Ceritified that the particulars given above are true and correct</i></b></td>
                                  </tr>
                                </table>
                              </div>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
          <tr style="border-collapse:collapse;">
            <td align="center" style="padding:0;Margin:0;"><table class="es-content-body" width="900" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                <tr style="border-collapse:collapse;">
                  <td align="left" style="padding:0;Margin:0;padding-top:15px;padding-left:35px;padding-right:35px;"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
    <tr style="border-collapse:collapse;">
      <td align="center" style="padding:0;Margin:0;"><table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#1B9BA3;border-bottom:10px solid #48AFB5;" width="900" cellspacing="0" cellpadding="0" bgcolor="#1b9ba3" align="center">
          <tr style="border-collapse:collapse;">
            <td align="left" style="padding:0;Margin:0;"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                <tr style="border-collapse:collapse;">
                  <td width="900" valign="top" align="center" style="padding:0;Margin:0;"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                      <tr style="border-collapse:collapse;">
                        <td style="padding:0;Margin:0;"><table class="es-menu" width="40%" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                            <tr class="links-images-top" style="border-collapse:collapse;">
                              <td style="Margin:0;padding-left:2px;padding-right:5px;padding-top:35px;padding-bottom:30px;border:0;" id="esd-menu-id-2" esdev-border-color="#000000" width="25.00%" bgcolor="transparent" align="center"><b style="color:#FFFFFF">DraftmyCV.com</b> </td>
                              <td style="Margin:0;padding-left:2px;padding-right:5px;padding-top:35px;padding-bottom:30px;border:0;" id="esd-menu-id-2" esdev-border-color="#000000" width="25.00%" bgcolor="transparent" align="center"><b style="color:#FFFFFF"> | </b> </td>
                              <td style="Margin:0;padding-left:5px;padding-right:5px;padding-top:35px;padding-bottom:30px;border:0;" id="esd-menu-id-3" esdev-border-color="#000000" width="25.00%" bgcolor="transparent" align="center"><b style="color:#CCFF99"><i>customercare@draftmycv.com</i></b> </td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <table class="es-footer" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;">
    <tr style="border-collapse:collapse;">
      <td align="center" style="padding:0;Margin:0;"><table class="es-footer-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;border-top:10px solid #48AFB5;" width="900" cellspacing="0" cellpadding="0" align="center">
        </table></td>
    </tr>
  </table>
  <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
    <tr style="border-collapse:collapse;">
      <td align="center" style="padding:0;Margin:0;"><table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="900" cellspacing="0" cellpadding="0" align="center">
          <tr style="border-collapse:collapse;">
            <td align="left" style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px;"><table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
  </td>
  </tr>
  </table>
</div>
</body>
</html>
