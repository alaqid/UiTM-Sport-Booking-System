<?php

require_once 'dbconfig.php';
//session_start(); 
//$userID = $_SESSION["userID"];

$bookingID = $_POST["bookingID"];
$equip=$_POST['equip'];
$bookdate=$_POST['bookdate'];
$booktime=$_POST['booktime'];
$booktime_end=$_POST['booktime_end'];


$user_check_query = "SELECT * FROM booking_records WHERE item_name='$equip' AND bookdate='$bookdate' AND booktime='$booktime' AND book_status!='Ended' LIMIT 1";
                                
$result2 = mysqli_query($db, $user_check_query);
$check = mysqli_fetch_assoc($result2);
                                
if ($check == true) { 
                                        
    echo '<label style="color:red;">The facility has been booked on the date and time. Please choose another time and date</label><br>';

} else if ($check == false) {

   echo '<label style="color:green;">The facility for that date and time is available</label>'; ?>
   
   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input hidden type="text" value="<?php echo("{$_POST['bookingID']}");?>" name="bookingID">
    <input hidden type="text" value="<?php echo("{$_POST['equip']}");?>" name="equip">
    <input hidden type="text" value="<?php echo("{$_POST['bookdate']}");?>" name="datepicker">
    <input hidden type="text" value="<?php echo("{$_POST['booktime']}");?>" name="booktime">
    <input hidden type="text" value="<?php echo("{$_POST['booktime_end']}");?>" name="booktime_end">
    
   <br><button  class="btn btn-primary btn-sl-sm mb-5" type="submit" style="float: right;" value="book_equipment" name="book_equipment">Submit</button>
</form>
   
   <?php
   if (isset($_POST['book_equipment'])) {
    
    $equip = mysqli_real_escape_string($db, $_POST['equip']);
    $datepicker = mysqli_real_escape_string($db, $_POST['datepicker']);
    $booktime = mysqli_real_escape_string($db, $_POST['booktime']);
    $booktime_end = mysqli_real_escape_string($db, $_POST['booktime_end']);

    $query1 ="UPDATE booking_records SET item_name='".$equip."', bookdate='".$datepicker."', booktime='".$booktime."', booktime_end='".$booktime_end."' WHERE bookingID='".$bookingID."'";
    
    mysqli_query($db, $query1);

    echo "<script>alert('Booking Updated Successfully');
		window.location.href='admin_booking_records_equipment.php';
		</script>";

}

    } 

?>