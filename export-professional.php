<?php

include_once 'Includes/dbconnector.php';
include_once 'Includes/admin/getId.php';

$course = $_POST['program'];
$year = $_POST['year'];

if(isset($_POST['employed'])){

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Employed.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Degree', 'Year Graduated', 'Employment Status'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE empstatus='Employed' AND years1='$year' AND degree1='$course' ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['degree1'], $row['years1'], $row['empstatus']));
  
    }  
    
    fclose($output);

    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Exported Employed Data')";
    
    mysqli_query($link, $sqllogs);

}

if(isset($_POST['unemployed'])){

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Unemployed.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Degree', 'Year Graduated', 'Employment Status'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE empstatus='Unemployed' AND years1='$year' AND degree1='$course' ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['degree1'], $row['years1'], $row['empstatus']));
  
    }  
    fclose($output);
    
    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Exported Unemployed Data')";
    
    mysqli_query($link, $sqllogs);

}

if(isset($_POST['aligned'])){

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Aligned.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Degree', 'Year Graduated', 'Job Alignment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE align='Aligned' AND years1='$year' AND degree1='$course' ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['degree1'], $row['years1'], $row['align']));
  
    }  
    fclose($output);
    
    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Exported Aligned Data')";
    
    mysqli_query($link, $sqllogs);

}


if(isset($_POST['unaligned'])){

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Unaligned.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Degree', 'Year Graduated', 'Job Alignment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE align='Unaligned' AND years1='$year' AND degree1='$course' ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['degree1'], $row['years1'], $row['align']));
  
    }  
    fclose($output);
    
    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Exported Unaligned Data')";
    
    mysqli_query($link, $sqllogs);

}

?>