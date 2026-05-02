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
            <h4>Update  List</h4>
			<!-- <span style="font-size: 15px;color: red">( Data's will be shown in website according to the order you have entered )</span> -->
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
			<div class="card">
                <div class="card-body">
					<form id="mainform" method="POST" action="" enctype="multipart/form-data">
						<div class="row">
						<?php
							$sql="select * from tbl_social_media where social_media_id='".$_GET['id']."'";
							$exec_sql=mysqli_query($conn,$sql);
							$fetch_sql=mysqli_fetch_array($exec_sql);
						?>
							<div class="col-md-2">
								<div class="form-group">
									<label>Name:</label>
									<input type="hidden" name="action" value="add" />
									<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title "value="<?php echo str_replace("^","'",$fetch_sql['title']); ?>">
								</div>
							</div>
							<!-- <div class="col-md-2">
								<div class="form-group">
									<label>Year:</label>
									<input type="hidden" name="action" value="add" />
									<input type="text" class="form-control" id="year" name="year" placeholder="Enter Title "value="<?php echo str_replace("^","'",$fetch_sql['year']); ?>">
								</div>
							</div> -->
							<div class="col-md-3">
								<div class="form-group">
									<label>Image : <span style="color:red">(Max Size : 300 Kb)</span></label>
									<input type="file" class="form-control" id="photo" name="photo">
									<input type="hidden" id="photo_old_name" name="photo_old_name" value="<?php echo $fetch_sql['imgname']; ?>">
									<input type="hidden" id="photo_new_name" name="photo_new_name">
									<input type="hidden" id="social_media_id" name="social_media_id" value="<?php echo $fetch_sql['social_media_id']; ?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group" id="imgpreview">
									<img src="userdata/images/social_media/<?php echo $fetch_sql['imgname']; ?>" style="width:110px">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Link :</label>
									
																	
									<textarea class="form-control" id="link" name="link" placeholder="Enter Link " style="min-height:36px;height:32px;"><?php echo str_replace("^","'",$fetch_sql['link']); ?></textarea>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<button type="button" name="submit" id="submit" class="btn btn-success">Update</button>
									<!--a href="social_media.php"><button type="button" id="cansubmit" class="btn btn-danger">Cancel</button></a-->
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
							$("#photo_new_name").val(result.op);
							$("#imgpreview").html('<label>Image Preview :</label><img src="temp/'+result.op+'" style="width:100px;margin-left:10px">');
						},
						async:false
				});
			},2000);
		}
		else{
			$("#photo").val('');
			swal("Error!", "* Upload maximum 300 Kb Image only", "error");
			return false;
		}
	}
	else{
		$("#photo").val('');
		swal("Error!", "* Upload .png, .jpg, .jpeg, .PNG, .JPG, .JPEG file type image only", "error");
		return false;
	}
 });	

	$("#submit").click(function(e){
		e.preventDefault();
		if($("#title").val()==''){
			$("#msg").css("color","red").html('* Enter Name');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else if($("#link").val()==''){
			$("#msg").css("color","red").html('* Enter Link');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else if($("#photo_name").val()==''){
			$("#msg").css("color","red").html('* Upload Image');
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else{
			$("#msg").css("color","green").html("Processing . . .");
			$.ajax({
					type: "POST",
					url: "phpservices/update_social_media.php",
					dataType:'json',
					data: $("#mainform").serialize(),
					success: function(result) {
						if(result.op==1){
							$("#msg").css("color","green").html("Successfully Updated !");
							setTimeout(function(){
								window.location.href='social_media.php';
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