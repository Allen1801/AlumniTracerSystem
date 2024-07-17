<?php

include_once 'Includes/dbconnector.php';
include_once 'Includes/select-user-id.php';
include_once 'Includes/select-user-profile.php';
include_once 'Includes/session-expire.php';

?>

<!DOCTYPE html>
<html>
<title> Alumni | Update Records | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/update-record.css"/> 
    <link rel="stylesheet" href="CSS/index-slider.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-user.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="sidebar-div"> <?php include("user-sidebar.php"); ?> </div>


    <main>
    <h1> Update Records </h1> 

    <div class="form-container"> 

        <form class= "infos" action = "userInsert.php" method = "POST">
        
        <div class="form-section"> 
        <!-- <input type="hidden" value="<?php echo $id; ?>" name="hidden_id" id="hidden"> -->

            <h2> Educational Attainment </h2>

            <div class="form-input span-9">
                <p class="form-label"> DEGREE COMPLETED IN THE UNIVERSITY: </p>
                <input type ="text" class="input-field9" value="<?php echo $O1; ?>" placeholder = " " name="degree1" readonly> 
            </div>

            <div class="form-input span-3">
                <p class="form-label"> YEAR GRADUATED: </p>
                <input type = "text" class="input-field10" value="<?php echo $P1; ?>"  name="year1" readonly>
            </div>

            <div class="form-input span-5">
                <p class="form-label"> MASTER'S DEGREE: </p>
                <input type ="text" class="input-field9" value="<?php echo $O2; ?>" placeholder = " " name="degree2"> 
            </div>

            <div class="form-input span-6">
                <p class="form-label"> UNIVERSITY: </p>
                <input type = "text" class="input-field10" value="<?php echo $Z2; ?>"  name="univ2">
            </div>

            <div class="form-input span-3">
                <p class="form-label"> INCLUSIVE YEARS: </p>
                <input type = "text" class="input-field10" value="<?php echo $P2; ?>"  name="year2">
            </div>

            <div class="form-input span-5">
                <p class="form-label"> DOCTORAL DEGREE: </p>
                <input type ="text" class="input-field9" value="<?php echo $O3; ?>" placeholder = " " name="degree3"> 
            </div>

            <div class="form-input span-6">
                <p class="form-label"> UNIVERSITY: </p>
                <input type = "text" class="input-field10" value="<?php echo $Z3; ?>"  name="univ3">
            </div>

            <div class="form-input span-3">
                <p class="form-label"> INCLUSIVE YEARS: </p>
                <input type = "text" class="input-field10" value="<?php echo $P3; ?>"  name="year3">
            </div>


        </div>

        <div class="form-section">

            <h2> Socio-Economic Status </h2>

            <div class="form-input">
                <h3> Current Employment </h3>
                <select name="emp">
                    <option value="<?php echo $Q; ?>"><?php echo $Q; ?></option>
                    <option value="Employed">Employed</option>
                    <option value="Self-Employed">Self-Employed</option>
                    <option value="Business Owner">Business Owner</option>
                    <option value="Homemaker (Househusband / Housewife)">Homemaker (Househusband / Housewife)</option>
                    <option value="Unemployed">Unemployed</option>
            </select> 
            </div>

            <div class="form-input">
                <h3> Status of Appointment </h3>
                <select name="appointment">
                    <option value="<?php echo $Y; ?>"> <?php echo $Y; ?></option>
                    <option value="Casual">Casual</option>  
                    <option value="Regular">Regular</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Job Order">Job Order</option>
                </select> 
            </div>

            <h3> For Employed Alumni </h3>

            <div class="form-input">
                <p class="form-label"> COMPANY NAME: </p>
                <input type="text" value="<?php echo $R; ?>" class="input-field11" placeholder = "Company Name" name="cname">
            </div>

            <div class="form-input">
                <p class="form-label"> EMPLOYMENT SITE: </p>
                <select name="cityadd">
                    <option value="<?php echo $X; ?>" selected><?php echo $X; ?></option>
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
                <p class="form-label"> POSITION TITLE: </p>
                <input type="text" class="input-field11" placeholder = "Position Title" value="<?php echo $S; ?>" name="postitle">
            </div>

            <div class="form-input">
                <p class="form-label"> ASSUMPTION DATE IN THE CURRENT JOB: </p>
                <input type="text" class="input-field12" placeholder = "Assumption date in the current job" value="<?php echo $T; ?>" name="exp">
            </div>

            <div class="form-input">
                <p class="form-label"> MONTHLY INCOME RANGE: </p>
                <select class="input-field13" name="income">
                    <option value="<?php echo $U; ?>"> <?php echo $U; ?> </option>
                    <option value="Below Php 10,000">Below Php 10,000</option>
                    <option value="Php 10,000 to Php 20,000">Php 10,000 to Php 20,000</option>
                    <option value="Php 21,000 to Php 30,000">Php 21,000 to Php 30,000</option>
                    <option value="Php 31,000 to Php 40,000">Php 31,000 to Php 40,000</option>
                    <option value="Php 41,000 to Php 50,000">Php 41,000 to Php 50,000</option>
                    <option value="Php 51,000 to Php 60,000">Php 51,000 to Php 60,000</option>
                    <option value="Php 61,000 to Php 70,000">Php 61,000 to Php 70,000</option>
                    <option value="Php 71,000 to Php 80,000">Php 71,000 to Php 80,000</option>
                    <option value="Php 81,000 to Php 90,000">Php 81,000 to Php 90,000</option>
                    <option value="Php 91,000 to Php 100,000">Php 91,000 to Php 100,000</option>
                    <option value="Php 101,000 and above">Php 101,000 and above</option>
                </select>
            </div>

            <div class="form-input">
                <p class="form-label"> TIME SPENT BEFORE LANDING ON YOUR FIRST JOB: </p>
                <select class="input-field14"  name="aftergrad">
                    <option value=" <?php echo $W; ?> "> <?php echo $W; ?> </option>
                    <option value="Absorbed">Employed even before the Graduation / Absorbed by the OJT Company </option>
                    <option value="Less than 3 months">Less than 3 months</option>
                    <option value="3 months - Less than 6 months">3 months - Less than 6 months </option>
                    <option value="6 months - 1 year">6 months - 1 year</option>
                    <option value="1 year - Less than 2 years">1 year - Less than 2 years</option>
                    <option value="2 years above">2 years above</option>
                </select>
            </div>

            <div class="form-input course-job">
                <p class="form-label2"> JOB ALIGNMENT TO YOUR CURRICULUM PROGRAM IN PLP : </p>
                <p class="instruction1"> <i> Is your job aligned with your course?</i> </p>
                <select name="align">
                    <option value="<?php echo $V; ?>"><?php echo $V; ?></option>
                    <option value="Aligned">Aligned</option>
                    <option value="Not Aligned">Not Aligned</option>
                </select> 
            </div>

        </div>

        <div class="form-section">

            <h2> Employment History </h2> 

            <h3> Previous Employment 1 </h3>

            <div class="form-input">
                <p class="form-label"> NAME OF THE EMPLOYER: </p>
                <input type="text" class="input-field15" value="<?php echo $comp1 ?>" placeholder = "Name of the Employer" name="compname1">
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field16" value="<?php echo $position1 ?>"  placeholder = "Position Held" name="comppos1">
            </div>

            <div class="form-input">
                <p class="form-label"> STATUS OF APPOINTMENT:  </p>
                <select name="appoint1">
                    <option value="<?php echo $appointment1 ?>"> <?php echo $appointment1 ?> </option>
                    <option value="Casual">Casual</option>
                    <option value="Regular">Regular</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Job Order">Job Order</option>
                </select> 
            </div>

            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES:  </p>
                <input type="text" class="input-field17" value="<?php echo $compdate1 ?>" placeholder = "e.g. 2017-2020" name="compdate1">
            </div>

            <div class="form-input course-job">
                <p class="form-label2"> JOB ALIGNMENT TO YOUR CURRICULUM PROGRAM IN PLP : </p>
                <p class="instruction1"> <i> Is your job aligned with your course?</i> </p>
                <select name="align1">
                    <option value="<?php echo $align1 ?>"><?php echo $align1 ?></option>
                    <option value="Aligned">Aligned</option>
                    <option value="Not Aligned">Not Aligned</option>
                </select> 
            </div>

            <h3> Membership in Organization </h3>

            <div class="form-input">
                <p class="form-label"> ORGANIZATION NAME: </p>
                <input type="text" class="input-field15" value="<?php echo $org1 ?>" placeholder = "Organization Name" name="orgname1">
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field16" value="<?php echo $orgpos1 ?>" placeholder = "Position Held" name="orgpos1">
            </div>

            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES :  </p>
                <input type="text" class="input-field17" value="<?php echo $orgdate1 ?>" placeholder = "e.g. 2017-2020" name="orgdate1">
            </div>

            <h3> Recognition | Awards: </h3>

            <div class="form-input">
                <p class="form-label"> Title of Recognition | Awards:  </p>
                <select name="awards1">
                    <option value="<?php echo $awards1; ?>"> <?php echo $awards1; ?> </option>
                    <option value="Casual">Best Employee of the month</option>
                    <option value="Casual">Regular</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Business Owner">Job Order</option>
                </select> 
            </div>

            <div class="form-input">
                <p class="form-label"> DATE GRANTED:  </p>
                <input type="text" class="input-field17" value="<?php echo $awarddate1 ?>" placeholder = "e.g. June 20, 2023" name="awarddate1">
            </div>

            <br>
            <h2>  </h2> 
        
            <h3> Previous Employment 2 </h3>

            <div class="form-input">
                <p class="form-label"> NAME OF THE EMPLOYER: </p>
                <input type="text" class="input-field15" value="<?php echo $comp2 ?>" placeholder = "Name of the Employer" name="compname2">
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field16" value="<?php echo $position2 ?>"  placeholder = "Position Held" name="comppos2">
            </div>

            <div class="form-input">
                <p class="form-label"> STATUS OF APPOINTMENT:  </p>
                <select name="appoint2">
                    <option value="<?php echo $appointment2; ?>"> Status of appointment </option>
                    <option value="Casual">Casual</option>
                    <option value="Regular">Regular</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Job Order">Job Order</option>
                </select> 
            </div>

            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES:  </p>
                <input type="text" class="input-field17" value="<?php echo $compdate2 ?>" placeholder = "e.g. 2017-2020" name="compdate2">
            </div>

            <div class="form-input course-job">
                <p class="form-label2"> JOB ALIGNMENT TO YOUR CURRICULUM PROGRAM IN PLP : </p>
                <p class="instruction1"> <i> Is your job aligned with your course?</i> </p>
                <select name="align2">
                    <option value="<?php echo $align2; ?>">Course Job Alignment</option>
                    <option value="Aligned">Aligned</option>
                    <option value="Not Aligned">Not Aligned</option>
                </select> 
            </div>

            <h3> Membership in Organization </h3>

            <div class="form-input">
                <p class="form-label"> ORGANIZATION NAME: </p>
                <input type="text" class="input-field15" value="<?php echo $org2 ?>" placeholder = "Organization Name" name="orgname2">
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field16" value="<?php echo $orgpos2 ?>" placeholder = "Position Held" name="orgpos2">
            </div>

            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES :  </p>
                <input type="text" class="input-field17" value="<?php echo $orgdate2 ?>" placeholder = "e.g. 2017-2020" name="orgdate2">
            </div>

            <h3> Recognition | Awards: </h3>

            <div class="form-input">
                <p class="form-label"> Title of Recognition | Awards:  </p>
                <select name="awards2">
                    <option value="<?php echo $awards2; ?>"> Recognition | Awards </option>
                    <option value="Casual">Best Employee of the month</option>
                    <option value="Casual">Regular</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Business Owner">Job Order</option>
                </select> 
            </div>

            <div class="form-input">
                <p class="form-label"> DATE GRANTED:  </p>
                <input type="text" class="input-field17" value="<?php echo $awarddate2 ?>" placeholder = "e.g. June 20, 2023" name="awarddate2">
            </div>


            <br>
            <h2>  </h2> 

            <h3> Previous Employment 3 </h3>

            <div class="form-input">
                <p class="form-label"> NAME OF THE EMPLOYER: </p>
                <input type="text" class="input-field15" value="<?php echo $comp3 ?>" placeholder = "Name of the Employer" name="compname3">
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field16" value="<?php echo $position3 ?>"  placeholder = "Position Held" name="comppos3">
            </div>

            <div class="form-input">
                <p class="form-label"> STATUS OF APPOINTMENT:  </p>
                <select name="appoint3">
                    <option value="<?php echo $appointment3; ?>"> Status of appointment </option>
                    <option value="Casual">Casual</option>
                    <option value="Regular">Regular</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Job Order">Job Order</option>
                </select> 
            </div>

            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES:  </p>
                <input type="text" class="input-field17" value="<?php echo $compdate3 ?>" placeholder = "e.g. 2017-2020" name="compdate3">
            </div>

            <div class="form-input course-job">
                <p class="form-label2"> JOB ALIGNMENT TO YOUR CURRICULUM PROGRAM IN PLP : </p>
                <p class="instruction1"> <i> Is your job aligned with your course?</i> </p>
                <select name="align3">
                    <option value="<?php echo $align3; ?>">Course Job Alignment</option>
                    <option value="Aligned">Aligned</option>
                    <option value="Not Aligned">Not Aligned</option>
                </select> 
            </div>

            <h3> Membership in Organization </h3>

            <div class="form-input">
                <p class="form-label"> ORGANIZATION NAME: </p>
                <input type="text" class="input-field15" value="<?php echo $org3 ?>" placeholder = "Organization Name" name="orgname3">
            </div>

            <div class="form-input">
                <p class="form-label"> POSITION HELD:  </p>
                <input type="text" class="input-field16" value="<?php echo $orgpos3 ?>" placeholder = "Position Held" name="orgpos3">
            </div>

            <div class="form-input">
                <p class="form-label"> INCLUSIVE DATES :  </p>
                <input type="text" class="input-field17" value="<?php echo $orgdate3 ?>" placeholder = "e.g. 2017-2020" name="orgdate3">
            </div>

            <h3> Recognition | Awards: </h3>

            <div class="form-input">
                <p class="form-label"> Title of Recognition | Awards:  </p>
                <select name="awards3">
                    <option value="<?php echo $awards3; ?>"> Recognition | Awards </option>
                    <option value="Casual">Best Employee of the month</option>
                    <option value="Casual">Regular</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Business Owner">Job Order</option>
                </select> 
            </div>

            <div class="form-input">
                <p class="form-label"> DATE GRANTED:  </p>
                <input type="text" class="input-field17" value="<?php echo $awarddate3 ?>" placeholder = "e.g. June 20, 2023" name="awarddate3">
            </div>

        </div>

        <div class="agreement">
            <p> <i>
                In accordance with the RA 10173 otherwise known as “Data Privacy Act of 2012”, 
                all personal information shared will be rest assured to be treated with the utmost
                confidentiality and privacy. Hence, only authorized persons 
                shall be allowed to keep, handle, and extract any data or whatever information 
                gathered from this online record management system. Unauthorized 
                reproduction of this information or whatever analogous acts shall be dealt with 
                accordingly.
            </i> </p>

            <div class="agree">
                <input type="checkbox" name="agree" value="I Agree" required> 
                <span><i><b>
                    I certify that the above facts are true to the best of my knowledge and belief
                    and I understand that I subject myself to disciplinary action in the event 
                    that the above facts are found to be falsified.
                </b></i></span>
            </div>
        </div>
        <button type="submit" class="btn-form" id="btn"> SUBMIT </button>
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

<script src="Javascript/java-logout.js"></script>
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