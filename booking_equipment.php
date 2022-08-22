<?php

require_once 'dbconfig.php';

include('session_user.php');

$query = "SELECT * FROM equipment";

$result1 = mysqli_query($db,$query);

if (isset($_POST['book_equipment'])) {
    $select_equip = mysqli_real_escape_string($db, $_POST['select_equip']);
    $datepicker = mysqli_real_escape_string($db, $_POST['datepicker']);
    $booktime = mysqli_real_escape_string($db, $_POST['booktime']);
    $booktime_end = mysqli_real_escape_string($db, $_POST['booktime_end']);

    $query1 = "INSERT INTO booking_records (userID, booking_type, item_name, bookdate, booktime, booktime_end) 
    VALUES($userID,'Equipment', '$select_equip', '$datepicker', '$booktime', '$booktime_end')";
    
    mysqli_query($db, $query1);

    echo "<script>alert('Booking Successfully');
		window.location.href='user_booking_records_upcoming.php';
		</script>";

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Equipment Booking </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Daterange picker -->
    <link href="./vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="./vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="./vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="./vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="./vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="./vendor/pickadate/themes/default.date.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">

    <link href="./vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        function chk() {
            var equip = document.getElementById('single-select').value;
            var bookdate = document.getElementById('datepicker').value;
            var session = document.getElementById('session').value;
            //var booktime = document.getElementById('booktime').value;
            //var booktime_end = document.getElementById('booktime_end').value;

            $.ajax({
                type: "post",
                url: "hi2.php",
                data: {
                    equip: equip,
                    bookdate: bookdate,
                    session: session
                },
                cache: false,
                success: function (html) {
                    $('#msg').html(html);
                }
            });
            return false;
        }
    </script>

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
                            <h4>Equipment Booking </h4>

                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Booking</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Equipment</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-body">
                                <form method="post">
                                    <div class="mb-4">
                                        <h4 class="card-title">Select Equipment</h4>
                                    </div>
                                    <select id="single-select" name="select_equip">
                                        <option selected disabled value="1">Please select equipment</option>
                                        <?php while($row = mysqli_fetch_array($result1)):; ?>
                                        <option value="<?php echo $row['equipment_name']; ?>">
                                            <?php echo $row['equipment_name']; ?></option>
                                        <?php endwhile; ?>
                                    </select><br><br><br>
                                    <h4 class="card-title">Select date</h4>
                                    <input type="date" name="datepicker" class="form-control" id="datepicker" required>
                                    <br><br>
                                    <h4 class="card-title">Select Session</h4>
                                    <!--<label>Make sure to pick time with an hour period. (For example= 09:00 AM until
                                        10:00 AM)</label>
                                    <input id="booktime" autocomplete="off" name="booktime" type="time" 
                                        class="form-control" >
                                    <br>
                                    <h4 class="card-title">Select end time</h4>
                                    <input id="booktime_end" autocomplete="off" name="booktime_end" type="time"
                                         class="form-control">-->
                                         <select class="form-control" name="session" id="session">
                                        <option selected disabled value="1|1">Please select session</option>
                                        <option value="09:00|10:00">09:00 AM - 10:00 AM</option>
                                        <option value="10:00|11:00">10:00 AM - 11:00 AM</option>
                                        <option value="11:00|12:00">11:00 AM - 12:00 PM</option>
                                        <option value="12:00|13:00">12:00 PM - 01:00 PM</option>
                                        <option value="13:00|14:00">01:00 PM - 02:00 PM</option>
                                        <option value="14:00|15:00">02:00 PM - 03:00 PM</option>
                                        <option value="15:00|16:00">03:00 PM - 04:00 PM</option>
                                        <option value="16:00|17:00">04:00 PM - 05:00 PM</option>
                                        <option value="17:00|18:00">05:00 PM - 06:00 PM</option>
                                        <option value="18:00|19:00">06:00 PM - 07:00 PM</option>
                                        <option value="19:00|20:00">07:00 PM - 08:00 PM</option>
                                        <option value="20:00|21:00">08:00 PM - 09:00 PM</option>
                                        <option value="21:00|22:00">09:00 PM - 10:00 PM</option>
                                        <option value="22:00|23:00">10:00 PM - 11:00 PM</option>
                                    </select> 
                                    <br><br>

                                    <?php
                                
                                if (isset($_POST['check_avail'])) {

                                    $select_equip1 = mysqli_real_escape_string($db, $_POST['select_equip']);
                                    $datepicker1 = mysqli_real_escape_string($db, $_POST['datepicker']);
                                    $booktime1 = mysqli_real_escape_string($db, $_POST['booktime']);
                                
                                    $user_check_query = "SELECT * FROM booking_records WHERE item_name='$select_equip1' AND bookdate='$datepicker1' AND booktime='$booktime1' LIMIT 1";
                                
                                    $result2 = mysqli_query($db, $user_check_query);
                                    $check = mysqli_fetch_assoc($result2);
                                
                                    if ($check == true) { 
                                        
                                        echo '<label style="color:red;border: 2px solid black;">The equipment has been booked on the date and time. Please choose another time and date      
                                        </label><br>';

                                        

                                        } else if ($check == false) {
                                            echo '<label style="color:green;border: 2px solid black;">The equipment for that date and time is available  
                                          </label>';
                                          echo '<br><br><button  class="btn btn-primary btn-sl-sm mb-5" type="submit" style="float: right;" name="book_equipment">Submit</button>';
                                        } else {
                                            echo "<label hidden>The equipment for that date and time is available  
                                          </label>";
                                        }
                                
                                    
                                }
                                
                                
                                ?>

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalCenter">Check Availability</button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Check Availability</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <input class="btn btn-info" type="submit" name="check_avails" value="Check Availability" onclick="return chk()"></input>
                                                <hr>
                                                <p id="msg"></p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <br><br><label style="color:red">Please check the availability of the selected date
                                        <br>and session
                                        by clicking this button</label>
                                </form>
                    
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



    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="./vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="./vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="./vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="./vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="./vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="./vendor/pickadate/picker.js"></script>
    <script src="./vendor/pickadate/picker.time.js"></script>
    <script src="./vendor/pickadate/picker.date.js"></script>



    <!-- Daterangepicker -->
    <script src="./js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="./js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="./js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    <script src="./js/plugins-init/material-date-picker-init.js"></script>
    <!-- Pickdate -->
    <script src="./js/plugins-init/pickadate-init.js"></script>

    <script src="./vendor/select2/js/select2.full.min.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>

    <script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="./js/plugins-init/sweetalert.init.js"></script>
    <script>
        document.getElementById("booktime").defaultValue = "00:00";
        document.getElementById("booktime_end").defaultValue = "00:00";
    </script>

</body>

</html>