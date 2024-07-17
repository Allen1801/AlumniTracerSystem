<?php 

include_once 'Includes/dbconnector.php';
include_once 'Includes/admin/getId.php';
include_once 'Includes/session-expire.php';

$sqldean = mysqli_query($link, "SELECT * FROM newsevents where id=1");
$rowdean = mysqli_fetch_array($sqldean);

$sqlsecretary = mysqli_query($link, "SELECT * FROM newsevents where id=2");
$rowsecretary = mysqli_fetch_array($sqlsecretary);

$sqlhead1 = mysqli_query($link, "SELECT * FROM newsevents where id=3");
$rowhead1 = mysqli_fetch_array($sqlhead1);

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
    <link rel="stylesheet" href="CSS/admin-new.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div id="sidebar-div"> <?php include("admin-sidebar.php"); ?> </div>


<form action="news-event-update.php" method="POST" enctype="multipart/form-data">

<div class="colleges">
<div class="colleges-header">
    <h2> News and Events </h2>
</div>

<div class="form-content">

    <div class="form-image">
    <img src="<?php echo $rowdean['img']; ?>" alt="Business Icon" class="logo" id="previewdean">
        <label for="file-btn-dean" class="upload-btn"><u>Upload Image</u></label>
        <input type="file" id="file-btn-dean" class="input-field7" name="photodean" accept="image/*" onchange="loadFileDean(event)" hidden>
        <button type="submit" name="dean-submit"> Save Image </button>
        <p style="text-align:center;">Note: Use 1800 pixels by 1050 pixels image size.</p>
    </div>

    <div class="form-input"> 

        <h3> Entry No. 1 </h3>

        <div class="form-input-div input-name">
            <p> TITLE: </p>
            <input type="text" name="deanname" id="name" value="<?php echo $rowdean['title']; ?>">
        </div>

        <div class="form-input-div"> 
            <p> DATE: </p>
            <input type="text" name="deanpos" id="position" value="<?php echo $rowdean['date']; ?>">
        </div>

        <div class="form-input-div"> 
            <p> LINK: </p>
            <input type="text" name="deanemail" id="email" value="<?php echo $rowdean['link']; ?>">
        </div>

    </div>
</div>

</div>

<div class="colleges">

<div class="form-content">

    <div class="form-image">
    <img src="<?php echo $rowhead1['img']; ?>" alt="Business Icon" class="logo" id="previewhead1">
        <label for="file-btn-head1" class="upload-btn"><u>Upload Image</u></label>
        <input type="file" id="file-btn-head1" class="input-field7" name="photohead1" accept="image/*" onchange="loadFileHead1(event)" hidden>
        <button type="submit" name="head1-submit"> Save Image </button>
        <p style="text-align:center;">Note: Use 1800 pixels by 1050 pixels image size.</p>
    </div>

    <div class="form-input"> 

        <h3> Entry No. 2 </h3>

        <div class="form-input-div input-name">
            <p> TITLE: </p>
            <input type="text" name="head1name" id="name" value="<?php echo $rowhead1['title']; ?>">
        </div>

        <div class="form-input-div"> 
            <p> DATE: </p>
            <input type="text" name="head1pos" id="position" value="<?php echo $rowhead1['date']; ?>">
        </div>

        <div class="form-input-div"> 
            <p> LINK: </p>
            <input type="text" name="head1email" id="email" value="<?php echo $rowhead1['link']; ?>">
        </div>

    </div>
</div>

</div>

<div class="colleges">

<div class="form-content">

    <div class="form-image">
    <img src="<?php echo $rowsecretary['img']; ?>" alt="Business Icon" class="logo" id="previewsecretary">
        <label for="file-btn-secretary" class="upload-btn"><u>Upload Image</u></label>
        <input type="file" id="file-btn-secretary" class="input-field7" name="photosecretary" accept="image/*" onchange="loadFileSecretary(event)" hidden>
        <button type="submit" name="secretary-submit"> Save Image </button>
        <p style="text-align:center;">Note: Use 1800 pixels by 1050 pixels image size.</p>
    </div>

    <div class="form-input"> 

        <h3> Entry No. 3 </h3>

        <div class="form-input-div input-name">
            <p> TITLE: </p>
            <input type="text" name="secretaryname" id="name" value="<?php echo $rowsecretary['title']; ?>">
        </div>

        <div class="form-input-div"> 
            <p> DATE: </p>
            <input type="text" name="secretarypos" id="position" value="<?php echo $rowsecretary['date']; ?>">
        </div>

        <div class="form-input-div"> 
            <p> LINK: </p>
            <input type="text" name="secretaryemail" id="email" value="<?php echo $rowsecretary['link']; ?>">
        </div>
        </div>

    </div>
</div>

</div>

<div class="form-submit">
    <button type="submit" name="submit-all"> SAVE CHANGES </button>
</div>
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

<script src="Javascript/faculty-image.js" type="text/javascript"> </script>
<script src="Javascript/logout-admin.js"></script>
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
</body>
</html>