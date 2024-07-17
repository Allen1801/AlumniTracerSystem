<?php 
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/admin/getId.php';
    include_once 'Includes/session-expire.php';

    $total = "SELECT * FROM aluminfo WHERE status='Active'";
    if ($totalcount = mysqli_query($link, $total)){
        $count = mysqli_num_rows($totalcount);
    }
?>

<!DOCTYPE html>
<html>
<title> Admin | Dashboard | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-style.css"/> 
    <link rel="stylesheet" href="CSS/admin-dashboard.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div id="sidebar-div"> <?php include("admin-sidebar.php"); ?> </div>

<main>
        
    <div class="colleges">
        <h2> Colleges </h2>
        <p class="colleges-active"> Active Alumni : <?php echo "$count"; ?> </p>

        <div class="colleges-div">
            <?php if($id == "2"){ echo '
                <div class="container">
                    <a href="CAS-Analytics-professional.php">
                        <img src="Images/cas.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF ARTS AND SCIENCES</p>
                    </a>
                </div> 
                ';}elseif($id == "3"){ echo '
                <div class="container">
                    <a href="CBA-Analytics-professional.php">
                        <img src="Images/cba.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF BUSINESS AND ACCOUNTANCY</p>
                    </a>
                </div>
                ';}elseif($id == "4"){ echo '
                <div class="container">
                    <a href="CCS-Analytics-professional.php">
                        <img src="Images/ccs.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF COMPUTER STUDIES</p>
                    </a>
                </div>
                ';}elseif($id == "5"){ echo '
                <div class="container">
                    <a href="COED-Analytics-professional.php">
                        <img src="Images/coed.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF EDUCATION</p>
                    </a>
                </div>
                ';}elseif($id == "6"){ echo '
                <div class="container">
                    <a href="COE-Analytics-professional.php">
                        <img src="Images/coe.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF ENGINEERING</p>
                    </a>
                </div>
                ';}elseif($id == "7"){ echo '
                <div class="container">
                    <a href="CIHM-Analytics-professional.php">
                        <img src="Images/cihm.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF INTERNATIONAL HOSPITALITY MANAGEMENT</p>
                    </a>
                </div>
                ';}elseif($id == "8"){ echo '
                <div class="container">
                    <a href="CON-Analytics-professional.php">
                        <img src="Images/cons.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF NURSING</p>
                    </a>
                </div>
                ';}else{ echo '
                    <div class="container">
                    <a href="CAS-Analytics-professional.php">
                        <img src="Images/cas.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF ARTS AND SCIENCES</p>
                    </a>
                </div> 
                
                <div class="container">
                    <a href="CBA-Analytics-professional.php">
                        <img src="Images/cba.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF BUSINESS AND ACCOUNTANCY</p>
                    </a>
                </div>
                
                <div class="container">
                    <a href="CCS-Analytics-professional.php">
                        <img src="Images/ccs.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF COMPUTER STUDIES</p>
                    </a>
                </div>
                
                <div class="container">
                    <a href="COED-Analytics-professional.php">
                        <img src="Images/coed.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF EDUCATION</p>
                    </a>
                </div>
                
                <div class="container">
                    <a href="COE-Analytics-professional.php">
                        <img src="Images/coe.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF ENGINEERING</p>
                    </a>
                </div>
                
                <div class="container">
                    <a href="CIHM-Analytics-professional.php">
                        <img src="Images/cihm.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF INTERNATIONAL HOSPITALITY MANAGEMENT</p>
                    </a>
                </div>
                
                <div class="container">
                    <a href="CON-Analytics-professional.php">
                        <img src="Images/cons.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF NURSING</p>
                    </a>
                </div>
                ';}
                ?>
        </div>
    </div>
</main>

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