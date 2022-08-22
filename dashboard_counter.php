<?php
require_once 'dbconfig.php';

//dasboard counter start
$sql2="SELECT * FROM user";
$result2=mysqli_query($db,$sql2);
$rowcount=mysqli_num_rows($result2);

$sql3="SELECT * FROM booking_records WHERE book_status = 'Upcoming'";
$result3=mysqli_query($db,$sql3);
$rowcount3=mysqli_num_rows($result3);

$sql4="SELECT * FROM booking_records WHERE book_status = 'Ongoing'";
$result4=mysqli_query($db,$sql4);
$rowcount4=mysqli_num_rows($result4);

$sql5="SELECT * FROM booking_records WHERE book_status = 'Ended'";
$result5=mysqli_query($db,$sql5);
$rowcount5=mysqli_num_rows($result5);
//dasboard counter end

//nov2021
$sql6="SELECT * FROM booking_records WHERE bookdate LIKE '%November%' 
                                     AND   bookdate LIKE '%2021%'
                                     AND   booking_type = 'Equipment'";

$sql66="SELECT * FROM booking_records WHERE bookdate LIKE '%November%' 
AND   bookdate LIKE '%2021%'
AND   booking_type = 'Facility'";
$result6=mysqli_query($db,$sql6);
$rowcount6=mysqli_num_rows($result6);
$result66=mysqli_query($db,$sql66);
$rowcount66=mysqli_num_rows($result66);

//dec2021
$sql7="SELECT * FROM booking_records WHERE bookdate LIKE '%-12-%' 
                                     AND   bookdate LIKE '%2021%'
                                     AND   booking_type = 'Equipment'";

$sql77="SELECT * FROM booking_records WHERE bookdate LIKE '%December%' 
AND   bookdate LIKE '%2021%'
AND   booking_type = 'Facility'";
$result7=mysqli_query($db,$sql7);
$rowcount7=mysqli_num_rows($result7);
$result77=mysqli_query($db,$sql77);
$rowcount77=mysqli_num_rows($result77);

//total feedback
$sql8="SELECT * FROM booking_records WHERE feedback != 'NULL'";
$result8=mysqli_query($db,$sql8);
$totalfeedback=mysqli_num_rows($result8);

//total feedback - positive
$sql9="SELECT * FROM booking_records WHERE feedback = 'Positive'";
$result9=mysqli_query($db,$sql9);
$tpositive=mysqli_num_rows($result9);

//total feedback - negative
$sql10="SELECT * FROM booking_records WHERE feedback = 'Negative'";
$result10=mysqli_query($db,$sql10);
$tnegative=mysqli_num_rows($result10);    

$percentp = $tpositive / $totalfeedback * 100; //percent
$percentp2 = $percentp / 100; //decimal

$percentn = $tnegative / $totalfeedback * 100;

//1 equipment - badminton racket
$sql11="SELECT * FROM booking_records WHERE item_name = 'Badminton Racket'";
$result11=mysqli_query($db,$sql11);
$countbadmintonracket=mysqli_num_rows($result11);

//2 equipment - badminton shuttlecock
$sql12="SELECT * FROM booking_records WHERE item_name = 'Badminton Shuttlecock'";
$result12=mysqli_query($db,$sql12);
$countbadmintonshuttlecock=mysqli_num_rows($result12);

//3 equipment - 
$sql13="SELECT * FROM booking_records WHERE item_name = ''";
$result13=mysqli_query($db,$sql13);
$count=mysqli_num_rows($result13);

//4 equipment - 
$sql14="SELECT * FROM booking_records WHERE item_name = ''";
$result14=mysqli_query($db,$sql14);
$count=mysqli_num_rows($result14);

//5 equipment - 
$sql15="SELECT * FROM booking_records WHERE item_name = ''";
$result15=mysqli_query($db,$sql15);
$count=mysqli_num_rows($result15);

?>