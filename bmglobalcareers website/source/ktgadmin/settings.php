<!doctype html>
<html lang="en">

<?php include('sessionservices.php');?>
<?php include('header.php');?>
<body>
<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>Loading ...</span>
</div>
<!-- end::page loader -->

<?php echo $header;?>
<style>
	.searchbut{
		margin-top:55px;
	}
</style>
<!-- begin::main content -->
<main class="main-content">

    <div class="container-fluid">
        <div class="page-header d-md-flex justify-content-between align-items-center">
            <h4>Update Settings</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-t-0">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Settings</li>
                </ol>
            </nav>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
			<div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home" aria-selected="true"><b>Profile Update</b></a>
                            </li>
							<!--li class="nav-item">
                                <a class="nav-link" id="technical-tab" data-toggle="tab" href="#technical" role="tab"
                                   aria-controls="technical" aria-selected="true"><b>Technical</b></a>
                            </li-->
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="profile" aria-selected="false"><b>For Support</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                   aria-controls="contact" aria-selected="false"><b>Terms & Conditions</b></a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent" style="border-style:solid;border-color:#dee2e6;border-width:0 1px 1px 1px;padding:15px;border-bottom-left-radius: .25rem;border-bottom-right-radius: .25rem;">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <form id="mainform" method="POST" action="" enctype="multipart/form-data" style="display:none;">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Company Name :</label>
												<input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Company Name">
											</div>
										</div>
											<div class="col-md-3">
											<div class="form-group">
												<label>Company Email ID :</label>
												<input type="text" class="form-control" id="cemail" name="cemail" placeholder="Enter Company Email ID ">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Mobile No :</label>
												<input type="text" class="form-control" id="mblno" name="mblno" placeholder="Enter Mobile No">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Address :</label>
												<textarea class="form-control" id="addr" name="addr" placeholder="Enter Address"></textarea>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>City :</label>
												<input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>State :</label>
												<input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Postal Code :</label>
												<input type="text" class="form-control" id="pcode" name="pcode" placeholder="Enter Postal Code">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Username:</label>
												<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Password :</label>
												<input type="text" class="form-control" id="pass" name="pass" placeholder="Enter Password">
											</div>
										</div>
										<!-- <div class="col-md-3">
											<div class="form-group">
												<label>Below Applied Shipping Cost</label>
												<input type="text" class="form-control" id="below_rs" name="below_rs" placeholder="Enter Below RS">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Shipping Charges:</label>
												<input type="text" class="form-control" id="shipping_charges" name="shipping_charges" placeholder="Enter Shipping Charge">
											</div>
										</div> -->
									
									<!--
												<div class="col-md-3">
											<div class="form-group">
												<label>Customer App Version :</label>
												<input type="text" class="form-control" id="customer_app_version" name="customer_app_version" placeholder="Enter Customer App Version">
											</div>
										</div>
									
									
									<div class="col-md-3">
											<div class="form-group">
												<label>Travelling Charges :</label>
												<input type="text" class="form-control" id="travelling_charges" name="travelling_charges" placeholder="Enter Travelling Charges">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Convenience Charges :</label>
												<input type="text" class="form-control" id="convenience_charges" name="convenience_charges" placeholder="Enter Convenience Charges">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Hang On Charges :</label>
												<input type="text" class="form-control" id="hang_on_fix_charges" name="hang_on_fix_charges" placeholder="Enter Hang On Charges">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Emergency Time Charges :</label>
												<input type="text" class="form-control" id="emergency_time_charges" name="emergency_time_charges" placeholder="Enter Emergency Time Charges">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Offer Code Applied Above :</label>
												<input type="text" class="form-control" id="offer_code_applied_above" name="offer_code_applied_above" placeholder="Enter Offer Code Applied Above Amount">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Super Coin Applied Above :</label>
												<input type="text" class="form-control" id="super_coin_applied_above" name="super_coin_applied_above" placeholder="Enter Super Coin Applied Above Amount">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>One Super Coin for Every :</label>
												<input type="text" class="form-control" id="one_super_coin_for" name="one_super_coin_for" placeholder="Enter One Super Coin for Every this Amount">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>One Super Coin Equals to :</label>
												<input type="text" class="form-control" id="one_super_coin_equals_to" name="one_super_coin_equals_to" placeholder="Enter One Super Coin Equals to">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Super Coin Credited Above :</label>
												<input type="text" class="form-control" id="super_coin_credited_above" name="super_coin_credited_above" placeholder="Enter Super Coin Credited Above">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>One Super Coin Credited for  :</label>
												<input type="text" class="form-control" id="one_super_coin_credited_for" name="one_super_coin_credited_for" placeholder="Enter One Super Coin Credited for Every this Amount">
											</div>
										</div> -->
										<div class="col-md-6">
											<div class="form-group searchbut">
												<button type="submit" name="submit" id="submit" class="btn btn-success">Update</button>
												<a href="settings.php"><button type="button" class="btn btn-danger">Cancel</button></a>
											</div>
										</div>
									</div>
									
									<span id="msg" style="font-weight:bold;margin-top:7px;color:red"></span>
								</form>
                                <form id="empform" method="POST" action="" enctype="multipart/form-data" style="display:none;">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Username : <span id="unameshow" style="color:red"></span></label>
												<input type="text" class="form-control" id="emp_uname" name="emp_uname" placeholder="Enter Username">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Password :</label>
												<input type="text" class="form-control" id="emp_pass" name="emp_pass" placeholder="Enter Password">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group submitbut">
												<button type="button" name="submit" id="emp_submit" class="btn btn-success">Update</button>
												<a href="receiver_details.php"><button type="button" class="btn btn-danger">Cancel</button></a>
											</div>
										</div>
									</div>
									
									<span id="emp_msg" style="font-weight:bold;margin-top:7px;color:red"></span>
								</form>
                            </div>
							<div class="tab-pane fade" id="technical" role="tabpanel" aria-labelledby="technical-tab">
							  <form id="techform" method="POST" action="" enctype="multipart/form-data">
								  <div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>SMS Settings :</label>
											<input type="checkbox" class="form-control" id="smsenable" value="1" name="smsenable" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>SMS Username :</label>
											<input type="text" class="form-control" id="smsusername" name="smsusername" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>SMS Password :</label>
											<input type="text" class="form-control" id="smspassword" name="smspassword" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group submitbut">
											<button type="button" name="submit" id="tech_submit" class="btn btn-success">Update</button>
											<a href="settings.php"><button type="button" class="btn btn-danger">Cancel</button></a>
										</div>
									</div>
									<span id="msg_tech" style="font-weight:bold;margin-top:7px;color:red"></span>
								</div>
							   </form>							
							</div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <label style="font-size:18px">About Developers :</label>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<a href="https://www.knocktheglobe.com/" target="_blank" style="font-size:16px"><b>Knock The Globe Technologies,</b></a><br/> 94, Vaiyapuri Nagar
												2nd Cross,<br/> Karur-639002,<br/> Tamilnadu.
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email Id :</label>
												<a href="mailto:ktgtoffice@gmail.com" target="_blank" style="font-size:16px"><b>ktgtoffice@gmail.com</b></a><br/>
												<label>Mobile No :</label>
												<a href="tel:+919514314333" target="_blank" style="font-size:16px"><b>+91 7200 123452</b></a><br/>
												<a href="https://www.facebook.com/KarurWebsiteDesigners/" target="_blank" style="font-size:35px;margin-right:15px"><i class="fa fa-facebook-square"></i></a>
												<a href="https://twitter.com/knocktheglobe" target="_blank" style="font-size:35px;margin-right:15px"><i class="fa fa-twitter-square"></i></a>
												<a href="https://www.linkedin.com/in/ktgtechnologies" target="_blank" style="font-size:35px;margin-right:15px"><i class="fa fa-linkedin-square"></i></a>
											</div>
										</div>
									</div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
								 Click here for <a href="https://www.knocktheglobe.com/termsandconditions.php" target="_blank" class="btn btn-danger"><i class="fa fa-external-link"></i>&nbsp;&nbsp;Terms & Conditions</a>
                            </div>
                        </div>
                    </div>
                </div>
		</div>
	</div>
</main>
<?php include('footer.php');?>

</body>

<script>
$(document).ready(function(){

if('<?php echo $log;?>'!=1){
	$("#mainform").css('display','none');
	$("#empform").css('display','block');
	
	$.ajax({
		type: "POST",
		url: "phpservices/emp_profile_autobind.php",
		data:{emp_id:"<?php echo $login_id;?>"},
		dataType:'json',
		success: function(result) {
			$("#emp_uname").val(result.uname);
			$("#unameshow").html(result.uname);
			$("#emp_pass").val(result.pass);
		},error:function(xhr,status,error){
			console.log(JSON.stringify(xhr,status,error));
		}
	});		
}
else{
	$("#mainform").css('display','block');
	$("#empform").css('display','none');
	
	$.ajax({
		type: "POST",
		url: "phpservices/profile_autobind.php",
		dataType:'json',
		success: function(result) {
			$("#cname").val(result.cname);
			$("#cemail").val(result.cemail);
			$("#mblno").val(result.mblno);
			$("#email").val(result.email);
			$("#addr").val(result.addr);
			$("#uname").val(result.uname);
			$("#pass").val(result.pass);
			$("#city").val(result.city);
			$("#pcode").val(result.pcode);
			$("#state").val(result.state);
			// $("#shipping_charges").val(result.shipping_charges);
			// $("#below_rs").val(result.below_rs);
			
			console.log(result.smsenable);
			
			$("#smsusername").val(result.smsusername);
			$("#smspassword").val(result.smspassword);
			
			if((result.smsenable)==0)
			  $('input[name="smsenable"]').prop('checked',false);
			else
			  $('input[name="smsenable"]').prop('checked',true);
			
			
			// $("#one_super_coin_credited_for").val(result.one_super_coin_credited_for);
			// $("#super_coin_credited_above").val(result.super_coin_credited_above);
			// $("#one_super_coin_equals_to").val(result.one_super_coin_equals_to);
			// $("#one_super_coin_for").val(result.one_super_coin_for);
			// $("#super_coin_applied_above").val(result.super_coin_applied_above);
			// $("#offer_code_applied_above").val(result.offer_code_applied_above);
			// $("#emergency_time_charges").val(result.emergency_time_charges);
			// $("#hang_on_fix_charges").val(result.hang_on_fix_charges);
			// $("#convenience_charges").val(result.convenience_charges);
			// $("#travelling_charges").val(result.travelling_charges);
			// $("#worker_app_version").val(result.worker_app_version);
		},error:function(xhr,status,error){
			console.log(JSON.stringify(xhr,status,error));
		}
	});		
}$("#emp_uname").keyup(function(){
	$("#unameshow").html($("#emp_uname").val()+"@tenssports");
});	
		
	$("#emp_submit").click(function(e){ //alert("ASAS");
		e.preventDefault();
		if($("#emp_uname").val()==''){
			$("#emp_msg").css("color","red").html('* Enter Username');
			setTimeout(function(){$("#emp_msg").html('')},3000);
			return false;
		}
		else if($("#emp_pass").val()==''){
			$("#emp_msg").css("color","red").html('* Enter Password');
			setTimeout(function(){$("#emp_msg").html('')},3000);
			return false;
		}
		else{
			$("#emp_msg").css("color","green").html("Processing . . .");
			$.ajax({
					type: "POST",
					url: "phpservices/emp_profile_update.php",
					dataType:'json',
					data: $("#empform").serialize(),
					success: function(result) {
						console.log(result.op);
						if(result.op==1){
							$("#emp_msg").css("color","green").html("Successfully Updated !");
							$(".sweet-update").click();
							setTimeout(function(){
								window.location.href='settings.php';
							},2000);
						}
						else{
							$("#emp_msg").html(result.op);
						}
					},error:function(xhr,status,error){
						console.log(JSON.stringify(xhr,status,error));
					}
				});
		}
	});
		
	$("#submit").click(function(e){
		e.preventDefault();
		if($("#uname").val()==''){
			$("#msg").css("color","red").html('* Enter Username');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else if($("#pass").val()==''){
			$("#msg").css("color","red").html('* Enter Password');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else{
			$("#msg").css("color","green").html("Processing . . .");
		    $.ajax({
				type: "POST",
				url: "phpservices/profile_update.php",
				dataType:'json',
				data: $("#mainform").serialize(),
				success: function(result) {
					console.log(result.op);
					if(result.op==1){
						$("#msg").css("color","green").html("Successfully Updated !");
						$(".sweet-update").click();
						setTimeout(function(){
							window.location.href='settings.php';
						},2000);
					}
					else{
						alert($("#msg").html(result.op));
					}
				},error:function(xhr,status,error){
					console.log(JSON.stringify(xhr,status,error));
				}
			});
		}
	});
	//Technical supoort
	$("#tech_submit").click(function(e){
		 //alert("SD");
		 console.log($("#techform").serialize());
	   
	    $("#msg_tech").css("color","green").html("Processing . . .");
		$.ajax({
			type: "POST",
			url: "phpservices/profile_update_technical.php",
			dataType:'json',
			data: $("#techform").serialize(),
			success: function(result) {
				console.log(result.op);
				if(result.op==1){
					$("#msg_tech").css("color","green").html("Successfully Updated !");
					$(".sweet-update").click();
					setTimeout(function(){
					window.location.href='settings.php';
					},1000);
				}
				else{
					alert($("#msg").html(result.op));
				}
			},error:function(xhr,status,error){
				console.log(JSON.stringify(xhr,status,error));
			}
		});
	});
	
});
</script>
</html>