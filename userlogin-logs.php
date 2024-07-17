<?php

session_start();

include_once 'Includes/dbconnector.php';

$id=$_SESSION['id'];

$sql = "SELECT * FROM aluminfo WHERE id=$id";
if ($result = mysqli_query($link, $sql))
{
    $row = mysqli_fetch_array($result);
    $A = $row['lname'];
    $B = $row['fname'];
    $C = $row['years'];
    $D = $row['suffix'];
    $E = $row['mini'];

} 
    
    $sqlupdate = "UPDATE aluminfo set lastlogin=CURRENT_DATE where id='$id'";
    mysqli_query($link, $sqlupdate);

$sql = "INSERT INTO logs (name, date ,action) 
VALUES ('$B $E $A $D', CURRENT_DATE ,'Logged in')";

if (mysqli_query($link, $sql)) {
header ("Location: overview.php");
} else{
echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
mysqli_close($link);

?>