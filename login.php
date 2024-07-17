<?php 
    include_once 'Includes/dbconnector.php';
    ini_set('session.gc_maxlifetime', 180);

    session_start();

    if (isset($_POST['btn_login'])) {
        $email = addslashes($_POST['email']);
        $pass = addslashes($_POST['password']);
        $bday = $_POST['birthday'];
    
        $alumni = "SELECT * FROM aluminfo WHERE (email='$email' OR username='$email') AND bday='$bday' AND pass='$pass' AND status='Active'";
        $alumniresult = mysqli_query($link, $alumni);
    
        $admin = "SELECT * FROM accounts WHERE username='$email' AND password='$pass'";
        $adminresult = mysqli_query($link, $admin);
    
        $numrow_alumni = mysqli_num_rows($alumniresult);
        $numrow_admin = mysqli_num_rows($adminresult);
    
        if ($numrow_alumni > 0) {
            $row = mysqli_fetch_array($alumniresult);
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            $id = $_SESSION['id'];
            header("Location: userlogin-logs.php");
        } elseif ($numrow_admin > 0) {
            $row = mysqli_fetch_assoc($adminresult);
            $_SESSION['account'] = $row['account'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['pos'] = $row['pos'];
            $id = $_SESSION['id'];
            header("Location: adminlogin-logs.php");
        } else {
            echo "<script>alert('Woops! Email, Password or Birthday is Wrong.')</script>";
        }
    }
    
?>

<!DOCTYPE html>
<html>
<title> Login | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/login.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="blur-bg"> </div>

    <div class="full"> 
        <div class="container">

            <img src="Images/PLPALUM-LOGO.png">
            <h2> Login </h2>

            <form method="POST">

                <div class="form-input">
                    <span> <i class="fa-solid fa-envelope"> </i> </span>
                    <input type="text" required name="email" placeholder="Email">
                </div>

                <div class="form-input">
                    <span> <i class="fa-solid fa-cake-candles"> </i> </span>
                    <input type="date" id="birthday" name = "birthday" placeholder="Birthday">
                </div>

                <div class="form-input">
                    <span> <i class="fa-solid fa-lock"> </i> </span>
                    <input type="password" required id="pass" name = "password" placeholder="Password">
                    <p> <i class="fa-solid fa-eye" id="eye"></i> </p>
                </div>
            
                <button type="submit" name="btn_login"> Login </button>

                <div class="check-forget"> 
                    <a href = "email-verification.php"> <p class="forget-pass" style="font-size: 13px;"> Forget Password? </p> </a>
                </div>
                
                <p class="sign-link"> Don't have an account? <a href ="privacy-policy.php"><u>Signup</u></a></p>  
                <hr style="margin-top: 30px; margin-bottom:-30px;">
                <p class="sign-link"> <a href ="index.php"> Go Back to Homepage </a></p>
                
            </form>
        </div>
    </div>

    <script type="text/javascript" src="Javascript/login.js"> </script>
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