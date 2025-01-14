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

<?php
include('header.php');
?>

<?php

if (isset($_GET['proid'])) {
    $id = $_GET['proid'];

    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($con, $id);

    // Query to fetch the lawyer details
    $query = mysqli_query($con, "SELECT * FROM lawyers WHERE ID= '$id'");
    if ($query) {
        $lawyer = mysqli_fetch_array($query);

        if ($lawyer) {
            // Display the lawyer's details
            ?>
           <div class="container mt-5">
                <div class="row shadow-lg p-4 rounded bg-light">
                    <div class="col-md-4 text-center">
                        <img src="../appointdata/img/<?php echo htmlspecialchars($lawyer[5]); ?>" class="img-fluid rounded" alt="Lawyer Image">
                    </div>
                    <div class="col-md-8">
                        <h1 class="text-primary mb-3"><?php echo htmlspecialchars($lawyer['name']); ?></h1>
                        <p class="mb-2"><strong>Location:</strong> <?php echo htmlspecialchars($lawyer['location']); ?></p>
                        <p class="mb-4"><strong>Description:</strong> <?php echo htmlspecialchars($lawyer['description']); ?></p>
                        <!-- Form to securely pass lawyer name -->                   
                        <form action="login.php" method="GET">
   
    <button type="submit" class="btn btn-primary">Book Now</button>
</form>

                    </div>
                </div>
           </div>

            <?php
        } else {
            echo "<p>No lawyer found for the provided ID.</p>";
        }
    } else {
        echo "<p>Error in query execution: " . mysqli_error($con) . "</p>";
    }
} else {
    echo "<p>No ID provided. Please select a lawyer to view details.</p>";
}
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