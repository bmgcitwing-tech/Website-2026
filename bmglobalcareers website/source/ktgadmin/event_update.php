<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vigneshwara Interior & Exterior</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="vendors/datepicker/daterangepicker.css">
    <link rel="stylesheet" href="vendors/dataTable/responsive.bootstrap.min.css" type="text/css">
    <!-- begin::datepicker -->

    <!-- begin::vmap -->
    <link rel="stylesheet" href="vendors/vmap/jqvmap.min.css">
    <!-- begin::vmap -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="css/app.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/editor.css" type="text/css" rel="stylesheet"/>
    <!-- end::custom styles -->

</head>
<body>
<?php 
include('sessionservices.php');
?>
<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>Loading ...</span>
</div>
<!-- end::page loader -->

<?php echo $header;?>

<!-- begin::main content -->
<main class="main-content">

    <div class="container-fluid">
        <div class="page-header d-md-flex justify-content-between align-items-center">
            <h4>Update Events Details</h4>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
			<div class="card">
                <div class="card-body">
					<form id="mainform" method="POST" action="" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Title : </label>
									<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Event Date : </label>
									<input type="text" id="date" class="form-control" placeholder="Enter Project Name" name="single-date-picker">
									<input type="hidden" name="event_date" id="event_date">
									<input type="hidden" name="event_id" id="event_id" value="<?php echo $_GET['id'];?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Description :</label>
									<textarea id="txtEditor" placeholder="Enter Description" name="description" class="form-control"></textarea> 
									<textarea id="finaldescp" name="finaldescp" class="form-control" style="display:none"></textarea> 
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									<label>Send Notication : </label>
									<input type="checkbox" class="form-control" id="send_notification" name="send_notification" value="1" placeholder="Enter">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<button type="button" name="submit" id="submit" class="btn btn-success">Update</button>
									<a href="events_details.php"><button type="button" id="cansubmit" class="btn btn-danger">Cancel</button></a>
								</div>
							</div>
							<div class="col-md-12 text-center">
								<div class="form-group">
									<span id="msg" style="font-weight:bold;margin-top:7px;"></span>
								</div>
							</div>
						</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</main>
				<button type="button" class="btn btn-success sweet-delete" style="display:none"></button>
				<button type="button" class="btn btn-success sweet-insert" style="display:none"></button>
				<button type="button" class="btn btn-success sweet-update" style="display:none"></button>
<script src="vendors/bundle.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="js/editor.js"></script>
<!-- end::global scripts -->
<script src="vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="js/examples/datatable.js"></script>
<!-- begin::charts -->
<script src="vendors/charts/chartjs/chart.min.js"></script>
<script src="vendors/charts/peity/jquery.peity.min.js"></script>
<script src="js/examples/charts/chartjs.js"></script>
<script src="js/examples/charts/peity.js"></script>
<!-- end::charts -->

<!-- begin::daterangepicker -->
<script src="vendors/datepicker/daterangepicker.js"></script>
<script src="js/examples/datepicker.js"></script>
<!-- end::daterangepicker -->

<!-- begin::dashboard -->
<script src="js/examples/dashboard.js"></script>
<!-- end::dashboard -->

<!-- begin::vamp -->
<script src="vendors/vmap/jquery.vmap.min.js"></script>
<script src="vendors/vmap/maps/jquery.vmap.usa.js"></script>
<script src="js/examples/vmap.js"></script>
<!-- end::vamp -->

<!-- begin::custom scripts -->
<script src="js/custom.js"></script>
<script src="js/app.min.js"></script>
<script src="js/examples/sweet-alert.js"></script>
<!-- end::custom scripts -->

</body>
<style>
@media(min-width:992px){
	.navbar-nav{
		display:block!important;
		width:100%;
	}
	.userdiv{
		float:right;
	}
	#submit,#cansubmit{
		margin-top:32px;
	}
}

@media(max-width:480px){
	nav.navbar .header-logo a img{
		width:180px;
	}
}
</style>
<script>
$(document).ready(function(){
	$("#txtEditor").Editor();
	if($("#send_notification").prop('checked')==true){
                   
                   $("#send_notification").val("1");
               }
               else{
                 
                   $("#send_notification").val("0");
               }



		$("#send_notification").click(function(){
			if($("#send_notification").prop('checked')==true){
				
				$("#send_notification").val("1");
			}
			else{
				
				$("#send_notification").val("0");
			}
			});
$("#date").change(function(){
	$("#event_date").val($("#date").val());
	$("#event_time").val($("#date").val());
}); 
 
$("#time").change(function(){
	$("#event_time").val($("#date").val());
}); 
	
$.ajax({
		type: "POST",
		url: "phpservices/events_autobind.php",
		dataType:'JSON',
		data: {event_id:<?php echo $_GET['id'];?>},
		success: function(result) {
		//alert(result.date);
				$("#title").val(result.title);
				$("#date").val(result.event_date);
				$("#event_date").val(result.event_date);
				$("#txtEditor").Editor("setText",result.description);
		},error:function(xhr,status,error){
			console.log(JSON.stringify(xhr,status,error));
		}
	});	

	$("#submit").click(function(e){
		e.preventDefault();
		if($("#title").val()==''){
			$("#msg").css("color","red").html('* Enter Title');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else if($("#event_date").val()==''){
			$("#msg").css("color","red").html('* Select Event Date');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else{
			$("#msg").css("color","green").html("Processing . . .");
			$("#finaldescp").val(($("#txtEditor").Editor("getText")));
			$.ajax({
					type: "POST",
					url: "phpservices/update_event.php",
					dataType:'json',
					data: $("#mainform").serialize(),
					success: function(result) {
						if(result.op==1){
							$("#msg").css("color","green").html("Successfully Saved !");
							setTimeout(function(){
								window.location.href='events_details.php';
							},1500);
						}
						else{
							$("#msg").html(result.op);
						}
					},error:function(xhr,status,error){
						console.log(JSON.stringify(xhr,status,error));
					}
				});
		}
	});	
	
});
</script>
</html>