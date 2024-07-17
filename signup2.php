<?php 

    include_once 'Includes/dbconnector.php';

    // $username = "SELECT username FROM aluminfo";
    // $result = mysqli_query($link, $username);
    
    // while($row = mysql_fetch_array($result)){
    //     $uname = $row['username'];
    // }
     
    
    session_start();

    if(isset($_POST['btn_next'])){
        $_SESSION['lname'] = addslashes($_POST['lname']);
        $_SESSION['fname'] = addslashes($_POST['fname']);
        $_SESSION['mname'] = addslashes($_POST['mname']);
        $_SESSION['sname'] = addslashes($_POST['sname']);
        $_SESSION['birthday'] = addslashes($_POST['birthday']);
        $_SESSION['student-num'] = addslashes($_POST['student-num']);
        $_SESSION['year-graduated'] = addslashes($_POST['year-graduated']);
        $_SESSION['degree'] = addslashes($_POST['degree']);
      }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/PHPMailer.php';
    require 'vendor/autoload.php';

    $otp = rand(1000, 9999);

    if (isset($_POST['btn_login'])) {

       $snum = $_SESSION['student-num'];
    
        $B = $_SESSION['birthday'];
        $C = $_SESSION['year-graduated'];
        $J = $_SESSION['degree'];
        $_SESSION['email'] = addslashes($_POST['email']);
        $D = $_SESSION['email'];
        $_SESSION['password'] = addslashes($_POST['password']);
        $E = $_SESSION['password'];
        $E1 = addslashes($_POST['confirm-pass']);
        $F = $_SESSION['fname'];
        $G = $_SESSION['lname'];
        $H = $_SESSION['mname'];
        $I = $_SESSION['sname'];
        $_SESSION['empstat'] = addslashes($_POST['empstat']);
        $_SESSION['align'] = addslashes($_POST['align']);
        $_SESSION['compname'] = addslashes($_POST['compname']);
        $_SESSION['city'] = addslashes($_POST['city']);
        $_SESSION['unemp'] = addslashes($_POST['unemp']);
        $K = $_SESSION['empstat'];
        $L = $_SESSION['align'];
        $M = $_SESSION['compname'];
        $N = $_SESSION['city'];
        $O = $_SESSION['unemp'];

        $alumniacc = "SELECT * FROM aluminfo WHERE lname='$G' AND fname='$F' AND mini='$H' AND email='$D' AND bday='$B'";
        $alumniresultacc = mysqli_query($link, $alumniacc);
        $numrow_alumniacc = mysqli_num_rows($alumniresultacc);
        

        if($numrow_alumniacc > 0){  
            
            echo "<script>alert('Account Already exist.');
            window.location= 'signup.php';</script>";
        }else{
            
    //         $alumni = "SELECT * FROM alumni WHERE lname='$G' AND fname='$F' AND mname='$H' AND degree='$J' AND year='$C'";
    //         $alumniresult = mysqli_query($link, $alumni);
    //         $numrow_alumni = mysqli_num_rows($alumniresult);
    //         if ($numrow_alumni > 0) {
    //         $sql = "INSERT INTO aluminfo (fname, lname, mini, suffix, mname, bday, age, sex, address, cnum, email, snum, photo, pass, privacy, status) 
    //         VALUES ('$F', '$G', '$H', '$I', '', '$B', '', '', '', '', '$D', '$snum', '', '$E', 'I Agree', 'Active' )";
    //         if (mysqli_query($link, $sql)) {
    //             $sqlget = "SELECT * FROM aluminfo WHERE lname='$G' AND fname='$F' AND mini='$H' AND bday='$B' order by id desc";
    //             $sqlid = mysqli_query($link, $sqlget);
    //             $row = mysqli_fetch_array($sqlid);

    //                 $id = $row['id'];
    //             $sqlinsert = "INSERT INTO educ (id, degree1, univ1, years1, degree2, univ2, years2, degree3, univ3, years3)
    //             VALUES ('$id', '$J', 'Pamantasan ng Lungsod ng Pasig', '$C', '', '', '', '', '', '')";
    //             $sqlempinsert = "INSERT INTO employment (id, empstatus, cname, city, pos, exp, income, align, unemp)
    //             VALUES ('$id', '$K', '$M', '$N', '', '', '', '$L', '$O')";
    //             $sqlhisempinsert1 = "INSERT INTO historyemp1 (id, comp1, pos1, appoint1, years1, align1, org1, orgyear1, orgpos1, awards1, awardsyear1)
    //             VALUES ('$id', '', '', '', '', '', '', '', '', '', '')";
    //             $sqlhisempinsert2 = "INSERT INTO historyemp2 (id, comp2, pos2, appoint2, years2, align2, org2, orgyear2, orgpos2, awards2, awardsyear2)
    //             VALUES ('$id', '', '', '', '', '', '', '', '', '', '')";
    //             $sqlhisempinsert3 = "INSERT INTO historyemp3 (id, comp3, pos3, appoint3, years3, align3, org3, orgyear3, orgpos3, awards3, awardsyear3)
    //             VALUES ('$id', '', '', '', '', '', '', '', '', '', '')";
                
    //             mysqli_query($link, $sqlinsert);
    //             mysqli_query($link, $sqlempinsert);
    //             mysqli_query($link, $sqlhisempinsert1);
    //             mysqli_query($link, $sqlhisempinsert2);
    //             mysqli_query($link, $sqlhisempinsert3);
    //             echo "<script>alert('Your account has been created successfully. You will be redirected to google forms for the system evaluation. Thank you!')</script>";
    //             echo "<script type='text/javascript'> window.open('index.php', '_self'); window.open('https://forms.gle/BGCBDfGsQsan4tZH8', '_self');</script>";
    //         } else{
    //             echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    //         } 
    //         }else{
    //             echo "<script>alert('Woops! Student Information does not exist.');
    //                         window.location= 'index.php';</script>";
    //         }
    //     }
    // }
    
        $alumni = "SELECT * FROM alumni WHERE lname='$G' AND fname='$F' AND mname='$H' AND degree='$J' AND bday='$B' AND year='$C'";
        $alumniresult = mysqli_query($link, $alumni);
    
        $numrow_alumni = mysqli_num_rows($alumniresult);
        if ($numrow_alumni > 0) {
            //code goes here

            $htmlContent =  " 
        <html> 
        <head> 
            <title>ONE TIME PASSWORD</title> 
            <style>
    
            div.content{
                align-items:center;
                position:absolute;
            }
    
            p.title{
                background: green;
                color: white;
                text-align: center;
                font-weight: bold;
                width: 500px;
            }
    
            p.line1{
                font-weight: bolder;
                text-align: center;
                width: 500px;
            }
    
            p.line2{
                text-align: center;
                width: 500px;
            }
    
            p.code{
                text-align: center;
                width: 500px;
                font-size: 50px;
            }
    
            p.line3{
                text-align: center;
                width: 500px;
            }
    
            p.line4{
                width: 500px;
                font-weight: bolder; 
            }
    
            p.line5{
    
                width: 500px;
            }
    
            </style>
        </head> 
        <body> 
            <div class='content'>
                <p class='title'> PLP Alumni Requested One Time Password </p>
                </br>
                <p class='line1'>Good day, PLPian!</p>
                <p class='line2'>Please use the verification code below on the PLP Alumni Tracer System:</p>
                <p class='code'>" .$otp. "</p>
                <p class='line3'> Note: OTP is valid for 3 minutes only. 
                    Do not share this passcode with anyone. If you didnt request this, you can ignore this email or contact us</p>
                <p class='line4'><i>- PLP Alumni Association</i></p>
                <p class='line5'>Disclaimer: This email and any files transmitted with it are confidential and intended solely for the use of the individual
                    or entity to whom they are addressed.</p>
            </div>    
        </body> 
        </html>";

        $otpsql = "INSERT INTO signotp (email, otp, expiry) VALUES ('$D', $otp, CURRENT_TIMESTAMP)";

        if (mysqli_query($link, $otpsql)) {
            header ("Location: signup-otp.php");
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }

        $mail = new PHPMailer(true);

    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.office365.com';                       //Set the SMTP server to send through
        //$mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'plpalumniotp@outlook.com';                     //SMTP username
        $mail->Password   = '@plpalumni12345';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('plpalumniotp@outlook.com', 'Alumni OTP noreply');
        $mail->addAddress($D);     //Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'One Time Password';
        $mail->Body    = $htmlContent;

    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


        if (mysqli_query($link, $sql)) {
            //secho "<script>alert('Your Account Has been made!')</script>";
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }
        }else {

            echo "<script>alert('Woops! Student Information does not exist.');
                            window.location= 'signup.php';</script>";
            
            
        }
    }
}
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
    <link rel="stylesheet" href="CSS/signupdos.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>



<div class="blur-bg"> </div>

<div class="full">
    <div class="container">

        <img src="Images/PLPALUM-LOGO.png">
        <h2> Sign Up </h2>

        <form method="POST" >

        <h3> Employment Information <p class="instruction" style="color: red; font-size:13px; margin-top: -20px; margin-left: 240px;"> <i><b> * indicate required fields. </b></i></p></h3> 

            <div class="form-input">
                <span> <i class="fa-solid fa-briefcase"></i> </span>
                <select required name="empstat">
                    <option value="" disabled selected>Employment Status *</option>
                    <option value="Employed">Employed</option>
                    <option value="Employed">Self-Employed</option>
                    <option value="Employed">Business Owner</option>
                    <option value="Unemployed">Homemaker (Househusband / Housewife)</option>
                    <option value="Unemployed">Unemployed</option>
                </select> 
            </div>

            <div class="form-input">
                <span> <i class="fa-solid fa-sitemap"></i> </span>
                <select required name="align">
                    <option value="" selected>Course Job Alignment *</option>
                    <option value="Aligned">Aligned</option>
                    <option value="Not Aligned">Not Aligned</option>
                </select> 
            </div>

            <div class="form-input">
                <span> <i class="fa-solid fa-building"></i> </span>
                <input type="text" class="lname" id="lname" name = "compname" placeholder="Company Name"> 
            </div>

            <div class="form-input">
                <span> <i class="fa-solid fa-city"></i> </span>
                <select required name="city">
                    <option value="" selected>Employment Site *</option>
                    <option value="Region I - Ilocos Region">Region I - Ilocos Region</option>
                    <option value="Region II - Cagayan Valley">Region II - Cagayan Valley</option>
                    <option value="Region III - Central Luzon">Region III - Central Luzon</option>
                    <option value="Region IV-A - CALABARZON">Region IV-A - CALABARZON</option>
                    <option value="MIMAROPA Region">MIMAROPA Region</option>
                    <option value="Region V - Bicol Region">Region V - Bicol Region</option>
                    <option value="Region VI - Western Visayas">Region VI - Western Visayas</option>
                    <option value="Region VII - Central Visayas">Region VII - Central Visayas</option>
                    <option value="Region VIII - Eastern Visayas">Region VIII -Eastern Visayas</option>
                    <option value="Region IX - Zamboanga Peninsula">Region IX - Zamboanga Peninsula</option>
                    <option value="Region X - Northern Mindanao">Region X - Northern Mindanao</option>
                    <option value="Region XI - Davao Region">Region XI - Davao Region</option>
                    <option value="Region XII - SOCCSKSARGEN">Region XII - SOCCSKSARGEN</option>
                    <option value="Region XIII - Caraga">Region XIII - Caraga</option>
                    <option value="NCR - National Capital Region">NCR - National Capital Region</option>
                    <option value="CAR - Cordillera Administrative Region">CAR - Cordillera Administrative Region</option>
                    <option value="BARMM - Bangsamoro Autonomous Region in Muslim Mindanao">BARMM - Bangsamoro Autonomous Region in Muslim Mindanao</option>
                    <option value="Outside the Philippines">Outside the Philippines</option>
                </select> 
            </div>


            <div class="form-input">
                <span> <i class="fa-solid fa-calendar"></i> </span>
                <select required name="unemp"> 
                    <option value="" selected> How long were you able to land a job after graduation? * </option>
                    <option value="Absorbed">Employed even before the Graduation / Absorbed by the OJT Company </option>
                    <option value="Less than 3 months">Less than 3 months</option>
                    <option value="3 months - Less than 6 months">3 months - Less than 6 months </option>
                    <option value="6 months - 1 year">6 months - 1 year</option>
                    <option value="1 year - Less than 2 years">1 year - Less than 2 years</option>
                    <option value="2 years above">2 years above</option>
                </select> 
            </div>

        <h3> Account Information </h3>

            <div class="form-input">
                <span> <i class="fa-solid fa-envelope"> </i> </span>
                <input type="text" required id="mail" name = "email" placeholder="Email Address *"> 
            </div>
            
            <div class="form-input">
                <span> <i class="fa-solid fa-lock"></i> </span>
                <input type="password" required id="mainpass" name = "password" placeholder="Password *">
                <span class="fa-solid fa-eye" id="eye"></span>
            </div>

            <div class="form-input">
                <span> <i class="fa-solid fa-unlock"></i> </span>
                <input type="password" required id="cpass" name = "confirm-pass" placeholder="Confirm Password *">
                <span class="fa-solid fa-eye" id="eye1"></span>
            </div>

            
            <h3 id="letter"> </h3>
            <h3 id="capital"> </h3>
            <h3 id="number"> </h3>
            <h3 id="length"> </h3>
            <h3 id="passwordMatch"> </h3>

            <button type="submit" id="Btn" name="btn_login" style="background-color: #548B60; margin-bottom:20px;"> Register Account </button>

        </form>

        <a href="signup.php"><u>Go Back to Previous Page</u></a>
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

<script type="text/javascript" src="Javascript/changepass.js"></script>
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
    document.getElementById("letter").innerHTML = "There is a Lowercase Letters.";
  } else {
    document.getElementById("letter").className = "Invalid";
    document.getElementById("letter").innerHTML = "Must Include Lowercase Letters.";
}
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(confirmPassword.match(upperCaseLetters)) {
    document.getElementById("capital").className = "Valid";
    document.getElementById("capital").innerHTML = "There is an Uppercase Letters.";
  } else {
    document.getElementById("capital").className = "Invalid";
    document.getElementById("capital").innerHTML = "Must Include Uppercase Letters.";
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(confirmPassword.match(numbers)) {
    document.getElementById("number").className = "Valid";
    document.getElementById("number").innerHTML = "There is a number.";
  } else {
    document.getElementById("number").className = "Invalid";
    document.getElementById("number").innerHTML = "Must Include a number.";
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