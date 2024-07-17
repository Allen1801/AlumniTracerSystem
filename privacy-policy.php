<!DOCTYPE html>
<html>
<title> Privacy Policy</title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/privacy-policy.css"/> 
</head>

<body>

    <header> 
        <div class="logo"> 
            <img src="Images/logo-bg.png" style="margin-right:10px;"> 
            <img src="Images/PLP-ALUM.png"> 
        </div>
    </header>

    <div class="header">
        <h3> PRIVACY POLICIES  </h3>
    </div>

    <div class="container">
        <p class="container-header"> PAMANTASAN NG LUNGSOD NG PASIG ALUMNI ASSOCIATE'S MANDATE </p>
        <p class="container-content"> Pamantasan ng Lungsod ng Pasig (PLP) upholds, respects, and 
            values your right to privacy. PLP is committed to protecting your personal data in 
            accordance with Data Privacy Act of 2012 and its Implementing Rules and Regulations.
        </p>
    </div>

    <div class="container">
        <p class="container-header"> DATA PROTECTION </p>
        <p class="container-content"> For the protection of your personal information, 
            the Pamantasan ng Lungsod ng Pasig shall implement reasonable and suitable 
            organizational, physical, and technical security measures. The data that is 
            gathered and processed will only be accessible to authorized personnel.
        </p>
    </div>

    <div class="container rights-div">
        <p class="rights-h1"> THE RIGHTS OF </p>
        <p class="rights-h2"> DATA SUBJECTS</p>
        <p class="container-content"> This data collection is exclusively meant for Pamantasan ng Lungsod ng Pasig graduates. 
        This survey form will collect data which will be handled with utmost confidentiality in compliance 
        with Republic Act 10173, commonly known as the Data Privacy Act of 2012. </p> <br>


        <div>
            <p> You have the following rights under the Data Privacy Act: </p><br>
            <p> The right to access; </p>
            <p> The right to object; </p>
            <p> The right to erasure or blocking; </p>
            <p> The right to file a complaint; </p>
            <p> The right to rectify; and </p>
            <p> The right to data portability; </p>
        </div>
    </div>

    <div class="container"> 
        <p class="container-content"> We highly appreciate your participation in this survey. 
            For related concerns or clarifications, please email <a href="mailto: alumni_office@plpasig.edu.ph"><u>alumni_office@plpasig.edu.ph</u></a>.
        </p>
    </div>

    <div class="back-button">
    <a href="index.php"> <button type="button" id="disagree"> I Disagree </button> </a>
    <a href="signup.php"> <button type="button" id="agree"> I Agree </button> </a>
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