<?php

include_once 'Includes/dbconnector.php';

    if(isset($_POST["import"])){
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
 
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Skip the first line
            fgetcsv($csvFile);
 
            // Parse data from CSV file line by line
             // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                // Get row data
                $fname = $getData[0];
                $lname = $getData[1];
                $mname = $getData[2];
                $suffix = $getData[3];
                $degree = $getData[4];
                $snum = $getData[5];
                $bday = $getData[6];
                $year = $getData[7];
 
                // If user already exists in the database with the same Student Number
                $query = "SELECT id FROM alumni WHERE snum = '" . $getData[5] . "'";
 
                $check = mysqli_query($link, $query);
 
                if ($check->num_rows > 0)
                {
                    mysqli_query($link, "UPDATE alumni SET fname = '" . $fname . "', lname = '" . $lname . "', fname = '" . $fname . "', mname = '" . $mname . "', suffix = '" . $suffix . "', degree = '" . $degree . "', snum = '" . $snum . "', bday = '" . $bday . "', year = '" . $year . "' WHERE snum = '" . $snum . "'");
                }
                else
                {
                     mysqli_query($link, "INSERT INTO alumni (lname, fname, mname, suffix, degree, snum, bday, year) 
                     VALUES ('". $lname ."', '". $fname ."', '". $mname ."', '". $suffix ."', '". $degree ."', '". $snum ."', '". $bday ."', '". $year ."')");
                    
                }
            }
 
            // Close opened CSV file
            fclose($csvFile);
            
    
        $sqllogs = "INSERT INTO logs (name, date ,action) 
        VALUES ('$A', CURRENT_DATE ,'Imported list of graduates')";
        mysqli_query($link, $sqllogs);
        echo "<script>alert('Data imported Successfully.');
        window.location= 'admin-add-records.php';</script>";
         
    }
    else
    {
        echo "<script>alert('Please select a valid file.');
        window.location= 'admin-add-records.php';</script>";
    }


}
?>