<?php

include_once 'Includes/dbconnector.php';
include_once 'Includes/select-user-profile.php';

$sql = "SELECT * FROM aluminfo WHERE id=$id";

$imgresult = mysqli_query($link, $sql);

?>

<nav class="sidebar">   
    
    <img src="Images/PLPALUM-LOGO.png" alt="Business Icon" class="logo" id="sidebar-logo" style="width:100px; height:100px; border-radius:0px;">

    <div class="actions"> 
        <a href="overview.php" class="icon"><i class="fa-solid fa-grip"></i><span>Dashboard</span></a>
        <a href="update-records.php" class="icon"><i class="fa-solid fa-user-plus"></i><span>Records</span></a>
        <a href="contacts-us.php" class="icon"><i class="fa-solid fa-list-ul"></i><span>Contact Us</span></a>
    </div>

    <div class="profile">
    <?php
    if
     ($imgresult->num_rows > 0) {
        while ($row = $imgresult->fetch_assoc()) {
            $photo_path = $row['photo'];
            echo "<a href='#editprofile-modal' id='btn-show-editprofile'>";
            echo "
                <img src='$photo_path' alt='Photo'><br><br> 
            ";
    
        }
} else {
    echo "No photos found.";
}

    ?>

        <p style="margin-top: -30px;"> <?php echo $A . ", " . $B . " " . $D; ?> </p> </a>
        <p class="batch" style="margin-top:-5px;"> Batch <?php echo $P1; ?> </p>
        <a href="#dialog-container" id="btn-show-dialog" class="icon"><i class="fa-solid fa-right-from-bracket"></i><span style="margin-left: 10px; text-align: center;">Logout</span></a>
    </div>

</nav>

<div id="responsive-navbar">
    <img alt="logo" src="Images/logo-bg.png">
    <a  class="burger-icon"><i class="fas fa-bars"></i></a>
</div>


<div class="edit-overlay" id="editprofile-modal">
    <div class="edit-popup-content">


        <input type="hidden" value="<?php echo $id; ?>" name="hidden_id" id="hidden_id">
            <div id="popup-header">
                <h2> Edit Profile</h2>
                <button class="dialog-btn btn-cancel" id="exit-edit">x</button>
            </div>
        <form method="POST" action="profileUpdate.php" id="edit-popup-form" enctype="multipart/form-data">

            <div id="popup-img-section"> 
                <img src="<?php echo $photo_path ?>" alt="Business Icon" class="logo" id="preview">
                <p class="img-section-header"> UPLOAD PHOTO </p>
                <p> (Note: Use only 2x2 inches picture format) </p>
                <input type="file" id="file-btn" class="input-field7" name="photo" accept="image/*" onchange="previewImage(event)" hidden>
                <label for="file-btn" class="upload-btn" style="background-color: #FFAE42; border-radius: 5px; font-size: 14px;">Upload Image</label>
                <div id="editprofile-submit"> 
                <button type="submit" name="submit-image"> Save Image </button>
                </div>
            </div>
            
            <input type="hidden" value="<?php echo $id; ?>" name="hidden_id" id="hidden_id">
            <div id="popup-input-section">
                <div class="form-input">
                    <p class="form-label"> LAST NAME: </p>
                    <input type="text" class="input-field" value="<?php echo $A; ?>" placeholder = "Last Name" name="lname">
                </div>

                <div class="form-input">
                    <p class="form-label"> FIRST NAME: </p>
                    <input type="text" class="input-field" value="<?php echo $B; ?>" placeholder = "First Name" name="fname">
                </div>

                <div class="form-input">
                    <p class="form-label"> MIDDLE NAME: </p>
                    <input type="text" class="input-field"value="<?php echo $C; ?>" placeholder = "Middle Name" name="mname">
                </div>

                <div class="form-input">
                    <p class="form-label"> SUFFIX: </p>
                    <input type="text" class="input-field1" value="<?php echo $D; ?>" placeholder = "Suffix" name="sname">
                </div>

                <div class="form-input span-12">
                    <p class="form-label1"> MAIDEN NAME: </p>
                    <p class="instruction"> <i> For <b> FEMALE Alumni </b>, if married type your <b> MAIDEN NAME </b>. </i> </p>
                    <input type="text" class="input-field2" value="<?php echo $E; ?>" placeholder = "Full Name" name="fullname">
                </div>

                <div class="form-input span-12">
                    <p class="form-label"> ADDRESS: </p>
                    <input type="text" class="input-field6" placeholder = "Address" value="<?php echo $I; ?>" name="address">
                </div>

                <div class="form-input">
                    <p class="form-label"> BIRTHDATE: </p>
                    <input type="date" class="input-field3" name="bdate"  value="<?php echo $F; ?>">
                </div>

                <div class="form-input">
                    <p class="form-label"> AGE: </p>
                    <input type="text" class="input-field4" placeholder = "Age" value="<?php echo $G; ?>" name="age">
                </div>

                <div class="form-input">
                    <p class="form-label"> SEX: </p>
                    <select name="sex">
                    <option value="<?php echo $H; ?>" selected><?php echo $H; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-input">
                    <p class="form-label"> CONTACT NUMBER: </p>
                    <input type="text" class="input-field7" placeholder = "Contact Number" value="<?php echo $J; ?>" name="cnum">
                </div>

                <div class="form-input">
                    <p class="form-label"> EMAIL ADDRESS: </p>
                    <input type="text" class="input-field8" value="<?php echo $K; ?>" placeholder = "Email Address" name="email">
                </div>

                <div class="form-input">
                    <p class="form-label"> STUDENT NUMBER: </p>
                    <input type="text" class="input-field7" value="<?php echo $L; ?>" placeholder = "Student Number" name="snum">
                </div>

                <div class="form-input">
                    <p class="form-label"> USERNAME: </p>
                    <input type="text" class="input-field7" value="<?php echo $uname; ?>" placeholder = "Username" name="uname">
                </div>
                
                <div class="form-input">
                    <p class="form-label"> NEW PASSWORD: </p>
                    <a href="update-pass.php"><button type="button" name="submit-info"  style=" padding:10px 15px; width:150px; background-color:#FFAE42; color: white; margin-top:10px;"> CHANGE </button> </a>
                </div>
            </div>

            <div id="editprofile-submit"> 
                <button type="submit" name="submit-info"> SAVE PROFILE </button>  
            </div>
         </form>
    </div>
</div>

<!-- Sentiment -->
<div class="overlay" id="dialog-container-review">
        <div class="popup">
            <p class="message">Tell us about your Experience</p>
            <form action="review.php" method="POST">
                <textarea name="getsentiment" class="txt-review"placeholder="Write a review for Pamantasan ng Lungsod ng Pasig Alumni Tracer System..."></textarea>
              <div class="text-right">
              <button type="submit" class="dialog-btn btn-cancel"name="cancel-review" id="cancel-review">NOT NOW</button>
                <button type="submit" name="submit-review" class="dialog-btn btn-primary" id="confirm-review">SUBMIT</button>
              </div>
              </form>
        </div>
</div>

<!-- LOGOUT -->
<div class="overlay1" id="dialog-container">
            <div class="popup1">
              <p class="message1">Are you sure do you want to logout?</p>
              <div class="text-right">
                <button class="dialog-btn1 btn-cancel" id="cancel">CANCEL</button>
                <button type="submit" name="submit-logout" class="dialog-btn btn-primary" id="confirm">LOGOUT</button>
              </div>
            </div>
    </div>

<script type="text/javascript">
      function previewImage(event) {
         var input = event.target;
         var image = document.getElementById('preview');
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               image.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
         }
      }
   </script>