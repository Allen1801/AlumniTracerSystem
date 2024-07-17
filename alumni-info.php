<?php

include_once 'Includes/dbconnector.php';
include_once 'Includes/admin/getId.php';
include_once 'Includes/admin-select-user-id.php';
include_once 'Includes/admin-select-user-profile.php';
include_once 'Includes/session-expire.php';

$sql = "SELECT photo FROM aluminfo WHERE id=$id";

$imgresult = mysqli_query($link, $sql);

if(isset($_POST['archive'])){
    $sqlarchive = "UPDATE aluminfo set status='INACTIVE' where id=$id";
    mysqli_query($link, $sqlarchive);
}

?>

<!DOCTYPE html>
<html>
<title> Admin | Alumni Information | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/alumni-info.css"/> 
    <link rel="stylesheet" href="CSS/index-slider.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-style.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="sidebar-div"> <?php include("admin-sidebar.php"); ?> </div>


    <main>
    <h1> Alumni Information </h1> 

    <div class="form-container"> 

        <form class= "infos" action = "userInsert.php" method = "POST">
        
        <div class="form-section">

            <h2> Demographic Information </h2> 

            <div class="form-input profile-img">
            <?php
            if($imgresult->num_rows > 0) {
                while ($row = $imgresult->fetch_assoc()) {
                    $photo_path = $row['photo'];
                    echo "
                    <img src='$photo_path' alt='Photo'><br><br> 
                    ";

                }
            } else {
            echo "No photos found.";
            }
            ?>
            </div>

            <div class="form-input">
                <p class="form-label"> LAST NAME: </p>
                <input type="text" class="input-field" value="<?php echo $A; ?>" placeholder = "Last Name" name="lname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> FIRST NAME: </p>
                <input type="text" class="input-field" value="<?php echo $B; ?>" placeholder = "First Name" name="fname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> MIDDLE INITIAL: </p>
                <input type="text" class="input-field" value="<?php echo $C; ?>" placeholder = "Middle Initial" name="mname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> SUFFIX: </p>
                <input type="text" class="input-field1" value="<?php echo $D; ?>" placeholder = "Suffix" name="sname" disabled>
            </div>

            <div class="form-input span-12">
                <p class="form-label"> ADDRESS: </p>
                <input type="text" class="input-field6" value="<?php echo $I; ?>" placeholder = "Address" name="address" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> BIRTHDATE: </p>
                <input type="text" class="input-field3" value="<?php echo $F; ?>" placeholder = "Birthday" name="bdate" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> AGE: </p>
                <input type="text" class="input-field4" value="<?php echo $G; ?>" placeholder = "Age" name="age" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> SEX: </p>
                <input type="text" class="input-field4" value="<?php echo $H; ?>" placeholder = "Sex" name="sex" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> CONTACT NUMBER: </p>
                <input type="text" class="input-field7" value="<?php echo $J; ?>" placeholder = "Contact Number" name="cnum" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> EMAIL ADDRESS: </p>
                <input type="text" class="input-field8" value="<?php echo $K; ?>" placeholder = "Email Address" name="email" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> STUDENT NUMBER: </p>
                <input type="text" class="input-field7" value="<?php echo $L; ?>" placeholder = "Student Number" name="snum" disabled>
            </div>

        </div>
        
        <div class="form-section"> 

            <h2> Educational Attainment </h2>

            <div class="form-input span-9">
                <p class="form-label"> DEGREE COMPLETED IN THE UNIVERSITY: </p>
                <input type="text" class="input-field7" value="<?php echo $O1; ?>" placeholder = "Degree" name="snum" disabled>
            </div>

            <div class="form-input span-3">
                <p class="form-label"> YEAR GRADUATED: </p>
                <input type="text" class="input-field7" value="<?php echo $P1; ?>" placeholder = "Year Graduated" name="snum" disabled>
            </div>

            <div class="form-input span-5">
                <p class="form-label"> MASTER'S DEGREE: </p>
                <input type ="text" class="input-field9" value="<?php echo $O2; ?>" placeholder = " " name="degree" disabled> 
            </div>

            <div class="form-input span-6">
                <p class="form-label"> UNIVERSITY: </p>
                <input type = "text" class="input-field10" value="<?php echo $Z2; ?>"  name="year" disabled>
            </div>

            <div class="form-input span-3">
                <p class="form-label"> INCLUSIVE YEARS: </p>
                <input type = "text" class="input-field10" value="<?php echo $P2; ?>"  name="year" disabled>
            </div>

            <div class="form-input span-5">
                <p class="form-label"> DOCTORAL DEGREE: </p>
                <input type ="text" class="input-field9" value="<?php echo $O3; ?>" placeholder = " " name="degree" disabled> 
            </div>

            <div class="form-input span-6">
                <p class="form-label"> UNIVERSITY: </p>
                <input type = "text" class="input-field10" value="<?php echo $Z3; ?>"  name="year" disabled>
            </div>

            <div class="form-input span-3">
                <p class="form-label"> INCLUSIVE YEARS: </p>
                <input type = "text" class="input-field10" value="<?php echo $P3; ?>"  name="year" disabled>
            </div>


        </div>

        <div class="form-section">

            <h2> Socio-Economic Status </h2>

            <div class="form-input">
                <p class="form-label"> CURRENT EMPLOYMENT: </p>
                <input type="text" class="input-field7" value="<?php echo $Q; ?>" placeholder = "Employment Status" name="empstatus" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> STATUS OF APPOINTMENT: </p>
                <input type="text" class="input-field7"  placeholder = "Status of Appointment" name="empstatus" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> COMPANY NAME: </p>
                <input type="text" class="input-field11" value="<?php echo $R; ?>" placeholder = "Company Name" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> EMPLOYMENT SITE: </p>
                <input type="text" class="input-field11" value="<?php echo $X; ?>" placeholder = "e.g. Pasig City" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION TITLE: </p>
                <input type="text" class="input-field11" value="<?php echo $S; ?>" placeholder = "Position Title" name="postitle" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> ASSUMPTION DATE IN THE CURRENT JOB: </p>
                <input type="text" class="input-field12" value="<?php echo $T; ?>" placeholder = "Assumption date in the current job" name="exp" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> MONTHLY INCOME RANGE: </p>
                <input type="text" class="input-field12" value="<?php echo $U; ?>" placeholder = "Monthly Income Range" name="income" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> TIME SPENT BEFORE LANDING ON YOUR FIRST JOB: </p>
                <input type="text" class="input-field12" value="<?php echo $W; ?>" placeholder = "Months" name="unemp" disabled>
            </div>

            <div class="form-input course-job">
                <p class="form-label2"> JOB ALIGNMENT TO YOUR CURRICULUM PROGRAM IN PLP: </p>
                <input type="text" class="input-field12" value="<?php echo $V; ?>" placeholder = "Course Job Alignment" name="align" disabled>
            </div>

        </div>

        <div class="form-section">

            <h2> Employment History </h2> 

            <h3> Previous Employment 1 </h3>

            <div class="form-input">
                <p class="form-label"> NAME OF THE EMPLOYER: </p>
                <input type="text" class="input-field15" placeholder = "Name of the Employer" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field16" placeholder = "Position Held" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> STATUS OF APPOINTMENT:  </p>
                <input type="text" class="input-field17" placeholder = "Status of appointment" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES:  </p>
                <input type="text" class="input-field17" placeholder = "e.g. 2017-2020" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> JOB ALIGNMENT TO YOUR CURRICULUM PROGRAM IN PLP:  </p>
                <input type="text" class="input-field17" placeholder = "Course Job Alignment" name="compname" disabled>
            </div>

            <h3> Membership In Organization </h3>

            <div class="form-input">
                <p class="form-label"> ORGRANIZATION NAME:  </p>
                <input type="text" class="input-field17" placeholder = "Organization Name" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field17" placeholder = "Position Held" name="compname" disabled>
            </div>
            
            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES:  </p>
                <input type="text" class="input-field17" placeholder = "e.g. 2017-2020" name="compname" disabled>
            </div>

            <h3> Recognition | Awards </h3>

            <div class="form-input">
                <p class="form-label"> TITLE OF RECOGNITION | AWARDS:  </p>
                <input type="text" class="input-field17" placeholder = "Recognition | Awards" name="compname" disabled>
            </div>
            
            <div class="form-input">
                <p class="form-label"> DATE GRANTED:  </p>
                <input type="text" class="input-field17" placeholder = "e.g. June 20, 2023" name="compname" disabled>
            </div>

            <br>
            <h2>  </h2> 

            <h3> Previous Employment 2 </h3>

            <div class="form-input">
                <p class="form-label"> NAME OF THE EMPLOYER: </p>
                <input type="text" class="input-field15" placeholder = "Name of the Employer" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field16" placeholder = "Position Held" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> STATUS OF APPOINTMENT:  </p>
                <input type="text" class="input-field17" placeholder = "Status of appointment" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES:  </p>
                <input type="text" class="input-field17" placeholder = "e.g. 2017-2020" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> JOB ALIGNMENT TO YOUR CURRICULUM PROGRAM IN PLP:  </p>
                <input type="text" class="input-field17" placeholder = "Course Job Alignment" name="compname" disabled>
            </div>

            <h3> Membership In Organization </h3>

            <div class="form-input">
                <p class="form-label"> ORGRANIZATION NAME:  </p>
                <input type="text" class="input-field17" placeholder = "Organization Name" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field17" placeholder = "Position Held" name="compname" disabled>
            </div>
            
            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES:  </p>
                <input type="text" class="input-field17" placeholder = "e.g. 2017-2020" name="compname" disabled>
            </div>

            <h3> Recognition | Awards </h3>

            <div class="form-input">
                <p class="form-label"> TITLE OF RECOGNITION | AWARDS:  </p>
                <input type="text" class="input-field17" placeholder = "Recognition | Awards" name="compname" disabled>
            </div>
            
            <div class="form-input">
                <p class="form-label"> DATE GRANTED:  </p>
                <input type="text" class="input-field17" placeholder = "e.g. June 20, 2023" name="compname" disabled>
            </div>

            <br>
            <h2>  </h2> 

            <h3> Previous Employment 3 </h3>

            <div class="form-input">
                <p class="form-label"> NAME OF THE EMPLOYER: </p>
                <input type="text" class="input-field15" placeholder = "Name of the Employer" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field16" placeholder = "Position Held" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> STATUS OF APPOINTMENT:  </p>
                <input type="text" class="input-field17" placeholder = "Status of appointment" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES:  </p>
                <input type="text" class="input-field17" placeholder = "e.g. 2017-2020" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> JOB ALIGNMENT TO YOUR CURRICULUM PROGRAM IN PLP:  </p>
                <input type="text" class="input-field17" placeholder = "Course Job Alignment" name="compname" disabled>
            </div>

            <h3> Membership In Organization </h3>

            <div class="form-input">
                <p class="form-label"> ORGRANIZATION NAME:  </p>
                <input type="text" class="input-field17" placeholder = "Organization Name" name="compname" disabled>
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field17" placeholder = "Position Held" name="compname" disabled>
            </div>
            
            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES:  </p>
                <input type="text" class="input-field17" placeholder = "e.g. 2017-2020" name="compname" disabled>
            </div>

            <h3> Recognition | Awards </h3>

            <div class="form-input">
                <p class="form-label"> TITLE OF RECOGNITION | AWARDS:  </p>
                <input type="text" class="input-field17" placeholder = "Recognition | Awards" name="compname" disabled>
            </div>
            
            <div class="form-input">
                <p class="form-label"> DATE GRANTED:  </p>
                <input type="text" class="input-field17" placeholder = "e.g. June 20, 2023" name="compname" disabled>
            </div>

    </div>
    <div class="overlay" id="dialog-container">
            <div class="popup">
              <p class="message">Are you sure do you want to logout?</p>
              <div class="text-right">
                <button class="dialog-btn btn-cancel" id="cancel">CANCEL</button>
                <button type="submit" class="dialog-btn btn-primary" id="confirm">LOGOUT</button>
              </div>
            </div>
    </div>
</main>

<script src="Javascript/logout-admin.js"></script>
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
