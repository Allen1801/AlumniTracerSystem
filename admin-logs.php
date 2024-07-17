<?php 
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/admin/getId.php';
    include_once 'Includes/session-expire.php';

?>

<!DOCTYPE html>
<html>
<title> Admin | Logs | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico"> 
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-style.css"/> 
    <link rel="stylesheet" href="CSS/admin-logs.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div id="sidebar-div"> <?php include("admin-sidebar.php"); ?> </div>

<main>
    <div class="header"> 
        <h1> System Logs </h1> 

        <div class="header-date-class"> 
            <p id="header-date"> </p>
        </div>
    </div>

    <div class="logs-table"> 

        <div class="search-form">

                <form action="" method="POST">
                <input type="text" name="search" id="search-input" placeholder="Search">
                <button type="submit" name="submit" id="search-submit"> <i class="fa-solid fa-magnifying-glass"></i> </button>
            </form>

        </div>

        <table class="table-box">
            <thead>
                <tr>                   
                    <th>USER</th>
                    <th>DATE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>

                <?php

                if(isset($_POST['submit'])){
                    $input = $_POST['search'];
                
                $sql = mysqli_query($link, "select * from logs where name = '$input' OR date = '$input' OR action = '$input' order by id DESC");
                while($row = mysqli_fetch_array($sql))
                {
                    echo ' 
                    <tr> 
                        <td data-label="User">' .$row['name']. '</td>
                        <td data-label="Date">' .$row['date']. '</td>   
                        <td data-label="Action">' .$row['action']. '</td>
                    </tr>';
                }
            }

            else{
                $sql = mysqli_query($link, "select * from logs order by id DESC");
                while($row = mysqli_fetch_array($sql))
                {
                    echo ' 
                    <tr> 
                        <td data-label="User">' .$row['name']. '</td>
                        <td data-label="Date">' .$row['date']. '</td>   
                        <td data-label="Action">' .$row['action']. '</td>
                    </tr>';
                }
            }
                
                ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="overlay" id="dialog-container">
            <div class="popup">
              <p class="message">Are you sure do you want to logout?</p>
              <div class="text-right">
                <button class="dialog-btn btn-cancel" id="cancel">CANCEL</button>
                <button type="submit" class="dialog-btn btn-primary" id="confirm">LOGOUT</button>
              </div>
            </div>
    </div> -->
</main>

<script src="Javascript/logout-admin.js"></script>
<script src="Javascript/sidebar-toggle.js" type="text/javascript"> </script>
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

</body>
</html>