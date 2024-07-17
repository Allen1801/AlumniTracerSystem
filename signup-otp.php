<?php 

    include_once 'Includes/dbconnector.php';
    
    session_start();

    //Getting Email from the sign up form
    $D = $_SESSION['email'];
 

    //Getting OTP from Database equal to the email
    $otpvalue = "SELECT * FROM signotp WHERE email='$D' order by id desc Limit 1";
    $otpresult = mysqli_query($link, $otpvalue);

    //Getting the OTP from the signotp table
    $numrow_otp = mysqli_num_rows($otpresult);
    if ($numrow_otp > 0) {
    $row = mysqli_fetch_array($otpresult);
    $dbotp = $row['otp'];
    }
    
    if (isset($_POST['btn_otp'])) {
        
            $C = $_SESSION['year-graduated'];
            $D = $_SESSION['email'];
            $E = $_SESSION['password'];
            $F = $_SESSION['fname'];
            $G = $_SESSION['lname'];
            $H = $_SESSION['mname'];
            $I = $_SESSION['sname'];
            $snum = $_SESSION['student-num'];
            $J = $_SESSION['degree'];
            $K = $_SESSION['empstat'];
            $L = $_SESSION['align'];
            $M = $_SESSION['compname'];
            $N = $_SESSION['city'];
            $O = $_SESSION['unemp'];
            $uname = $_SESSION['uname'];
            $B = $_SESSION['birthday'];
            
            $age = date("Y-m-d") - $B;

        // VALUE OF THE OTP HERE
        $otpNumbers = $_POST['otp-number'];

        // CombinedValue is the one that you're gonna use
        $combinedValue = implode('', $otpNumbers);

        //Verifying if the OTP matched what the user Entered
        if($dbotp == $combinedValue){

        //Getting The Data from the pending table and passing it to their respective tables
    
            $sql = "INSERT INTO aluminfo (fname, lname, mini, suffix, mname, username ,bday, age, sex, address, cnum, email, snum, photo, pass, privacy, lastlogin, status) 
            VALUES ('$F', '$G', '$H', '$I', '', '$uname' ,'$B', '$age', '', '', '', '$D', '$snum', '', '$E', 'I Agree', CURRENT_DATE, 'Active' )";
            if (mysqli_query($link, $sql)) {
                $sqlget = "SELECT * FROM aluminfo WHERE lname='$G' AND fname='$F' AND mini='$H' AND bday='$B' order by id desc";
                $sqlid = mysqli_query($link, $sqlget);
                $row = mysqli_fetch_array($sqlid);

                    $_SESSION['id'] = $row['id'];
                    $id = $_SESSION['id'];
                $sqlinsert = "INSERT INTO educ (id, degree1, univ1, years1, degree2, univ2, years2, degree3, univ3, years3)
                VALUES ('$id', '$J', 'Pamantasan ng Lungsod ng Pasig', '$C', '', '', '', '', '', '')";
                $sqlempinsert = "INSERT INTO employment (id, empstatus, cname, city, pos, exp, income, align, unemp)
                VALUES ('$id', '$K', '$M', '$N', '', '', '', '$L', '$O')";
                $sqlhisempinsert1 = "INSERT INTO historyemp1 (id, comp1, pos1, appoint1, years1, align1, org1, orgyear1, orgpos1, awards1, awardsyear1)
                VALUES ('$id', '', '', '', '', '', '', '', '', '', '')";
                $sqlhisempinsert2 = "INSERT INTO historyemp2 (id, comp2, pos2, appoint2, years2, align2, org2, orgyear2, orgpos2, awards2, awardsyear2)
                VALUES ('$id', '', '', '', '', '', '', '', '', '', '')";
                $sqlhisempinsert3 = "INSERT INTO historyemp3 (id, comp3, pos3, appoint3, years3, align3, org3, orgyear3, orgpos3, awards3, awardsyear3)
                VALUES ('$id', '', '', '', '', '', '', '', '', '', '')";
                
                mysqli_query($link, $sqlinsert);
                mysqli_query($link, $sqlempinsert);
                mysqli_query($link, $sqlhisempinsert1);
                mysqli_query($link, $sqlhisempinsert2);
                mysqli_query($link, $sqlhisempinsert3);
                echo "<script>alert('Your account has been created successfully. You will now be redirected to your account. Thank you!')</script>";
                echo "<script type='text/javascript'> window.open('overview.php', '_self');</script>";
            } else{
                echo "ERROR: Could not execute $sql. " . mysqli_error($link);
            }       
    
            
        }else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
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
    <link rel="stylesheet" href="CSS/signup-otp.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="blur-bg"> </div>

    <div class="full">
        <div class="container">
            <h2>Enter Verification Code</h2>

            <form method="POST">
                <div class="input-field">
                    <input type="number" name="otp-number[]" maxlength="1"/>
                    <input type="number" name="otp-number[]" maxlength="1" disabled/>
                    <input type="number" name="otp-number[]" maxlength="1" disabled/>
                    <input type="number" name="otp-number[]" maxlength="1" disabled/>
                </div>
            
                <button type="submit" name="btn_otp">Verify</button>
            </form>
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

    <script type="text/javascript">
        const inputs = document.querySelectorAll("input"),
        button = document.querySelector("button");
        // iterate over all inputs

        inputs.forEach((input, index1) => {
        input.addEventListener("keyup", (e) => {

            // This code gets the current input element and stores it in the currentInput variable
            // This code gets the next sibling element of the current input element and stores it in the nextInput variable
            // This code gets the previous sibling element of the current input element and stores it in the prevInput variable
            const currentInput = input,
            nextInput = input.nextElementSibling,
            prevInput = input.previousElementSibling;


            // if the value has more than one character then clear it
            if (currentInput.value.length > 1) {
                currentInput.value = "";
                return;
            }


            // if the next input is disabled and the current value is not empty
            //  enable the next input and focus on it
            if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                nextInput.removeAttribute("disabled");
                nextInput.focus();
            }

            // if the backspace key is pressed
            if (e.key === "Backspace") {
                // iterate over all inputs again
                inputs.forEach((input, index2) => {

                    // if the index1 of the current input is less than or equal to the index2 of the input in the outer loop
                    // and the previous element exists, set the disabled attribute on the input and focus on the previous element
                    if (index1 <= index2 && prevInput) {
                        input.setAttribute("disabled", true);
                        input.value = "";
                        prevInput.focus();
                    }

                });
            }


            //if the fourth input( which index number is 3) is not empty and has not disable attribute then
            //add active class if not then remove the active class.
            if (!inputs[3].disabled && inputs[3].value !== "") {
                button.classList.add("active");
                return;
            }
            button.classList.remove("active");
        });
        });

        //focus the first input which index is 0 on window load
        window.addEventListener("load", () => inputs[0].focus());

    </script>

</body>
</html>