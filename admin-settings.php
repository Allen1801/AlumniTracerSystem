<?php 

include_once 'Includes/dbconnector.php';
include_once 'Includes/admin/getId.php';
include_once 'Includes/session-expire.php';

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
    <?php if($username == "admin"){ echo '
    <div class="header"> 
        <h1> Control Management </h1> 
    </div>

    <div class="colleges-contacts">

        <h2> College Contacts </h2>

        <div class="colleges-div">
            <div class="container">
                <a href="CAS-Faculty-Settings.php">
                    <img src="Images/cas.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF ARTS AND SCIENCES</p>
                </a>
            </div>  

            <div class="container">
                <a href="CBA-Faculty-Settings.php">
                    <img src="Images/cba.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF BUSINESS AND ACCOUNTANCY</p>
                </a>
            </div>  

            <div class="container">
                <a href="CCS-Faculty-Settings.php">
                    <img src="Images/ccs.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF COMPUTER STUDIES</p>
                </a>
            </div>

            <div class="container">
                <a href="COED-Faculty-Settings.php">
                    <img src="Images/coed.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF EDUCATION</p>
                </a>
            </div>

            <div class="container">
                <a href="COE-Faculty-Settings.php">
                    <img src="Images/coe.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF ENGINEERING</p>
                </a>
            </div>

            <div class="container">
                <a href="CIHM-Faculty-Settings.php">
                    <img src="Images/cihm.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF INTERNATIONAL HOSPITALITY MANAGEMENT</p>
                </a>
            </div>

            <div class="container">
                <a href="CON-Faculty-Settings.php">
                    <img src="Images/cons.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF NURSING</p>
                </a>
            </div>
        </div>

    </div>

    <div class="colleges-contacts">

        <h2> Contacts </h2>

        <div class="colleges-div">
            <div class="container">
                <a href="PLPAA-Settings.php">
                    <img src="Images/PLP-ALUM.png" class="cont-logo"> 
                    <p class="cont-label">PAMANTASAN NG LUNGSOD NG PASIG ALUMNI AFFAIRS</p>
                </a>
            </div>  

            <div class="container">
                <a href="PLPO-Settings.php">
                    <img src="Images/logo-bg.png"class="cont-logo"> 
                    <p class="cont-label">PAMANTASAN NG LUNGSOD NG PASIG OFFICES</p>
                </a>
            </div>  
        </div>

    </div>

        <div class="colleges-contacts">

        <h2> Announcements </h2>

        <div class="colleges-div">
            <div class="container">
                <a href="news-event.php">
                    <img src="Images/news-events.png" class="cont-logo"> 
                    <p class="cont-label">NEWS AND EVENTS</p>
                </a>
            </div>  

            <div class="container">
                <a href="slider.php">
                    <img src="Images/slider.png"class="cont-logo"> 
                    <p class="cont-label">SLIDER</p>
                </a>
            </div>  

            <div class="container">
                <a href="dashboard.php">
                    <img src="Images/dashboard.png"class="cont-logo"> 
                    <p class="cont-label">DASHBOARD</p>
                </a>
            </div> 
        </div>
    </div>

    <div class="colleges-contacts">

        <h2> Change Password Settings </h2>
        
        <div class="colleges-div">';
        if($username == "cas_dean"){ echo '
            <div class="container">
                <a href="CAS-Faculty-Settings.php">
                    <img src="Images/cas.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF ARTS AND SCIENCES</p>
                </a>
            </div>  
        ';}elseif($username == "cba_dean"){ echo '
            <div class="container">
                <a href="CBA-Faculty-Settings.php">
                    <img src="Images/cba.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF BUSINESS AND ACCOUNTANCY</p>
                </a>
            </div>  
            ';}elseif($username == "ccs_dean"){ echo '
            <div class="container">
                <a href="CCS-Faculty-Settings.php">
                    <img src="Images/ccs.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF COMPUTER STUDIES</p>
                </a>
            </div>
            ';}elseif($username == "coed_ean"){ echo '
            <div class="container">
                <a href="COED-Faculty-Settings.php">
                    <img src="Images/coed.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF EDUCATION</p>
                </a>
            </div>
            ';}elseif($username == "coe_dean"){ echo '
            <div class="container">
                <a href="COE-Faculty-Settings.php">
                    <img src="Images/coe.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF ENGINEERING</p>
                </a>
            </div>
            ';}elseif($username == "cihm_dean"){ echo '
            <div class="container">
                <a href="CIHM-Faculty-Settings.php">
                    <img src="Images/cihm.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF INTERNATIONAL HOSPITALITY MANAGEMENT</p>
                </a>
            </div>
            ';}elseif($username == "con_dean"){ echo '
            <div class="container">
                <a href="CON-Faculty-Settings.php">
                    <img src="Images/cons.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF NURSING</p>
                </a>
            </div>
            ';}elseif($username == "admin"){ echo '
            <div class="container">
                <a href="admin-pass.php">
                    <img src="Images/PLP-ALUM.png" class="cont-logo"> 
                    <p class="cont-label">ADMIN</p>
                </a>
            </div>
            ';}
       echo ' </div>
    </div>
            ';}else{ echo '

                <div class="colleges-contacts">

        <h2> Change Password Settings </h2>
        
        <div class="colleges-div">';
        if($username == "cas_dean"){ echo '
            <div class="container">
                <a href="admin-pass.php">
                    <img src="Images/cas.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF ARTS AND SCIENCES</p>
                </a>
            </div>  
        ';}elseif($username == "cba_dean"){ echo '
            <div class="container">
                <a href="admin-pass.php">
                    <img src="Images/cba.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF BUSINESS AND ACCOUNTANCY</p>
                </a>
            </div>  
            ';}elseif($username == "ccs_dean"){ echo '
            <div class="container">
                <a href="admin-pass.php">
                    <img src="Images/ccs.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF COMPUTER STUDIES</p>
                </a>
            </div>
            ';}elseif($username == "coed_ean"){ echo '
            <div class="container">
                <a href="admin-pass.php">
                    <img src="Images/coed.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF EDUCATION</p>
                </a>
            </div>
            ';}elseif($username == "coe_dean"){ echo '
            <div class="container">
                <a href="admin-pass.php">
                    <img src="Images/coe.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF ENGINEERING</p>
                </a>
            </div>
            ';}elseif($username == "cihm_dean"){ echo '
            <div class="container">
                <a href="admin-pass.php">
                    <img src="Images/cihm.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF INTERNATIONAL HOSPITALITY MANAGEMENT</p>
                </a>
            </div>
            ';}elseif($username == "con_dean"){ echo '
            <div class="container">
                <a href="admin-pass.php">
                    <img src="Images/cons.png" class="cont-logo"> 
                    <p class="cont-label">COLLEGE OF NURSING</p>
                </a>
            </div>
            ';}elseif($username == "admin"){ echo '
            <div class="container">
                <a href="admin-pass.php?id=$id">
                    <img src="Images/PLP-ALUM.png" class="cont-logo"> 
                    <p class="cont-label">ADMIN</p>
                </a>
            </div>
            ';}
       echo ' </div>
    </div>
            ';}?>
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