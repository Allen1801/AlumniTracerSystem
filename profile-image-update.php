<?php

include_once 'Includes/dbconnector.php';

if (isset($_POST['submit-dean'])) {
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
    VALUES ('$B $C $A $D', CURRENT_DATE ,'Updated Their Profile')";
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

?>