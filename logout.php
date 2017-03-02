<?php
    session_start();
    session_destroy();
session_start();
$_SESSION["message"] = "you have successfully logged out!";
$_SESSION["loggedin"] = "no";
	header("Location: login.php");
	
?>
