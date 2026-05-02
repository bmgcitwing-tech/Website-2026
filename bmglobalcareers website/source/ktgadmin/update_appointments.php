<!doctype html>
<html lang="en">

<?php include('sessionservices.php');?>
<?php include('header.php');?>
<link href="css/editor.css" type="text/css" rel="stylesheet" />

<body>
    <!-- begin::page loader-->
    <div class="page-loader">
        <div class="spinner-border"></div>
        <span>Loading ...</span>
    </div>
    <!-- end::page loader -->

    <?php echo $header;?>

    <main class="main-content">
        <div class="container-fluid">
            <div class="page-header d-md-flex justify-content-between align-items-center">
                <h4>APPOINMENT</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="mainform" method="POST" action="" enctype="multipart/form-data">
                            <div class="row" id="maindiv">
                                <div class="col-sm-6">
                                    <input type="hidden" name="action" value="add" />

                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="name">Name *:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="person_name"
                                                placeholder="Enter Name" name="person_name" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="surname"> Sur Name *:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="sur_name"
                                                placeholder="Enter Name" name="sur_name" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="email">Email *:</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" id="person_email"
                                                placeholder="Enter Email" name="person_email" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="person_phone">Phone *:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="person_phone"
                                                placeholder="Enter Phone" name="person_phone">
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="person_dob">DOB *: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="dob" name="single-date-picker"
                                                placeholder="Enter  Date">
                                            <input type="hidden" name="person_dob" id="person_dob">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="dob">10th % *:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="tenth_percentage"
                                                placeholder="Enter 10th %" name="tenth_percentage">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="twelfth_percentage">12th %:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="twelfth_percentage"
                                                placeholder="Enter 12th %" name="twelfth_percentage">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="diploma">Diploma: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="diploma"
                                                placeholder="Enter Diploma %" name="diploma">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="twelfth_english_percentage">12th
                                            English % :</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="twelfth_english_percentage"
                                                placeholder="Enter 12th English %" name="twelfth_english_percentage">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="ug_percentage">UG %/CGPA(if
                                            applicable):</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="ug_percentage"
                                                placeholder="Enter UG percentage/CGPA" name="ug_percentage">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="pg_percentage">PG %/CGPA(if
                                            applicable):</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="pg_percentage"
                                                placeholder="Enter PG percentage/CGPA" name="pg_percentage">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="country">Chosen country*?
                                        </label>
                                        <div class="col-sm-6">
                                            <select name="country_id" id="country_id" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="ielts_score">IELTS Score:
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="ielts_score"
                                                placeholder="IELTS Score:" name="ielts_score">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="year">Intake Year?* </label>
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
                                        <label class="control-label col-sm-4" for="year">Intake Month?* </label>
                                        <div class="col-sm-6">
                                            <textarea name="intake month" id="intake_month"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="intented_study">Course(s)
                                            intented to study*:
                                        </label>
                                        <div class="col-sm-6">
                                            <textarea name="intented_study" id="intented_study"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="additional_comment">Additional
                                            Comments:
                                        </label>
                                        <div class="col-sm-6">
                                            <textarea name="additional_comment" id="additional_comment"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label col-sm-4" for="appointment_date">Appointment
                                            Date *: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="appointment_date"
                                                name="single-date-picker" placeholder="Enter Appoinment Date">
                                            <input type="hidden" name="appoint_date" id="appoint_date">
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" name="req" id="req">
                                <input type="hidden" name="ban_id" id="ban_id" value="<?php echo $_GET['id'];?>">
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <button type="submit" name="submit" id="submit" class="btn btn-success"
                                            style="font-weight:bold"><i
                                                class="fa fa-check-square-o"></i>&nbsp;&nbsp;Update</button>
                                        <a href="counselling_appointments.php"><button type="button" id="resetbut"
                                                class="btn btn-danger" style="font-weight:bold"><i
                                                    class="fa fa-close"></i>&nbsp;&nbsp;Cancel</button></a>
                                        <span id="msg" style="font-weight:bold;float:right;margin-top:7px;"></span>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <input type="hidden" name="modulenamebox" id="modulenamebox" value="6">
    <input type="hidden" name="rightsbox" id="rightsbox">
    <!-- end::main content -->
    <?php include("footer.php"); ?>
</body>
<style>
@media(min-width:992px) {
    .navbar-nav {
        display: block !important;
        width: 100%;
    }

    .userdiv {
        float: right;
    }

    #submit,
    #resetbut {
        margin-top: 32px;
    }
}

@media(max-width:480px) {
    nav.navbar .header-logo a img {
        width: 180px;
    }
}
</style>
<script>
$(document).ready(function() {
    //     $("#dob").change(function() {
    //     $("#person_dob").val($("#dob").val());
    // });

    $("#dob").change(function() {
        var datefullvalue = $("#dob").val();
        var datevalue = datefullvalue.split('/')[0];
        var monthvalue = datefullvalue.split('/')[1];
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
    // $("#appointment_date").change(function() {
    //     $("#appoint_date").val($("#appointment_date").val());
    // });
    country_dropdown();

    function country_dropdown() {
        $.ajax({
            type: "POST",
            url: "phpservices/country_dropdown.php",
            // data: {
            //     tbl_name: "shopping"
            // },
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
    }

    if ('<?php echo $log;?>' != "admin") {
        $.ajax({
            type: "POST",
            url: "phpservices/employee_rights.php",
            dataType: 'JSON',
            data: {
                empid: <?php echo $login_id;?>,
                moduleid: $("#modulenamebox").val()
            },
            success: function(result) {
                $("#rightsbox").val(result.rights);
                var emprights = result.rights;
            }
        });
    }

    var ids_string = <?php echo $_GET['id']; ?>;
    $(".page-loader").show();
    $.ajax({
        type: "POST",
        url: "phpservices/appointment_services.php",
        dataType: 'json',
        data: {
            ban_id: ids_string,
            req: "AUB"
        },
        success: function(result) {
            $("#country_id").val(result.op[0]['country_id']);
            $("#father_name").val(result.op[0]['father_name']);
            $("#sur_name").val(result.op[0]['sur_name']);
            $("#person_name").val(result.op[0]['person_name']);
            $("#person_email").val(result.op[0]['person_email']);


            $("#person_phone").val(result.op[0]['person_phone']);
            $("#person_dob").val(result.op[0]['person_dob']);
            $("#dob").val(result.op[0]['person_dob']);

            $("#tenth_percentage").val(result.op[0]['tenth_percentage']);
            $("#twelfth_percentage").val(result.op[0]['twelfth_percentage']);
            $("#diploma").val(result.op[0]['diploma']);
            $("#twelfth_english_percentage").val(result.op[0]['twelfth_english_percentage']);

            $("#intake_month").val(result.op[0]['intake_month']);
            $("#intented_study").val(result.op[0]['intented_study']);
            $("#appoint_date").val(result.op[0]['appoint_date']);
            $("#appointment_date").val(result.op[0]['appoint_date']);
            $("#additional_comment").val(result.op[0]['additional_comment']);

            $("#ug_percentage").val(result.op[0]['ug_percentage']);
            $("#pg_percentage").val(result.op[0]['pg_percentage']);
            $("#ielts_score").val(result.op[0]['ielts_score']);
            $("#intake_year_id").val(result.op[0]['intake_year_id']);




            $(".page-loader").hide();
        },
        error: function(xhr, status, error) {
            console.log(JSON.stringify(xhr, status, error));
        }
    });



    $("#submit").click(function(e) {
        e.preventDefault();

        if ($("#person_name").val() == "") {
            $("#msg").css("color", "red").html("* Enter Name");
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else if ($("#sur_name").val() == "") {
            $("#msg").css("color", "red").html("* Enter  Surname");
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else if ($("#email").val() == "") {
            $("#msg").css("color", "red").html("* Enter Email");
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else if ($("#person_phone").val() == '') {
            $("#msg").css("color", "red").html('* Enter phone');
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else if ($("#dob").val() == '') {
            $("#msg").css("color", "red").html('* Enter DOB');
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else if ($("#tenth_percentage").val() == '') {
            $("#msg").css("color", "red").html('* Enter Tenth %');
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else if ($("#tenth_percentage").val() == '') {
            $("#msg").css("color", "red").html('* Enter Tenth %');
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else if ($("#tenth_percentage").val() == '') {
            $("#msg").css("color", "red").html('* Enter Tenth %');
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } 
        // else if ($("#twelfth_percentage").val() == '') {
        //     $("#msg").css("color", "red").html('* Enter 12th %');
        //     setTimeout(function() {
        //         $("#msg").html('')
        //     }, 3000);
        //     return false;
        // } 
        
        else if ($("#country_id").val() == '') {
            $("#msg").css("color", "red").html('* Enter Country');
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else if ($("#intake_year_id").val() == '') {
            $("#msg").css("color", "red").html('* Enter Intake Year');
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else if ($("#intake_month").val() == '') {
            $("#msg").css("color", "red").html('* Enter Intake Month');
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else if ($("#intented_study").val() == '') {
            $("#msg").css("color", "red").html('* Enter Intented study');
            setTimeout(function() {
                $("#msg").html('')
            }, 3000);
            return false;
        } else {
            $(".page-loader").show();
            $("#req").val('UPD');

            $.ajax({
                type: "POST",
                url: "phpservices/appointment_services.php",
                dataType: 'json',
                data: $("#mainform").serialize(),
                success: function(result) {
                    $(".page-loader").hide();
                    if (result.op == 1) {
                        swal("Success!", "Successfully Updated !", "success");
                        setTimeout(function() {
                            window.location.href = "counselling_appointments.php";
                        }, 1000);
                    } else {
                        alert($("#msg").html(result.op));
                    }
                },
                error: function(xhr, status, error) {
                    console.log(JSON.stringify(xhr, status, error));
                }
            });
        }

    });
});
</script>

</html>