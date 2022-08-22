<?php

require_once 'dbconfig.php';
session_start(); 
$userID = $_SESSION["userID"];

$equip=$_POST['equip'];
$bookdate=$_POST['bookdate'];

$result = $_POST['session'];
$result_explode = explode('|', $result);
$booktime=$result_explode[0];
$booktime_end=$result_explode[1];

$user_check_query = "SELECT * FROM booking_records WHERE item_name='$equip' AND bookdate='$bookdate' AND booktime='$booktime' AND book_status!='Ended' LIMIT 1";
                                
$result2 = mysqli_query($db, $user_check_query);
$check = mysqli_fetch_assoc($result2);
                                
if ($check == true) { 
                                        
    echo '<label style="color:red;">The facility has been booked on the date and time. Please choose another time and date</label><br>';

} else if ($check == false) {
    if ($equip== "1" || $bookdate == null || $booktime == "1"){
        echo '<label style="color:red;">Please fill in the booking details first</label>'; 
    }elseif ($booktime == $booktime_end) {
        echo '<label style="color:red;">Start time and end time must be different</label>';
    }else {
   echo '<label style="color:green;">The facility for that date and time is available</label>'; 
   ?>
   
   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input hidden type="text" value="<?php echo("{$_POST['equip']}");?>" name="equip">
    <input hidden type="text" value="<?php echo("{$_POST['bookdate']}");?>" name="datepicker">
    <input hidden type="text" value="<?php echo("{$booktime}");?>" name="booktime">
    <input hidden type="text" value="<?php echo("{$booktime_end}");?>" name="booktime_end">
    
   <br><button  class="btn btn-primary btn-sl-sm mb-5" type="submit" style="float: right;" value="book_equipment" name="book_equipment">Submit</button>
</form>
   
   <?php
   if (isset($_POST['book_equipment'])) {
    
    $equip = mysqli_real_escape_string($db, $_POST['equip']);
    $datepicker = mysqli_real_escape_string($db, $_POST['datepicker']);
    $booktime = mysqli_real_escape_string($db, $_POST['booktime']);
    $booktime_end = mysqli_real_escape_string($db, $_POST['booktime_end']);

    $query1 = "INSERT INTO booking_records (userID, booking_type, item_name, bookdate, booktime, booktime_end) 
    VALUES($userID,'Equipment', '$equip', '$datepicker', '$booktime', '$booktime_end')";
    
    mysqli_query($db, $query1);

    echo "<script>alert('Booking Successfully');
		window.location.href='user_booking_records_upcoming.php';
		</script>";

}

    } }

?>