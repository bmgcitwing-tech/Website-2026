<?php include('header.php'); ?>

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
                            <span id="msg" style="text-align: center;font-weight:bold;float:right;margin-top:7px;"></span>

                            </p>
                            <input type="hidden" id="req" name="req">
                      </div>
                                <div class="col-sm-12" style="text-align: center;">
                                    <button type="button" name="submit" id="submit" class="btn btn-danger">Schedule
                                        Appointment</button>
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
<?php include('footer.php') ?>
<script type="text/javascript">

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
                  $("#msg").css("color", "#fff").html("Success... Thanks for Booking !");
                    setTimeout(function(){
						window.location.href='appointment.php';
					},1500);
                   


                    $.ajax({
                        type: "POST",
                        url: "contact_mail.php",
                        dataType: 'json',
                        data: $("#mainform").serialize(),
                        success: function(result) {
                            //console.log(result);

                            if (result.op == true) {
                                $("#msg").css("color", "red").html(
                                    "Success... Thanks for Booking !");
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