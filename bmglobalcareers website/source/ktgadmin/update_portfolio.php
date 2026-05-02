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
	<link href="css/editor.css" type="text/css" rel="stylesheet"/>
    <!-- begin::custom styles -->
    <link rel="stylesheet" href="css/app.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


<main class="main-content">

	<div class="row">
        <div class="col-md-12">
			<div class="card">
                <div class="card-body">
                                <form id="mainform" method="POST" action="" enctype="multipart/form-data">
									<div class="row" id="maindiv">
										<div class="col-md-3">
											<div class="form-group">
												<label>Side Tab Title: </label>
												<input type="text" class="form-control" id="title" name="title" placeholder="Enter Side Tab Title">
											</div>
										</div>	
										<div class="col-md-2">
											<div class="form-group">
												<label> Order By: </label>
												<input type="number" class="form-control" id="order_by" name="order_by" placeholder="Enter Order">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Description :</label>
												<textarea id="txtEditor" placeholder="Enter Description" name="description" class="form-control"></textarea> 
												<textarea id="finaldescp" name="finaldescp" class="form-control" style="display:none"></textarea> 
											</div>
										</div>
										<input type="hidden" name="req" id="req">
										<input type="hidden" name="prod_st_mi_dt_id" id="prod_st_mi_dt_id" value="<?php echo $_GET['id'];?>">
										<div class="col-md-3">
											<div class="form-group">
												<button type="submit" name="submit" id="submit" class="btn btn-success" style="font-weight:bold"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;Update</button>
												<a href="portfolio.php"><button type="button" id="resetbut" class="btn btn-danger" style="font-weight:bold"><i class="fa fa-refresh"></i>&nbsp;&nbsp;Cancel</button></a>
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
<!-- begin::global scripts -->
<script src="vendors/bundle.js"></script>
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

<script>
$(document).ready(function(){
$("#txtEditor").Editor();

var ids_string=<?php echo $_GET['id']; ?>;
$(".page-loader").show();
$.ajax({
		type: "POST",
		url: "phpservices/portfolio_service.php",
		dataType:'json',
		data: {prod_st_mi_dt_id:ids_string,req:"PRODSTMIDAUB"},
		success: function(result) {
			$("#txtEditor").Editor("setText",result.op[0]['descp']);
			$("#finaldescp").val(result.op[0]['descp']);
			$("#title").val(result.op[0]['title']);
			$("#order_by").val(result.op[0]['order_by']);
			$(".page-loader").hide();
		},error:function(xhr,status,error){
			console.log(JSON.stringify(xhr,status,error));
		}
	});	

	 $("#submit").click(function(e){
		e.preventDefault();
		if($("#title").val()==''){
			swal("Error!", "Enter Side Tab Title !", "warning");
			return false;
		}
		else{
			$(".page-loader").show();
			$("#req").val('PRODSTMIDUPD');
			$("#finaldescp").val(($("#txtEditor").Editor("getText")));
			$.ajax({
					type: "POST",
					url: "phpservices/portfolio_service.php",
					dataType:'json',
					data: $("#mainform").serialize(),
					success: function(result) {
						$(".page-loader").hide();
						if(result.op==1){
							swal("Success!", "Successfully Updated !", "success");
							setTimeout(function(){
								window.location.href="portfolio.php";
							},1000);
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
});
</script>
</html>