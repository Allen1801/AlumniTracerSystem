<?php

include_once 'Includes/dbconnector.php';

session_start();
$id=$_SESSION['id'];

if (isset($_POST['submit-slider'])) {
$uniqimage = rand(100000, 999999);

//if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['photo']['tmp_name'];
    $file_name = $_FILES['photo']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;

    // Move the uploaded file to the desired directory
    $target_dir = 'sliders/';
    $target_path = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_path);
//}

$sql = "INSERT into announcement (image, status) values ('$target_path', 'ACTIVE')";

if(mysqli_query($link, $sql)){
    $sql = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Added an Image')";
    mysqli_query($link, $sql);
    header ("Location: slider.php");
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);

}
}


?>