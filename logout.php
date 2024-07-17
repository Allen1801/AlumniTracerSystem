<?php
include_once 'Includes/dbconnector.php';

session_start();
unset($_SESSION['id']);
unset($_SESSION['email']);
header("location:index.php");
exit();


?>
