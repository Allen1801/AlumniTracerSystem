<?php

include_once 'Includes/dbconnector.php';

session_start();
$id=$_REQUEST['id'];

$sqlarchive = "UPDATE announcement set status='INACTIVE' where id=$id";
mysqli_query($link, $sqlarchive);


$sqldelete = "SELECT * FROM announcement where status='INACTIVE'";
$result = mysqli_query($link,$sqldelete);
while ($row = mysqli_fetch_assoc($result)) {
    $filename = $row['image'];
    if (file_exists($filename)) {
    unlink($filename);
    echo 'File '.$filename.' has been deleted';
    header("Location: slider.php");
  } else {
    echo 'Could not delete '.$filename.', file does not exist';
  }
}

?>