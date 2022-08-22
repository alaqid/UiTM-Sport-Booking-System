<?php

require_once 'dbconfig.php';

$bookdate=$_POST['bookdate'];


$user_check_query = "SELECT * FROM booking_records WHERE bookdate LIKE '%$bookdate%'";
                                
$result2 = mysqli_query($db, $user_check_query);

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
                                

            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Facility Booking Records</h4>                            
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Booking Records</a></li>
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
                                                <th>Time</th> 
                                                <th>Status</th>
                                                <th>User</th>
                                                <th>Action</th>                                             
                                            </tr>
                                        </thead>
                                        <?php
                                        while($rows=mysqli_fetch_assoc($result2)){
                                            ?>
                                        
                                        <tbody>                                   
                                            <tr>
                                                <td style="color:#575757"><?php echo $rows['booking_type']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['item_name']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['bookdate']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['booktime']; ?></td>
                                                <td style="color:#575757"><?php echo $rows['book_status']; ?></td>                                            
                                                <td style="color:#575757"><a href="app-profile2.php?userID=<?php echo $rows["userID"]; ?>"> <button class="btn btn-primary">View Profile</button></a></td>
                                                <td style="color:#575757"><a href="admin_booking_edit_facility.php?bookingID=<?php echo $rows["bookingID"]; ?>"> <button class="btn btn-info">Edit</button></a></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Facility/Equipment</th>
                                                <th>Facility/Equipment Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>User</th>
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
        
                    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    


    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>

    </body>

</html>