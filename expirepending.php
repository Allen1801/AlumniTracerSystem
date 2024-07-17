<?php 

    include_once 'Includes/dbconnector.php';
    
     $sql = "DELETE FROM pending WHERE expiry < NOW()";
     mysqli_query($link, $sql);


?>