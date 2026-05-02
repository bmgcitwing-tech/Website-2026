<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BM Global Careers</title>

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
            <h4>Update Team Members</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-t-0">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Team Members</li>
                </ol>
            </nav>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
			<div class="card">
                <div class="card-body">
					<form id="mainform" method="POST" action="" enctype="multipart/form-data">
						<div class="row">
						<?php
							$sql="select * from tbl_disabled_dates where id='".$_GET['id']."'";
							$exec_sql=mysqli_query($conn,$sql);
							$fetch_sql=mysqli_fetch_array($exec_sql);
						?>
							<div class="col-md-3">
								<div class="form-group">
									<label>Disabled Dates :</label>
									<input type="hidden" name="action" value="add" />
									<input type="date" class="form-control" placeholder="Enter Project Name" name="disabled_date" id="disabled_date" autocomplete="off" value="<?php echo $fetch_sql['disabled_date']; ?>">
									<input type="hidden" class="form-control" name="id" value="<?php echo $fetch_sql['id']; ?>">
								</div>
							</div>
                            <div class="col-md-3">
									<div class="form-group">
									<label>Disable Reasons : </label>
									<textarea class="form-control" id="description" rows="3" name="description" ><?php echo $fetch_sql['description']; ?></textarea>
								</div>
							</div>
							<div class="col-md-12 text-center">
								<div class="form-group">
									<button type="button" name="submit" id="submit" class="btn btn-success">Update</button>
									<a href="counselling_appointments_date.php"><button type="button" id="cansubmit" class="btn btn-danger">Cancel</button></a>
								</div>
								<span id="msg" style="font-weight:bold;margin-top:7px;"></span>
							</div>

						</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</main>
<!-- end::main content -->

<!-- begin::global scripts -->
<script src="vendors/bundle.js"></script>
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
	#submit{
		margin-top:32px;
	}
	#cansubmit{
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

	$('#detailsgrid').DataTable({"responsive": true,});	

	$("#submit").click(function(e){
		e.preventDefault();
		if($("#disabled_date").val()==''){
			$("#msg").css("color","red").html('* Enter Date');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else if($("#description").val()==''){
			$("#msg").css("color","red").html('* Enter Reasons');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else{
			$("#msg").css("color","green").html("Processing . . .");
			$.ajax({
					type: "POST",
					url: "phpservices/update_appointments_date.php",
					dataType:'json',
					data: $("#mainform").serialize(),
					success: function(result) {
						if(result.op==1){
							$("#msg").css("color","green").html("Successfully Updated !");
							setTimeout(function(){
								window.location.href='counselling_appointments_date.php';
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