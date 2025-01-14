

<?php 
include('connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Fetch username based on the logged-in user ID
$user_id = $_SESSION['user_id'];
$query = "SELECT username FROM users WHERE id = '$user_id'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);
$username = $user['username'];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<style>
        /* General Styles */
body {
    font-family: 'Roboto', Arial, sans-serif;
    background-color: #f8f9fa;
    color: #343a40;
    margin: 0;
    padding: 0;
}

h1, h5 {
    color: #343a40;
}

a {
    text-decoration: none;
    color: inherit;
}

a:hover {
    text-decoration: underline;
}

/* Cards */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

.card-header {
    font-weight: bold;
    background: #fff;
    color: #343a40;
    border-bottom: 1px solid #dee2e6;
    padding: 10px 15px;
}

.card-body {
    font-size: 15px;
    padding: 20px;
    color: #495057;
}

.card-footer {
    background: #f8f9fa;
    padding: 10px 15px;
    border-top: 1px solid #dee2e6;
}

/* Cards Background Colors */
.bg-info {
    background: linear-gradient(135deg, #17a2b8, #138496);
}

.bg-success {
    background: linear-gradient(135deg, #28a745, #218838);
}

.bg-warning {
    background: linear-gradient(135deg, #ffc107, #e0a800);
}

.bg-danger {
    background: linear-gradient(135deg, #dc3545, #c82333);
}

/* Text Colors */
.text-white {
    color: #fff !important;
}

/* Footer */
footer {
    background-color: #e9ecef;
    padding: 20px 0;
    text-align: center;
    font-size: 14px;
    color: #6c757d;
}

/* List Groups */
.list-group-item {
    padding: 15px 20px;
    background: #fff;
    border: none;
    margin-bottom: 5px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.list-group-item:hover {
    background: #f8f9fa;
}

/* Breadcrumb */
.breadcrumb {
    background: #f8f9fa;
    border-radius: 5px;
    padding: 10px 15px;
}

.breadcrumb-item a {
    color: #007bff;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    text-decoration: underline;
}

/* Typography */
h1 {
    font-size: 2rem;
    margin-bottom: 15px;
    font-weight: 700;
}

h5 {
    font-size: 1.25rem;
    font-weight: 500;
}

/* Animations */
.card-footer i, .card-footer a {
    transition: color 0.3s ease;
}

.card-footer a:hover, .card-footer i:hover {
    color: #007bff;
}
</style>
    </head>
   <?php
   include('sidelaw.php')
   ?>
            <!-- end  -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome, <?php echo htmlspecialchars($username); ?>!</li>
                        </ol>
                        <div class="container-fluid px-4">
    <h1 class="mt-4">Lawyer Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Overview</li>
    </ol>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <h5>Total Cases</h5>
                    <h2>124</h2>
                </div>
                <div class="card-footer text-white d-flex align-items-center justify-content-between">
                    <a class="text-white" href="#">View All Cases</a>
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h5>Ongoing Cases</h5>
                    <h2>56</h2>
                </div>
                <div class="card-footer text-white d-flex align-items-center justify-content-between">
                    <a class="text-white" href="#">Manage Cases</a>
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h5>Upcoming Appointments</h5>
                    <h2>12</h2>
                </div>
                <div class="card-footer text-white d-flex align-items-center justify-content-between">
                    <a class="text-white" href="#">View Schedule</a>
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h5>Pending Payments</h5>
                    <h2>8</h2>
                </div>
                <div class="card-footer text-white d-flex align-items-center justify-content-between">
                    <a class="text-white" href="#">Manage Invoices</a>
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Access Links -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-calendar-alt me-1"></i> Upcoming Appointments
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">10:00 AM - Client: John Doe - Case Review</li>
                        <li class="list-group-item">11:30 AM - Client: Jane Smith - Consultation</li>
                        <li class="list-group-item">2:00 PM - Client: XYZ Corp - Contract Drafting</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-tasks me-1"></i> Recent Activities
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Closed Case #12345 - John Doe</li>
                        <li class="list-group-item">Drafted Contract for XYZ Corp</li>
                        <li class="list-group-item">Scheduled Consultation with Jane Smith</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Lawyer Admin 2024</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
