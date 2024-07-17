<?php 

include_once 'Includes/dbconnector.php';
include_once 'Includes/admin/getId.php';

if (isset($_POST['submit'])) {
    $header = $_POST['header'];
    $subhead = $_POST['header1'];
    $message = $_POST['message'];
    $uniqimage = rand(100000, 999999);

//if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['photo']['tmp_name'];
    $file_name = $_FILES['photo']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // Generate a unique filename to avoid conflicts
    $photo_path = $uniqimage . '.' . $file_ext;

    // Move the uploaded file to the desired directory
    $target_dir = 'dashboard/';
    $target_path = $target_dir . $photo_path;
    move_uploaded_file($tmp_name, $target_path);
//}

$sql = "INSERT into dashboard (header, subhead ,message, img) values ('$header', '$subhead','$message', '$target_path')";

if(mysqli_query($link, $sql)){
    $sql = "INSERT INTO logs (name, date ,action)  VALUES ('admin', CURRENT_DATE ,'Updated the dashboard Announcement')";
    mysqli_query($link, $sql);
    header("Location: dashboard.php");
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);

}


}

?>
<!DOCTYPE html>
<html>
<title> Admin | Settings | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-style.css"/> 
    <link rel="stylesheet" href="CSS/admin-settings-style.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div id="sidebar-div"> <?php include("admin-sidebar.php"); ?> </div>

<main>
        <div class="announcement">
        <h2> Announcement </h2>

        <form method="POST" enctype="multipart/form-data"> 
            <input type="text" name="header" id="announcement-title" placeholder="Type the title here...">
            <input type="text" name="header1" id="announcement-title" placeholder="Type the sub-header here...">
            <textarea name="message" id="announcement-content" placeholder="Type the information here..."></textarea>
            
            <p> UPLOAD PHOTO </p>

            <div class="announcement-buttons"> 
            <input type="file" id="file-ann" class="input-field7" name="photo" accept="image/*" required hidden> 
            <label for="file-ann" class="upload-btn">CHOOSE FILE</label>
             <p style="text-align:center; font-weight:bold;">Note: Use 2480 pixels by 1536 pixels image size.</p>
            <button type="submit" name="submit" id="submit-announcement"> SAVE CHANGES </button>
            </div>
            
        </form>

    </div>
</main>

<script src="Javascript/admin-logout.js"></script>
<script src="Javascript/sidebar-toggle.js" type="text/javascript"> </script>

<script type="text/javascript">
      function previewImage(event) {
         var input = event.target;
         var image = document.getElementById('preview');
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               image.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
         }
      }
   </script>
       <script>
document.addEventListener('contextmenu', (e) => e.preventDefault());

function ctrlShiftKey(e, keyCode) {
  return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
}

document.onkeydown = (e) => {
  // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
  if (
    event.keyCode === 123 ||
    ctrlShiftKey(e, 'I') ||
    ctrlShiftKey(e, 'J') ||
    ctrlShiftKey(e, 'C') ||
    (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
  )
    return false;
};
</script>
</body>
</html>