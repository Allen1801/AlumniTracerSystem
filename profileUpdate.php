<?php
session_start();
include_once 'Includes/dbconnector.php';
include_once 'Includes/select-user-profile.php';

if (isset($_POST['submit-image'])) {
    $id = $_POST['hidden_id'];
    $uniqimage = rand(100000, 999999);
    
    //if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['photo']['tmp_name'];
        $file_name = $_FILES['photo']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
        // Generate a unique filename to avoid conflicts
        $photo_path = $uniqimage . '.' . $file_ext;
    
        // Move the uploaded file to the desired directory
        $target_dir = 'profiles/';
        $target_path = $target_dir . $photo_path;
        move_uploaded_file($tmp_name, $target_path);
    //}
    $sql = "UPDATE aluminfo SET photo='$target_path' WHERE id='$id'";
    
    if (mysqli_query($link, $sql)) {
        
        $logssql = "INSERT INTO logs (name, date ,action) 
        VALUES ('$B $C $A $D', CURRENT_DATE ,'Updated Their Account')";
        if (mysqli_query($link, $logssql)) {
            header ("Location: update-records.php?id=$id");
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }

    } else {
        echo "Error uploading the photo.";
    }

    mysqli_close($link);
    
    }

    if (isset($_POST['submit-info'])) {

    //Getting the input of the user in the form
    $id = $_POST['hidden_id'];
    
    $A = $_POST['lname'];
    $B = $_POST['fname'];
    $C = $_POST['mname'];
    $D = $_POST['sname'];
    $E = $_POST['fullname'];
    $F = $_POST['bdate'];
    $G = $_POST['age'];
    $H = $_POST['sex'];
    $I = $_POST['address'];
    $J = $_POST['cnum'];
    $K = $_POST['email'];
    $L = $_POST['snum'];
    $uname = $_POST['uname'];

    $sql = "UPDATE aluminfo SET fname='$B', lname='$A', mini='$C', suffix='$D', mname='$E', username='$uname', bday='$F', age='$G', sex='$H', address='$I', cnum='$J', email='$K', snum='$L' WHERE id='$id'";

    if (mysqli_query($link, $sql)) {
        
        $logssql = "INSERT INTO logs (name, date ,action) 
        VALUES ('$B $C $A $D', CURRENT_DATE ,'Updated Their Profile')";
        if (mysqli_query($link, $logssql)) {
            echo "<script>alert('Profile has been updated.');
            window.location= 'update-records.php';</script>";
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }

    } else {
        echo "Error uploading the photo.";
    }

    mysqli_close($link);

}
?>