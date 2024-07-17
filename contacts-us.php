<?php
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/select-user-id.php';
    include_once 'Includes/session-expire.php';

    $sqldean = mysqli_query($link, "SELECT * FROM plpaafaculty where id=1");
    $rowdean = mysqli_fetch_array($sqldean);

    $sqlsecretary = mysqli_query($link, "SELECT * FROM plpaafaculty where id=2");
    $rowsecretary = mysqli_fetch_array($sqlsecretary);

    $sqlhead1 = mysqli_query($link, "SELECT * FROM plpaafaculty where id=3");
    $rowhead1 = mysqli_fetch_array($sqlhead1);

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
<title> Alumni | Contact Us | PLPATS </title>
<head>
<meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/contacts-us.css"/> 
    <link rel="stylesheet" href="CSS/index-slider.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-user.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div id="sidebar-div"> <?php include("user-sidebar.php"); ?> </div>

<main> 
    <h1> Contact Us </h1>

    <div class="affairs containers">
      <h2 class="affairs-title">PLP Alumni Affairs  </h2>
      <p class="affairs-subtitle">A.Y. 2022-2023  </p>

      <div class="officers"> 
        <div class="officers-card">
          <img src="<?php echo $rowdean['img']; ?>" class="officers-image">
          <p class="officers-name"> <?php echo $rowdean['name']; ?> </p>
          <p class="officers-position">Alumni President </p>
        </div>

        <div class="officers-card">
          <img src="<?php echo $rowhead1['img']; ?>" class="officers-image">
          <p class="officers-name"> <?php echo $rowhead1['name']; ?> </p>
          <p class="officers-position">Alumni Vice President </p>
        </div>

        <div class="officers-card">
          <img src="<?php echo $rowsecretary['img']; ?>" class="officers-image">
          <p class="officers-name"> <?php echo $rowsecretary['name']; ?> </p>
          <p class="officers-position">Alumni Secretary General </p>
        </div>
      </div>

    </div>

    <div class="colleges">
        <h2> Colleges </h2>

        <div class="colleges-div">
                <div class="container">
                    <a href="CAS-Faculty.php">
                        <img src="Images/cas.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF ARTS AND SCIENCES</p>
                    </a>
                </div>  

                <div class="container">
                    <a href="CBA-Faculty.php">
                        <img src="Images/cba.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF BUSINESS AND ACCOUNTANCY</p>
                    </a>
                </div>  

                <div class="container">
                    <a href="CCS-Faculty.php">
                        <img src="Images/ccs.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF COMPUTER STUDIES</p>
                    </a>
                </div>

                <div class="container">
                    <a href="COED-Faculty.php">
                        <img src="Images/coed.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF EDUCATION</p>
                    </a>
                </div>

                <div class="container">
                    <a href="COE-Faculty.php">
                        <img src="Images/coe.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF ENGINEERING</p>
                    </a>
                </div>

                <div class="container">
                    <a href="CIHM-Faculty.php">
                        <img src="Images/cihm.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF INTERNATIONAL HOSPITALITY MANAGEMENT</p>
                    </a>
                </div>

                <div class="container">
                    <a href="CON-Faculty.php">
                        <img src="Images/cons.png" class="cont-logo"> 
                        <p class="cont-label">COLLEGE OF NURSING</p>
                    </a>
                </div>
        </div>
    </div>

    


    <div class="faculties">

        <h2> Our Offices </h2>
        <div class="faculties-div">
            <img src="<?php echo $rowft1['img']; ?>" class="logo-cont">

            <div>
              <p class="contact"> Admin Office </p>
              <p class="tel"> Tel. Number: </p>
              <p class="tel try"> <?php echo $rowft1['phone']; ?> </p>
              <a href="mailto: admin@plpasig.edu.ph"> Contact Us  </a>
            </div> 
        </div>

        <div class="faculties-div">
            <img src="<?php echo $rowft2['img']; ?>" class="logo-cont">

            <div>
              <p class="contact"> MIS Office </p>
              <p class="tel"> Tel. Number: </p>
              <p class="tel try"> <?php echo $rowft2['phone']; ?> </p>
              <a href="mailto: mis@plpasig.edu.ph">  Contact Us  </a>
            </div>
        </div>

        <div class="faculties-div">
            <img src="<?php echo $rowft3['img']; ?>" class="logo-cont">

            <div> 
              <p class="contact"> Registrar's Office </p>
              <p class="tel"> Tel. Number: </p>
              <p class="tel try"> <?php echo $rowft3['phone']; ?> </p>
              <a href="mailto: registrar@plpasig.edu.ph">  Contact Us  </a>
            </div>
        </div>

        <div class="faculties-div">
            <img src="<?php echo $rowft4['img']; ?>" class="logo-cont">

            <div>
              <p class="contact"> Student Affairs Services Office </p>
              <p class="tel"> Tel Number: </p>
              <p class="tel try"> <?php echo $rowft4['phone']; ?> </p>
              <a href="mailto: sas@plpasig.edu.ph">  Contact Us  </a>
            </div>
        </div>
    </div>

    <div class="concerns">
      <h2 class="specific-label">Specific Concerns </h2>

      <div class="concern">
        <div class="line-concern"></div>

        <div>
        <p class="concern-label">President's Office </p>
        <p class="concern-email">presidents_office@plpasig.edu.ph </p>
        </div>
      </div>

      <div class="concern">
        <div class="line-concern"></div>

        <div> 
        <p class="concern-label">Registrar's Office </p>
        <p class="concern-email">registrar@plpasig.edu.ph </p>
        </div>
      </div>

      <div class="concern">
        <div class="line-concern"></div>

        <div>
        <p class="concern-label">Management Information System Office </p>
        <p class="concern-email">mis@plpasig.edu.ph </p>
        </div> 
      </div>

    </div>
</main>
<!-- 
<div class="overlay" id="dialog-container">
            <div class="popup">
              <p class="message">Are you sure do you want to logout?</p>
              <div class="text-right">
                <button class="dialog-btn btn-cancel" id="cancel">CANCEL</button>
                <button type="submit" class="dialog-btn btn-primary" id="confirm">LOGOUT</button>
              </div>
            </div>
    </div> -->

    <script src="Javascript/java-logout.js"></script>
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