<?php 
    include 'Includes/dbconnector.php';
    include 'Includes/admin/getId.php';
    include 'Includes/admin/colleges.php';
    include_once 'Includes/session-expire.php';
    include_once 'Includes/session-expire.php';
?>

<html>
<title> Admin | Analytics (CCS) | PLPATS </title>

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
            <img src="Images/coed.png" class="overall-logo">
            <p class="overall-label">COLLEGE OF EDUCATION</p>
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
                    <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                    <option value="Bachelor Of Elementary Education Specialization: Early Childhood Education">Bachelor of Elementary Education Specialization: Early Childhood Education</option>
                    <option value="Bachelor Of Secondary Education Major In Computer Education">Bachelor of Secondary Education Major in Computer Education</option>
                    <option value="Bachelor Of Secondary Education Major In Biology">Bachelor of Secondary Education Major in Biology</option>
                    <option value="Bachelor of Secondary Education Major in English">Bachelor of Secondary Education Major in English</option>
                    <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
                    <option value="Bachelor of Secondary Education Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>
                </select>
            </div>

            <div class="field">
                <p class="form-label">YEAR : </p>
                <select class="input-field2"  name="year">
                    <option value=" "></option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
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