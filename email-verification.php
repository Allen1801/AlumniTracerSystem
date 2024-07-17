<?php 

    include_once 'Includes/dbconnector.php';
    
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/PHPMailer.php';
    require 'vendor/autoload.php';

    if (isset($_POST['btn_next'])) {
        
        $_SESSION['email'] = $_POST['email'];
        $email = $_SESSION['email'];
        $alumni = "SELECT * FROM aluminfo WHERE email='$email' AND status='Active' order by id desc limit 1";
        $alumniresult = mysqli_query($link, $alumni);
    
        $numrow_alumni = mysqli_num_rows($alumniresult);
        if ($numrow_alumni > 0) {
            $row = mysqli_fetch_array($alumniresult);
            $_SESSION['emailotp'] = $row['email'];
            $emailotp = $_SESSION['emailotp'];
            //header("Location: change-pass.php?id=$id");
        }
        else {
            echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        }

        
        $otp = rand(1000, 9999);

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

        $sql = "INSERT INTO passotp (email, otp, expiry) VALUES ('$emailotp', $otp, CURRENT_TIMESTAMP)";
    
        if (mysqli_query($link, $sql)) {
            header("Location: pass-otp.php");
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
        $mail->addAddress($email);     //Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        


        $mail->Subject = 'One Time Password';
        $mail->Body    = $htmlContent;

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


?>

<!DOCTYPE html>
<html>
<title> Alumni | Reset Password | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/verify-email.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>

<div class="blur-bg"> </div>

<div class="full">
    <div class="container">
        
        <h2> Reset Your Password </h2>

        <form method="POST">

            <h3> Please Enter Your Registered E-mail Address. </h3>

            <div class="form-input">
                <span> <i class="fa-solid fa-envelope"> </i> </span>
                <input type="text" required id="mail" name="email" placeholder="Email Address"> 
            </div>

            <button type="submit" name="btn_next"> Next </button>

        </form>

        <a href="login.php">Go Back to Login Page</a>
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