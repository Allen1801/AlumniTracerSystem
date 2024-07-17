<?php   



$id = $_GET['id'];

$sql = "SELECT * FROM aluminfo WHERE id=$id";


    //Getting data from the aluminfo table
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $A = $row['lname'];
    $B = $row['fname'];
    $C = $row['mini'];
    $D = $row['suffix'];
    $E = $row['mname'];
    $F = $row['bday'];
    $G = $row['age'];
    $H = $row['sex'];
    $I = $row['address'];
    $J = $row['cnum'];
    $K = $row['email'];
    $L = $row['snum'];
    $M = $row['photo'];
    $N = $row['pass'];

?>