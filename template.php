<?php

    include_once 'Includes/dbconnector.php';
    include_once 'Includes/admin/getId.php';

    if(isset($_POST['download'])){

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Template.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('Last Name', 'First Name', 'Middle Name', 'Suffix', 'Degree', 'Student Number', 'Birthday', 'Year Graduated'));  
    fclose($output);

    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Exported Employed Data')";
    mysqli_query($link, $sqllogs);
    

}

?>