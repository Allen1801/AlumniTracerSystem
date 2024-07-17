<?php
session_start();

$id = $_SESSION['id'];
$username = $_SESSION['username'];

    if(!isset($_SESSION['id'])){
    header("location:index.php");
    }


    $sql = "SELECT * FROM accounts WHERE id=$id";
    if ($result = mysqli_query($link, $sql))
    {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $A = $row['account'];   
        $settpass = $row['settpass'];
    }    

?>