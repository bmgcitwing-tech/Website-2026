<?php
include('header.php') ?>
<section class="page-banner">
    <div class="image-layer" style="background-image:url(images/background/image-7.jpg);"></div>
    <div class="shape-1"></div>
    <div class="shape-2"></div>
    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1 style="font-size: 60px;">Videos</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Videos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="auto-container">
    <div class="sec-title centered">
        <h2 style="margin-top:30px ;">Videos</h2>
    </div>
    <div class="row">
		<?php   
			$sql_video="SELECT * FROM `tbl_videos_details`  where delete_status='NDL' ORDER BY `vcat_dt_id` DESC";
			$exc_query_video=mysqli_query($conn,$sql_video);
			while($fetch_video=mysqli_fetch_array($exc_query_video)){
			$title=$fetch_video['title'];
			$url_link=$fetch_video['url'];
		?>
        <div class="col-lg-3">
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
		 <?php } ?>
       
    </div>
</section>
<?php
include('footer.php') ?>