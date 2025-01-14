<?php
include('connection.php'); 
?>

<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<header>
        <!-- Header Start -->
       <div class="header-area header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-1 col-md-1">
                        <div class="logo">
                        <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-8 col-md-6">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">  
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="caseStudies.php">Case Studies</a></li>
                                    <li><a href="blog.php">Blog</a></li>    
                                    <?php
                            // Display logout button if logged in
                            if (isset($_SESSION['username'])) {
                            ?>
                                <li><a href="logout.php">Logout</a></li>
                            <?php
                            }
                            ?>
                                   
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>             
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <!-- Header-btn -->
                        <div class="header-btn d-none d-lg-block f-right">
                            <a href="feedback.php" class="btn header-btn">FEEDBACk</a>
                        </div>
                    </div>
                 

                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
    