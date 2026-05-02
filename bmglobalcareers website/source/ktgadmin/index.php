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

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="css/app.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- end::custom styles -->

</head>
<body class="bg-white h-100-vh p-t-0">

<div class="p-b-50 d-block d-lg-none"></div>

<div class="container h-100-vh">
    <div class="row align-items-md-center h-100-vh">
        <div class="col-lg-6 d-none d-lg-block">
            <img class="img-fluid" src="media/svg/login.svg" alt="...">
        </div>
        <div class="col-lg-4 offset-lg-1">
            <div class=" align-items-center m-b-20" style="text-align:center">
                <img src="media/image/logo.png" width="200px;" alt="">
            </div>
            <p>Sign in to continue.</p>
            <form action="#" id="loginform" method="POST" onsubmit="return submitUserForm();">
                <div class="form-group mb-4">
                    <input type="text" class="form-control form-control-lg" id="uname" name="uname" autofocus placeholder="Email or username" autocomplete="off">
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control form-control-lg" id="pass" name="pass" placeholder="Password" autocomplete="off">
                </div>
				<!--div class="form-group">                                  
					<div class="g-recaptcha" data-sitekey="6Lfe6eMcAAAAAMR9ZApCi4d-_VGuuqeEQ5ngAvut" data-callback="verifyCaptcha"></div>
					<div id="g-recaptcha-error"></div>
				</div-->
                <button class="btn btn-primary btn-lg btn-block btn-uppercase mb-4" name="submit" id="submit">Sign In</button>
				<span id="msg" style="float:right;font-weight:bold"></span>
            </form>
        </div>
    </div>
</div>

<!-- begin::global scripts -->
<script src="vendors/bundle.js"></script>
<!-- end::global scripts -->

<!-- begin::custom scripts -->
<script src="js/app.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- end::custom scripts -->
<style>
@media(max-width:991px){
	.container, .row{
		height:auto!important;
	}
}
</style>
<script>
function submitUserForm() {	
var response = grecaptcha.getResponse();
	console.log(response.length);
    if(response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
        return false;
    }
    return true;
}
 
// function verifyCaptcha() {
// 	console.log('verified');
//     document.getElementById('g-recaptcha-error').innerHTML = '';
// }

$( document ).ready(function() {
	$( "#loginform" ).submit(function(e) {
		e.preventDefault();
		var crUname=$("#uname").val();
		var crPassword=$("#pass").val();
		if(crUname==""){
			$("#msg").css("color","red").html("* Enter the Username");
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		else if(crPassword==""){
			$("#msg").css("color","red").html("* Enter the Password");
			setTimeout(function(){$("#msg").html('')},3000);
			return false;
		}
		// else if(submitUserForm()==false){
		// 	$("#msg").css("color","red").html("* Specify Captcha");
		// 	setTimeout(function(){$("#msg").html('')},3000);
		// 	return false;
		// }
		else{
			$("#msg").css("color","green").html("Processing . . .");
			var objloginData=new Object();
			objloginData.uname=crUname;
			objloginData.pass=crPassword;
			$.ajax({
					type: "POST",
					url: "phpservices/login.php",
					dataType:'json',
					data: objloginData,
					success: function(result) {
						if(result.op==1){
							$("#msg").css("color","green").html("Login Successfully !");
							setTimeout(function(){
								window.location.href="banner_images.php";
							},2000);
						}
						else{
							$("#msg").html(result.op);
						}
					}
				});
		}

	});
});
</script>
</body>
</html>