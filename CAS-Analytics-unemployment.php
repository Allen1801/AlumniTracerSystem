<?php 
    include 'Includes/dbconnector.php';
    include 'Includes/admin/getId.php';
    include 'Includes/admin/colleges.php';
    include_once 'Includes/session-expire.php';
?>

<html>
<title> Admin | Analytics (COED) | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-style.css"/> 
    <link rel="stylesheet" href="CSS/college-analytics-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
</head>

<body>


<div id="sidebar-div"> <?php include("admin-sidebar.php"); ?> </div>

<main>

    <div class="header"> 
        <h1> Analytics </h1> 

        <div class="header-date-class"> 
            <p id="header-date"> </p>
        </div>
    </div>

    <div class="colleges-div">

        <div class="overall-bg">
            <img src="Images/cas.png" class="overall-logo">
            <p class="overall-label">COLLEGE OF ARTS AND SCIENCES</p>
        </div>

        <div class="act" style="margin-bottom:-30px;">
            <p class="alum-label">TOTAL NUMBER OF GRADUATES: &nbsp</p>
            <p class="number"><?php echo $overallgradtotal ?></p>
        </div>

        <div class="act">
            <p class="alum-label">ACTIVE ALUMNI MEMBER: &nbsp</p>
            <p class="number"><?php echo $overalltotal ?></p>
        </div>

        <form action="" method=POST>

            <div class="field">
                <p class="form-label">PROGRAM : </p>
                <select class="input-field1"  name="program">
                    <option value=" "></option>
                    <option value="Bachelor of Science in Computer Science">Bachelor of Arts in Psychology</option>
                </select>
            </div>

            <div class="field">
                <p class="form-label">YEAR : </p>
                <select class="input-field2"  name="year">
                    <option value=" "></option>
                    <option value = "2017"> 2017 </option> 
                    <option value = "2018"> 2018 </option> 
                    <option value = "2019"> 2019 </option> 
                    <option value = "2021"> 2021 </option> 
                    <option value = "2022"> 2022 </option>
                </select>
            </div>

            <button type="submit" name="search" title="Filter analytics"><i class="fa fa-search"></i></button>
            <button type="submit" name="report" id="report"> <i class="fa fa-file-lines"></i>Generate Report</button>


        </form>

        <?php include 'Includes/admin/colleges-canvas-unemployment.php'; ?>

    </div>

</main>

<script src="Javascript/logout-admin.js"></script>
<script src="Javascript/sidebar-toggle.js" type="text/javascript"> </script>
</body>
</html>