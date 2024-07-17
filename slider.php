<?php 

include_once 'Includes/dbconnector.php';
include_once 'Includes/admin/getId.php';

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
    
    <div class="slider-announcement">
        <h2> Slider Announcement Content </h2>

        <hr>
        <form action="admin-slider-update.php" method="POST" enctype="multipart/form-data">
        <input type="file" id="file-btn" class="input-field7" name="photo" accept="image/*" onchange="previewImage(event)" required hidden>

        <div class="preview-space">
            <img class="logo" id="preview">
        </div>
        
        <div class="slider-buttons">
            <label for="file-btn" class="upload-btn">CHOOSE FILE</label>
            <button type="submit" name="submit-slider" id="submit-slider"> SAVE CHANGES </button>
        </div>
        
        <p style="text-align:center; font-weight:bold;">Note: Use 1920 pixels by 800 pixels image size.</p>
        
        <table class="table-box">
            <thead>
                <tr>                   
                    <th width="20%">SLIDE #</th>
                    <th width="60%">IMAGE</th>
                    <th width="20%">ACTION</th>
                </tr>
            </thead>

            <?php
            $result = mysqli_query($link, "select * from announcement where status ='active' order by id asc");
            while($row = mysqli_fetch_assoc($result)) {
            echo '<tbody>
                <tr> ';
                        $imgid = $row['id'];
                        $photo_path = $row['image'];
                    echo '<td data-label="SLIDE #">' .$imgid. '</td>';
                    echo "<td data-label='IMAGE' ><img src='$photo_path' alt='Photo'></td>";   
                    echo "<td data-label='ACTION'> <a href='archive-slider.php?id=$imgid'> <button type='button' name='archive' class='table-button'> <i class='fa-solid fa-box-archive'></i> ARCHIVE </button></td>
                </tr>";
            }
            echo'
            </tbody>';
            ?>

        </table>
        </form>
    </div>
</main>

<script src="Javascript/admin-logout.js"></script>
<script src="Javascript/sidebar-toggle.js" type="text/javascript"> </script>
<script src="Javascript/time-date.js" type="text/javascript"> </script>
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