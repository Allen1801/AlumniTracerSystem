<?php 

    include_once 'Includes/dbconnector.php';
    
     $sql = "DELETE FROM passotp WHERE expiry < NOW()";
     mysqli_query($link, $sql);


?>