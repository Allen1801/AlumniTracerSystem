<?php 
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/admin/getId.php';
    include_once 'Includes/session-expire.php';
    
        if(!isset($_SESSION['id'])){
    header("location:index.php");
}

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
    <div class="header"> 
        <h1> <?php echo $A ?> Dashboard </h1> 

        <div class="header-date-class"> 
            <p id="header-date"> </p>
        </div>
    </div>

    <div class="welcome">
        <div> 
            <h2> Welcome, <?php echo $A ?>!</h2>
            <p> On this dashboard, you
                have the ability to add Alumni List, check the Logs, etc. </p>

            <p class="greet"> Have a nice day ahead of you!</p>
        </div>
        <img src="Images/dashboard/avatar1.png"> 
    </div>

    <div class="time-date"> 
        <p id="date"> </p>
        <p id="day"> </p>
        <p id="time"> </p>
    </div>

    <div class="colleges">
        <h2> Analytics </h2>
        <p class="colleges-active"> Active Alumni : <?php echo "$count"; ?> </p>

        <?php 
        if($username == 'admin'){ echo '
        <div class="colleges-div">
                <div class="container">
                    <a href="professional.php">
                        <img src="Images/professional.png" class="cont-logo"> 
                        <p class="cont-label">EMPLOYMENT RATE</p>
                    </a>
                </div>  

                <div class="container">
                    <a href="geographical.php">
                        <img src="Images/geographic.png" class="cont-logo"> 
                        <p class="cont-label">GEOGRAPHICAL DISTRIBUTION</p>
                    </a>
                </div>  

                <div class="container">
                    <a href="unemployment.php">
                        <img src="Images/unemployment.png" class="cont-logo"> 
                        <p class="cont-label">UNEMPLOYMENT PERIOD</p>
                    </a>
                </div>
                
                <div class="container">
                    <a href="education.php">
                        <img src="Images/education.png" class="cont-logo"> 
                        <p class="cont-label">EDUCATIONAL ATTAINMENT</p>
                    </a>
                </div>

                <div class="container">
                    <a href="sentiment.php">
                        <img src="Images/sentiment.png" class="cont-logo"> 
                        <p class="cont-label">SENTIMENT ANALYSIS</p>
                    </a>
                </div>
        </div>';
    }elseif ($username == 'cas_dean'){ echo '
        <div class="colleges-div">
            <div class="container">
                <a href="CAS-Analytics-professional.php">
                    <img src="Images/professional.png" class="cont-logo"> 
                    <p class="cont-label">EMPLOYMENT RATE</p>
                </a>
            </div>  

            <div class="container">
                <a href="CAS-Analytics-geographical.php">
                    <img src="Images/geographic.png" class="cont-logo"> 
                    <p class="cont-label">GEOGRAPHICAL DISTRIBUTION</p>
                </a>
            </div>  

            <div class="container">
                <a href="CAS-Analytics-unemployment.php">
                    <img src="Images/unemployment.png" class="cont-logo"> 
                    <p class="cont-label">UNEMPLOYMENT PERIOD</p>
                </a>
            </div>
        </div>';
    }elseif ($username == 'cba_dean'){ echo '
        <div class="colleges-div">
            <div class="container">
                <a href="CBA-Analytics-professional.php">
                    <img src="Images/professional.png" class="cont-logo"> 
                    <p class="cont-label">EMPLOYMENT RATE</p>
                </a>
            </div>  

            <div class="container">
                <a href="CBA-Analytics-geographical.php">
                    <img src="Images/geographic.png" class="cont-logo"> 
                    <p class="cont-label">GEOGRAPHICAL DISTRIBUTION</p>
                </a>
            </div>  

            <div class="container">
                <a href="CBA-Analytics-unemployment.php">
                    <img src="Images/unemployment.png" class="cont-logo"> 
                    <p class="cont-label">UNEMPLOYMENT PERIOD</p>
                </a>
            </div>
        </div>';
    }elseif ($username == 'ccs_dean'){ echo '
        <div class="colleges-div">
            <div class="container">
                <a href="CCS-Analytics-professional.php">
                    <img src="Images/professional.png" class="cont-logo"> 
                    <p class="cont-label">EMPLOYMENT RATE</p>
                </a>
            </div>  

            <div class="container">
                <a href="CCS-Analytics-geographical.php">
                    <img src="Images/geographic.png" class="cont-logo"> 
                    <p class="cont-label">GEOGRAPHICAL DISTRIBUTION</p>
                </a>
            </div>  

            <div class="container">
                <a href="CCS-Analytics-unemployment.php">
                    <img src="Images/unemployment.png" class="cont-logo"> 
                    <p class="cont-label">UNEMPLOYMENT PERIOD</p>
                </a>
            </div>
        </div>';
    }elseif ($username == 'coed_dean'){ echo '
        <div class="colleges-div">
            <div class="container">
                <a href="COED-Analytics-professional.php">
                    <img src="Images/professional.png" class="cont-logo"> 
                    <p class="cont-label">EMPLOYMENT RATE</p>
                </a>
            </div>  

            <div class="container">
                <a href="COED-Analytics-geographical.php">
                    <img src="Images/geographic.png" class="cont-logo"> 
                    <p class="cont-label">GEOGRAPHICAL DISTRIBUTION</p>
                </a>
            </div>  

            <div class="container">
                <a href="COED-Analytics-unemployment.php">
                    <img src="Images/unemployment.png" class="cont-logo"> 
                    <p class="cont-label">UNEMPLOYMENT PERIOD</p>
                </a>
            </div>
        </div>';
    }elseif ($username == 'coe_dean'){ echo '
        <div class="colleges-div">
            <div class="container">
                <a href="COE-Analytics-professional.php">
                    <img src="Images/professional.png" class="cont-logo"> 
                    <p class="cont-label">EMPLOYMENT RATE</p>
                </a>
            </div>  

            <div class="container">
                <a href="COE-Analytics-geographical.php">
                    <img src="Images/geographic.png" class="cont-logo"> 
                    <p class="cont-label">GEOGRAPHICAL DISTRIBUTION</p>
                </a>
            </div>  

            <div class="container">
                <a href="COE-Analytics-unemployment.php">
                    <img src="Images/unemployment.png" class="cont-logo"> 
                    <p class="cont-label">UNEMPLOYMENT PERIOD</p>
                </a>
            </div>
        </div>';
    }elseif ($username == 'cihm_dean'){ echo '
        <div class="colleges-div">
            <div class="container">
                <a href="CIHM-Analytics-professional.php">
                    <img src="Images/professional.png" class="cont-logo"> 
                    <p class="cont-label">EMPLOYMENT RATE</p>
                </a>
            </div>  

            <div class="container">
                <a href="CIHM-Analytics-geographical.php">
                    <img src="Images/geographic.png" class="cont-logo"> 
                    <p class="cont-label">GEOGRAPHICAL DISTRIBUTION</p>
                </a>
            </div>  

            <div class="container">
                <a href="CIHM-Analytics-unemployment.php">
                    <img src="Images/unemployment.png" class="cont-logo"> 
                    <p class="cont-label">UNEMPLOYMENT PERIOD</p>
                </a>
            </div>
        </div>';
    }elseif ($username == 'con_dean'){ echo '
        <div class="colleges-div">
            <div class="container">
                <a href="CON-Analytics-professional.php">
                    <img src="Images/professional.png" class="cont-logo"> 
                    <p class="cont-label">EMPLOYMENT RATE</p>
                </a>
            </div>  

            <div class="container">
                <a href="CON-Analytics-geographical.php">
                    <img src="Images/geographic.png" class="cont-logo"> 
                    <p class="cont-label">GEOGRAPHICAL DISTRIBUTION</p>
                </a>
            </div>  

            <div class="container">
                <a href="CON-Analytics-unemployment.php">
                    <img src="Images/unemployment.png" class="cont-logo"> 
                    <p class="cont-label">UNEMPLOYMENT PERIOD</p>
                </a>
            </div>
        </div>';
    } ?>
    </div>

    <div class="overview">
        <h2> Overview </h2>
        <p> This system will assist the university by keeping track 
            and updating alumni's current status and notifying them 
            about college activities. It will aid in the preservation 
            and proper maintenance of vital alumni data. The information 
            of the alumni is kept in an Alumni Tracer System together 
            with information on the organizations and field they work 
            for and the positions they employ. With the support of this
            system, the university may record critical and updated 
            information of its alumni and keep track of any
            modifications to an alumnus' profession, which could 
            be an important place to strengthen authenticity.
        </p>

        <p>
            Furthermore, this system offers resources for maintaining 
            contact with alumni. The university will be provided with 
            the broad range of system features that is vital to maintain
            a constant association with their alumni. Additionally, this 
            will guarantee that alumni establish a connection with each 
            other and foster the tremendous bonds of solidarity that
            integrate them.
        </p>
        
    </div>

    <!-- <div class="overlay" id="dialog-container">
            <div class="popup">
              <p class="message">Are you sure do you want to logout?</p>
              <div class="text-right">
                <button class="dialog-btn btn-cancel" id="cancel">CANCEL</button>
                <button type="submit" class="dialog-btn btn-primary" id="confirm">LOGOUT</button>
              </div>
            </div>
    </div> -->
</main>

<script src="Javascript/logout-admin.js" type="text/javascript"></script>
<script src="Javascript/sidebar-toggle.js" type="text/javascript"> </script>
<script src="Javascript/time-date.js" type="text/javascript"> </script>
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