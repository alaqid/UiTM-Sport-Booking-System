<?php

require_once 'dbconfig.php';

include('session_user.php');

$sql="SELECT * FROM booking_records where userID = $userID AND book_status = 'Ongoing'";
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
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Booking</span></a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Booking</a>
                                <ul aria-expanded="false">
                                    <li><a href="./booking_facility.php">Facility</a></li>
                                    <li><a href="./booking_equipment.php">Equipment</a></li>

                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Booking Records</a>
                                <ul aria-expanded="false">
                                    <li><a href="user_booking_records_upcoming.php">Upcoming Booking</a></li>
                                    <li><a href="user_booking_records_ongoing.php">Ongoing Booking</a></li>
                                    <li><a href="user_booking_records_past.php">Past Booking</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Profile</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.php">View Profile</a></li>
                            <li><a href="./profile-edit.php">Edit Profile</a></li>
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
                            <h4>Ongoing Booking</h4>                            
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Booking Records</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ongoing</a></li>
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
                                                <th>Facility/Equipment</th>
                                                <th>Facility/Equipment Name</th>
                                                <th>Date</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Location</th>
                                                <th>Action</th>                                                 
                                            </tr>
                                        </thead>
                                        <?php
                                        while($rows=mysqli_fetch_assoc($result)){
                                            ?>
                                        
                                        <tbody>                                   
                                            <tr>
                                                <td style="color:#575757"><?php echo $rows['booking_type']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['item_name']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['bookdate']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['booktime']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['booktime_end']; ?></td> 
                                                <?php
                                                                                       
                                                if ($rows['booking_type']== 'Facility'){
                                                    
                                                $sql3 = "SELECT * FROM facility";
                                                $sql4="SELECT * FROM booking_records where userID = $userID AND book_status = 'Upcoming'";
                                                $result3=mysqli_query($db,$sql3);
                                                $result4=mysqli_query($db,$sql4);

                                                while($rows3=mysqli_fetch_assoc($result3)){

                                                    if($rows3['facility_name']== $rows['item_name']){

                                                        echo '<td style="color:#575757"><a href="https://www.google.com/maps/dir//'.$rows3["location_latitude"].','.$rows3["location_longitude"].'" target="_blank"> <button class="btn btn-primary">Navigate</button></a></td>';
                                                    }


                                                }



                                                

                                                } else {
                                                    echo '<td style="color:#575757">None</td>';
                                                }
                                                
                                                
                                                ?>  
                                                <?php
                                                
                                                if ($rows["booking_type"] == 'Equipment'){
                                                    
                                                    echo '<td style="color:#575757"><a href="user_booking_return_form.php?bookingID='.$rows["bookingID"].'"<button class="btn btn-primary">Return Equipment</button></a></td>';

                                                }else{
                                                    echo '<td style="color:#575757"><a href="user_booking_records_ongoing2.php?bookingID='.$rows["bookingID"].'"<button class="btn btn-primary">Return Facility</button></a></td>';
                                                }
                                                
                                                ?> 
                                                
                                                
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Facility/Equipment</th>
                                                <th>Facility/Equipment Name</th>
                                                <th>Date</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Location</th>
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