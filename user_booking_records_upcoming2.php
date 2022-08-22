<?php

require_once 'dbconfig.php';


$bookingID = $_GET["bookingID"];
$sql="SELECT * FROM booking_records where userID = $userID";
$result=mysqli_query($db,$sql);

     

    $query ="UPDATE booking_records SET book_status='Ongoing' WHERE bookingID='".$bookingID."'";
    mysqli_query($db, $query);
    echo "<script>
alert('Your booking has started');
window.location.href='user_booking_records_ongoing.php';
</script>";


?>