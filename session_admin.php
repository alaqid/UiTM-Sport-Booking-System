<?php

session_start(); 

	if (!isset($_SESSION['adminEmail'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: page-error-403.html');
	}

$adminEmail = $_SESSION["adminEmail"];

?>