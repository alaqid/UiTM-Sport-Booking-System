<?php

require_once 'dbconfig.php';
include('session_admin.php');

//session_start(); 

	//if (!isset($_SESSION['userID'])) {
	//$_SESSION['msg'] = "You must log in first";
	//header('location: page-login.php');
	//}

//$userID = $_SESSION["userID"];

$sql="SELECT * FROM user ";

$result=mysqli_query($db,$sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sport Booking System </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">

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
            <a href="#" class="brand-logo">
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
                            
                        </div>

                        <ul class="navbar-nav header-right">
                            
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                   
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

                    <li><a  href="./dashboard.php" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-chart-bar-33"></i><span class="nav-text">Dashboard</span></a>
                         
                         <li><a class="has-arrow " href="javascript:void()" aria-expanded="false"><i
                         class="icon icon-layout-25"></i><span class="nav-text">Booking Records</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="admin_booking_records_facility.php">Facility Booking</a></li>
                                    <li><a href="admin_booking_records_equipment.php">Equipment Booking</a></li>
                                </ul>
                            </li>

                         <li><a  href="./admin_manage_user.php" href="javascript:void()" aria-expanded="false"><i
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
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Users Records</h4>                            
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage User</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="table-responsive">                                
                                    <table id="example" class="display" style="min-width: 845px">
                                    
                                    <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>No. Phone</th> 
                                                <th>Faculty</th>
                                                <th>Booking</th>
                                                <th>Profile</th>
                                                <th>Action</th>                                             
                                            </tr>
                                        </thead>
                                        <?php
                                        while($rows=mysqli_fetch_assoc($result)){
                                            ?>
                                        
                                        <tbody>                                   
                                            <tr>
                                                <td style="color:#575757"><?php echo $rows['studentID']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['Uname']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['Uemail']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['Uphone']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['Ufaculty']; ?></td>
                                                <td style="color:#575757"><a href="admin_view_userbooking.php?userID=<?php echo $rows["userID"]; ?>"> <button class="btn btn-primary">View Booking</button></a></td>
                                                <td style="color:#575757"><a href="app-profile2.php?userID=<?php echo $rows["userID"]; ?>"> <button class="btn btn-info">View Profile</button></a></td>
                                                <td style="color:#575757"><a href="admin_profile-edit.php?userID=<?php echo $rows["userID"]; ?>"> <button class="btn btn-warning">Edit Profile</button></a></td>
                                                                                     
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>No. Phone</th> 
                                                <th>Faculty</th>
                                                <th>Booking</th>
                                                <th>Profile</th>
                                                <th>Action</th> 
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
    


    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>

</body>

</html>