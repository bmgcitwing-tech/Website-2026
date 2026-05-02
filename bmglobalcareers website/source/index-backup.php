    <?php
    include('header.php') ?>
    <!-- Banner Section -->
	
<style>

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index:9999; /* Sit on top */
  padding-top: 50px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 550px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
     </style>		
		
 <!--<div id="myModal" class="modal">-->
 <!--   <span class="close" onclick="myFunction()">&times;</span>-->
	<!--<a href="https://www.eventbrite.com/e/bmgc-connect-tamilnadu-student-freshers-meetup-2023-tickets-708688023957" target="_blank"><img class="modal-content" src="images/popup-img.png"></a>-->
    <!--<img class="modal-content" src="img_snow.jpg">-->
 <!--  </div>-->
   
    <section class="banner-section banner-one">

        <div class="banner-carousel owl-theme owl-carousel">
            <!-- Slide Item -->
            <?php  
	    $sql="select * from tbl_banner where delete_status='NDL'";
        $exce_query=mysqli_query($conn,$sql); 
        while($fetch=mysqli_fetch_array($exce_query)){
		?>
            <div class="slide-item">
                <div class="image-layer"
                    style="background-image: url(ktgadmin/userdata/images/banner/<?php echo $fetch['imgname']?>);">
                </div>
                <div class="left-top-line"></div>
                <div class="right-bottom-curve"></div>
                <div class="right-top-curve"></div>
                <div class="auto-container">
                    <div class="content-box">
                        <div class="content">
                            <div class="inner">
                                <div class="sub-title" style="color: #f1c852"><?php echo $fetch['title']?></div>
                                <h1 style="font-size: 40px;line-height: 45px;">
                                    <?php echo nl2br ($fetch['description']);?></h1>
                                <div class="link-box">
                                    <a class="theme-btn btn-style-one" href="about.php">
                                        <i class="btn-curve"></i>
                                        <span class="btn-title">Discover More</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php  } ?>

        </div>
    </section>
    <!--End Banner Section -->
    <!-- About -->
    <section class="about-section about-section__dark">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Image Column-->
                <div class="image-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="image-block wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms"
                            style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                            <img src="images/gallery/vijay1.jpg" alt="" style="">
                        </div>
                        <div class="image-block wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms"
                            style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                            <img src="images/resource/featured-image-2.jpg" alt=""
                                style="object-fit:contain;margin-top: 75px;">
                        </div>
                    </div>
                </div>
                <!--Text Column-->
                <div class="text-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner" style="margin-top: 50px;">
                        <div class="sec-title">
                            <h2>We are not an ‘agency’ We are a community <span class="dot">.</span></h2>
                            <div class="lower-text">A community of brothers and sisters to motivate and help you
                                chase your dreams and live your passion. We listen, we advise and we guide your
                                aspirations to study abroad.</div>
                        </div>
                        <div class="text">
                            <p
                                style="color: #f1c852;margin-bottom: 0px;font-size: 16px;font-weight: 400;line-height: 25px;">
                                Truthful, Transparent, Trustworthy and
                                Affable are our community consciences.</p>
                            <p>Our brotherly community intends to break the myth and attest that we all are equal
                                and the opportunity to study abroad is for all, irrespective of where, what or who
                                we are by illuminating, guiding and connecting the aspirations of students from all
                                spheres of the Indian society. </p>
                        </div>
                        <div class="text clearfix">
                        </div>
                        <div class="link-box" style="padding-top: 0px;">
                            <a class="theme-btn btn-style-one" href="about.php">
                                <i class="btn-curve"></i>
                                <span class="btn-title">Click to know more</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about -->
    <!--Services Section-->
    <section class="services-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Title Block-->
                <div class="title-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="sec-title">
                            <h2>A 360 degree guide to shape, plan and live your dream<span class="dot">.</span></h2>
                            <div class="lower-text">We are committed to providing our customers with exceptional
                                service while offering our employees the best training.</div>
                        </div>
                    </div>
                </div>
                <!--Service Block-->

                <!--Service Block-->
                <div class="service-block col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="300ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="bottom-curve"></div>
                        <div class="icon-box"><img src="images/flaticon/1.png" width="80px"></div>
                        <h6><a href="services.php">Free Counselling</a></h6>
                        <h6 style="margin-top: 30px;font-size: 13px;font-weight: 400;">‘Dream it, Believe it, Build it’
                        </h6>
                    </div>
                </div>
                <!--Service Block-->
                <div class="service-block col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="600ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="bottom-curve"></div>
                        <div class="icon-box"><img src="images/flaticon/2.png" width="80px"></div>
                        <h6><a href="services.php">Financial<br>assistance</a></h6>
                        <h6 style="margin-top: 30px;font-size: 13px;font-weight: 400;">‘Dream it and Make it happen’
                        </h6>
                    </div>
                </div>
                <!--Service Block-->
                <div class="service-block col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="900ms"
                    data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="bottom-curve"></div>
                        <div class="icon-box"><img src="images/flaticon/3.png" width="80px"></div>
                        <h6><a href="services.php">Career<br>assistance</a></h6>
                        <h6 style="margin-top: 30px;font-size: 13px;font-weight: 400;">‘Let’s not just call it a dream,
                            let’s call it a plan’</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="facts-section jarallax" data-jarallax="" data-speed="0.3" data-imgposition="50% 80%">
        <!-- <div class="image-layer" style="background-image: url(images/background/image-1.jpg);"></div> -->

        <div id="jarallax-container-0"
            style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100;">
            <img src="images/background/image-1.jpg" alt="" class="jarallax-img"
                style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 1349px; height: 430.8px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; margin-top: -35.4px; transform: translate3d(0px, -67.5187px, 0px);">
        </div>
    </section>


    <!-- Trusted Section -->
    <section class="trusted-section trusted-section__dark">
        <div class="auto-container" style="padding-top: 100px;">
            <div class="outer-container">
                <div class="row clearfix">
                    <div class="left-col col-xl-5 col-lg-6 col-md-12 col-sm-12">
                        <div class="inner">
                            <img src="images/gallery/portfolio-home-2.jpg"
                                style="-webkit-filter:grayscale(100%);border-radius: 40px;">
                            <!-- <div class="col-header">
                                <div class="header-inner">
                                    <span>The Route Map</span>
                                </div>
                            </div> -->
                            <!-- <div class="features">
                                <div class="feature">
                                    <div class="count"><span>01</span></div>
                                    <h5>TOTAL DESIGN FREEDOM FOR EVERYONE</h5>
                                    <div class="sub-text">core features</div>
                                </div>
                                <div class="feature">
                                    <div class="count"><span>02</span></div>
                                    <h5>BASIC RULES OF RUNNING WEB AGENCY</h5>
                                    <div class="sub-text">core features</div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="right-col col-xl-7 col-lg-6 col-md-12 col-sm-12">
                        <div class="inner">
                            <div class="sec-title">
                                <h2>The Process<span class="dot">.</span></h2>
                                <div class="lower-text">Being a community we try to immune your dreams and passion. We
                                    have a committed process of editing your rough plan to come abroad. </div>
                            </div>
                            <div class="featured-block-two clearfix">
                                <div class="text">
                                    <ul>
                                        <li>We Ask</li>
                                        <li>We listen</li>
                                        <li>We analyse</li>
                                        <li>We suggest</li>
                                        <li>We process</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="link-box" style="padding-top: 0px;margin-top: 30px;">
                                <a class="theme-btn btn-style-one" href="route_map.php">
                                    <i class="btn-curve"></i>
                                    <span class="btn-title">Click to know more</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    <section class="banner-section banner-one">
        <h2 class="text-center" style="color:#fff">Testimonals</h2>
        <div class="team-carousel owl-theme owl-carousel">
            <!-- Slide Item -->
            <?php   
			$sql_video="SELECT * FROM `tbl_youtube_details`  where delete_status='NDL' ORDER BY `vcat_dt_id` ASC";
			$exc_query_video=mysqli_query($conn,$sql_video);
			while($fetch_video=mysqli_fetch_array($exc_query_video)){
			$title=$fetch_video['title'];
			$url_link=$fetch_video['url'];
		?>
            <div class="slide-item">
                <div class="auto-container">
                    <div class="content-box">
                        <div class="content">
                        <div class="news-block-two">
                <div class="inner-box">
                    <div class="image-box">
                        <a href="blog-single.html"><img src="http://img.youtube.com/vi/<?php echo $url_link?>/sddefault.jpg" alt=""></a>
                        <a href="https://www.youtube.com/watch?v=<?php echo $url_link?>" class="vid-link lightbox-image">
                            <div class="icon"><span class="flaticon-play-button-1"></span></div>
                        </a>
                    </div>
                </div>
            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php  } ?>

        </div>
    </section>    <!-- Banner Section -->
   
    
    <?php    include('footer.php') ?>

   