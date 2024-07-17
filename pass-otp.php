<?php 

    include_once 'Includes/dbconnector.php';
    
    session_start();
    
    $email= $_SESSION['email'];

    $otpvalue = "SELECT * FROM passotp WHERE email='$email' order by id desc limit 1";
    $otpresult = mysqli_query($link, $otpvalue);

    $numrow_otp = mysqli_num_rows($otpresult);
    if ($numrow_otp > 0) {
        $row = mysqli_fetch_array($otpresult);
        $dbotp = $row['otp'];
        $id = $row['id'];

    }

    if (isset($_POST['btn_otp'])) {


        // VALUE OF THE OTP HERE !!!! // 
        $otpNumbers = $_POST['otp-number'];

        // CombinedValue is the one that you're gonna use// 
        $combinedValue = implode('', $otpNumbers);

        if($dbotp == $combinedValue){
            header("Location: change-pass.php");
        } else {
            echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
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