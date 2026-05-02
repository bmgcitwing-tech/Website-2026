<?php
session_start();
error_reporting(0);
include('phpservices/connection.php');
 $log=$_SESSION['login_user'];

$login_id=$_SESSION['login_user'];
if(empty($log)) {
   echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
}
$header='<div class="side-menu">
	<div class="side-menu-body">
        <ul>
            <li class="side-menu-divider">Navigation</li>
         <li>
                <a href="counselling_appointments.php"><i class="icon fa fa-calendar"></i> <span>Appointments Details</span> </a>
            </li>
          <li class="treeview"> <a href="#"><i class="icon ti-home"></i> <span>Counselling</span>  </a>
        <ul>
         
         <li>
                <a href="counselling.php"><i class="icon ti-home"></i> <span>Counselling Centers</span> </a>
            </li>
			<!--li>
                <a href="counselling_timings.php"><i class="icon fa fa-clock-o"></i> <span>Counselling Timings</span> </a>
            </li-->
			
			
            	<!--li>
                <a href="appointments_block_dates.php"><i class="icon fa fa-times"></i> <span>Appointments Block</span> </a>
            </li-->
         </ul>
      </li>
            
            <li>
                <a href="banner_images.php"><i class="icon ti-gallery"></i> <span>Banner Images</span> </a>
            </li>
            <li>
                <a href="join_our_community.php"><i class="icon ti-world"></i> <span>Join our Community</span> </a>
            </li>
            <!--li>
                <a href="testimonals.php"><i class="icon fa fa-heart-o"></i> <span>Testimonals</span> </a>
            </li-->
            <li>
                <a href="video_details.php"><i class="icon fa fa-video-camera"></i> <span>Videos</span> </a>
            </li>
            <li>
                <a href="youtube_details.php"><i class="icon fa fa-video-camera"></i> <span>Youtube videos</span> </a>
            </li>
            <li>
                <a href="team_details.php"><i class="icon ti-user"></i><span>Team Member</span></a>
            </li>
            <li>
                <a href="process_details.php"><i class="icon fa fa-bullhorn"></i><span>Process</span> </a>
            </li>
            <li>
                <a href="appointment_details.php"><i class="icon fa fa-life-ring"></i><span>Appointments</span> </a>
            </li>
             <li><a href="about.php"><i class="icon ti-info-alt"></i> <span>About Us</span> </a></li>
             <li><a href="services.php"><i class="icon fa fa-wrench"></i> <span>Services</span> </a></li>
            <li>
                <a href="counselling_appointments_date.php"><i class="icon fa fa-calendar"></i> <span>Appointments Disabled Dates</span> </a>
            </li>
             <li><a href="settings.php"><i class="icon fa fa-cogs"></i> <span>Settings</span> </a></li>
            <!--li><a href="settings.php"><i class="icon fa fa-cogs"></i> <span>Settings</span> </a></li-->
        </ul>
    </div>
</div>

<nav class="navbar" style="background: #5891aa;">
    <div class="container-fluid">

        <div class="header-logo">
            <a href="#">
                <h3 style="font-size: 22px;color: #fff;font-weight: 900;text-align:center">BM <br>Global Careers</h3>
            </a>
        </div>

        <div class="header-body">
            <ul class="navbar-nav">
                <li class="nav-item dropdown userdiv">
                    <a href="#" data-toggle="dropdown">
                        <figure class="avatar avatar-sm avatar-state-success">
                            <img class="rounded-circle" src="media/image/user.png" alt="...">
                        </figure>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!--<a href="#" data-sidebar-target="#settings" class="sidebar-open dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>-->
                        <a href="phpservices/logout.php" class="text-danger dropdown-item">Logout</a>
                    </div>
                </li>
                <li class="nav-item d-lg-none d-sm-block">
                    <a href="#" class="nav-link side-menu-open">
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<div class="bottomdiv col-md-12" style="position: fixed;bottom: 0;width: 100%;text-align: center;background:#000;z-index:999">
	<div class="row">
	<div class="col-md-6">
	<p style="margin-bottom: 0;padding: 5px 0;color: #fff;font-weight: bold;font-size: 16px;float:left">Designed By <a href="https://www.knocktheglobe.com/" target="_blank" style="color:#fff;">KTG</a></p>
	</div>
	<div class="col-md-6">
	<p style="margin-bottom: 0;padding: 5px 0;color: #fff;font-weight: bold;font-size: 16px;float:right">For Support : <a href="tel:+917200123452" style="color:#fff">+91 7200123452</a></p>
	</div>
	</div>
</div>';
?>