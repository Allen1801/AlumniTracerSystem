<?php

include_once 'Includes/dbconnector.php';
include_once 'Includes/admin/getId.php';

$course = $_GET['course'];
$year = $_GET['year'];

if($course != "" && $year != ""){
    
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Alumni list.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Birthday', 'Age', 'Sex', 'Address', 'Cellphone Number', 'Email', 'Student Number', 'Bachelors', 'Year Graduated', 'Masterals', 'Year Graduated', 'Doctorate', 'Year Graduated', 'Employment Status', 'Company Name', 'Company Address', 'Job Position', 'Assumption Date', 'Job Alignment', 'Duration of Unemployment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE status='Active' AND degree1 = '$course' AND years1 = '$year' ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['bday'], $row['age'], $row['sex'], $row['address'], $row['cnum'], $row['email'], $row['snum'], $row['degree1'], $row['years1'], $row['degree2'], $row['years2'], $row['degree3'], $row['years3'], $row['empstatus'], $row['cname'], $row['city'], $row['pos'], $row['exp'], $row['align'], $row['unemp']));
  
    }  
    fclose($output);  
}else{
    if($username == 'ccs_dean'){
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Alumni list.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Birthday', 'Age', 'Sex', 'Address', 'Cellphone Number', 'Email', 'Student Number', 'Bachelors', 'Year Graduated', 'Masterals', 'Year Graduated', 'Doctorate', 'Year Graduated', 'Employment Status', 'Company Name', 'Company Address', 'Job Position', 'Assumption Date', 'Job Alignment', 'Duration of Unemployment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE status='Active' AND (degree1='Associate in Computer Technology' OR degree1='Bachelor of Science in Computer Science' OR degree1='Bachelor of Science in Information Technology') ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['bday'], $row['age'], $row['sex'], $row['address'], $row['cnum'], $row['email'], $row['snum'], $row['degree1'], $row['years1'], $row['degree2'], $row['years2'], $row['degree3'], $row['years3'], $row['empstatus'], $row['cname'], $row['city'], $row['pos'], $row['exp'], $row['align'], $row['unemp']));
  
    }  
    fclose($output); 
    }elseif($username == 'cas_dean'){
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Alumni list.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Birthday', 'Age', 'Sex', 'Address', 'Cellphone Number', 'Email', 'Student Number', 'Bachelors', 'Year Graduated', 'Masterals', 'Year Graduated', 'Doctorate', 'Year Graduated', 'Employment Status', 'Company Name', 'Company Address', 'Job Position', 'Assumption Date', 'Job Alignment', 'Duration of Unemployment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE status='Active' AND (degree1='Bachelor of Arts in Psychology') ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['bday'], $row['age'], $row['sex'], $row['address'], $row['cnum'], $row['email'], $row['snum'], $row['degree1'], $row['years1'], $row['degree2'], $row['years2'], $row['degree3'], $row['years3'], $row['empstatus'], $row['cname'], $row['city'], $row['pos'], $row['exp'], $row['align'], $row['unemp']));
  
    }  
    fclose($output); 
    }elseif($username == 'cba_dean'){
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Alumni list.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Birthday', 'Age', 'Sex', 'Address', 'Cellphone Number', 'Email', 'Student Number', 'Bachelors', 'Year Graduated', 'Masterals', 'Year Graduated', 'Doctorate', 'Year Graduated', 'Employment Status', 'Company Name', 'Company Address', 'Job Position', 'Assumption Date', 'Job Alignment', 'Duration of Unemployment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE status='Active' AND (degree1='Bachelor of Science in Accountancy' OR degree1='Certificate in Entrepreneurship' OR degree1='Bachelor of Science in Business Administration Major in Marketing' OR degree1='Bachelor of Science in Business Administration Major in Management' OR degree1='Bachelor of Science in Business Administration Major in Entrepreneurship' OR degree1='Bachelor of Science in Entrepreneurship' ) ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['bday'], $row['age'], $row['sex'], $row['address'], $row['cnum'], $row['email'], $row['snum'], $row['degree1'], $row['years1'], $row['degree2'], $row['years2'], $row['degree3'], $row['years3'], $row['empstatus'], $row['cname'], $row['city'], $row['pos'], $row['exp'], $row['align'], $row['unemp']));
  
    }  
    fclose($output); 
    }elseif($username == 'coed_dean'){
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Alumni list.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Birthday', 'Age', 'Sex', 'Address', 'Cellphone Number', 'Email', 'Student Number', 'Bachelors', 'Year Graduated', 'Masterals', 'Year Graduated', 'Doctorate', 'Year Graduated', 'Employment Status', 'Company Name', 'Company Address', 'Job Position', 'Assumption Date', 'Job Alignment', 'Duration of Unemployment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE status='Active' AND (degree1='Bachelor of Elementary Education' OR degree1='Bachelor of Elementary Education Specialization: Early Childhood Education' OR degree1='Bachelor of Secondary Education Major in Computer Education' OR degree1='Bachelor of Secondary Education Major in Biology' OR degree1='Bachelor of Secondary Education Major in English' OR degree1='Bachelor of Secondary Education Major in Filipino' OR degree1='Bachelor of Secondary Education Major in Mathematics' ) ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['bday'], $row['age'], $row['sex'], $row['address'], $row['cnum'], $row['email'], $row['snum'], $row['degree1'], $row['years1'], $row['degree2'], $row['years2'], $row['degree3'], $row['years3'], $row['empstatus'], $row['cname'], $row['city'], $row['pos'], $row['exp'], $row['align'], $row['unemp']));
  
    }  
    fclose($output); 
    }elseif($username == 'coe_dean'){
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Alumni list.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Birthday', 'Age', 'Sex', 'Address', 'Cellphone Number', 'Email', 'Student Number', 'Bachelors', 'Year Graduated', 'Masterals', 'Year Graduated', 'Doctorate', 'Year Graduated', 'Employment Status', 'Company Name', 'Company Address', 'Job Position', 'Assumption Date', 'Job Alignment', 'Duration of Unemployment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE status='Active' AND (degree1='Bachelor of Science in Electronics and Communication Engineering') ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['bday'], $row['age'], $row['sex'], $row['address'], $row['cnum'], $row['email'], $row['snum'], $row['degree1'], $row['years1'], $row['degree2'], $row['years2'], $row['degree3'], $row['years3'], $row['empstatus'], $row['cname'], $row['city'], $row['pos'], $row['exp'], $row['align'], $row['unemp']));
  
    }  
    fclose($output); 
    }elseif($username == 'cihm_dean'){
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Alumni list.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Birthday', 'Age', 'Sex', 'Address', 'Cellphone Number', 'Email', 'Student Number', 'Bachelors', 'Year Graduated', 'Masterals', 'Year Graduated', 'Doctorate', 'Year Graduated', 'Employment Status', 'Company Name', 'Company Address', 'Job Position', 'Assumption Date', 'Job Alignment', 'Duration of Unemployment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE status='Active' AND (degree1='Associate in Hotel And Restaurant Management' OR degree1='Bachelor of Science in Hotel and Restaurant Management' OR degree1='Bachelor of Science in Hospitality Management') ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['bday'], $row['age'], $row['sex'], $row['address'], $row['cnum'], $row['email'], $row['snum'], $row['degree1'], $row['years1'], $row['degree2'], $row['years2'], $row['degree3'], $row['years3'], $row['empstatus'], $row['cname'], $row['city'], $row['pos'], $row['exp'], $row['align'], $row['unemp']));
  
    }  
    fclose($output); 
    }elseif($username == 'con_dean'){
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Alumni list.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Birthday', 'Age', 'Sex', 'Address', 'Cellphone Number', 'Email', 'Student Number', 'Bachelors', 'Year Graduated', 'Masterals', 'Year Graduated', 'Doctorate', 'Year Graduated', 'Employment Status', 'Company Name', 'Company Address', 'Job Position', 'Assumption Date', 'Job Alignment', 'Duration of Unemployment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id WHERE status='Active' AND (degree1='Bachelor of Science in Nursing') ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['bday'], $row['age'], $row['sex'], $row['address'], $row['cnum'], $row['email'], $row['snum'], $row['degree1'], $row['years1'], $row['empstatus'], $row['cname'], $row['city'], $row['pos'], $row['exp'], $row['align'], $row['unemp']));
  
    }  
    fclose($output); 
    }else{
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Alumni list.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('First Name', 'Last Name', 'Middle Name', 'Suffix', 'Maiden Name', 'Birthday', 'Age', 'Sex', 'Address', 'Cellphone Number', 'Email', 'Student Number', 'Bachelors', 'Year Graduated', 'Masterals', 'Year Graduated', 'Doctorate', 'Year Graduated', 'Employment Status', 'Company Name', 'Company Address', 'Job Position', 'Assumption Date', 'Job Alignment', 'Duration of Unemployment'));  
    $query = "SELECT * from aluminfo INNER JOIN educ on aluminfo.id = educ.id INNER JOIN employment on educ.id = employment.id ORDER BY snum ASC";  
    $result = mysqli_query($link, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  

         fputcsv($output, array($row['fname'], $row['lname'], $row['mini'], $row['suffix'], $row['mname'], $row['bday'], $row['age'], $row['sex'], $row['address'], $row['cnum'], $row['email'], $row['snum'], $row['degree1'], $row['years1'], $row['degree2'], $row['years2'], $row['degree3'], $row['years3'], $row['empstatus'], $row['cname'], $row['city'], $row['pos'], $row['exp'], $row['align'], $row['unemp']));
  
    }  
    fclose($output); 
}
}
?>