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
    <!-- end::custom styles -->

</head>
<body>
<?php 
include('sessionservices.php');
?>
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
            <h4>Add JCI Designation</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-t-0">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">JCI Designation</li>
                    <li class="breadcrumb-item active" aria-current="page">Add Designation</li>
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
							<div class="col-md-3">
								<div class="form-group">
									<label>Designation Name :</label>
									<input type="text" class="form-control" id="dname" name="dname" placeholder="Enter JIB Designation Name">
								</div>
							</div>
							<div class="col-md-2 newdiv">
								<div class="form-group">
									<input type="checkbox" class="form-control" id="cur_year" name="cur_year" style="width:20px;height:20px;float:left;margin-right:10px">
									<input type="hidden" name="president_status" id="president_status">
									<label for="cur_year">President</label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Order No :</label>
									<input type="number" class="form-control" id="orderno" name="orderno" placeholder="Enter Designation Order No">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Description :</label>
									<textarea class="form-control" id="descp" name="descp" placeholder="Enter Description"></textarea>
								</div>
							</div>
						</div>
						<input type="hidden" name="desig_id" id="desig_id">
						<input type="hidden" name="adminid" id="adminid">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                        <a href="designation_details.php"><button type="button" class="btn btn-danger">Cancel</button></a>
						<span id="msg" style="font-weight:bold;float:right;margin-top:7px;"></span>
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
	.newdiv{
		margin-top:40px
	}
}

@media(max-width:480px){
	nav.navbar .header-logo a img{
		width:180px;
	}
}
</style>
<script>
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
	var id=getUrlVars()["id"];
	$("#desig_id").val(id);
$(document).ready(function(){
$("#adminid").val(adminid);

$.ajax({
		type: "POST",
		url: "phpservices/designation_autobind.php",
		dataType:'JSON',
		data: {desig_id:id},
		success: function(result) {
				$("#dname").val(result.dname);
				$("#orderno").val(result.order_by);
				$("#descp").val(result.descp);
				$("#president_status").val(result.president_status);
				if(result.president_status=='Y'){
					$("#cur_year").prop('checked',true);
				}
		},error:function(xhr,status,error){
			console.log(JSON.stringify(xhr,status,error));
		}
	});	

	$("#submit").click(function(e){
		e.preventDefault();
		if($("#dname").val()==''){
			$("#msg").css("color","red").html('* Enter JCI Designation Name');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else if($("#orderno").val()==''){
			$("#msg").css("color","red").html('* Enter Designation Order No');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else{
			$("#msg").css("color","green").html("Processing . . .");
			if($('input[name="cur_year"]').is(':checked')){
				$("#president_status").val('Y');
			}
			else{
				$("#president_status").val('N');
			}
			$.ajax({
					type: "POST",
					url: "phpservices/designation_update.php",
					dataType:'json',
					data: $("#mainform").serialize(),
					success: function(result) {
						console.log(result.op);
						if(result.op==1){
							$("#msg").css("color","green").html("Successfully Updated !");
							setTimeout(function(){
								window.location.href="designation_details.php";
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
	
});
</script>
</html>