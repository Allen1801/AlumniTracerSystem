<?php
include_once 'Includes/dbconnector.php';

if (isset($_POST['ft1-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photoft1']['tmp_name'];
    $file_name = $_FILES['photoft1']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'faculty/PLPO/';
    $target_pathft1 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft1);
    
    $sql = "UPDATE plpooffice SET img='$target_pathft1' WHERE id=1";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['ft2-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photoft2']['tmp_name'];
    $file_name = $_FILES['photoft2']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'faculty/PLPO/';
    $target_pathft2 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft2);
    
    $sql = "UPDATE plpooffice SET img='$target_pathft2' WHERE id=2";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['ft3-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photoft3']['tmp_name'];
    $file_name = $_FILES['photoft3']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'faculty/PLPO/';
    $target_pathft3 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft3);
    
    $sql = "UPDATE plpooffice SET img='$target_pathft3' WHERE id=3";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['ft4-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photoft4']['tmp_name'];
    $file_name = $_FILES['photoft4']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'faculty/PLPO/';
    $target_pathft4 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft4);
    
    $sql = "UPDATE plpooffice SET img='$target_pathft4' WHERE id=4";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['submit-all'])) {
    $id = $_POST['hidden_id'];

    $ft1name= $_POST['admin'];
    $ft2name= $_POST['mis'];
    $ft3name= $_POST['registrar'];
    $ft4name= $_POST['sas'];


    $sqlft1 = "UPDATE plpooffice SET phone='$ft1name' WHERE id=1";
    $sqlft2 = "UPDATE plpooffice SET phone='$ft2name' WHERE id=2";
    $sqlft3 = "UPDATE plpooffice SET phone='$ft3name' WHERE id=3";
    $sqlft4 = "UPDATE plpooffice SET phone='$ft4name' WHERE id=4";

    
    if(mysqli_query($link, $sqlft1)){
        mysqli_query($link, $sqlft2);
        mysqli_query($link, $sqlft3);
        mysqli_query($link, $sqlft4);

        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}
echo "<script>alert('Contacts has been updated.');
window.location= 'PLPO-Settings.php';</script>";
?>