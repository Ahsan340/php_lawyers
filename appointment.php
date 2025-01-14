<?php
include('connection.php');

include('header.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Appointment Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2>Book a Lawyer Appointment</h2>
            </div>
            <form method="POST" >
                <!-- Client Name -->
                <div class="mb-3">
                    <label for="clientName" class="form-label">Client Name</label>
                    <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Enter your name" required>
                </div>

                <!-- Lawyer Name -->
                <div class="mb-3">
                    <label for="lawyerName" class="form-label">Lawyer Name</label>
                    <input type="text" class="form-control" id="lawyerName" name="lawyerName"  
       placeholder="Enter lawyer's name" required>

                </div>

                <!-- Appointment Date -->
                <div class="mb-3">
                    <label for="appointmentDate" class="form-label">Appointment Date</label>
                    <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required>
                </div>

                <!-- Appointment Time -->
                <div class="mb-3">
                    <label for="appointmentTime" class="form-label">Appointment Time</label>
                    <input type="time" class="form-control" id="appointmentTime" name="appointmentTime" required>
                </div>

                <!-- Purpose -->
                <div class="mb-3">
                    <label for="purpose" class="form-label">Purpose</label>
                    <textarea class="form-control" id="purpose" name="purpose"   placeholder="Briefly describe the purpose of the appointment" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg" name="btn_submit">Book Appointment</button>

                </div>
            </form>
        </div>
    </div>


    <?php
if (isset($_POST['btn_submit'])) {
    
    $clientName = $_POST['clientName'];
    $lawyerName = $_POST['lawyerName'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $purpose = $_POST['purpose'];

   
    if ($con) {
        
        $query = "INSERT INTO `LawyerAppointments` (`ClientName`, `LawyerName`, `AppointmentDate`, `AppointmentTime`, `Purpose`, `Status`) 
                  VALUES ('$clientName', '$lawyerName', '$appointmentDate', '$appointmentTime', '$purpose', 'Scheduled')";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Appointment booked successfully');</script>";
        } else {
            echo "<script>alert('Database error');</script>";
        }
        mysqli_close($con);
    } else {
        echo "<script>alert('Database connection failed');</script>";
    }
}
?>

    <!-- Bootstrap JS -->
     
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
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
include('footer.php');
?>

</body>
</html>
