<?php 
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/admin/getId.php';
    include_once 'Includes/session-expire.php';
    
    $sqlft1 = mysqli_query($link, "SELECT * FROM plpooffice where id=1");
    $rowft1 = mysqli_fetch_array($sqlft1);

    $sqlft2 = mysqli_query($link, "SELECT * FROM plpooffice where id=2");
    $rowft2 = mysqli_fetch_array($sqlft2);

    $sqlft3 = mysqli_query($link, "SELECT * FROM plpooffice where id=3");
    $rowft3 = mysqli_fetch_array($sqlft3);

    $sqlft4 = mysqli_query($link, "SELECT * FROM plpooffice where id=4");
    $rowft4 = mysqli_fetch_array($sqlft4);
?>

<!DOCTYPE html>
<html>
<title> Admin | PLP Offices | PLPATS </title>

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

<form action="PLPO-update.php" method="POST" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $id; ?>" name="hidden_id" id="hidden_id">

    <div class="colleges">

        <div class="colleges-header">
            <img src="Images/logo-bg.png" class="cont-logo"> 
            <h2> Pamantasan ng Lungsod ng Pasig Offices </h2>
        </div>

        <div class="form-content">

            <div class="form-image">
            <img src="<?php echo $rowft1['img']; ?>" alt="Business Icon" class="logo" id="previewft1">
                <label for="file-btn-ft1" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft1" class="input-field7" name="photoft1" accept="image/*" onchange="loadFileFT1(event)" hidden>
                <button type="submit" name="ft1-submit"> Save Image </button>
            </div>

            <div class="form-input"> 

                <h3> ADMIN OFFICE </h3>

                <div class="form-input-div input-name">
                    <p> TELEPHONE NUMBER: </p>
                    <input type="text" id="name" name="admin" value="<?php echo $rowft1['phone']; ?>">
                </div>

            </div>
        </div>

    </div>

    <div class="colleges">

        <div class="form-content">

            <div class="form-image">
            <img src="<?php echo $rowft2['img']; ?>" alt="Business Icon" class="logo" id="previewft2">
                <label for="file-btn-ft2" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft2" class="input-field7" name="photoft2" accept="image/*" onchange="loadFileFT2(event)" hidden>
                <button type="submit" name="ft2-submit"> Save Image </button>
            </div>

            <div class="form-input"> 

                <h3> MIS OFFICE </h3>

                <div class="form-input-div input-name">
                    <p> TELEPHONE NUMBER: </p>
                    <input type="text" id="name" name="mis" value="<?php echo $rowft2['phone']; ?>">
                </div>
            </div>
        </div>

    </div>

    <div class="colleges">

        <div class="form-content">

            <div class="form-image">
            <img src="<?php echo $rowft3['img']; ?>" alt="Business Icon" class="logo" id="previewft3">
                <label for="file-btn-ft3" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft3" class="input-field7" name="photoft3" accept="image/*" onchange="loadFileFT3(event)" hidden>
                <button type="submit" name="ft3-submit"> Save Image </button>
            </div>

            <div class="form-input"> 

                <h3> REGISTRAR'S OFFICE </h3>

                <div class="form-input-div input-name">
                    <p> TELEPHONE NUMBER: </p>
                    <input type="text" id="name" name="registrar" value="<?php echo $rowft3['phone']; ?>">
                </div>
            </div>
        </div>

    </div>

    <div class="colleges">

        <div class="form-content">

            <div class="form-image">
            <img src="<?php echo $rowft4['img']; ?>" alt="Business Icon" class="logo" id="previewft4">
                <label for="file-btn-ft4" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft4" class="input-field7" name="photoft4" accept="image/*" onchange="loadFileFT4(event)" hidden>
                <button type="submit" name="ft4-submit"> Save Image </button>
            </div>

            <div class="form-input"> 

                <h3> STUDENT AFFAIRS SERVICES OFFICE </h3>

                <div class="form-input-div input-name">
                    <p> TELEPHONE NUMBER: </p>
                    <input type="text" id="name" name="sas" value="<?php echo $rowft4['phone']; ?>">
                </div>
            </div>
        </div>
    </div>
        <div class="form-submit">
            <button type="submit" name="submit-all"> SAVE CHANGES </button>
        </div>
    </div>
</form>

<script src="Javascript/faculty-image.js" type="text/javascript"> </script>
<script src="Javascript/logout-admin.js"></script>
<script src="Javascript/sidebar-toggle.js" type="text/javascript"> </script>
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