<?php
include('header.php');
if (empty($_POST['date_of_selection'])) {
  $_POST['date_of_selection'] = date('Y-m-d');
}
$data = file_get_contents("https://cdn.jsdelivr.net/npm/country-flag-emoji-json@2.0.0/dist/index.json");
$json = json_decode($data, true);

//exit;

if (isset($_POST['doSubmit1'])) {
  $center_id = str_replace("'", "^", $_POST['country']);
  $duration = str_replace("'", "^", $_POST['duration']);
  $timiings = str_replace("'", "^", $_POST['timinigs']);
  $person_name = str_replace("'", "^", $_POST['person_name']);
  $person_email = str_replace("'", "^", $_POST['person_email']);
  $person_phone = str_replace("'", "^", $_POST['person_phone']);
  $date_of_selection = str_replace("'", "^", $_POST['date_of_selection']);


  //validation

  $sql23423 = "SELECT * FROM tbl_counselling_appointments WHERE date_of_selection = '" . $date_of_selection . "' AND timiings = '" . $timiings . "'";
  $exec_sql = mysqli_query($conn, $sql23423);
  //echo $sql23423; 
  if (mysqli_num_rows($exec_sql) > 0) {

    echo '<script>alert("This Time Booked For Another Person !");</script>';
    echo "<script>window.location='appointment.php';</script>";
    exit;
  }


  $sql = "INSERT INTO  tbl_counselling_appointments (center_id,duration,timiings,person_name,person_email,person_phone,date_of_selection,created_by,create_date) VALUES('" . $center_id . "','" . $duration . "','" . $timiings . "','" . $person_name . "','" . $person_email . "','" . $person_phone . "','" . $date_of_selection . "','" . $person_name . "','" . date('Y-m-d H:i:s') . "')";

  $exec_query = mysqli_query($conn, $sql);

  // get company email
  $sql2email = "SELECT * FROM tbl_admin WHERE admin_id = 1";
  $exec_sqlqry = mysqli_query($conn, $sql2email);
  $fetch = mysqli_fetch_array($exec_sqlqry);
  $url = 'http://bmglobalcareers.com/Emails/examples/mail1.php?email=' . $fetch['company_email'];
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response_json = curl_exec($ch);
  curl_close($ch);

  if ($exec_query) {
    echo '<script>alert("Appointment Done Sucessfully");</script>';
    echo "<script>window.location='appointment.php';</script>";
  } else {
    echo '<script>alert("System Error");</script>';
    echo "<script>window.location='appointment.php';</script>";
  }
}
?>
<script type="text/javascript">
window.ZCB_APP = {
    "CSRF_TOKEN": "55ef9182-fee3-46e9-aaa2-7e88b3137ef8",
    "clientPortal": "50005267871",
    "scopeId": "60009787103",
    "portalDomainSuffix": ".zohobookings.in",
    "prefix": "https://",
    "timezone": "Asia/Kolkata",
    "IPLocationUrl": "https://in2-internaliplocation.zoho.in",
    "accountsUrl": "https://accounts.zoho.in",
    "appowner": "prachetagrawal_kcoverseas",
    "CSRF_PARAM": "zccpn",
    "isAppOwner": false,
    "zuid": "-100",
    "appname": "Bookings",
    "serverurl": "kcoverseas.zohobookings.in",
    "portalDomainName": "kcoverseas.zohobookings.in",
    "company_name": "KC Overseas Education",
    "staticindexurl": "https://css.zohostatic.in/bookings/v5_106_1/dist/in/index.html",
    "appLinkName": "bookings",
    "logo": "https://kcoverseas.zohobookings.in/DownloadLogo?filepath=/1625554462841_upload_f6b9a8c4_b9c8_4ff6_a269_990d3ae39d74_00000038.tmp"
};
</script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
var dates = [];

function disableHoliday(date) {
    var holiDays = [];
    <?php
    $sql = "SELECT * FROM tbl_appointment_block WHERE delete_status='NDL' order by ban_id desc";
    $exec_sql = mysqli_query($conn, $sql);
    $i = 1;
    while ($fetch_sql = mysqli_fetch_array($exec_sql)) {


    ?>
    var as = '<?php echo $fetch_sql['block_date'];  ?>';

    holiDays.push(as);

    <?php } ?>


    //alert(holiDays);
    var string = $.datepicker.formatDate('yy-mm-dd', date);
    var isHoliday = ($.inArray(string, holiDays) != -1);
    var filterDate = new Date(string);
    var day = filterDate.getDay();
    return [day != 0 && day != 6 && !isHoliday]
}
$(document).ready(function() {
    $("#datepicker").datepicker({

        beforeShowDay: disableHoliday
    });
});
</script>

<section class="page-banner">
    <div class="image-layer" style="background-image:url(images/background/image-7.jpg);"></div>
    <div class="shape-1"></div>
    <div class="shape-2"></div>
    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1 style="font-size: 60px;"> APPOINTMENT</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"> APPOINTMENT</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container" style="padding: 19px;background-image: url(images/background/pattern-1.png); ">
    <!-- Demo header-->
    <section class="py-5 header">
        <div class="container py-4">
        <form id="mainform" method="POST" action="" enctype="multipart/form-data">

              <div class="row">
              <p class="font-italic mb-4">Please enter your details</p>
                    <p class="font-italic text-muted mb-2">
              <div class="col-sm-12">
              <div class="row">
                    
                      <div class="col-sm-6">
                        <div class="row form-group">
                            <label class="control-label col-sm-6" for="name">Name  *:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="person_name" placeholder="Enter Name"
                                    name="person_name" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-sm-6" for="surname"> Sur Name  *:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="sur_name" placeholder="Enter Name"
                                    name="sur_name" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-sm-6" for="email">Email  *:</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="person_email" placeholder="Enter Email"
                                    name="person_email" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-sm-6" for="person_phone">Phone *:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="person_phone" placeholder="Enter Phone"
                                    name="person_phone">
                            </div>
                        </div>


                        <div class="row form-group">
                            <label class="control-label col-sm-6" for="person_dob">DOB *: </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="dob" name="single-date-picker"
                                    placeholder="Enter  Date">
                                <input type="hidden" name="person_dob" id="person_dob">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-sm-6" for="dob">10th %  *:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="tenth_percentage" placeholder="Enter 10th %"
                                    name="tenth_percentage">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-6" for="twelfth_percentage">12th % :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="twelfth_percentage"
                                    placeholder="Enter 12th %" name="twelfth_percentage">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-6" for="diploma">Diploma: </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="diploma"
                                    placeholder="Enter Diploma %" name="diploma">
                            </div>
                        </div>
                        <div class="row form-group">
                                <label class="control-label col-sm-6" for="twelfth_english_percentage">12th English %:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="twelfth_english_percentage"
                                        placeholder="Enter 12th English %" name="twelfth_english_percentage">
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="control-label col-sm-6" for="ug_percentage">UG %/CGPA(if
                                    applicable):</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="ug_percentage"
                                        placeholder="Enter UG percentage/CGPA" name="ug_percentage">
                                </div>
                            </div>
                         
                      </div>
                      <div class="col-sm-6">
                      <div class="row form-group">
                                <label class="control-label col-sm-6" for="pg_percentage">PG %/CGPA(if
                                    applicable):</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="pg_percentage"
                                        placeholder="Enter PG percentage/CGPA" name="pg_percentage">
                                </div>
                            </div>
                            <!--div class="row form-group">
                                <label class="control-label col-sm-6" for="country">Chosen country*? </label>
                                <div class="col-sm-6">
                                    <select name="country_id" id="country_id" class="form-control"></select>
                                </div>
                            </div-->
                            <div class="row form-group">
                                <label class="control-label col-sm-6" for="country">Chosen country*? </label>
                                <div class="col-sm-6">
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="UNITED KINGDOM (UK)" selected>UNITED KINGDOM (UK)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-sm-6" for="ielts_score">IELTS Score: </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="ielts_score" placeholder="IELTS Score:"
                                        name="ielts_score">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-sm-6" for="year">Intake Year?* </label>
                                <div class="col-sm-6">
                                    <select name="intake_year_id" id="intake_year_id" class="form-control">
                                    <?php  $cur_year = date('Y');
                                      for($year =$cur_year; $year <= ($cur_year+4); $year++) {
                                          if ($year == $cur_year) {
                                              echo '<option value="'.$year.'" selected="selected">'.$year.'</option>';
                                          } else {
                                              echo '<option value="'.$year.'">'.$year.'</option>';
                                          }
                                      }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-sm-6" for="year">Intake Month?* </label>
                                <div class="col-sm-6">
                                    <textarea name="intake month" id="intake_month" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="control-label col-sm-6" for="intented_study">Course(s) intented to study*:
                                </label>
                                <div class="col-sm-6">
                                    <textarea name="intented_study" id="intented_study" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="control-label col-sm-6" for="additional_comment">Additional Comments:
                                </label>
                                <div class="col-sm-6">
                                    <textarea name="additional_comment" id="additional_comment" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-sm-6" for="appointment_date">Appointment Date  *: </label>
                                <div class="col-sm-6">
                                     <input type="text" class="form-control" id="appointment_date"
                                        name="appoint-date-picker" placeholder="Enter Appoinment Date">
                                    <input type="hidden" name="appoint_date" id="appoint_date">
                                </div>
                            </div>
                            <span id="msg" style="font-weight:bold;float:right;margin-top:7px;"></span>

                            <div class="row form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" name="submit" id="submit" class="btn btn-danger">Schedule
                                        Appointment</button>
                                </div>
                            </div>
                            </p>
                            <input type="hidden" id="req" name="req">
                      </div>
                

                      </div>
                        
              </div>
             
        </div>
        </form>
    </section>
</section>
<style>
label {
    color: #f1c852;
}

input {
    background: #f1db9c !important;
}

textarea {
    background: #f1db9c !important;
}
</style>
<script id="vendorstaticjs" tagname="js"
    src="https://js.zohocdn.com/bookings/v5_106_1/dist/in/assets/vendor-static-851d34dd7963dfb04655ab0b82f8c570.js">
</script>
<script id="vendorjs" tagname="js"
    src="https://js.zohocdn.com/bookings/v5_106_1/dist/in/assets/vendor-8f1331dc1e24bdb849520a436e6ee319.js"></script>
<script src="https://static.zohocdn.com/bookings/v5_106_1/dist/in/assets/web-app-6ff3a32ed612335746f1488eac8ca7d9.js">
</script>
<?php include('footer.php') ?>
<script type="text/javascript">
var favicon_url =
    "https://static.zohocdn.com/bookings/v5_106_1/dist/in/assets/images/favicon-5b0398d8afa4a58dc8b2ca40a583da40.ico";
var favicon = document.createElement('link');
favicon.href = favicon_url;
favicon.rel = "shortcut icon";
document.getElementsByTagName('head')[0].appendChild(favicon);

const promise = new Ember.RSVP.Promise((resolve, reject) => {
    $.getJSON('https://static.zohocdn.com/bookings/v5_106_1/dist/in/assets/assetMap.json', resolve).fail(
        reject);
});
promise.then(function(res) {
    window.asset_map = res;
    var language = "en";
    var supportedLanguages = ["ar", "de", "es", "fr", "ja", "nl", "pt", "zh"];
    var vendorSrc = $(document.body).find("#vendorjs").attr("src");
    var splittedVendor = vendorSrc.split("/");
    splittedVendor.pop();
    splittedVendor.pop();

    if (window.ZCB_APP.hasOwnProperty("language") && (supportedLanguages.indexOf(window.ZCB_APP.language) != -
            1)) {
        language = window.ZCB_APP.language;
    }

    var finger_printed_url = "assets/i18n/MessageResources_" + language + ".js";

    if (window.asset_map && window.asset_map.assets) {
        finger_printed_url = window.asset_map.assets[finger_printed_url];
    }
    var rootUrl = splittedVendor.join("/") + "/" + finger_printed_url;

    var languageScriptTag = "<script id='msg-resource' src='" + rootUrl + "'></" + "script>";
    $(languageScriptTag).insertAfter("#vendorjs");
})





if (window.ZCB_APP.is_zohoone_user && window.ZCB_APP.zohoone_unified_ui_url) {
    var head = document.getElementsByTagName('head')[0];
    var unifiedUIUrl = window.ZCB_APP.zohoone_unified_ui_url;
    var script = document.createElement('script');
    script.src = unifiedUIUrl;
    script.type = 'text/javascript';
    head.appendChild(script);
}
if (window.ZCB_APP.is_zohoone_user && window.ZCB_APP.zohoone_launcher_url) {
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.src = window.ZCB_APP.zohoone_launcher_url;
    script.type = 'text/javascript';
    head.appendChild(script);
}

var hostName = window.location.hostname.toLowerCase();

if ((hostName.indexOf("localhost") != -1) || ((hostName.indexOf("bookings.zoho.") != -1) || (hostName.indexOf(
        "bookings.localzoho.") != -1) || (hostName.indexOf("bookingslab.localzoho.") != -1))) {
    window.ZohoHCAsapReady = function(o) {
        if (window.ZohoHCAsap__asyncalls = window.ZohoHCAsap__asyncalls || [], window.ZohoHCAsapReadyStatus) {
            o && window.ZohoHCAsap__asyncalls.push(o);
            for (var a = window.ZohoHCAsap__asyncalls, s = 0; s < a.length; s++) {
                var n = a[s];
                n && n()
            }
            window.ZohoHCAsap__asyncalls = null
        } else o && window.ZohoHCAsap__asyncalls.push(o)
    };

    window.ZohoHCAsapSettings = {
        hideLauncherIcon: true,
        // isDeveloperIdView : true,
        closeIconPosition: "TOP",
        customLayoutId: "zohohc-asap-web-viewer",
        layoutAdjustments: {
            height: 'calc(100% - 49px)',
            width: "411px"
        },
        homePageSettings: {
            widgets: [{
                    type: 'CUSTOM_WIDGETS',
                    widgetTitle: "Troubleshooting & FAQs",
                    content: "<div onClick='customWidgetArticles(4008920813657)' class='dis-flex zb-asap-label'><span class='field-center zb zb-note2'></span><span class='field-center'>Troubleshooting Guide</span></div><div onClick='customWidgetArticles(4004196192971)' class='dis-flex zb-asap-label mt20'><span class='field-center zb zb-note2'></span><span class='field-center'>Frequently Asked Questions</span></div>"
                },
                {
                    type: 'RECENT_ARTICLES'
                },
                {
                    type: 'MOST_LIKED_ARTICLES'
                }
            ]
        },
        ticketsSettings: {
            preFillFields: {
                "email": {
                    defaultValue: window.ZCB_APP.email,
                    isDisabled: true
                },
                "contactId": {
                    defaultValue: window.ZCB_APP.name
                },
                "category": {
                    defaultValue: "",
                    isHidden: true
                },
                "Support DRI": {
                    defaultValue: "",
                    isHidden: true
                }
            }
        }
    }

    window.ZohoHCAsap = window.ZohoHCAsap || function(a, b) {
        ZohoHCAsap[a] = b;
    };
    (function() {
        var d = document;
        var s = d.createElement("script");
        s.type = "text/javascript";
        s.defer = true;
        s.src = "https://desk.zoho.com/portal/api/web/inapp/4005839393209?orgId=4241905";
        d.getElementsByTagName("head")[0].appendChild(s);
    })();

    function customWidgetArticles(articleId) {
        ZohoHCAsapReady(function() {
            ZohoHCAsap.Actions.Kb.Articles.Open({
                articleId: articleId
            });
        });
    };

    var domainName = hostName.substring(hostName.indexOf(".") + 1);
    var micsUrl = "https://tipengine." + domainName;
    var scopeId = window.ZCB_APP.scopeId;
    if (hostName.indexOf("bookings.localzoho.com") != -1) {
        micsUrl = "https://premics.zohonoc.com";
        scopeId = "686902201";
    }

    var micsServiceIdMap = {
        "localzoho.com": 273,
        "zoho.com": 273,
        "zoho.eu": 180,
        "zoho.in": 67,
        "zoho.com.au": 143
    };
    var micsServiceId = micsServiceIdMap[domainName];

    if (micsServiceId) {
        var mics = new $mics(scopeId, micsServiceId, micsUrl);
        mics.init();
    }
}
$("#dob").change(function() {
        var datefullvalue = $("#dob").val();
        var datevalue = datefullvalue.split('/')[1];
        var monthvalue = datefullvalue.split('/')[0];
        var yearvalue = datefullvalue.split('/')[2];
        $("#person_dob").val(datevalue + '/' + monthvalue + '/' + yearvalue);
    });
      $("#appointment_date").change(function() {

        var datefullvalue = $("#appointment_date").val();
        var datevalue = datefullvalue.split('/')[0];
        var monthvalue = datefullvalue.split('/')[1];
        var yearvalue = datefullvalue.split('/')[2];
        $("#appoint_date").val(datevalue + '/' + monthvalue + '/' + yearvalue);
    });
    
     setTimeout(function() {
        var datefullvalue = $("#dob").val();
        var datevalue = datefullvalue.split('/')[1];
        var monthvalue = datefullvalue.split('/')[0];
        var yearvalue = datefullvalue.split('/')[2];
        $("#person_dob").val(datevalue + '/' + monthvalue + '/' + yearvalue);
    }, 500);
    
     setTimeout(function() {
            var datefullvalue = $("#appointment_date").val();
        var datevalue = datefullvalue.split('/')[0];
        var monthvalue = datefullvalue.split('/')[1];
        var yearvalue = datefullvalue.split('/')[2];
        $("#appoint_date").val(datevalue + '/' + monthvalue + '/' + yearvalue);
    }, 500);


//starting - disable specific date

 var disabledDates = ["2022-10-11","2022-10-12","2022-10-13","2022-10-14","2022-10-15","2022-10-16","2022-10-17"]

 $('#appointment_date').datepicker({
     beforeShowDay: function(date){
         var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
         return [ disabledDates.indexOf(string) == -1 ]
     }
 });

// disable specific date - end

//country_dropdown();

/*function country_dropdown() {
    $.ajax({
        type: "POST",
        url: "ktgadmin/phpservices/country_dropdown.php",
        success: function(result) {
            var d_length = result.length;
            var d_data = '<option value="">Select Country</option>';
            for (var i = 0; i <= d_length - 1; i++) {
                d_data += '<option value="' + result[i]['ban_id'] + '">' + result[i][
                    'title'
                ] + '</option>';
            }
            $("#country_id").removeAttr("disabled");
            $("#country_id").append(d_data);
            $("#grid-loader").hide();
        }
    });
}*/


$("#submit").click(function(e) {
    e.preventDefault();

    if ($("#person_name").val() == "") {
        $("#msg").css("color", "red").html("* Enter Name");
        setTimeout(function() {
            $("#msg").html('')
        }, 3000);
        return false;
    }
    else if($("#sur_name").val()==""){
    	$("#msg").css("color","red").html("* Enter  Surname");
    	setTimeout(function(){$("#msg").html('')},3000);
    	return false;
    }
    else if($("#email").val()==""){
    	$("#msg").css("color","red").html("* Enter Email");
    	setTimeout(function(){$("#msg").html('')},3000);
    	return false;
    }
    else if($("#person_phone").val()==''){
    	$("#msg").css("color","red").html('* Enter phone');
    	setTimeout(function(){$("#msg").html('')},3000);
    	return false;
    }
    else if($("#dob").val()==''){
    	$("#msg").css("color","red").html('* Enter DOB');
    	setTimeout(function(){$("#msg").html('')},3000);
    	return false;
    }
    else if($("#tenth_percentage").val()==''){
    	$("#msg").css("color","red").html('* Enter Tenth %');
    	setTimeout(function(){$("#msg").html('')},3000);
    	return false;
    }
    else if($("#tenth_percentage").val()==''){
    	$("#msg").css("color","red").html('* Enter Tenth %');
    	setTimeout(function(){$("#msg").html('')},3000);
    	return false;
    }
    else if($("#tenth_percentage").val()==''){
    	$("#msg").css("color","red").html('* Enter Tenth %');
    	setTimeout(function(){$("#msg").html('')},3000);
    	return false;
    }
    // else if($("#twelfth_percentage").val()==''){
    // 	$("#msg").css("color","red").html('* Enter 12th %');
    // 	setTimeout(function(){$("#msg").html('')},3000);
    // 	return false;
    // }
    
   // else if($("#country_id").val()==''){
    //	$("#msg").css("color","red").html('* Enter Country');
    //	setTimeout(function(){$("#msg").html('')},3000);
    //	return false;
   // }
   
    else if($("#intake_year_id").val()==''){
    	$("#msg").css("color","red").html('* Enter Intake Year');
    	setTimeout(function(){$("#msg").html('')},3000);
    	return false;
    }
    else if($("#intake_month").val()==''){
    	$("#msg").css("color","red").html('* Enter Intake Month');
    	setTimeout(function(){$("#msg").html('')},3000);
    	return false;
    }

    else if($("#intented_study").val()==''){
    	$("#msg").css("color","red").html('* Enter Intented study');
    	setTimeout(function(){$("#msg").html('')},3000);
    	return false;
    }
    else {
        $("#req").val('INS');
        $("#msg").css("color", "#fff").html("Processing . . .");
        $.ajax({
            type: "POST",
            url: "ktgadmin/phpservices/appointment_service.php",
            dataType: 'json',
            data: $("#mainform").serialize(),
            success: function(result) {
                console.log(result.op);
                if (result.op == 1) {
                  $("#msg").css("color", "#fff").html("Success!", "Saved Successfully !", "success");
                    // swal("Success!", "Saved Successfully !", "success");
                   


                    $.ajax({
                        type: "POST",
                        url: "contact_mail.php",
                        dataType: 'json',
                        data: $("#mainform").serialize(),
                        success: function(result) {
                            //console.log(result);

                            if (result.op == true) {
                                $("#msg").css("color", "red").html(
                                    "Message Sent Successfully!");
                                setTimeout(function() {
                                    window.location.href = "appointment.php";
                                }, 2000);
                            } else {
                                alert($("#msg").html(result.op));
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(JSON.stringify(xhr, status, error));
                        }
                    });




                }
            },
            error: function(xhr, status, error) {
                console.log(JSON.stringify(xhr, status, error));
            }
        });
    }


});
</script>