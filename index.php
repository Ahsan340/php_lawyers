<?php
include('connection.php');
?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Lawyers</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
   </head>

   <body>
       
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

   <?php
   include('header.php'); 
   ?>
    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="hero__caption">
                                    <p data-animation="fadeInUp" data-delay=".6s">Professional lawyers</p>
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >We will fight<br>
                                        for you like a friend </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-bottom"  >
                        <div class="slider-bottom-cap" data-animation="fadeInLeft" data-delay=".6s">
                            <p>Schedule a Free Consultation 24/7</p>
                            <span>01654.066.456</span>
                        </div>
                        <div class="slider-video d-flex align-items-center" data-animation="fadeInRight" data-delay=".8s">
                            <a class="popup-video ani-btn" href="https://www.youtube.com/watch?v=1aP-TXUpNoU">
                            <img src="assets/img/icon/video_btn.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="hero__caption">
                                    <p data-animation="fadeInUp" data-delay=".6s">Professional lawyers</p>
                                    <h1 data-animation="fadeInUp" data-delay=".4s" >We will fight<br>
                                        for you like a friend </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-bottom"  >
                        <div class="slider-bottom-cap" data-animation="fadeInLeft" data-delay=".4s">
                            <p>Schedule a Free Consultation 24/7</p>
                            <span>01654.066.456</span>
                        </div>
                        <div class="slider-video d-flex align-items-center" data-animation="fadeInRight" data-delay=".8s">
                            <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU">
                            <img src="assets/img/icon/video_btn.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- slider Area End-->

        <!-- Legal Practice Area start -->
        <div class="legal-practice-area section-padding30">
            <div class="container">
                  <!--Section Tittle  -->
                <div class="row ">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mb-70">
                            <h2>Legal Practice Area.</h2>
                        </div>
                    </div>
                </div>
                <!-- single items -->
                <div class="row">
                <?php
				$query = mysqli_query($con,"select * from categories");
			
while($cat=mysqli_fetch_array($query)){
	?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-practice mb-30">
                            <div class="practice-img">
                            <a href="detailpage.php?id=<?php echo $cat[0]?>">
                                <img  src="../appointdata/img/<?php echo $cat[2] ?>" alt="">

                                <!-- "practice-icon-->
                                <div class="practice-icon">
                                    <i class="flaticon-care"></i>
                                  
                                </div>
                            </div>
                            <div class="practice-caption">
                                <h4><?php echo $cat[1]?></a></h4>
                               
                            </div>
                        </div>
                    </div>
                   <?php 
}
                   ?>
        <!-- Legal Practice Area End-->

        <!-- About Law Start-->
        <div class="about-low-area about-bg about-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5">
                        <!-- section tittle -->
                        <div class="section-tittle section-tittle-l mb-70">
                            <h2>About Just Law</h2>
                        </div>
                        <div class="about-caption mb-100">
                            <p>Law demands precision, clarity, and efficiency, and we are here to deliver just that. Our platform equips legal professionals with innovative tools and resources to simplify complex tasks. Focus on delivering justice while we provide the solutions to streamline your practice.</p>
                           <!-- Counter Up -->
                            <div class="count-clients">
                                <div class="single-counter text-center">
                                    <span class="counter">250</span>
                                    <p>Happy Clients</p>
                                </div>
                                <div class="single-counter text-center">
                                    <span class="counter">920</span>
                                    <p>Wining Case</p>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <!-- about-img -->
                        <div class="about-img ">
                            <div class="about-font-img f-left">
                                <img src="assets/img/about/about-low-front.jpg" alt="">
                            </div>
                            <div class="about-back-img f-right d-none d-md-block">
                                <img src="assets/img/about/about-low-back.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Law End-     
       


       

        <!-- Want To Work Start -->
        <div class="wantToWork-area w-padding">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-7 col-lg-9 col-md-8">
                        <div class="wantToWork-caption">
                            <h2>Get Your Answer In Just  Minutes</h2>
                            <p>"Exploring your legal options with us is completely confidential and hassle-free!"</p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-3 col-md-4">
                       <div class="wantToWork-btn f-right">
                            <a href="#" class="btn btn-ans">Get started <i class="ti-angle-double-right"></i></a>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Want To Work End -->

    </main>
    <?php
include('footer.php');
?>
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- counter , waypoint -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="./assets/js/jquery.counterup.min.js"></script>

        <!-- counter -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        
    </body>
</html>