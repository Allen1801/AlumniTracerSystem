<?php

include_once 'Includes/dbconnector.php';
session_start();
$id = $_SESSION['id'];

$sql = "SELECT * FROM accounts WHERE id=$id";
if ($result = mysqli_query($link, $sql))
{
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $A = $row['account'];

} 
    

$sql = "INSERT INTO logs (name, date ,action) 
VALUES ('$A', CURRENT_DATE ,'Logged in')";

if (mysqli_query($link, $sql)) {
header ("Location: admin-dashboard.php?");
} else{
echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
mysqli_close($link);

?>