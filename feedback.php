<?php
include('connection.php');
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
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
    <style>
        body {
            background-color: #f8f9fa;
        }
        .feedback-form {
            max-width: 400px;
            margin: auto;
        }
        .rating {
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 1.8rem;
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s ease;
        }
        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: #f39c12;
        }
        .rating input:checked ~ label ~ label {
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="feedback-form shadow p-4 rounded bg-white">
            <h4 class="text-center mb-3">Submit Your Feedback</h4>
            <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="feedback" class="form-label">Your Feedback</label>
                    <textarea class="form-control" id="feedback" name="feedback" rows="3" placeholder="Write your feedback here..." required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Rate Us</label>
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                        <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                        <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                        <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                        <input type="radio" id="star1" name="rating" value="1" required><label for="star1">★</label>
                    </div>
                </div>
                <button type="submit" name="submit_feedback" class="btn btn-primary w-100">Submit Feedback</button>
            </form>
        </div>
    </div>

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
        <br><br><br>
        <?php
include('footer.php');
?>


</body>
</html>

<?php
if (isset($_POST['submit_feedback'])) {
    // Get the form data
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];

    // Validate name: It should only contain letters and spaces (no numbers or special characters)
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        echo "<script>alert('Name should only contain letters and spaces.');</script>";
    } else {
        // Insert the feedback data into the database
        $query = "INSERT INTO feedback (name, feedback, rating) VALUES ('$name', '$feedback', '$rating')";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Feedback submitted successfully.');</script>";
        } else {
            echo "<script>alert('Error submitting feedback: " . mysqli_error($con) . "');</script>";
        }
    }
}
?>
