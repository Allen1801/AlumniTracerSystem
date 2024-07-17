<?php
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/select-user-id.php';
    include_once 'Includes/session-expire.php';

    $sqldean = mysqli_query($link, "SELECT * FROM cihmfaculty where id=1");
    $rowdean = mysqli_fetch_array($sqldean);

    $sqlsecretary = mysqli_query($link, "SELECT * FROM cihmfaculty where id=2");
    $rowsecretary = mysqli_fetch_array($sqlsecretary);

    $sqlhead1 = mysqli_query($link, "SELECT * FROM cihmfaculty where id=3");
    $rowhead1 = mysqli_fetch_array($sqlhead1);

    $sqlft1 = mysqli_query($link, "SELECT * FROM cihmfaculty where id=4");
    $rowft1 = mysqli_fetch_array($sqlft1);

    $sqlft2 = mysqli_query($link, "SELECT * FROM cihmfaculty where id=5");
    $rowft2 = mysqli_fetch_array($sqlft2);

    $sqlft3 = mysqli_query($link, "SELECT * FROM cihmfaculty where id=6");
    $rowft3 = mysqli_fetch_array($sqlft3);

    $sqlft4 = mysqli_query($link, "SELECT * FROM cihmfaculty where id=7");
    $rowft4 = mysqli_fetch_array($sqlft4);

    $sqlft5 = mysqli_query($link, "SELECT * FROM cihmfaculty where id=8");
    $rowft5 = mysqli_fetch_array($sqlft5);

    $sqlft6 = mysqli_query($link, "SELECT * FROM cihmfaculty where id=9");
    $rowft6 = mysqli_fetch_array($sqlft6);

    $sqlft7 = mysqli_query($link, "SELECT * FROM cihmfaculty where id=10");
    $rowft7 = mysqli_fetch_array($sqlft7);

    $sqlft8 = mysqli_query($link, "SELECT * FROM cihmfaculty where id=11");
    $rowft8 = mysqli_fetch_array($sqlft8);

    $sqlft9 = mysqli_query($link, "SELECT * FROM cihmfaculty where id=12");
    $rowft9 = mysqli_fetch_array($sqlft9);
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
    <link rel="stylesheet" href="CSS/faculty.css"/> 
    <link rel="stylesheet" href="CSS/index-slider.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-user.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div id="sidebar-div"> <?php include("user-sidebar.php"); ?> </div>

<main> 
    <h1> Contact Us </h1>

    <!-- Dean/Secretary/Dept Head -->
    <div class="affairs containers">
      <h2 class="affairs-title">College of International Hospitality Management</h2>
      <p class="affairs-subtitle">A.Y. 2022-2023  </p>
      <p class="affairs-subtitle" style="margin-top: -20px;"> <i> cihm_@plpasig.edu.ph </i> </p>

      <div class="officers"> 
        <div class="officers-card-dean">
          <img src="<?php echo $rowdean['img'] ?>" class="officers-image">
          <p class="officers-name"> <?php echo $rowdean['name'] ?> </p>
          <p class="officers-position"> <?php echo $rowdean['pos'] ?> </p>
          <i><p class="officers-position"> <?php echo $rowdean['email'] ?> </p></i>
        </div>
      </div>

      <div class="officers"> 
        <div class="officers-card">
        <img src="<?php echo $rowhead1['img'] ?>" class="officers-image">
          <p class="officers-name"> <?php echo $rowhead1['name'] ?> </p>
          <p class="officers-position"> <?php echo $rowhead1['pos'] ?> </p>
          <i><p class="officers-position"> <?php echo $rowhead1['email'] ?> </p></i>
        </div>

        <div class="officers-card">
        <img src="<?php echo $rowsecretary['img'] ?>" class="officers-image">
          <p class="officers-name"> <?php echo $rowsecretary['name'] ?> </p>
          <p class="officers-position"> <?php echo $rowsecretary['pos'] ?> </p>
          <i><p class="officers-position"> <?php echo $rowsecretary['email'] ?> </p></i>
        </div>

      </div>
    </div>

    <!-- Faculty -->
    <div class="affairs containers">
      <h2 class="affairs-title"> Full Time Faculty Members </h2>
      <p class="affairs-subtitle">A.Y. 2022-2023  </p>

      <div class="officers"> 
        <div class="officers-card">
          <img src="<?php echo $rowft1['img'] ?>" class="officers-image">
          <p class="officers-name"><?php echo $rowft1['name'] ?> </p>
          <i><p class="officers-position"><?php echo $rowft1['email'] ?> </p></i>
        </div>

        <div class="officers-card">
        <img src="<?php echo $rowft2['img'] ?>" class="officers-image">
          <p class="officers-name"><?php echo $rowft2['name'] ?> </p>
          <i><p class="officers-position"><?php echo $rowft2['email'] ?> </p></i>
        </div>

        <div class="officers-card">
        <img src="<?php echo $rowft3['img'] ?>" class="officers-image">
          <p class="officers-name"><?php echo $rowft3['name'] ?> </p>
          <i><p class="officers-position"><?php echo $rowft3['email'] ?> </p></i>
        </div>
      </div>

            <div class="officers"> 
        <div class="officers-card">
        <img src="<?php echo $rowft4['img'] ?>" class="officers-image">
          <p class="officers-name"><?php echo $rowft4['name'] ?> </p>
          <i><p class="officers-position"><?php echo $rowft4['email'] ?> </p></i>
        </div>

        <div class="officers-card">
        <img src="<?php echo $rowft5['img'] ?>" class="officers-image">
          <p class="officers-name"><?php echo $rowft5['name'] ?> </p>
          <i><p class="officers-position"><?php echo $rowft5['email'] ?> </p></i>
        </div>

        <div class="officers-card">
        <img src="<?php echo $rowft6['img'] ?>" class="officers-image">
          <p class="officers-name"><?php echo $rowft6['name'] ?> </p>
          <i><p class="officers-position"><?php echo $rowft6['email'] ?> </p></i>
        </div>
      </div>

            <div class="officers"> 
        <div class="officers-card">
        <img src="<?php echo $rowft7['img'] ?>" class="officers-image">
          <p class="officers-name"><?php echo $rowft7['name'] ?> </p>
          <i><p class="officers-position"><?php echo $rowft7['email'] ?> </p></i>
        </div>

        <div class="officers-card">
        <img src="<?php echo $rowft8['img'] ?>" class="officers-image">
          <p class="officers-name"><?php echo $rowft8['name'] ?> </p>
          <i><p class="officers-position"><?php echo $rowft8['email'] ?> </p></i>
        </div>

        <div class="officers-card">
        <img src="<?php echo $rowft9['img'] ?>" class="officers-image">
          <p class="officers-name"><?php echo $rowft9['name'] ?> </p>
          <i><p class="officers-position"><?php echo $rowft9['email'] ?> </p></i>
        </div>
      </div>
    </div>
    
</main>

<!-- <div class="overlay" id="dialog-container">
            <div class="popup">
              <p class="message">Are you sure do you want to logout?</p>
              <div class="text-right">
                <button class="dialog-btn btn-cancel" id="cancel">CANCEL</button>
                <button type="submit" class="dialog-btn btn-primary" id="confirm">LOGOUT</button>
              </div>
            </div>
    </div> -->

    <script src="Javascript/logout-java.js"></script>
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