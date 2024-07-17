<?php

$id = $_SESSION['id'];

if (isset($_POST['submit-review'])) {
$pass = $_POST['password'];

if($pass == $settpass){
  header("Location: admin-settings.php");
} else {
  echo "<script>alert('Woops! Email, Password or Birthday is Wrong.')</script>";
}
}
if(isset($_POST['admin-logout'])) {
header("Location: logout.php");

}
?>
<head>
  <style>
    #password{
      width:100%; 
      padding:20px;
      background-color: rgb(242,242,242);
      border-radius: 5px;
      margin-bottom:30px;
      height:25px;
    }

    #cancel-pass {
    background-color: #d64545;
    border: 1px solid #d64545;
  }
  
    #cancel:hover{
      background-color: #c76363;
    }

    .text-left{
      justify-content:center;
      display:flex;
      gap: 10px;  
      position: relative;
    }

  </style>
</head>

<nav class="sidebar">   
    <img src="Images/PLPALUM-LOGO.png" alt="Business Icon" class="logo" style="width:100px; height:100px;">

    <div class="actions"> 
      <?php 
        if($username === 'admin'){ echo '
        <a href="admin-dashboard.php" class="icon"><i class="fa-solid fa-grip"></i><span>Dashboard</span></a>
        <a href="admin-add-records.php" class="icon"><i class="fa-solid fa-user-plus"></i><span>Add Records</span></a>
        <a href="admin-records.php" class="icon"><i class="fa-solid fa-list-ul"></i><span>Alumni List</span></a>
        <a href="admin-news.php" class="icon"><i class="fa-solid fa-bell"></i><span>News</span></a>
        <a href="admin-logs.php" class="icon"><i class="fa-solid fa-file-lines"></i><span>Logs</span></a>
        <a href="#dialog-container-pass" id="btn-show-dialog-pass" class="icon"><i class="fa-solid fa-gear"></i><span>Settings</span></a>';
        }else {echo '
          <a href="admin-dashboard.php" class="icon"><i class="fa-solid fa-grip"></i><span>Dashboard</span></a>
          <a href="admin-records.php" class="icon"><i class="fa-solid fa-list-ul"></i><span>Alumni List</span></a>
          <a href="#dialog-container-pass" id="btn-show-dialog-pass" class="icon"><i class="fa-solid fa-gear"></i><span>Settings</span></a>';
        }
        ?>
    </div>

    <div class="profile">
        <img src="Images/usericon.png">
        <p> <?php echo $_SESSION['account'] ?> </p>
        <p class="batch"> <?php echo $_SESSION['pos'] ?> </p>
        <a href="#dialog-container" id="btn-show-dialog" class="icon"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </div>
</nav>
<a href="#" class="burger-icon"><i class="fas fa-bars"></i></a>

<div class="overlay" id="dialog-container">
    <form method="POST">
            <div class="popup">
              <p class="message">Are you sure do you want to logout?</p>
              <div class="text-right">
                <button class="dialog-btn btn-cancel" id="cancel">CANCEL</button>
                <button type="submit" name="admin-logout"class="dialog-btn btn-primary" id="confirm">LOGOUT</button>
              </div>
            </div>
    </form>
    </div>

  <!-- Settings Password -->
<div class="overlay" id="dialog-container-pass">
  <form method="POST">
        <div class="popup" style="height:240px;">
            <p class="message">Password Required</p>
              <input type="password" id="password" name="password" placeholder="Enter Admin Password">
              <div class="text-left">
                <button type="submit" class="dialog-btn btn-cancel" name="cancel-review" id="cancel-pass">CANCEL</button>
                <button type="submit" name="submit-review" class="dialog-btn btn-primary" id="confirm-pass">SUBMIT</button>
              </div>
        </div>
    </form>
</div>