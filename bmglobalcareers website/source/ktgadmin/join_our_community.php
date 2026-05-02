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
            <h4>Join our Community</h4>
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
									<label>Title:</label>
									<input type="hidden" name="action" value="add" />
									<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Image : <span style="color:red">(Max Size : 300 Kb)</span></label>
									<input type="file" class="form-control" id="photo" name="photo">
									<input type="hidden" id="photo_name" name="photo_name">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group" id="imgpreview">
									<label>Image Preview : </label>
									<img src="media/image/no_image.png" style="width:110px">
								</div>
							</div>
							<div class="col-md-3">
											<div class="form-group">
									<label>Description : </label>
									<textarea class="form-control" id="description" rows="3" name="description" style="height: 37px; min-height: 37px; margin-top: 0px; margin-bottom: 0px;"></textarea>
								</div>
							</div>
							<div class="col-md-12 text-center">
								<div class="form-group">
									<button type="button" name="submit" id="submit" class="btn btn-success">Save</button>
									<span id="msg" style="font-weight:bold;margin-top:7px;"></span>
								</div>
								
							</div>
							
						</div>
                    </form>
				</div>
			</div>
			<div class="card">
                <div class="card-body">
                   <table id="detailsgrid" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Title</th>
                        <th>Banner Image</th>
                        <th>Last&nbsp;Update</th>
                        <th>Action</th>
                    </tr>
                    </thead>
					<tbody>
					<?php    								 
                              $sql = "SELECT *,date_format(create_date,'%d/%m/%Y %H:%i:%s') as create_date,date_format(update_date,'%d/%m/%Y %H:%i:%s') as update_date FROM tbl_join_our_community WHERE delete_status='NDL' order by ban_id desc";
                              $exec_sql=mysqli_query($conn,$sql);
                              $i=1;
                              while($fetch_sql=mysqli_fetch_array($exec_sql)) {
                            ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo str_replace("^","'",$fetch_sql['title']); ?></td>
                            <td><img class="img-responsive" src ="userdata/images/join_our_community/<?php echo $fetch_sql['imgname']; ?>" width="100px"></td> 
							<?php 
								if($fetch_sql['update_date']!=''){
							?>
							<td><a href="javascript:void(0)" class="badge badge-primary" style="color:#fff"><?php echo $fetch_sql['update_date']; ?></a></td>
							<?php
								}
								else{
							?>
							<td><a href="javascript:void(0)" class="badge badge-primary" style="color:#fff"><?php echo $fetch_sql['create_date']; ?></a></td>
							<?php
								}
							?>
							<td><div class="btn-group" role="group" aria-label="Basic example">
									<a href="join_our_community_update.php?id=<?php echo $fetch_sql['ban_id']; ?>" >
										<button type="button" class="btn btn-success" style="padding:3px 5px;margin-right:5px">
											<i class="fa fa-edit" style="color: #fff;padding: 3px;margin: 0;font-size: 20px;"></i>
										</button>
									</a>
									<a href="javascript:void(0)" class="deleteTriger" data-value="<?php echo $fetch_sql['ban_id']; ?>">
										<button type="button" class="btn btn-danger" style="padding:3px 5px;">
											<i class="fa fa-trash" style="color: #fff;padding: 3px;margin: 0;font-size: 20px;"></i>
										</button>
									</a>
								</div>
							</td>
						</tr>
						<?php
					  $i++;
						}   
						?>						
					</tbody>
                </table>
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
							$("#photo_name").val(result.op);
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
			$("#msg").css("color","red").html('* Enter Title');
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
					url: "phpservices/add_join_our_community.php",
					dataType:'json',
					data: $("#mainform").serialize(),
					success: function(result) {
						if(result.op==1){
							$("#msg").css("color","green").html("Successfully Saved !");
							setTimeout(function(){
								location.reload();
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
 
	$(document).on('click','.deleteTriger', function(){
		var delid=$(this).data('value');
		var alertmsg=confirm("Do you want to Delete ?");
		if (alertmsg == true) {
			$.ajax({
						type: "POST",
						url: "phpservices/join_our_community_delete.php",
						dataType:'json',
						data: {delid:delid},
						success: function(result) {
							if(result.op==1){
								alert("Successfully Deleted");
								setTimeout(function(){
									location.reload();
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