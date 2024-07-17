<?php 
include_once 'Includes/dbconnector.php';
    
//Dean Image
if (isset($_POST['dean-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photodean']['tmp_name'];
    $file_name = $_FILES['photodean']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'news&events/';
    $target_pathsecretary = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathsecretary);
    
    $sql = "UPDATE newsevents SET img='$target_pathsecretary' WHERE id=1";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        header ("Location: news-event.php");
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['secretary-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photosecretary']['tmp_name'];
    $file_name = $_FILES['photosecretary']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'news&events/';
    $target_pathsecretary = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathsecretary);
    
    $sql = "UPDATE newsevents SET img='$target_pathsecretary' WHERE id=2";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        header ("Location: news-event.php");
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['head1-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photohead1']['tmp_name'];
    $file_name = $_FILES['photohead1']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'news&events/';
    $target_pathhead1 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathhead1);
    
    $sql = "UPDATE newsevents SET img='$target_pathhead1' WHERE id=3";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        header ("Location: news-event.php");
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['submit-all'])) {
    $id = $_POST['hidden_id'];

    $deanname= $_POST['deanname'];
    $deanpos = $_POST['deanpos'];
    $deanemail = $_POST['deanemail'];

    $secretaryname = $_POST['secretaryname'];
    $secretarypos = $_POST['secretarypos'];
    $secretaryemail = $_POST['secretaryemail'];

    $head1name= $_POST['head1name'];
    $head1pos = $_POST['head1pos'];
    $head1email = $_POST['head1email'];
    
    $sqldean = "UPDATE newsevents SET title='$deanname', date='$deanpos', link='$deanemail' WHERE id=1";
    $sqlsecretary = "UPDATE newsevents SET title='$secretaryname', date='$secretarypos', link='$secretaryemail' WHERE id=2";
    $sqlhead1 = "UPDATE newsevents SET title='$head1name', date='$head1pos', link='$head1email' WHERE id=3";
    
    if(mysqli_query($link, $sqldean)){
        mysqli_query($link, $sqlsecretary);
        mysqli_query($link, $sqlhead1);
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        header ("Location: news-event.php");
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

?>