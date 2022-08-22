<?php
require_once 'dbconfig.php';
include('session_admin.php');

//session_start(); 

//	if (!isset($_SESSION['userID'])) {
//	$_SESSION['msg'] = "You must log in first";
//	header('location: page-login.php');
//	}

$facilityID = $_GET["facilityID"];
$sql="SELECT * FROM facility where facilityID = $facilityID ";
$result=mysqli_query($db,$sql);


if (isset($_POST['edit_fac'])) {
	$fac_name = mysqli_real_escape_string($db, $_POST['fac_name']);
    $latitude = mysqli_real_escape_string($db, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($db, $_POST['longitude']);

    
    $query ="UPDATE facility SET facility_name='".$fac_name."', location_latitude='".$latitude."', location_longitude='".$longitude."'WHERE facilityID='".$facilityID."'";

        mysqli_query($db, $query);
		
        echo "<script>alert('Facility Updated Successfully');
		window.location.href='admin_manage_facility.php';
		</script>";
    }
    

while($rows=mysqli_fetch_assoc($result)){
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Profile </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
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
                            <div class="search_bar dropdown">


                            </div>
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

                    <li><a href="./dashboard.php" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Dashboard</span></a>

                    <li><a href="./admin_booking_records.php" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Booking Records</span></a>

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
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Edit Facility</h4>

                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Facility</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Facility</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="form-validation">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-xl-2"></div>
                                            <div class="col-xl-7">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username"
                                                        style="color:#575757">Facility Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input required type="text" class="form-control" id="fac_name"
                                                            name="fac_name"
                                                            value="<?php echo $rows['facility_name']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username"
                                                        style="color:#575757">Latitude
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input required type="text" class="form-control" id="latitude"
                                                            name="latitude"
                                                            value="<?php echo $rows['location_latitude']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-email"
                                                        style="color:#575757">Longitude <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input required type="text" class="form-control" id="longitude"
                                                            name="longitude"
                                                            value="<?php echo $rows['location_longitude']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">                                                        
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal" data-target="#exampleModalCenter">
                                                            Submit
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Edit Facility</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure to edit facility?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary"
                                                            name="edit_fac">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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




    <!-- Jquery Validation -->
    <script src="./vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="./js/plugins-init/jquery.validate-init.js"></script>

</body>
<?php 

}
?>

</html>