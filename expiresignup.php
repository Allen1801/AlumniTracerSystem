<?php 

    include_once 'Includes/dbconnector.php';
    
     $sql = "DELETE FROM signotp WHERE expiry < NOW()";
     mysqli_query($link, $sql);


?>