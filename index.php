<?php
    include_once 'Includes/dbconnector.php';

$sqldean = mysqli_query($link, "SELECT * FROM newsevents where id=1");
$rowdean = mysqli_fetch_array($sqldean);

$sqlsecretary = mysqli_query($link, "SELECT * FROM newsevents where id=2");
$rowsecretary = mysqli_fetch_array($sqlsecretary);

$sqlhead1 = mysqli_query($link, "SELECT * FROM newsevents where id=3");
$rowhead1 = mysqli_fetch_array($sqlhead1);

?>

<!DOCTYPE html>
<html>
<title> PLPasig Alumni Tracer System </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/front-navbar.css"/> 
    <link rel="stylesheet" href="CSS/index.css"/> 
    <link rel="stylesheet" href="CSS/slider.css"/> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>

$(function(){
    
	$('.slide img:gt(0)').hide();
	setInterval(function(){$('.slide :first-child').fadeOut().next('img').fadeIn().end().appendTo('.slide');}, 3000);
});

</script>

</head>

<body>

    <header> 
        <div class="container"> 
            <div class="logo"> 
                <img src="Images/logo-bg.png" style="margin-right:10px;"> 
                <img src="Images/PLP-ALUM.png"> 
                <h3 class="logo-title"> Pamantasan ng Lungsod ng Pasig </h3>
            </div>

            <div class="hamburger"> 
                <div class="line"> </div>
                <div class="line"> </div>
                <div class="line"> </div>   
            </div>
            
            <nav class="nav-bar">
                <ul>
                    <li> <a href="index.php"> Home </a> </li>
                    <li> <a href="guest-table.php"> Alumni </a></li>
                    <li> <a href="login.php" id="loginButton"> Login </a></li>
                </ul>
            </nav>
        </div>
    </header>

        <div class="landing-div grid">
            <div class="welcome">
                <h1> PLPasig Alumni Tracer </h1>
                <p style="text-align: justify; font-size:18px;"> A website used to track and gather information about the Pamantasan ng Lungsod ng Pasig graduates. 
                    It serves as a valuable tool for maintaining connections with alumni.
                </p>
                <a href="login.php"> <button id="welcome-button-1"> Login </button>  </a> 
                <a href="#events"> <button id="welcome-button-2"> Events </button>  </a> 
            </div>
            <video src="Images/1125.mp4" alt="index-img-1" class="welcome-img" autoplay loop muted>
        </div>

        <div class="events" id="events">
            <div class="grid">

                <h2> News and Events </h2>

                <div class="slider">
                <div class="slide">
                    <?php 
                    // display images from directory
                    // directory path
                    $dir = "./sliders/";
                    
                    $scan_dir = scandir($dir);
                    foreach($scan_dir as $img):
                        if(in_array($img,array('.','..')))
                        continue;
                    ?>
                    <img src="<?php echo $dir.$img ?>" alt="<?php echo $img ?>">
                    <?php endforeach; ?>
                </div> 
                </div>

                <div class="cards"> 
                    <div class="events-card">
                        <img src="<?php echo $rowdean['img']; ?>">
                        <h4><?php echo $rowdean['title']; ?></h4>
                        <p> <?php echo $rowdean['date']; ?></p>
                        <a href="<?php echo $rowdean['link']; ?>"><button> Read More</button></a>
                    </div>

                    <div class="events-card">
                        <img src="<?php echo $rowhead1['img']; ?>">
                        <h4> <?php echo $rowhead1['title']; ?> </h4>
                        <p> <?php echo $rowhead1['date']; ?></p>
                        <a href="<?php echo $rowhead1['link']; ?>"><button> Read More</button></a>
                    </div>

                    <div class="events-card">
                        <img src="<?php echo $rowsecretary['img']; ?>">
                        <h4> <?php echo $rowsecretary['title']; ?> </h4>
                        <p> <?php echo $rowsecretary['date']; ?></p>
                        <a href="<?php echo $rowsecretary['link']; ?>"><button> Read More</button></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="msvs">
            <div class="grid">

                <div class="mission-text msvs-text">
                    <h2> Alumni Relations Office </h2>
                    <p> The office is responsible for strengthening the linkages and relations between the University and the alumni. 
                        It is tasked to prepare and update the alumni directory.</p>

                    <p> This is coordinated by the PLP-Alumni Regent assisted by the PLP alumni officers in coordination with the College Head.</p>
                </div>
            </div>
        </div>

    <div id="footer">
        <footer>
            <div class="grid">
                <img src="Images/logo-bg.png"> 

                <div>
                    <h4> Pamantasan ng Lungsod ng Pasig </h4>
                    <p> Alkalde Jose St., Kapasigan, Pasig City, Philippines 1600 </p>
                    <p> Tel. Nos.: 628 - 1013 / 628 - 1014 loc 110 / 642 - 8300 loc 110 </p>
                    <a href="privacy-policy-index.php"> <p><u> Terms and Conditions | Privacy Policy </u></p> </a>
                    <p> Copyright © 2022. All Rights Reserved </p>
                </div>
            </div>
        </footer>
    </div>
    
    <script type="text/javascript" src="Javascript/responsive-navbar.js"> </script>
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

if(window.console && window.console.firebug){
    alert("Sorry, you are not allowed here");
}
</script>

</body>
</html>