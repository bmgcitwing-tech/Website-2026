<!doctype html>
<html lang="en">


<body>
<?php 
include('sessionservices.php');
?>
<?php 
include('header.php');
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
            <h4>Counselling Appointments</h4>
        </div>
    </div>

	
	<div class="row">
        <div class="col-md-12">
	
			<div class="card">
                <div class="card-body">


				<form id="mainform" method="POST" action="" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label>From :</label>
												<input type="text" class="form-control" placeholder="Enter Project Name" name="single-date-picker" id="sfdate" autocomplete="off">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label>To :</label>
												<input type="text" class="form-control" placeholder="Enter Project Name" name="single-date-picker" id="stdate" autocomplete="off">
											</div>
										</div>
										
										<div class="col-md-1">
												<button type="submit" id="pursearch" class="btn btn-success" style="margin-top:32px;">search</button>

										</div>
										<div class="col-md-2">
												<!-- <button type="submit" name="submit" id="submit" class="btn btn-primary" style="margin-top:32px;">Reset</button> -->

										</div>
									</div>


									<span id="msg" style="font-weight:bold;float:right;margin-top:7px;"></span>
								</form>










                   <table id="detailsgrid" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S.no</th>
						<th>D.Appointment</th>                       
						<th>P.Name</th>
						<th>S.Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Dob</th>
						<th>10th%</th>
						<th>12th%</th>
						<th>Diploma</th>
						<th>12th&nbsp;English%</th>
						<th>UG %</th>
						<th>PG%</th> 
						<th>Country</th> 
						<th>IELTS</th> 
						<th>Intake&nbsp;Year</th> 
						<th>Intake&nbsp;Month</th> 
						<th>Course&nbsp;Intented</th> 
						<th>Additonal&nbsp;Comments</th> 
                         <th>Action</th>
                    </tr>
                    </thead>
					<tbody>
									
					</tbody>
                </table>
                </div>
            </div>
		</div>
	</div>
</main>
<!-- end::main content -->
<?php include("footer.php")?>
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

	$('#detailsgrid').DataTable({
		
	dom: 'lBfrtip',
	lengthMenu: [[-1,50, 25, 10, ], ["All",50, 25, 10]],
	buttons: [
             'excel'
        ],
        "bProcessing": true,
        "serverSide": true,
        "responsive": true,
        "ajax": {
            url: "phpservices/counselling_grid.php", // json datasource
            type: "post", // type of method  ,GET/POST/DELETE
			data:{cond:"firstbind" },
            error: function(xhr, status, error) {
                console.log(JSON.stringify(xhr, status, error));
            }
        }
    });
     $(".dataTables_wrapper").addClass('row');
	$(".dataTables_length").addClass('col-md-6 col-xs-12').css('margin-top','50px');
	$(".dataTables_filter").addClass('col-md-6 col-xs-12').css('margin-top','50px');
	$(".buttons-html5").addClass('btn btn-success');
	$(".dt-button").addClass('btn btn-success');
	$(".dt-buttons").css('position','absolute').css('left','20px');

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
					url: "phpservices/add_counselling.php",
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
	$("#pursearch").click(function(e){		
		e.preventDefault();
		var emprights=$("#rightsbox").val();
		
		var fdatefullvalue= $("#sfdate").val();
		var fdatevalue = fdatefullvalue.split('/')[1];
		var fmonthvalue = fdatefullvalue.split('/')[0];
		var fyearvalue = fdatefullvalue.split('/')[2];
		
		var tdatefullvalue= $("#stdate").val();
		var tdatevalue = tdatefullvalue.split('/')[1];
		var tmonthvalue = tdatefullvalue.split('/')[0];
		var tyearvalue = tdatefullvalue.split('/')[2];

		$("#detailsgrid").dataTable().fnDestroy();
		$('#detailsgrid').DataTable({
			
		dom: 'lBfrtip',
	lengthMenu: [[-1,50, 25, 10, ], ["All",50, 25, 10]],
	buttons: [
             'excel'
        ],
	     "bProcessing": true,
         "serverSide": true,
		 "responsive": true,
         "ajax":{
            url :"phpservices/counselling_grid.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
			data:{cond:"searchbind",fdate:fmonthvalue+'/'+fdatevalue+'/'+fyearvalue,tdate:tmonthvalue+'/'+tdatevalue+'/'+tyearvalue},
            error:function(xhr,status,error){
								console.log(JSON.stringify(xhr,status,error));
							}
          }
		  });
		
 $(".dataTables_wrapper").addClass('row');
	$(".dataTables_length").addClass('col-md-6 col-xs-12').css('margin-top','50px');
	$(".dataTables_filter").addClass('col-md-6 col-xs-12').css('margin-top','50px');
	$(".buttons-html5").addClass('btn btn-success');
	$(".dt-button").addClass('btn btn-success');
	$(".dt-buttons").css('position','absolute').css('left','20px');
		
	});

	$(document).on('click','.deleteTriger', function(){
		var delid=$(this).data('value');
		var alertmsg=confirm("Do you want to Delete ?");
		if (alertmsg == true) {
			$.ajax({
						type: "POST",
						url: "phpservices/appointment_services.php",
						dataType:'json',
						data: {delid:delid,req:"DEL"},
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

$(document).on('click','.statuschanger', function(){
	var statusid=$(this).data('value');
	var alertmsg=confirm("Do you want to Change the Status ?");
	if (alertmsg == true) {
		$.ajax({
			type: "POST",
			url: "phpservices/status_changer.php",
			dataType:'json',
			data: {statusid:statusid,cond:"banner"},
			success: function(result) {
				if(result.op==1){
					alert("Successfully Changed !");
					location.reload();
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

<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
 <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">


 <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.min.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>


</html>