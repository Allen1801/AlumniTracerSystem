<?php 
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/admin/getId.php';
    include_once 'Includes/session-expire.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/PHPMailer.php';
    require 'vendor/autoload.php';



    if (isset($_POST['btn_next'])) {
        $message = $_POST['message'];
    
        $alumni = mysqli_query($link, "select * from aluminfo");
    
        while($row = mysqli_fetch_array($alumni)){
            $email=$row["email"];
        
        $htmlContent =  " 
        <html> 
        <head> 
            <title>PLP ALUMNI LATEST UPDATE</title> 
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
                width: 500px;
            }
    
            p.line2{
                text-align: center;
                width: 500px;
            }
    
            p.code{
                text-align: center;
                width: 500px;
                font-size: 14px;
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
            <p class='title'> PLP Alumni Latest Update </p>
            </br>
            <p class='line1'>Greetings, PLPian!</p>
            </br>
                <p class='code'>" .$message. "</p>
            </br>
            <p class='line4'><i>- PLP Alumni Association</i></p>
            </div>    
        </body> 
        </html>";

        $sql = "INSERT INTO logs (name, action, date) VALUES ('Admin', 'Sent an Email Notification', CURRENT_DATE)";
    
        if (mysqli_query($link, $sql)) {
            header("Location: admin-news.php?id=$id");
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
        $mail->setFrom('plpalumniotp@outlook.com', 'Alumni Announcement noreply');
        $mail->addAddress($row['email']);     //Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        


        $mail->Subject = "PLP Alumni Announcements";
        $mail->Body    = $htmlContent;

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
    }

?>


<!DOCTYPE html>
<html>
<title> Admin | News | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-style.css"/> 
    <link rel="stylesheet" href="CSS/admin-news.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


<div id="sidebar-div"> <?php include("admin-sidebar.php"); ?> </div>

<main>

    <div class="header"> 
        <h1> Send News Update </h1> 

        <div class="header-date-class"> 
            <p id="header-date"> </p>
        </div>
    </div>

    <div class="pi-div">
        <h2> Announcement Section </h2>
        <input type="hidden" value="<?php echo $id; ?>" name="hidden_id" id="hidden">

        <form class="pi-form"  method="POST">

            <div>
                <textarea name="message" placeholder="Type latest news here..."></textarea>
            </div>
        
            <div class="btn">
                <button type="submit" name="btn_next" class="btn-import"> SEND </button>
                <button type="reset" class="btn-clear"> CLEAR </button>
            </div>
            </form>


        
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