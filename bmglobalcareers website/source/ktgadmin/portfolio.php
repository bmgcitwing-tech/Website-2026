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

<!-- begin::main content -->
<main class="main-content">
<div class="container-fluid">
        <div class="page-header d-md-flex justify-content-between align-items-center">
            <h4>Portfolio</h4>
        </div>
    </div>
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
										<div class="col-md-3">
											<div class="form-group">
												<button type="submit" name="submit" id="submit" class="btn btn-success" style="font-weight:bold"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;Save</button>
												<button type="button" id="resetbut" class="btn btn-danger" style="font-weight:bold"><i class="fa fa-refresh"></i>&nbsp;&nbsp;Reset</button>
												<span id="msg" style="font-weight:bold;float:right;margin-top:7px;"></span>
											</div>
										</div>
									</div>
								</form>
					<span id="msg"></span>
                <table id="detailsgrid" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S.no</th>
						<th>Side&nbsp;Tab</th>
						<th>Sort by</th>
                        <th>Description</th>
                        <th>Last&nbsp;Update</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
                </div>
            </div>
		</div>
	</div>
</main>
<!-- end::main content -->
</body>
<!-- end::main content -->

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
	/* #submit{
		margin-top:32px;
	} */
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
	
$("#resetbut").click(function(){
	$("#prod_st_id").val('');
	$("#title").val('');
	$("#txtEditor").val('');
	$("#finaldescp").val('');
	$("#resetbut").css('outline','none');
	$("#resetbut").css('box-shadow','none');
});		

	$('#detailsgrid').DataTable({
	     "bProcessing": true,
         "serverSide": true,
		 "responsive": true,
         "ajax":{
            url :"phpservices/portfolio_img_grid.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error:function(xhr,status,error){
						console.log(JSON.stringify(xhr,status,error));
          }
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
			$("#req").val('PRODSTMIDINS');
			$("#finaldescp").val(($("#txtEditor").Editor("getText")));
			$.ajax({
					type: "POST",
					url: "phpservices/portfolio_service.php",
					dataType:'json',
					data: $("#mainform").serialize(),
					success: function(result) {
						$(".page-loader").hide();
						if(result.op==1){
							swal("Success!", "Successfully Saved !", "success");
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
	
	$(document).on('click','.deleteTriger', function(){
		var delid=$(this).data('value'),photo_name=$(this).data('photo_name');
		var alertmsg=confirm("Do you want to Delete ?");
		if (alertmsg == true) {
			$.ajax({
					type: "POST",
					url: "phpservices/portfolio_service.php",
					dataType:'json',
					data: {delid:delid,photo_name:photo_name,req:"PRODSTMIDDEL"},
					success: function(result) {
						console.log(result.op);
						if(result.op==1){
							swal("Success!", "Successfully Deleted !", "success");
							setTimeout(function(){
								$("#msg").html('');
							},2000);
							$('#detailsgrid').DataTable().ajax.reload();
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