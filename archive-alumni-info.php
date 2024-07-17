<?php

include_once 'Includes/dbconnector.php';
include_once 'Includes/admin/getId.php';
include_once 'Includes/admin-select-user-id.php';
include_once 'Includes/admin-select-user-profile.php';


    $sqlarchive = "UPDATE aluminfo set status='INACTIVE' where id=$id";
    mysqli_query($link, $sqlarchive);

    header("Location: admin-records.php");

?>