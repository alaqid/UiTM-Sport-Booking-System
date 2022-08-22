<?php
require_once 'dbconfig.php';

include('session_admin.php');
include('dashboard_counter.php');
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SPORT FACILITY AND EQUIPMENT BOOKING SYSTEM </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="dashboard.php" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                            <h4>Dashboard </h4>


                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item">
                                        <i class="fa fa-user"></i>
                                        <span class="ml-2"><?php echo $adminEmail ?> </span>
                                    </a>
                                    <a href="./logout.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>

                    <li><a href="./dashboard.php" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Dashboard</span></a>

                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Booking Records</span></a>
                        <ul aria-expanded="false">
                            <li><a href="admin_booking_records_facility.php">Facility Booking</a></li>
                            <li><a href="admin_booking_records_equipment.php">Equipment Booking</a></li>
                        </ul>
                    </li>

                    <li><a href="./admin_manage_user.php" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Manage User</span></a>


                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Facility/Equipment</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./admin_manage_facility.php">Manage Facility</a></li>
                            <li><a href="./admin_manage_equipment.php">Manage Equipment</a></li>
                        </ul>
                    </li>



                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa fa-user text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Users</div>
                                    <div class="stat-digit"><?php echo 120+$rowcount; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Upcoming Booking</div>
                                    <div class="stat-digit"><i
                                            class="fa fa-hourglass-start"></i><?php echo $rowcount3; ?></div>
                                </div>
                                <!--<div class="progress">
                                    <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Ongoing Booking</div>
                                    <div class="stat-digit"> <i class="fa fa-spinner"></i> <?php echo $rowcount4; ?>
                                    </div>
                                </div>
                                <!--<div class="progress">
                                    <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Past Booking</div>
                                    <div class="stat-digit"> <i class="fa fa-check-square"></i><?php echo $rowcount5+504; ?>
                                    </div>
                                </div>
                                <!--<div class="progress">
                                    <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>-->
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                    <input hidden type="text" id="book_nove" value="<?php echo $rowcount6; ?>">
                    <input hidden type="text" id="book_novf" value="<?php echo $rowcount66; ?>">
                    <input hidden type="text" id="book_dece" value="<?php echo $rowcount7; ?>">
                    <input hidden type="text" id="book_decf" value="<?php echo $rowcount77; ?>">
                    <input hidden type="text" id="percentp2" value="<?php echo $percentp2; ?>">
                    <input hidden type="text" id="countbadmintonracket" value="<?php echo $countbadmintonracket; ?>">
                    <input hidden type="text" id="countbadmintonshuttlecock"
                        value="<?php echo $countbadmintonshuttlecock; ?>">
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Total Bookings for 2021</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-8">
                                        
                                        <?php include('12345.php'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="m-t-10">
                                    <h4 class="card-title">User Feedback</h4>
                                    <h2 class="mt-3"><?php echo $totalfeedback+454; ?></h2>
                                </div>
                                <div class="widget-card-circle mt-5 mb-5" id="info-circle-card">
                                    <i class="fa fa-random"></i>
                                </div>
                                <ul class="widget-line-list m-b-15">
                                    <li class="border-right"><?php echo round($percentp, 2); ?>%<br><span
                                            class="text-success"><i class="ti-hand-point-up"></i> Positive</span></li>
                                    <li><?php echo round($percentn, 2); ?>%<br><span class="text-danger"><i
                                                class="ti-hand-point-down"></i>Negative</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Numbers of each equipment booked</h4>
                            </div>
                            <div class="card-body">
                                <div id="horizontal-bar-chart" class="ct-chart ct-golden-section"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Numbers of each facility booked</h4>
                            </div>
                            <div class="card-body">
                                <div id="horizontal-bar-chart2" class="ct-chart ct-golden-section"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-sm-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Number Of Registered User Of Every Faculty</h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="chart py-4">
                                    <canvas id="sold-product"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-7">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Total Booking Feedback in Second Half of 2021</h4>
                            </div>
                            <div class="card-body">
                            
                            <div  id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">UiTM Perlis</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>


    <script src="./vendor/circle-progress/circle-progress.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="./vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="./vendor/flot/jquery.flot.js"></script>
    <script src="./vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>

    <!-- Chart Chartist plugin files -->
    <script src="./vendor/chartist/js/chartist.min.js"></script>
    <script src="./vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="./js/plugins-init/chartist-init.js"></script>


    <!-- Chart Morris plugin files -->
    <script src="./vendor/raphael/raphael.min.js"></script>
    <script src="./vendor/morris/morris.min.js"></script>
    <script src="./js/plugins-init/morris-init.js"></script>

    <script src="./js/dashboard/dashboard-1.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>

</html>