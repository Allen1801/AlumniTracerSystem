<?php 
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/admin/getId.php';
    include_once 'Includes/session-expire.php';

    $sqldean = mysqli_query($link, "SELECT * FROM coefaculty where id=1");
    $rowdean = mysqli_fetch_array($sqldean);

    $sqlsecretary = mysqli_query($link, "SELECT * FROM coefaculty where id=2");
    $rowsecretary = mysqli_fetch_array($sqlsecretary);

    $sqlhead1 = mysqli_query($link, "SELECT * FROM coefaculty where id=3");
    $rowhead1 = mysqli_fetch_array($sqlhead1);


    $sqlft1 = mysqli_query($link, "SELECT * FROM coefaculty where id=4");
    $rowft1 = mysqli_fetch_array($sqlft1);

    $sqlft2 = mysqli_query($link, "SELECT * FROM coefaculty where id=5");
    $rowft2 = mysqli_fetch_array($sqlft2);

    $sqlft3 = mysqli_query($link, "SELECT * FROM coefaculty where id=6");
    $rowft3 = mysqli_fetch_array($sqlft3);

    $sqlft4 = mysqli_query($link, "SELECT * FROM coefaculty where id=7");
    $rowft4 = mysqli_fetch_array($sqlft4);

    $sqlft5 = mysqli_query($link, "SELECT * FROM coefaculty where id=8");
    $rowft5 = mysqli_fetch_array($sqlft5);

    $sqlft6 = mysqli_query($link, "SELECT * FROM coefaculty where id=9");
    $rowft6 = mysqli_fetch_array($sqlft6);

    $sqlft7 = mysqli_query($link, "SELECT * FROM coefaculty where id=10");
    $rowft7 = mysqli_fetch_array($sqlft7);

    $sqlft8 = mysqli_query($link, "SELECT * FROM coefaculty where id=11");
    $rowft8 = mysqli_fetch_array($sqlft8);

    $sqlft9 = mysqli_query($link, "SELECT * FROM coefaculty where id=12");
    $rowft9 = mysqli_fetch_array($sqlft9);
?>

<!DOCTYPE html>
<html>
<title> Admin | COE-Faculty | PLPATS </title>

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

<form action="COE-faculty-update.php" method="POST" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $id; ?>" name="hidden_id" id="hidden_id">
    <div class="colleges">

        <div class="colleges-header">
            <img src="Images/coe.png" class="cont-logo"> 
            <h2> College of Engineering </h2>
        </div>

        <div class="form-content">
            <div class="form-image">
            <img src="<?php echo $rowdean['img']; ?>" alt="Business Icon" class="logo" id="previewdean">
                <label for="file-btn-dean" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-dean" class="input-field7" name="photodean" accept="image/*" onchange="loadFileDean(event)" hidden>
                <button type="submit" name="dean-submit"> Save Image </button>
            </div>

            <div class="form-input"> 

                <h3> COLLEGE DEAN </h3>

                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="deanname" id="name" value="<?php echo $rowdean['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="deanpos" id="position" value="<?php echo $rowdean['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="deanemail" id="email" value="<?php echo $rowdean['email']; ?>">
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
            </div>
    
            <div class="form-input"> 

                <h3> COLLEGE SECRETARY </h3>

                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="secretaryname" id="name" value="<?php echo $rowsecretary['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="secretarypos" id="position" value="<?php echo $rowsecretary['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="secretaryemail" id="email" value="<?php echo $rowsecretary['email']; ?>">
                </div>
            </div>
        </div>
        

        <div class="form-content">

            <div class="form-image">
            <img src="<?php echo $rowhead1['img']; ?>" alt="Business Icon" class="logo" id="previewhead1">
                <label for="file-btn-head1" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-head1" class="input-field7" name="photohead1" accept="image/*" onchange="loadFileHead1(event)" hidden>
                <button type="submit" name="head1-submit"> Save Image </button>
            </div>

            <div class="form-input"> 

                <h3> DEPARTMENT HEAD </h3>

                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="head1name" id="name" value="<?php echo $rowhead1['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="head1pos" id="position" value="<?php echo $rowhead1['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="head1email" id="email" value="<?php echo $rowhead1['email']; ?>">
                </div>
            </div>
        </div>
    </div>


    <div class="colleges">

        <div class="colleges-header">
            <h2> FULL TIME FACULTY </h2>
        </div>

        <div class="form-content">
            <div class="form-image">
                <img src="<?php echo $rowft1['img']; ?>" alt="Business Icon" class="logo" id="previewft1">
                <label for="file-btn-ft1" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft1" class="input-field7" name="photoft1" accept="image/*" onchange="loadFileFT1(event)" hidden>
                <button type="submit" name="ft1-submit"> Save Image </button>
            </div>

            <div class="form-input"> 
                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="ft1name" id="name" value="<?php echo $rowft1['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="ft1pos" id="position" value="<?php echo $rowft1['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="ft1email" id="email" value="<?php echo $rowft1['email']; ?>">
                </div>
            </div>
        </div>

        <div class="form-content">

        <div class="form-image">
                <img src="<?php echo $rowft2['img']; ?>" alt="Business Icon" class="logo" id="previewft2">
                <label for="file-btn-ft2" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft2" class="input-field7" name="photoft2" accept="image/*" onchange="loadFileFT2(event)" hidden>
                <button type="submit" name="ft2-submit"> Save Image </button>
            </div>

            <div class="form-input"> 
                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="ft2name" id="name" value="<?php echo $rowft2['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="ft2pos" id="position" value="<?php echo $rowft2['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="ft2email" id="email" value="<?php echo $rowft2['email']; ?>">
                </div>
            </div>
        </div>

        <div class="form-content">

        <div class="form-image">
                <img src="<?php echo $rowft3['img']; ?>" alt="Business Icon" class="logo" id="previewft3">
                <label for="file-btn-ft3" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft3" class="input-field7" name="photoft3" accept="image/*" onchange="loadFileFT3(event)" hidden>
                <button type="submit" name="ft3-submit"> Save Image </button>
            </div>

            <div class="form-input"> 
                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="ft3name" id="name" value="<?php echo $rowft3['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="ft3pos" id="position" value="<?php echo $rowft3['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="ft3email" id="email" value="<?php echo $rowft3['email']; ?>">
                </div>
            </div>
        </div>

        <div class="form-content">

        <div class="form-image">
                <img src="<?php echo $rowft4['img']; ?>" alt="Business Icon" class="logo" id="previewft4">
                <label for="file-btn-ft4" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft4" class="input-field7" name="photoft4" accept="image/*" onchange="loadFileFT4(event)" hidden>
                <button type="submit" name="ft4-submit"> Save Image </button>
            </div>

            <div class="form-input"> 
                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="ft4name" id="name" value="<?php echo $rowft4['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="ft4pos" id="position" value="<?php echo $rowft4['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="ft4email" id="email" value="<?php echo $rowft4['email']; ?>">
                </div>
            </div>
        </div>

        <div class="form-content">

        <div class="form-image">
                <img src="<?php echo $rowft5['img']; ?>" alt="Business Icon" class="logo" id="previewft5">
                <label for="file-btn-ft5" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft5" class="input-field7" name="photoft5" accept="image/*" onchange="loadFileFT5(event)" hidden>
                <button type="submit" name="ft5-submit"> Save Image </button>
            </div>

            <div class="form-input"> 
                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="ft5name" id="name" value="<?php echo $rowft5['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="ft5pos" id="position" value="<?php echo $rowft5['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="ft5email" id="email" value="<?php echo $rowft5['email']; ?>">
                </div>
            </div>
        </div>

        <div class="form-content">

        <div class="form-image">
                <img src="<?php echo $rowft6['img']; ?>" alt="Business Icon" class="logo" id="previewft6">
                <label for="file-btn-ft6" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft6" class="input-field7" name="photoft6" accept="image/*" onchange="loadFileFT6(event)" hidden>
                <button type="submit" name="ft6-submit"> Save Image </button>
            </div>

            <div class="form-input"> 
                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="ft6name" id="name" value="<?php echo $rowft6['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="ft6pos" id="position" value="<?php echo $rowft6['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="ft6email" id="email" value="<?php echo $rowft6['email']; ?>">
                </div>
            </div>
        </div>

 <div class="form-content">

        <div class="form-image">
                <img src="<?php echo $rowft7['img']; ?>" alt="Business Icon" class="logo" id="previewft7">
                <label for="file-btn-ft7" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft7" class="input-field7" name="photoft7" accept="image/*" onchange="loadFileFT7(event)" hidden>
                <button type="submit" name="ft7-submit"> Save Image </button>
            </div>

            <div class="form-input"> 
                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="ft7name" id="name" value="<?php echo $rowft7['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="ft7pos" id="position" value="<?php echo $rowft7['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="ft7email" id="email" value="<?php echo $rowft7['email']; ?>">
                </div>
            </div>
        </div>

        <div class="form-content">

        <div class="form-image">
                <img src="<?php echo $rowft8['img']; ?>" alt="Business Icon" class="logo" id="previewft8">
                <label for="file-btn-ft8" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft8" class="input-field7" name="photoft8" accept="image/*" onchange="loadFileFT8(event)" hidden>
                <button type="submit" name="ft8-submit"> Save Image </button>
            </div>

            <div class="form-input"> 
                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="ft8name" id="name" value="<?php echo $rowft8['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="ft8pos" id="position" value="<?php echo $rowft8['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="ft8email" id="email" value="<?php echo $rowft8['email']; ?>">
                </div>
            </div>
        </div>

        <div class="form-content">

        <div class="form-image">
                <img src="<?php echo $rowft9['img']; ?>" alt="Business Icon" class="logo" id="previewft9">
                <label for="file-btn-ft9" class="upload-btn"><u>Upload Image</u></label>
                <input type="file" id="file-btn-ft9" class="input-field7" name="photoft9" accept="image/*" onchange="loadFileFT9(event)" hidden>
                <button type="submit" name="ft9-submit"> Save Image </button>
            </div>

            <div class="form-input"> 
                <div class="form-input-div input-name">
                    <p> NAME: </p>
                    <input type="text" name="ft9name" id="name" value="<?php echo $rowft9['name']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> POSITION: </p>
                    <input type="text" name="ft9pos" id="position" value="<?php echo $rowft9['pos']; ?>">
                </div>

                <div class="form-input-div"> 
                    <p> EMAIL ADDRESS: </p>
                    <input type="text" name="ft9email" id="email" value="<?php echo $rowft9['email']; ?>">
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
