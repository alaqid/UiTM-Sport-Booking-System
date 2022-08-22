<?php

require_once 'dbconfig.php';
//session_start(); 
//$userID = $_SESSION["userID"];

$bookingID = $_POST["bookingID"];
$facy=$_POST['facy'];
$bookdate=$_POST['bookdate'];
$booktime=$_POST['booktime'];
$booktime_end=$_POST['booktime_end'];


$user_check_query = "SELECT * FROM booking_records WHERE item_name='$facy' AND bookdate='$bookdate' AND booktime='$booktime' AND book_status!='Ended' LIMIT 1";
                                
$result2 = mysqli_query($db, $user_check_query);
$check = mysqli_fetch_assoc($result2);
                                
if ($check == true) { 
                                        
    echo '<label style="color:red;">The facility has been booked on the date and time. Please choose another time and date</label><br>';

} else if ($check == false) {

   echo '<label style="color:green;">The facility for that date and time is available</label>'; ?>
   
   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input hidden type="text" value="<?php echo("{$_POST['bookingID']}");?>" name="bookingID">
    <input hidden type="text" value="<?php echo("{$_POST['facy']}");?>" name="select_fac">
    <input hidden type="text" value="<?php echo("{$_POST['bookdate']}");?>" name="datepicker">
    <input hidden type="text" value="<?php echo("{$_POST['booktime']}");?>" name="booktime">
    <input hidden type="text" value="<?php echo("{$_POST['booktime_end']}");?>" name="booktime_end">
    
   <br><button  class="btn btn-primary btn-sl-sm mb-5" type="submit" style="float: right;" value="book_facility" name="book_facility">Submit</button>
</form>
   
   <?php
   if (isset($_POST['book_facility'])) {
    
    $bookingID = mysqli_real_escape_string($db, $_POST['bookingID']);
    $select_fac = mysqli_real_escape_string($db, $_POST['select_fac']);
    $datepicker = mysqli_real_escape_string($db, $_POST['datepicker']);
    $booktime = mysqli_real_escape_string($db, $_POST['booktime']);
    $booktime_end = mysqli_real_escape_string($db, $_POST['booktime_end']);

    $query1 ="UPDATE booking_records SET item_name='".$select_fac."', bookdate='".$datepicker."', booktime='".$booktime."', booktime_end='".$booktime_end."' WHERE bookingID='".$bookingID."'";
    
    mysqli_query($db, $query1);

    echo "<script>alert('Booking Updated Successfully');
		window.location.href='admin_booking_records_facility.php';
		</script>";

}

    } 

?>