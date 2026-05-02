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
												<label>Title :</label>
												<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Image : <span style="color:red;font-weight:bold;">* Max size 300 Kbs</span></label>
												<input type="file" class="form-control" id="photo" name="photo">
												<input type="hidden" name="photo_name" id="photo_name">
											</div>
										</div>	
										<div class="col-md-3">
											<div class="form-group" id="imgpreview">
												<label>Image Preview :</label>
												<img src="media/image/no_image.png" style="width:100px">
											</div>
										</div>	
										<input type="hidden" name="req" id="req">
										<input type="hidden" name="prod_st_mi_dt_id" id="prod_st_mi_dt_id" value="<?php echo $_GET['id'];?>">
										<div class="col-md-3">
											<div class="form-group">
												<button type="submit" name="submit" id="submit" class="btn btn-success" style="font-weight:bold"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;Save</button>
												<a href="portfolio.php"><button type="button" id="resetbut" class="btn btn-danger" style="font-weight:bold"><i class="fa fa-refresh"></i>Cancel</button></a>
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
                        <th>Title</th>
                        <th>Image</th>
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
<script src="js/examples/sweet-alert.js"></script>
<!-- end::custom scripts -->

</body>

<script>
$(document).ready(function(){
	
$("#resetbut").click(function(){
	$("#title").val('');
	$("#photo").val('');
	$("#photo_name").val('');
	$("#imgpreview").html('<label>Image Preview :</label><img src="media/image/no_image.png" style="width:100px;margin-left:4px">');
	$("#resetbut").css('outline','none');
	$("#resetbut").css('box-shadow','none');
});		

	$('#detailsgrid').DataTable({
	     "bProcessing": true,
         "serverSide": true,
		 "responsive": true,
         "ajax":{
            url :"phpservices/portfolio_multi_images_grid.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
			data:{prod_st_mi_dt_id:"<?php echo $_GET['id'];?>"},
            error:function(xhr,status,error){
						console.log(JSON.stringify(xhr,status,error));
          }
		 }
        });	

$("#photo").change(function(){
	var numb = $(this)[0].files[0].size/1024/1024;
	numb = numb.toFixed(2);
	var fileName = $("#photo").val();
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile=="jpg" || extFile=="jpeg" || extFile=="png" || extFile=="JPG" || extFile=="JPEG" || extFile=="PNG"){
		if(numb <= 0.3){
			$(".page-loader").show();
			var fd=new FormData();
			fd.append('photo',$('#photo').prop('files')[0]);
			setTimeout(function(){	
				$.ajax({
						type:'POST',
						url:'phpservices/img_upload.php',
						data:fd ,
						cache:false,
						contentType:false,
						processData:false,
						dataType: 'JSON',
						success: function(result) {
							$(".page-loader").hide();
							$("#photo_name").val(result.op);
							$("#imgpreview").html('<label>Image Preview :</label><img src="temp/'+result.op+'" style="width:100px;margin-left:10px">');
						},
						async:false
				});
			},2000);
		}
		else{
			$("#photo").val('');
			$("#photo_name").val('');
			swal("Error!", "* Upload maximum 300 kb Image only !", "warning");
			return false;
		}
	}
	else{
		$("#photo").val('');
		$("#photo_name").val('');
		swal("Error!", "* Upload .png, .jpg, .jpeg, .PNG, .JPG, .JPEG type image only!", "warning");
		return false;
	}
 });

	 $("#submit").click(function(e){
		e.preventDefault();
		if($("#photo_name").val()=='' || $("#photo").val()==''){
			swal("Error!", "Upload Image !", "warning");
			return false;
		}
		else{
			$(".page-loader").show();
			$("#req").val('PRODSTMIINS');
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
								window.location.href="portfolio_multi_images.php?id="+<?php echo $_GET['id'];?>;
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
					data: {delid:delid,photo_name:photo_name,req:"PRODSTMIDEL"},
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