<?php
  include 'getdata/get_data_by_loai_tin.php';
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>DHNews</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>

    <!-- START HEADER -->
    <?php
      include 'layout/header.php';
    ?>
    <!-- END HEADER -->

		<div class="site-main-container">
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start latest-post Area -->
							<div class="latest-post-wrap">
								<h4 class="cat-title">Tin <?php echo $_GET['tenloaitin']; ?></h4>
				                <?php
				                  if (isset($_GET['more']))
				                  {
				                    $i = 0;
				                    foreach ($xml->xpath('//channel/item') as $items)
				                    {
				                      if ($i > $_GET['more']) {
				                        break;
				                      }
				                      if (strpos($items->description, "src=")) {
				                        $str = explode('src=', $items->description);
				                        $str1 = explode('></a></br>', $str[1]);
				                        $srcImage = $str1[0];
				                        $description = $str1[1];
				                ?>
				                <div class="single-latest-post row align-items-center">
				                  <div class="col-lg-5 post-left">
				                    <div class="feature-img relative">
				                      <div class="overlay overlay-bg"></div>
				                      <img class="img-fluid" src=<?php echo $srcImage; ?> >
				                    </div>
				                    <ul class="tags">
				                      <li><a href="#"><?php echo $_GET['tenloaitin']; ?></a></li>
				                    </ul>
				                  </div>
				                  <div class="col-lg-7 post-right">
				                    <a href="<?php echo $items->link; ?>">
				                      <h4>
				                        <?php echo $items->title; ?>
				                      </h4>
				                    </a>
				                    <ul class="meta">
				                      <li><a href="#"><span class="lnr lnr-calendar-full"></span>
				                        <?php echo $items->pubDate; ?>
				                      </a></li>
				                    </ul>
				                    <p class="excert">
				                      <?php echo  $description; ?>
				                    </p>
				                  </div>
				                </div>
				                <?php $i++;} }
				                	if ($_GET['more'] < 25) { ?>
									<div class="load-more">
									<a href=
										<?php
											$link = "loaitin.php?loaitin=".$_GET['loaitin']."&tenloaitin=".$_GET['tenloaitin']."&more=25";
											echo '"'.$link.'"'.'class="primary-btn"';
										?> >Xem Thêm
									</a>
									</div>
				                <?php
				                  } }
				                  else {
				                    $i = 0;
				                    foreach ($xml->xpath('//channel/item') as $items)
				                    {
				                      if (($i > 4)) {
				                        break;
				                      }
				                      if (strpos($items->description, "src=")) {
				                        $str = explode('src=', $items->description);
				                        $str1 = explode('></a></br>', $str[1]);
				                        $srcImage = $str1[0];
				                        $description = $str1[1];
				                ?>
								<div class="single-latest-post row align-items-center">
									<div class="col-lg-5 post-left">
									  <div class="feature-img relative">
									    <div class="overlay overlay-bg"></div>
									    <img class="img-fluid" src=<?php echo $srcImage; ?> >
									  </div>
									  <ul class="tags">
									    <li><a href="#"><?php echo $_GET['tenloaitin']; ?></a></li>
									  </ul>
									</div>
									<div class="col-lg-7 post-right">
									  <a href="<?php echo $items->link; ?>">
									    <h4>
									      <?php echo $items->title; ?>
									    </h4>
									  </a>
									  <ul class="meta">
									    <li><a href="#"><span class="lnr lnr-calendar-full"></span>
									      <?php echo $items->pubDate; ?>
									    </a></li>
									  </ul>
									  <p class="excert">
									    <?php echo $description; ?>
									  </p>
									</div>
								</div>
				                  <?php $i++;} }?>
				                  <div class="load-more">
  									<a href=
	  									<?php
		  									$link = "loaitin.php?loaitin=".$_GET['loaitin']."&tenloaitin=".$_GET['tenloaitin']."&more=10";
		  									echo '"'.$link.'"'.'class="primary-btn"';
	  									?> >Xem Thêm
  									</a>
  								</div>
                    			<?php } ?>
							</div>
							<!-- End latest-post Area -->
						</div>
            			<div class="col-lg-4">
							<div class="sidebars-area">

								<!-- START ENTERTAIMENT POST -->
				                <?php
				                  include 'content/entertainment.php';
				                ?>
				                <!-- STOP ENTERTAIMENT POST -->
								<div class="single-sidebar-widget ads-widget">
									<img class="img-fluid" src="img/banner-3.jpg" alt="">
								</div>
                				<div class="single-sidebar-widget newsletter-widget">
									<h6 class="title">Thông Báo</h6>
									<p>
										Đăng ký để nhận thông báo qua Email.
									</p>
									<div class="form-group d-flex flex-row">
										<div class="col-autos">
											<div class="input-group">
												<input class="form-control" placeholder="Địa chỉ Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" type="text">
											</div>
										</div>
										<a href="#" class="bbtns">Đăng ký</a>
									</div>
									<p>
										Bạn có thể hủy đăng ký chúng tôi bất cứ lúc nào.
									</p>
								</div>

								<!-- START FUNPOST POST -->
				                <?php
				                  include 'content/funpost.php';
				                ?>
				                <!-- START FUNPOST POST -->

								<div class="single-sidebar-widget social-network-widget">
									<h6 class="title">Mạng Xã Hội</h6>
									<ul class="social-list">
										<li class="d-flex justify-content-between align-items-center fb">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-facebook" aria-hidden="true"></i>
												<p>983 Likes</p>
											</div>
											<a href="#">Like our page</a>
										</li>
										<li class="d-flex justify-content-between align-items-center tw">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-twitter" aria-hidden="true"></i>
												<p>983 Followers</p>
											</div>
											<a href="#">Follow Us</a>
										</li>
										<li class="d-flex justify-content-between align-items-center yt">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-youtube-play" aria-hidden="true"></i>
												<p>983 Subscriber</p>
											</div>
											<a href="#">Subscribe</a>
										</li>
										<li class="d-flex justify-content-between align-items-center rs">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-rss" aria-hidden="true"></i>
												<p>983 Subscribe</p>
											</div>
											<a href="#">Subscribe</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End latest-post Area -->
		</div>

		<!-- start footer Area -->
    <?php
      include 'layout/footer.php';
    ?>
		<!-- End footer Area -->
		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		<script src="js/easing.min.js"></script>
		<script src="js/hoverIntent.js"></script>
		<script src="js/superfish.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/mn-accordion.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/mail-script.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
