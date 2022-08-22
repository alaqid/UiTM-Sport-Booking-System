<?php

session_start(); 

if (!isset($_SESSION['userID'])) {
$_SESSION['msg'] = "You must log in first";
header('location: page-error-403.html');
}

$userID = $_SESSION["userID"];

?>
