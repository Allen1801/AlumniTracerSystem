<?php 
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/admin/getId.php';
    include_once 'Includes/session-expire.php';
    

        if(isset($_POST["export"])){

        $course = $_POST['program'];
        $year = $_POST['year'];
        header ("Location: import.php?course=$course&year=$year");
        
        $sqllogs = "INSERT INTO logs (name, date ,action) 
        VALUES ('$A', CURRENT_DATE ,'Exported alumni list')";
    
        mysqli_query($link, $sqllogs);
    }


?>


<!DOCTYPE html>
<html>
<title> Admin | Alumni List | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-style.css"/> 
    <link rel="stylesheet" href="CSS/admin-records.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .pagination a {
        background-color: var(--accentGreen);
        color: white;
        padding:10px;
        font-size: 16px;  
        gap: 10px;
        display: block;
        border-radius: 5px;
        margin-right: 10px;
        margin-bottom: 5px;
        width: 100px;
        text-align: center;
    }

    .pagination a:hover {
        background-color: rgb(114, 177, 114);
    }

    .button-list{
        justify-content: right;
        display:flex;
        margin-top: 20px;
    }

    .pagination li{
        float: left;
        gap: 10px;
    }   

    #list-prev{
        background-color: rgb(247, 197, 48);
    }

    #list-prev:hover{
        background-color: rgb(250, 210, 92);
    }
</style>

</head>

<body>

<div id="sidebar-div"> <?php include("admin-sidebar.php"); ?> </div>

<main>

    <div class="header"> 
        <h1> Alumni List </h1> 

        <div class="header-date-class"> 
            <p id="header-date"> </p>
        </div>
    </div>

    <div class="logs-table"> 

        <div class="search-form">

            <form action="" method="POST">
                <select class="input-field input-field1"  name="program" >
                    <?php 
                    if($username == 'admin'){ echo'
                    <option value="" selected>College</option>
                    <option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option>
                    <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                    <option value="Certificate in Entrepreneurship">Certificate in Entrepreneurship</option>
                    <option value="Bachelor of Science in Business Administration Major in Marketing">Bachelor of Science in Business Administration Major in Marketing</option>
                    <option value="Bachelor of Science in Business Administration Major in Management">Bachelor of Science in Business Administration Major in Management</option>
                    <option value="Bachelor Of Science in Business Administration Major in Entrepreneurship">Bachelor of Science in Business Administration Major in Entrepreneurship</option>
                    <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                    <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                    <option value="Bachelor of Elementary Education Specialization: Early Childhood Education">Bachelor of Elementary Education Specialization: Early Childhood Education</option>
                    <option value="Bachelor of Secondary Education Major in Computer Education">Bachelor of Secondary Education Major in Computer Education</option>
                    <option value="Bachelor of Secondary Education Major In Biology">Bachelor of Secondary Education Major in Biology</option>
                    <option value="Bachelor of Secondary Education Major in English">Bachelor of Secondary Education Major in English</option>
                    <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
                    <option value="Bachelor of Secondary Education Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>
                    <option value="Bachelor of Science in Electronics and Communication Engineering">Bachelor of Science in Electronics and Communication Engineering</option>   
                    <option value="Associate in Hotel And Restaurant Management">Associate in Hotel And Restaurant Management</option>
                    <option value="Bachelor of Science in Hotel And Restaurant Management">Bachelor of Science in Hotel and Restaurant Management</option>
                    <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                    <option value="Associate in Computer Technology">Associate in Computer Technology</option>
                    <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                    <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                    <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>';
                    }elseif($username == 'ccs_dean'){ echo'
                    <option value="" selected>College</option>
                    <option value="Associate in Computer Technology">Associate in Computer Technology</option>
                    <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                    <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>';
                    }elseif($username == 'cihm_dean'){ echo'
                    <option value="" selected>College</option>
                    <option value="Associate in Hotel And Restaurant Management">Associate in Hotel And Restaurant Management</option>
                    <option value="Bachelor of Science in Hotel And Restaurant Management">Bachelor of Science in Hotel and Restaurant Management</option>
                    <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>';
                    }elseif($username == 'cba_dean'){ echo'
                    <option value="" selected>College</option>
                    <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                    <option value="Certificate in Entrepreneurship">Certificate in Entrepreneurship</option>
                    <option value="Bachelor of Science in Business Administration Major in Marketing">Bachelor of Science in Business Administration Major in Marketing</option>
                    <option value="Bachelor of Science in Business Administration Major in Management">Bachelor of Science in Business Administration Major in Management</option>
                    <option value="Bachelor Of Science in Business Administration Major in Entrepreneurship">Bachelor of Science in Business Administration Major in Entrepreneurship</option>
                    <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>';
                    }elseif($username == 'coed_dean'){ echo'
                    <option value="" selected>College</option>
                    <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                    <option value="Bachelor of Elementary Education Specialization: Early Childhood Education">Bachelor of Elementary Education Specialization: Early Childhood Education</option>
                    <option value="Bachelor of Secondary Education Major in Computer Education">Bachelor of Secondary Education Major in Computer Education</option>
                    <option value="Bachelor of Secondary Education Major In Biology">Bachelor of Secondary Education Major in Biology</option>
                    <option value="Bachelor of Secondary Education Major in English">Bachelor of Secondary Education Major in English</option>
                    <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
                    <option value="Bachelor of Secondary Education Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>';
                    }elseif($username == 'con_dean'){ echo'
                    <option value="" selected>College</option>
                    <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>';
                    }elseif($username == 'coe_dean'){ echo'
                    <option value="" selected>College</option>
                    <option value="Bachelor of Science in Electronics and Communication Engineering">Bachelor of Science in Electronics and Communication Engineering</option>';
                    }elseif($username == 'cas_dean'){ echo'
                    <option value="" selected>College</option>
                    <option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option>';
                    }
                    ?>
                </select>

                <select class="input-field input-field2"  name="year">
                    <option value="" selected> Year </option>
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

                <button type="submit" name="search" id="export" title="Filter alumni"><i class="fa-solid fa-search"></i></button>
                <button type="submit" name="all" id="export" title="Show all alumni"><i class="fa-solid fa-th-list"></i></button>
                <button type="submit" name="export" id="export" title="Export list"><i class="fa-solid fa-download"></i></button>
                

            </form>

        </div>

        <table class="table-box">
            <thead>
                <tr>      
                <?php 
                if($username == "admin"){ echo'
                    <th>NAME</th>
                    <th>CONTACT NUMBER</th>
                    <th>EMAIL ADDRESS</th>
                    <th> LAST LOGIN </th>
                    <th>MISCELLANEOUS</th>';
                }else{
                    echo'
                    <th>NAME</th>
                    <th>CONTACT NUMBER</th>
                    <th>EMAIL ADDRESS</th>
                    <th>MISCELLANEOUS</th>';
                }
                
                ?>
                </tr>
            </thead>
            <tbody>

                <?php

                    if($username == "admin"){

                    if(isset($_POST['search'])){
                       $course = $_POST['program'];
                       $year = $_POST['year'];
                        
                        $searchsql = mysqli_query($link, "select * from educ INNER JOIN aluminfo on educ.id = aluminfo.id where degree1='$course' AND years1='$year' AND status='Active' order by lname asc");
                        while($row = mysqli_fetch_array($searchsql)){
                            echo'
                            <tr>';
                             $id = $row['id'];
                            $sqleducdefault=mysqli_query($link,"SELECT * FROM aluminfo WHERE id=$id AND status='Active' order by lname asc");
                            $row1 = mysqli_fetch_array($sqleducdefault);

                               echo '<td>' .$row1['lname']. ', ' .$row1['fname']. ' ' .$row1['mini']. ' ' .$row1['suffix']. '</td>  
                                <td>' .$row1['cnum']. '</td>
                                <td>' .$row1['email']. '</td>
                                <td>' .$row1['lastlogin']. '</td>';
                                echo "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button> </a> <a href='archive-alumni-info.php?id=$id'><button type='button' class='btn-archive' name='archive'> Archive </button> </a>
                            </tr>";
                        }
                    } 
                    elseif (isset($_POST['all'])) {
                        $sql = mysqli_query($link, "select * from aluminfo where status ='active' order by lname asc");
                        while($row = mysqli_fetch_array($sql)){
                            echo'
                            <tr>';
                           $id = $row['id'];
                            echo ' <td>' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>   
                                <td>' .$row['cnum']. '</td>
                                <td>' .$row['email']. '</td>
                                <td>' .$row['lastlogin']. '</td>';
                               echo "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button> </a> <a href='archive-alumni-info.php?id=$id'><button type='button' class='btn-archive' name='archive'> Archive </button> </a>
                            </tr>";
                        }
                    } 
                    else {
                        $sql = mysqli_query($link, "select * from aluminfo where status ='active' order by lname asc");
                        while($row = mysqli_fetch_array($sql)){
                            echo'
                            <tr>';
                                    $id = $row['id'];
                                echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                <td data-label="Contact">' .$row['cnum']. '</td>
                                <td data-label="Email">' .$row['email']. '</td>
                                <td>' .$row['lastlogin']. '</td>';
                               echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button></a> <a href='archive-alumni-info.php?id=$id'><button type='button' class='btn-archive' name='archive'> Archive </button> </a>
                            </tr>
                            ";
                        }
                    }
                }else {
                    if(isset($_POST['search'])){
                        $course = $_POST['program'];
                        $year = $_POST['year'];
                         
                         $searchsql = mysqli_query($link, "select * from educ INNER JOIN aluminfo on educ.id = aluminfo.id where degree1='$course' AND years1='$year' AND status='Active' order by lname asc");
                         while($row = mysqli_fetch_array($searchsql)){
                             echo'
                             <tr>';
                          $id = $row['id'];
                             $sqleducdefault=mysqli_query($link,"SELECT * FROM aluminfo WHERE id=$id");
                             $row1 = mysqli_fetch_array($sqleducdefault);
 
                                echo '<td>' .$row1['lname']. ', ' .$row1['fname']. ' ' .$row1['mini']. ' ' .$row1['suffix']. '</td>  
                                 <td>' .$row1['cnum']. '</td>
                                 <td>' .$row1['email']. '</td>';
                                 echo "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button> </a>
                             </tr>";
                         }
                     }elseif (isset($_POST['all'])) {
                         if($username == 'cihm_dean') {
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Associate in Hotel And Restaurant Management' OR degree1='Bachelor of Science in Hotel and Restaurant Management' OR degree1='Bachelor of Science in Hospitality Management') order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }elseif($username == 'ccs_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Associate in Computer Technology' OR degree1='Bachelor of Science in Computer Science' OR degree1='Bachelor of Science in Information Technology') order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     elseif($username == 'coe_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Bachelor of Science in Electronics and Communication Engineering') order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     elseif($username == 'con_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Bachelor of Science in Nursing') order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     elseif($username == 'cas_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Bachelor of Arts in Psychology') order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     elseif($username == 'cba_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Bachelor of Science in Accountancy' OR degree1='Certificate in Entrepreneurship' OR degree1='Bachelor of Science in Business Administration Major in Marketing' OR degree1='Bachelor of Science in Business Administration Major in Management' OR degree1='Bachelor of Science in Business Administration Major in Entrepreneurship' OR degree1='Bachelor of Science in Entrepreneurship' ) order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     elseif($username == 'coed_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Bachelor of Elementary Education' OR degree1='Bachelor of Elementary Education Specialization: Early Childhood Education' OR degree1='Bachelor of Secondary Education Major in Computer Education' OR degree1='Bachelor of Secondary Education Major in Biology' OR degree1='Bachelor of Secondary Education Major in English' OR degree1='Bachelor of Secondary Education Major in Filipino' OR degree1='Bachelor of Secondary Education Major in Mathematics' ) order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     } else {
                         if($username == 'cihm_dean') {
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Associate in Hotel And Restaurant Management' OR degree1='Bachelor of Science in Hotel and Restaurant Management' OR degree1='Bachelor of Science in Hospitality Management') order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }elseif($username == 'ccs_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Associate in Computer Technology' OR degree1='Bachelor of Science in Computer Science' OR degree1='Bachelor of Science in Information Technology') order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     elseif($username == 'coe_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Bachelor of Science in Electronics and Communication Engineering') order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     elseif($username == 'con_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Bachelor of Science in Nursing') order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     elseif($username == 'cas_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Bachelor of Arts in Psychology') order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     elseif($username == 'cba_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Bachelor of Science in Accountancy' OR degree1='Certificate in Entrepreneurship' OR degree1='Bachelor of Science in Business Administration Major in Marketing' OR degree1='Bachelor of Science in Business Administration Major in Management' OR degree1='Bachelor of Science in Business Administration Major in Entrepreneurship' OR degree1='Bachelor of Science in Entrepreneurship' ) order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                     
                     elseif($username == 'coed_dean'){
                         $sql = mysqli_query($link, "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='Bachelor of Elementary Education' OR degree1='Bachelor of Elementary Education Specialization: Early Childhood Education' OR degree1='Bachelor of Secondary Education Major in Computer Education' OR degree1='Bachelor of Secondary Education Major in Biology' OR degree1='Bachelor of Secondary Education Major in English' OR degree1='Bachelor of Secondary Education Major in Filipino' OR degree1='Bachelor of Secondary Education Major in Mathematics' ) order by lname asc");
                         while($row = mysqli_fetch_array($sql)){
                             echo'
                             <tr>';
                             $id = $row['id'];
 
                                 echo '<td data-label="Name">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mini']. ' ' .$row['suffix']. '</td>  
                                 <td data-label="Contact">' .$row['cnum']. '</td>
                                 <td data-label="Email">' .$row['email']. '</td>';
                                echo  "<td data-label='More'> <a href='alumni-info.php?id=$id'> <button type='button' class='btn-view'> View </button>
                             </tr>
                             ";
                         }
                     }
                    }
                }
                ?>

            </tbody>
        </table>
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


