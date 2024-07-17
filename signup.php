<?php

include_once 'Includes/dbconnector.php';

session_start();


?>

<!DOCTYPE html>
<html>
<title> Alumni | Signup | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/signup.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div class="blur-bg"> </div>

<div class="full">
    <div class="container">

        <img src="Images/PLPALUM-LOGO.png">
        <h2> Sign Up </h2>

        <form action="signup2.php" method="POST" >

            <h3> Personal Information <p class="instruction" style="color: red; font-size:13px; margin-top: -20px; margin-left: 200px;"> <i><b> * indicate required fields. </b></i></p></h3> 
            <h3 style="font-size:15px; margin-top: -10px;"><p class="instruction"> <i> For <b> FEMALE Alumni </b>, if married type your <b> MAIDEN NAME </b>.</i></p></h3>
            <div class="form-input">
                <span> <i class="fa-solid fa-user"></i> </span>
                <input type="text" class="lname" required id="lname" name = "lname" placeholder="Last Name *"> 
            </div>

            <div class="form-input">
                <input type="text" class="fname" required id="fname" name = "fname" placeholder="First Name *"> 
            </div>

            <div class="form-input">
                <input type="text" class="mname"  id="mname" name = "mname" placeholder="Middle Name"> 
            </div>

            <div class="form-input">
                <input type="text" class="sname" id="sname" name = "sname" placeholder="Suffix"> 
            </div>

            <div class="form-input">
                <span> <i class="fa-solid fa-cake-candles"></i> </span>
                <input type="date" required id="birthday" name = "birthday" placeholder="YYYY-MM-DD *"> 
            </div>

            <h3> School Information </h3>

            <div class="form-input">
                <span> <i class="fa-solid fa-id-card-clip"></i> </span>
                <input type="text" id="student-num" name = "student-num" placeholder="Student Number"> 
            </div>

            <div class="form-input">
                <span> <i class="fa-solid fa-graduation-cap"></i> </span>
                <input type="text" required id="year-graduated" name = "year-graduated" placeholder="Year Graduated *"> 
            </div>

            <div class="form-input">
                <span> <i class="fa-solid fa-award"></i> </span>
                <select required name="degree">
                    <option value="" disabled selected>Degree Completed in the University *</option>
                    <option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option>
                    <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                    <option value="Certificate in Entrepreneurship">Certificate in Entrepreneurship</option>
                    <option value="Bachelor of Science in Business Administration Major in Marketing">Bachelor of Science in Business Administration Major in Marketing</option>
                    <option value="Bachelor of Science in Business Administration Major in Management">Bachelor of Science in Business Administration Major in Management</option>
                    <option value="Bachelor Of Science in Business Administration Major in Entrepreneurship">Bachelor of Science in Business Administration Major in Entrepreneurship</option>
                    <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                    <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                    <option value="Bachelor of Elementary Education Specialization: Early Childhood Education">Bachelor of Elementary Education Specialization: Early Childhood Education</option>
                    <option value="Bachelor of Secondary Education Major in Computer Education">Bachelor of Secondary Education Major in Computer Education</option>
                    <option value="Bachelor of Secondary Education Major In Biology">Bachelor of Secondary Education Major in Biology</option>
                    <option value="Bachelor of Secondary Education Major in English">Bachelor of Secondary Education Major in English</option>
                    <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
                    <option value="Bachelor of Secondary Education Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>
                    <option value="Bachelor of Science in Electronics and Communication Engineering">Bachelor of Science in Electronics and Communication Engineering</option>   
                    <option value="Associate in Hotel And Restaurant Management">Associate in Hotel And Restaurant Management</option>
                    <option value="Bachelor of Science in Hotel And Restaurant Management">Bachelor of Science in Hotel and Restaurant Management</option>
                    <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                    <option value="Associate in Computer Technology">Associate in Computer Technology</option>
                    <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                    <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                    <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                </select> 
            </div>

            <button type="submit" name="btn_next" style="background-color: #548B60;"> Next </button>

        </form>

        <a href="login.php">Already have an account? <u>Login Now</u></a>
    </div>
</div>

</body>
</html>
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