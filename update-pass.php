<?php 
    session_start();
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/select-user-profile.php';
    include_once 'Includes/session-expire.php';

    if (isset($_POST['btn_submit'])){
    $current = $_POST['current-password'];
    $new = $_POST['password'];
    
    if($N == $current){
    $sql = "UPDATE aluminfo SET pass='$new' WHERE id=$id";

    mysqli_query($link, $sql);
        
    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Updated their Profile')";
    mysqli_query($link, $sqllogs);
    
            echo "<script>alert('Password was changed.');
            window.location= 'overview.php';</script>";
    }else{
        echo "<script>alert('Woops! Current password is incorrect.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<title> Alumni Change Password| PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/change-password.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #passwordMatch{
        margin-left: 20px;
    }
    
    #letter{
        margin-left: 20px;
    }
    
    #capital{
        margin-left: 20px;
    }
    
    #number{
        margin-left: 20px;
    }
    
    #length{
        margin-left: 20px;
    }
    
    .Valid:before {
    position: relative;
    left: -10px;
    content: "✔";
}

.Invalid:before {
    position: relative;
    left: -10px;
    content: "✖";
}
    </style>
</head>


<body>

<div class="blur-bg"> </div>

<div class="full">
    <div class="container">
        
        <h2> Change Your Password </h2>

        <form method="POST">

            <h3> Current Password </h3>

            <div class="form-input">
                <span> <i class="fa-solid fa-lock"></i> </span>
                <input type="password" required id="currentpass" name = "current-password" placeholder="Current Password">
                <span class="fa-solid fa-eye" id="eye2"></span>
            </div>

            <h3> New Password </h3>

            <div class="form-input">
                <span> <i class="fa-solid fa-lock"></i> </span>
                <input type="password" required id="mainpass" name = "password" placeholder="New Password">
                <span class="fa-solid fa-eye" id="eye"></span>
            </div>

            <h3> Confirm New Password </h3>

            <div class="form-input">
                <span> <i class="fa-solid fa-unlock"></i> </span>
                <input type="password" required id="cpass" name = "confirm-pass" placeholder="Confirm Password">
                <span class="fa-solid fa-eye" id="eye1"></span>
            </div>
            
            <h3 id="letter"> </h3>
            <h3 id="capital"> </h3>
            <h3 id="number"> </h3>
            <h3 id="length"> </h3>
            <h3 id="passwordMatch"> </h3>

            <button type="submit" id="Btn" name="btn_submit"> SUBMIT </button>
        </form>
         
        <a href="overview.php">Go Back to Homepage</a>
    </div>
</div>

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

<script type="text/javascript" src="Javascript/passchange.js"></script>
<script type="text/javascript">

// Create a password input field and a confirm password input field.
var passwordInput = document.getElementById("cpass");
var confirmPasswordInput = document.getElementById("mainpass");

// Add an event listener to the password input field using the onkeyup event.
passwordInput.addEventListener("keyup", function() {
    // Check if the password and confirm password fields are equal.
    var password = passwordInput.value;
    var confirmPassword = confirmPasswordInput.value;

    if (confirmPassword == password) {
        document.getElementById("passwordMatch").className = "Valid";
        document.getElementById("passwordMatch").innerHTML = "Passwords match.";
    } else {
        document.getElementById("passwordMatch").className = "Invalid";
        document.getElementById("passwordMatch").innerHTML = "Passwords do not match.";
    }
});

confirmPasswordInput.addEventListener("keyup", function() {
    var password = passwordInput.value;
    var confirmPassword = confirmPasswordInput.value;

    var lowerCaseLetters = /[a-z]/g;
  if(confirmPassword.match(lowerCaseLetters)) {
    document.getElementById("letter").className = "Valid";
    document.getElementById("letter").innerHTML = "There is a lowercase letters.";
  } else {
    document.getElementById("letter").className = "Invalid";
    document.getElementById("letter").innerHTML = "Must include lowercase letters.";
}
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(confirmPassword.match(upperCaseLetters)) {
    document.getElementById("capital").className = "Valid";
    document.getElementById("capital").innerHTML = "There is an uppercase letters.";
  } else {
    document.getElementById("capital").className = "Invalid";
    document.getElementById("capital").innerHTML = "Must include uppercase letters.";
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(confirmPassword.match(numbers)) {
    document.getElementById("number").className = "Valid";
    document.getElementById("number").innerHTML = "There is a number.";
  } else {
    document.getElementById("number").className = "Invalid";
    document.getElementById("number").innerHTML = "Must include a number.";
  }

  // Validate length
  if(confirmPassword.length >= 8) {
    document.getElementById("length").className = "Valid";
    document.getElementById("length").innerHTML = "Password is 8 characters long.";
  } else {
    document.getElementById("length").className = "Invalid";
    document.getElementById("length").innerHTML = "Must be atleast 8 characters long.";
  }
});
passwordInput.addEventListener("keyup", function() {

if(document.getElementById("passwordMatch").classList.contains("Valid") && document.getElementById("letter").classList.contains("Valid") && document.getElementById("capital").classList.contains("Valid") && document.getElementById("number").classList.contains("Valid") && document.getElementById("length").classList.contains("Valid")){
    document.getElementById("Btn").disabled = false;
}else{
    document.getElementById("Btn").disabled = true;
}
});
</script>
</body>
</html>