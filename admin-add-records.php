<?php 
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/admin/getId.php';
    include_once 'Includes/session-expire.php';
    
    if(!isset($_SESSION['id'])){
    header("location:index.php");
}
?>


<!DOCTYPE html>
<html>
<title> Admin | Add Records | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-style.css"/> 
    <link rel="stylesheet" href="CSS/admin-add-records.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


<div id="sidebar-div"> <?php include("admin-sidebar.php"); ?> </div>

<main>

    <div class="header"> 
        <h1> Add Records </h1> 

        <div class="header-date-class"> 
            <p id="header-date"> </p>
        </div>
    </div>

    <div class="pi-div">
        <h2> Import Alumni Information </h2>


        <form class="pi-form"  method="POST" action="adminInsert.php" enctype="multipart/form-data">

            <div>
                <input type="file" name="file" accept=".csv">
            </div>
        
            <div class="btn">
                <button type="submit" name="import" class="btn-import"> IMPORT </button>
                <button type="reset" class="btn-clear"> CLEAR </button>
            </div>
            </form>
            
        <hr style="margin-top: 30px;">
        <form class="pi-form"  method="POST" action="template.php" enctype="multipart/form-data">
            <p style="text-align: center; margin-top: 30px; margin-bottom: -10px;">Download template for CSV file.</p>
            
            <div class="btn">
                <button type="submit" name="download" class="btn-import" style="background-color: #32A2C4;"> TEMPLATE </button>
            </div>
            </form>


        
    </div>
</main>

<script src="Javascript/admin-logout.js"></script>
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
<?php

    if(isset($_POST['download'])){

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Template.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('Last Name', 'First Name', 'Middle Name', 'Suffix', 'Degree', 'Student Number', 'Birthday', 'Year Graduated'));  
    fclose($output);

    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Download import data template')";
    
    mysqli_query($link, $sqllogs);

}

?>