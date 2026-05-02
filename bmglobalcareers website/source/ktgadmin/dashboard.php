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
<style>

.dataTables_info{
	display:none;
}
</style>
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

		

</main>
<!-- end::main content -->

<!-- begin::global scripts -->
<script src="vendors/bundle.js"></script>
<!-- end::global scripts -->

<!-- begin::charts -->
<script src="vendors/charts/chartjs/chart.min.js"></script>
<script src="vendors/charts/peity/jquery.peity.min.js"></script>
<script src="js/examples/charts/chartjs.js"></script>
<script src="js/examples/charts/peity.js"></script>
<!-- end::charts -->

<!-- end::global scripts -->
<script src="vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="js/examples/datatable.js"></script>
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
}
</style>
<script>
$(document).ready(function(){
		$('#wedding_grid').DataTable({
			dom: 'Bfrtip',
			buttons: [
			'excel'
			],
			"bProcessing": true,
			"serverSide": true,
			"responsive": true,				
			"searching": false, 
			
			"ajax":{
			url :"wedding_reports.php", // json datasource
			type: "post",  // type of method  ,GET/POST/DELETE
			data:{cond:"firstbind"},
			error:function(xhr,status,error){
						console.log(JSON.stringify(xhr,status,error));
			}
			}
		});
		$('#bdy_grid').DataTable({
			dom: 'Bfrtip',
			buttons: [
			'excel'
			],
			"bProcessing": true,
			"serverSide": true,
			"responsive": true,				
			"searching": false, 
			
			"ajax":{
			url :"bdy_reports.php", // json datasource
			type: "post",  // type of method  ,GET/POST/DELETE
			data:{cond:"firstbind"},
			error:function(xhr,status,error){
						console.log(JSON.stringify(xhr,status,error));
			}
			}
		});
		$('#childbdy_grid').DataTable({
			dom: 'Bfrtip',
			buttons: [
			'excel'
			],
			"bProcessing": true,
			"serverSide": true,
			"responsive": true,				
			"searching": false, 
			
			"ajax":{
			url :"child_bdy_reports.php", // json datasource
			type: "post",  // type of method  ,GET/POST/DELETE
			data:{cond:"firstbind"},
			error:function(xhr,status,error){
						console.log(JSON.stringify(xhr,status,error));
			}
			}
		});
// 	setTimeout(function(){
// 	$("#fdate").val($("#date").val());
// 	$("#tdate").val($("#date").val());
// },500); 
 
// $("#date").change(function(){
// 	$("#fdate").val($("#date").val());
// 	$("#tdate").val($("#date").val());
// }); 
	
		$.ajax({
				type: "POST",
				url: "phpservices/member_count.php",
				dataType:'json',
				data: {cond:"admin"},
				success: function(result) {
					console.log(result.op1);
					for(var i=0;i<result.year_id.length;i++){
						if(i==0){
									$("#bindspace").append('<div class="col-md-4"><div class="card text-center"><div class="card-body"><div class="icon-block icon-block-xl m-b-20 bg-info-gradient icon-block-floating"><i class="fa fa-bar-chart"></i></div><h3 class="font-weight-800" id="1point0">'+result.mem_count[i]+'</h3><p> Total Members</p></div><div class="birthdaydiv" id="birthdaydiv'+result.year_id[i]+'" data-verid="'+result.year_id[i]+'" style="position: absolute;right: 0;top: 0px;cursor:pointer">      </div><div class="weddingdiv" id="weddingdiv'+result.year_id[i]+'" data-verid="'+result.year_id[i]+'" style="position: absolute;left: 0;top: 0px;cursor:pointer">      </div></div></div>');
						}
						else if(i%2==0){
									$("#bindspace").append('<div class="col-md-4"><div class="card text-center"><div class="card-body"><div class="icon-block icon-block-xl m-b-20 bg-warning-gradient icon-block-floating"><i class="fa fa-users"></i></div><h3 class="font-weight-800" id="1point0">'+result.mem_count[i]+'</h3><p>'+result.year_name[i]+' Total Members</p></div><div class="birthdaydiv" id="birthdaydiv'+result.year_id[i]+'" data-verid="'+result.year_id[i]+'" style="position: absolute;right: 0;top: 0px;cursor:pointer">      </div><div class="weddingdiv" id="weddingdiv'+result.year_id[i]+'" data-verid="'+result.year_id[i]+'" style="position: absolute;left: 0;top: 0px;cursor:pointer">      </div></div></div>');
						}
						else if(i%3==0){
									$("#bindspace").append('<div class="col-md-4"><div class="card text-center"><div class="card-body"><div class="icon-block icon-block-xl m-b-20 bg-warning-gradient icon-block-floating"><i class="fa fa-users"></i></div><h3 class="font-weight-800" id="1point0">'+result.mem_count[i]+'</h3><p>'+result.year_name[i]+' Total Members</p></div><div class="birthdaydiv" id="birthdaydiv'+result.year_id[i]+'" data-verid="'+result.year_id[i]+'" style="position: absolute;right: 0;top: 0px;cursor:pointer">     </div><div class="weddingdiv" id="weddingdiv'+result.year_id[i]+'" data-verid="'+result.year_id[i]+'" style="position: absolute;left: 0;top: 0px;cursor:pointer">      </div></div></div>');
						}
						else if(i%3!=0 || i%2!=0){
									$("#bindspace").append('<div class="col-md-4"><div class="card text-center"><div class="card-body"><div class="icon-block icon-block-xl m-b-20 bg-success-gradient icon-block-floating"><i class="fa fa-star"></i></div><h3 class="font-weight-800" id="1point0">'+result.mem_count[i]+'</h3><p>'+result.year_name[i]+' Total Members</p></div><div class="birthdaydiv" id="birthdaydiv'+result.year_id[i]+'" data-verid="'+result.year_id[i]+'" style="position: absolute;right: 0;top: 0px;cursor:pointer">    </div><div class="weddingdiv" id="weddingdiv'+result.year_id[i]+'" data-verid="'+result.year_id[i]+'" style="position: absolute;left: 0;top: 0px;cursor:pointer">      </div></div></div>');
						}
					}
				},
				error:function(xhr,status,error){
					console.log(JSON.stringify(xhr,status,error));
				}
		});
		
		setTimeout(function(){
		$.ajax({
				type: "POST",
				url: "phpservices/member_count.php",
				dataType:'json',
				data: {cond:"admin"},
				success: function(result) {
					for(var i=0;i<result.ver_id1.length;i++){
						if($("#birthdaydiv"+result.ver_id1[i]).length!=0){
							$("#birthdaydiv"+result.ver_id1[i]).html('<div class="icon-block icon-block-xl m-b-20 bg-info-gradient icon-block-floating" style="width: 70px;height: 40px;border-radius: 5px;background-image: url(media/image/birthday.jpeg)!important;background-size: 100% 100%!important;"><i class="fa fa-birthday-cake" style="font-size:16px;position:relative;top:0px"></i>&nbsp;<span style="font-size:20px;font-weight:bold;margin-top:4px">'+result.birthday_count[i]+'</span></div>');
						}
					}
				},
				error:function(xhr,status,error){
					console.log(JSON.stringify(xhr,status,error));
				}
		});
		},500);
		
		setTimeout(function(){
		$.ajax({
				type: "POST",
				url: "phpservices/member_count.php",
				dataType:'json',
				data: {cond:"admin"},
				success: function(result) {
					for(var i=0;i<result.ver_id2.length;i++){
						if($("#weddingdiv"+result.ver_id2[i]).length!=0){
							$("#weddingdiv"+result.ver_id2[i]).html('<div class="icon-block icon-block-xl m-b-20 bg-info-gradient icon-block-floating" style="width: 70px;height: 40px;border-radius: 5px;background-image: url(media/image/wedding.jpg)!important;background-size: 100% 100%!important;"><i class="fa fa-heart" style="font-size:16px;position:relative;top:0px"></i>&nbsp;<span style="font-size:20px;font-weight:bold;margin-top:4px">'+result.wedding_count[i]+'</span></div>');
						}
					}
				},
				error:function(xhr,status,error){
					console.log(JSON.stringify(xhr,status,error));
				}
		});
		},500);
	
	$(document).on('click','.birthdaydiv', function(){
		var verid=$(this).data('verid');
		$(".popupwindowdiv").click();
		$("#tabledetailsbind").html('');
		$(".page-loader").show();
		$(".page-loader").css("z-index","9999");
		$(".page-loader").css("background"," rgb(255,255,255,0.4)");
				$.ajax({
						type: "POST",
						url: "phpservices/member_details_bind_for_birthday.php",
						data:{verid:verid},
						success: function(result) {
							var sno=1;
							for(var i=0;i<result.mem_name.length;i++){
									$("#tabledetailsbind").append('<tr class="target"><span style="opacity:0;position:absolute;z-index:-999">'+result.mem_name[i]+'</span><td>'+sno+'</td><td>'+result.mem_name[i]+'</td><td>'+result.bname[i]+'</td><td>'+result.dob[i]+'</td></tr>');
								sno++;
							}
							$(".page-loader").hide();
							$(".page-loader").css("background"," rgb(255,255,255)");
						},error:function(xhr,status,error){
									console.log(JSON.stringify(xhr,status,error));
								}
				});
	});	
	$(document).on('click','.weddingdiv', function(){
		var verid=$(this).data('verid');
		$(".popupwindowweddingdiv").click();
		$("#tableweddingdetailsbind").html('');
		$(".page-loader").show();
		$(".page-loader").css("z-index","9999");
		$(".page-loader").css("background"," rgb(255,255,255,0.4)");
				$.ajax({
						type: "POST",
						url: "phpservices/member_details_bind_for_weddingday.php",
						data:{verid:verid},
						success: function(result) {
							var sno=1;
							for(var i=0;i<result.mem_name.length;i++){
									$("#tableweddingdetailsbind").append('<tr class="target"><span style="opacity:0;position:absolute;z-index:-999">'+result.mem_name[i]+'</span><td>'+sno+'</td><td>'+result.mem_name[i]+'</td><td>'+result.bname[i]+'</td><td>'+result.dow[i]+'</td></tr>');
								sno++;
							}
							$(".page-loader").hide();
							$(".page-loader").css("background"," rgb(255,255,255)");
						},error:function(xhr,status,error){
									console.log(JSON.stringify(xhr,status,error));
								}
				});
	});

	/**************kani 08/092021 birthday date ******************************** */
	$("#submitbirthday").click(function(e){
		e.preventDefault();
		bdymonth= $("#bdymonth").val();		
		$("#bdy_grid").dataTable().fnDestroy();
			$('#bdy_grid').DataTable({
				dom: 'Bfrtip',
				buttons: [
				'excel'
				],
					"bProcessing": true,
					"serverSide": true,
					"responsive": true,				
					"searching": false, 
					
					"ajax":{
					url :"bdy_reports.php", // json datasource
					type: "post",  // type of method  ,GET/POST/DELETE
					data:{cond:"secondbind",bdymonth:bdymonth},
					error:function(xhr,status,error){
								console.log(JSON.stringify(xhr,status,error));
					}
					}
				});
	});






	$("#childsubmitbirthday").click(function(e){
		e.preventDefault();
		bdymonth= $("#childbdymonth").val();		
		$("#childbdy_grid").dataTable().fnDestroy();
			$('#childbdy_grid').DataTable({
				dom: 'Bfrtip',
				buttons: [
				'excel'
				],
					"bProcessing": true,
					"serverSide": true,
					"responsive": true,				
					"searching": false, 
					
					"ajax":{
					url :"child_bdy_reports.php", // json datasource
					type: "post",  // type of method  ,GET/POST/DELETE
					data:{cond:"secondbind",bdymonth:bdymonth},
					error:function(xhr,status,error){
								console.log(JSON.stringify(xhr,status,error));
					}
					}
				});
	});





	$("#submitwedding").click(function(e){
		e.preventDefault();
		weddingmonth= $("#weddingmonth").val();				
		$("#wedding_grid").dataTable().fnDestroy();
			$('#wedding_grid').DataTable({
				dom: 'Bfrtip',
				buttons: [
				'excel'
				],
					"bProcessing": true,
					"serverSide": true,
					"responsive": true,				
					"searching": false, 
					
					"ajax":{
					url :"wedding_reports.php", // json datasource
					type: "post",  // type of method  ,GET/POST/DELETE
					data:{cond:"secondbind",weddingmonth:weddingmonth},
					error:function(xhr,status,error){
								console.log(JSON.stringify(xhr,status,error));
					}
					}
				});
	});
	
});
</script>
</html>