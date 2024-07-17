<?php 
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/select-user-id.php';
    include_once 'Includes/session-expire.php';
    

    $total = "SELECT * FROM aluminfo WHERE status='Active'";
    $overview = "SELECT * FROM dashboard order by id desc LIMIT 1";
    if ($totalcount = mysqli_query($link, $total)){
        $result = mysqli_query($link, $overview);
        $row = mysqli_fetch_assoc($result);
        $header = $row['header'];
        $message = $row['message'];
        $subhead = $row['subhead'];
        $photo = $row['img'];
        $count = mysqli_num_rows($totalcount);
    }


?>

<!DOCTYPE html>
<html>
<title> Alumni | Dashboard | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/overview-style.css"/> 
    <link rel="stylesheet" href="CSS/slider.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-user.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>

$(function(){
    
	$('.slide img:gt(0)').hide();
	setInterval(function(){$('.slide :first-child').fadeOut().next('img').fadeIn().end().appendTo('.slide');}, 3000);
});

</script>
</head>

<body>

<div id="sidebar-div"> <?php include("user-sidebar.php"); ?> </div>


<main>
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

    <div class="welcome">
        <div class="welcome-content">
            <div> 
                <h2> Welcome, Alumni!</h2>
                <p> On this dashboard, you
                    have the ability to check the News, Update your Records, etc. </p>

                <p class="greet"> Have a nice day ahead of you!</p>
            </div>
            <img src="Images/dashboard/avatar1.png">
        </div>

        <div class="active-count"> 
            <p id="date"> <?php echo "$count"; ?> </p>
            <p id="day"> Active Alumni </p>
        </div>
    </div>

    <div class="gift">
        <h2> <?php echo $header ?> </h2>
        <div class="gift-content">
            <div>
                <h3> <?php echo $subhead ?> </h3>
                <pre> <?php echo $message  ?></pre>
            </div>
            <?php
            echo "<img src='$photo'>"; 
            ?>
        </div>

        <h3 class="donate-title"> Donate Now </h3>   
        <div class="donation">

           
            <div>
                <img src="Images/donation-logo/bdo.png" class="donate-logo">
                <p> <b>Account Name<br></b> PL-Pasig <br> <b>Account No. <br> </b> 002110313477 </p>
            </div>

            <div>
                <img src="Images/donation-logo/psbank.png" class="donate-logo">
                <p> <b>Account Name<br></b> PL-Pasig <br> <b>Account No. <br> </b> 332219976598 </p>
            </div>

            <div>
                <img src="Images/donation-logo/gcash.png" class="donate-logo">
                <p> <b>Account Name<br></b> PL-Pasig <br> <b>Account No.<br></b> 09752841883 </p>
            </div>

            <div>
                <img src="Images/donation-logo/paymaya.png" class="donate-logo">
                <p> <b>Account Name<br></b> PL-Pasig <br> <b>Account No.<br></b> 09425699066 </p>
            </div>
        </div>

    </div>

    
    <div class="about">
        <h2> About This Portal </h2>
        <p> This system will assist the university by keeping track and updating alumni's current status and notifying them about college activities. 
        It will aid in the preservation and proper maintenance of vital alumni data. The information of the alumni is kept in an Alumni Tracer System together with 
        information on the organizations and field they work for and the positions they employ. With the support of this system, the university may record critical 
        and updated information of its alumni and keep track of any modifications to an alumnus' profession, which could be an important place to strengthen authenticity. <br><br> 
    
        Furthermore, this system offers resources for maintaining contact with alumni. The university will be provided with the broad range of system features that is 
        vital to maintain a constant association with their alumni. Additionally, this will guarantee that alumni establish a connection with each other and foster the 
        tremendous bonds of solidarity that integrate them. <br><br>
        </p>

        <p> -PLP Alumni Associations </p>
    </div>

</main>

<script src="Javascript/user-logout.js"></script>
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