<?php

include_once 'Includes/dbconnector.php';
include_once 'Includes/admin/getId.php';

$course = $_POST['program'];
$year = $_POST['year'];

if(isset($_POST['master'])){

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Employed.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Masters Degree', 'Year Graduated'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE status='Active' AND degree2 != '' AND (years1='$year' AND degree1='$course') ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['degree2'], $row['years2']));
  
    }  

    fclose($output);
    ;

    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Exported Employed Data')";
    
    mysqli_query($link, $sqllogs);

}

if(isset($_POST['doctorate'])){

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Unemployed.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Doctorate Degree', 'Year Graduated'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE status='Active' AND degree3 != '' AND (years1='$year' AND degree1='$course') ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['degree3'], $row['years3']));
  
    }  
    fclose($output);
    
    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Exported Unemployed Data')";
    
    mysqli_query($link, $sqllogs);

}

?>