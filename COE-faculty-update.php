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
    $target_dir = 'faculty/COE/';
    $target_pathsecretary = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathsecretary);
    
    $sql = "UPDATE coefaculty SET img='$target_pathsecretary' WHERE id=1";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
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
    $target_dir = 'faculty/COE/';
    $target_pathsecretary = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathsecretary);
    
    $sql = "UPDATE coefaculty SET img='$target_pathsecretary' WHERE id=2";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
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
    $target_dir = 'faculty/COE/';
    $target_pathhead1 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathhead1);
    
    $sql = "UPDATE coefaculty SET img='$target_pathhead1' WHERE id=3";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['ft1-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photoft1']['tmp_name'];
    $file_name = $_FILES['photoft1']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'faculty/COE/';
    $target_pathft1 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft1);
    
    $sql = "UPDATE coefaculty SET img='$target_pathft1' WHERE id=4";
    
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
    $target_dir = 'faculty/COE/';
    $target_pathft2 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft2);
    
    $sql = "UPDATE coefaculty SET img='$target_pathft2' WHERE id=5";
    
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
    $target_dir = 'faculty/COE/';
    $target_pathft3 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft3);
    
    $sql = "UPDATE coefaculty SET img='$target_pathft3' WHERE id=6";
    
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
    $target_dir = 'faculty/COE/';
    $target_pathft4 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft4);
    
    $sql = "UPDATE coefaculty SET img='$target_pathft4' WHERE id=7";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['ft5-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photoft5']['tmp_name'];
    $file_name = $_FILES['photoft5']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'faculty/COE/';
    $target_pathft5 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft5);
    
    $sql = "UPDATE coefaculty SET img='$target_pathft5' WHERE id=8";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['ft6-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photoft6']['tmp_name'];
    $file_name = $_FILES['photoft6']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'faculty/COE/';
    $target_pathft6 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft6);
    
    $sql = "UPDATE coefaculty SET img='$target_pathft6' WHERE id=9";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['ft7-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photoft7']['tmp_name'];
    $file_name = $_FILES['photoft7']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'faculty/COE/';
    $target_pathft7 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft7);
    
    $sql = "UPDATE coefaculty SET img='$target_pathft7' WHERE id=10";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['ft8-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photoft8']['tmp_name'];
    $file_name = $_FILES['photoft8']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'faculty/COE/';
    $target_pathft8 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft8);
    
    $sql = "UPDATE coefaculty SET img='$target_pathft8' WHERE id=11";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}

if (isset($_POST['ft9-submit'])) {
    $id = $_POST['hidden_id'];

    $uniqimage = rand(100000, 999999);
    
    $tmp_name = $_FILES['photoft9']['tmp_name'];
    $file_name = $_FILES['photoft9']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;
    
    // Move the uploaded file to the desired directory
    $target_dir = 'faculty/COE/';
    $target_pathft9 = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_pathft9);
    
    $sql = "UPDATE coefaculty SET img='$target_pathft9' WHERE id=12";
    
    if(mysqli_query($link, $sql)){
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
        
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

    $ft1name= $_POST['ft1name'];
    $ft1pos = $_POST['ft1pos'];
    $ft1email = $_POST['ft1email'];

    $ft2name= $_POST['ft2name'];
    $ft2pos = $_POST['ft2pos'];
    $ft2email = $_POST['ft2email'];

    $ft3name= $_POST['ft3name'];
    $ft3pos = $_POST['ft3pos'];
    $ft3email = $_POST['ft3email'];

    $ft4name= $_POST['ft4name'];
    $ft4pos = $_POST['ft4pos'];
    $ft4email = $_POST['ft4email'];

    $ft5name= $_POST['ft5name'];
    $ft5pos = $_POST['ft5pos'];
    $ft5email = $_POST['ft5email'];

    $ft6name= $_POST['ft6name'];
    $ft6pos = $_POST['ft6pos'];
    $ft6email = $_POST['ft6email'];

    $ft7name= $_POST['ft7name'];
    $ft7pos = $_POST['ft7pos'];
    $ft7email = $_POST['ft7email'];

    $ft8name= $_POST['ft8name'];
    $ft8pos = $_POST['ft8pos'];
    $ft8email = $_POST['ft8email'];

    $ft9name= $_POST['ft9name'];
    $ft9pos = $_POST['ft9pos'];
    $ft9email = $_POST['ft9email'];


    
    $sqldean = "UPDATE coefaculty SET name='$deanname', pos='$deanpos', email='$deanemail' WHERE id=1";
    $sqlsecretary = "UPDATE coefaculty SET name='$secretaryname', pos='$secretarypos', email='$secretaryemail' WHERE id=2";
    $sqlhead1 = "UPDATE coefaculty SET name='$head1name', pos='$head1pos', email='$head1email' WHERE id=3";
    $sqlft1 = "UPDATE coefaculty SET name='$ft1name', pos='$ft1pos', email='$ft1email' WHERE id=4";
    $sqlft2 = "UPDATE coefaculty SET name='$ft2name', pos='$ft2pos', email='$ft2email' WHERE id=5";
    $sqlft3 = "UPDATE coefaculty SET name='$ft3name', pos='$ft3pos', email='$ft3email' WHERE id=6";
    $sqlft4 = "UPDATE coefaculty SET name='$ft4name', pos='$ft4pos', email='$ft4email' WHERE id=7";
    $sqlft5 = "UPDATE coefaculty SET name='$ft5name', pos='$ft5pos', email='$ft5email' WHERE id=8";
    $sqlft6 = "UPDATE coefaculty SET name='$ft6name', pos='$ft6pos', email='$ft6email' WHERE id=9";
    $sqlft7 = "UPDATE coefaculty SET name='$ft7name', pos='$ft7pos', email='$ft7email' WHERE id=10";
    $sqlft8 = "UPDATE coefaculty SET name='$ft8name', pos='$ft8pos', email='$ft8email' WHERE id=11";
    $sqlft9 = "UPDATE coefaculty SET name='$ft9name', pos='$ft9pos', email='$ft9email' WHERE id=12";

    
    if(mysqli_query($link, $sqldean)){
        mysqli_query($link, $sqlsecretary);
        mysqli_query($link, $sqlhead1);
        mysqli_query($link, $sqlft1);
        mysqli_query($link, $sqlft2);
        mysqli_query($link, $sqlft3);
        mysqli_query($link, $sqlft4);
        mysqli_query($link, $sqlft5);
        mysqli_query($link, $sqlft6);
        mysqli_query($link, $sqlft7);
        mysqli_query($link, $sqlft8);
        mysqli_query($link, $sqlft9);
        $sqllogs = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the Contacts')";
        mysqli_query($link, $sqllogs);
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    
    }
}
echo "<script>alert('Contacts has been updated.');
window.location= 'COE-Faculty-Settings.php';</script>";
?>