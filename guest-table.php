<?php 
    include_once 'Includes/dbconnector.php';
?>

<!DOCTYPE html>
<html>
<title> Alumni List | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/front-navbar.css"/>
    <link rel="stylesheet" href="CSS/guest.css"/> 
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
        margin-right: 15px;
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
        <header> 
        <div class="container"> 
            <div class="logo"> 
                <img src="Images/logo-bg.png" style="margin-right:10px;"> 
                <img src="Images/PLP-ALUM.png"> 
                <h3 class="logo-title"> Pamantasan ng Lungsod ng Pasig </h3>
            </div>

            <div class="hamburger"> 
                <div class="line"> </div>
                <div class="line"> </div>
                <div class="line"> </div>   
            </div>
            
            <nav class="nav-bar">
                <ul>
                    <li> <a href="index.php"> Home </a> </li>
                    <li> <a href="guest-table.php"> Alumni </a></li>
                    <li> <a href="login.php" id="loginButton"> Login </a></li>
                </ul>
            </nav>
        </div>
    </header>
<main>

<div class="header"> 
    <h1 style="text-align: center; margin-top: 50px;"> LIST OF GRADUATES </h1> 

    <div class="header-date-class"> 
        <p id="header-date"> </p>
    </div>
</div>

<div class="logs-table"> 
    <div class="search-form">

        <form action="guest-table.php" method="POST">
            <input type="text" name="data" id="search-input" placeholder="Search..."> 
            <button type="submit" name="search" id="export"><i class="fa-solid fa-search"></i></button>
            <button type="submit" name="all" id="export"><i class="fa-solid fa-th-list"></i></button>
        </form>
    </div>
</div>

<table class="table-box">
            <thead>
                <tr>
                    <th>NAME</th>                   
                    <th>DEGREE</th>
                    <th>YEAR GRADUATED</th>
                </tr>
            </thead>

            <tbody>
            <?php

if(isset($_POST['search'])){
  $data = $_POST['data'];
   
  $searchsql = mysqli_query($link, "select * from alumni where degree='$data' OR year='$data' OR CONCAT(lname,' ',fname,' ',mname,' ',suffix) LIKE '%$data%' OR lname='$data' OR fname='$data' OR mname='$data' OR suffix ='$data' order by lname asc");
    while($row = mysqli_fetch_array($searchsql)){
        echo'
        <tr>';
        $userid = $row['id'];
           
        echo '<td>' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mname']. ' ' .$row['suffix']. '</td>  
            <td>' .$row['degree']. '</td>
            <td>' .$row['year']. '</td>';
        "</tr>";
    }
    
} 

elseif (isset($_POST['all'])) {

    $sql = mysqli_query($link, "select * from alumni order by lname asc");
    while($row = mysqli_fetch_array($sql))
    {
        echo'
        <tr>';

        $userid = $row['id'];

        echo ' <td>' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mname']. ' ' .$row['suffix']. '</td>   
            <td>' .$row['degree']. '</td>
            <td>' .$row['year']. '</td>';  
        "</tr>";
    }

} 

else {

    $sql = mysqli_query($link, "select * from alumni order by lname asc");
    while($row = mysqli_fetch_array($sql)){
        echo'
        <tr>';
                $userid = $row['id'];
                
            echo '<td data-label="NAME">' .$row['lname']. ', ' .$row['fname']. ' ' .$row['mname']. ' ' .$row['suffix']. '</td>  
            <td data-label="DEGREE">' .$row['degree']. '</td>
            <td data-label="YEAR GRADUATED">' .$row['year']. '</td>';   
        "</tr>
        ";
    }
}
?>

</tbody>
</table>
    </div>
</main>
</body>
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