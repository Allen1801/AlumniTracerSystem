<?php

include_once 'Includes/dbconnector.php';

    session_start();

    $id = $_SESSION['id'];

    //Input for educ Table
    $O2 = $_POST['degree2'];
    $O3 = $_POST['degree3'];
    $P2 = $_POST['year2'];
    $P3 = $_POST['year3'];
    $Z2 = $_POST['univ2'];
    $Z3 = $_POST['univ3'];

    //Input for employment table
    $Q = $_POST['emp'];
    $R = $_POST['cname'];
    $S = $_POST['postitle'];
    $T = $_POST['exp'];
    $U = $_POST['income'];
    $V = $_POST['align'];
    $W = $_POST['aftergrad'];
    $city = $_POST['cityadd'];
    $Y = $_POST['appointment'];
    $X = $_POST['agree'];

    //Input for historyemp1 table
    $comp1 = $_POST['compname1'];
    $position1 = $_POST['comppos1'];
    $appointment1 = $_POST['appoint1'];
    $compdate1 = $_POST['compdate1'];
    $align1 = $_POST['align1'];
    $org1 = $_POST['orgname1'];
    $orgpos1 = $_POST['orgpos1'];
    $orgdate1 = $_POST['orgdate1'];
    $awards1 = $_POST['awards1'];
    $awarddate1 = $_POST['awarddate1'];

    //Input for historyemp2 table
    $comp2 = $_POST['compname2'];
    $position2 = $_POST['comppos2'];
    $appointment2 = $_POST['appoint2'];
    $compdate2 = $_POST['compdate2'];
    $align2 = $_POST['align2'];
    $org2 = $_POST['orgname2'];
    $orgpos2 = $_POST['orgpos2'];
    $orgdate2 = $_POST['orgdate2'];
    $awards2 = $_POST['awards2'];
    $awarddate2 = $_POST['awarddate2'];

    //Input for historyemp3 table
    $comp3 = $_POST['compname3'];
    $position3 = $_POST['comppos3'];
    $appointment3 = $_POST['appoint3'];
    $compdate3 = $_POST['compdate3'];
    $align3 = $_POST['align3'];
    $org3 = $_POST['orgname3'];
    $orgpos3 = $_POST['orgpos3'];
    $orgdate3 = $_POST['orgdate3'];
    $awards3 = $_POST['awards3'];
    $awarddate3 = $_POST['awarddate3'];

    //SQL Query to enter data from form to their respective table
    $sqlupdate = "UPDATE educ SET degree2='$O2', univ2='$Z2', years2='$P2', degree3='$O3', univ3='$Z3', years3='$P3' WHERE id='$id'";
    $sqlempupdate = "UPDATE employment SET empstatus='$Q', cname='$R', city='$city', pos='$S', exp='$T', income='$U', align='$V', unemp='$W', appoint='$Y' WHERE id='$id'";
    $sqlhistory1 = "UPDATE historyemp1 SET comp1='$comp1', pos1='$position1', appoint1='$appointment1', years1='$compdate1', align1='$align1', org1='$org1', orgpos1='$orgpos1', orgyear1='$orgdate1', awards1='$awards1', awardsyear1='$awarddate1'  WHERE id='$id'";
    $sqlhistory2 = "UPDATE historyemp2 SET comp2='$comp2', pos2='$position2', appoint2='$appointment2', years2='$compdate2', align2='$align2', org2='$org2', orgpos2='$orgpos2', orgyear2='$orgdate2', awards2='$awards2', awardsyear2='$awarddate2'  WHERE id='$id'";
    $sqlhistory3 = "UPDATE historyemp3 SET comp3='$comp3', pos3='$position3', appoint3='$appointment3', years3='$compdate3', align3='$align3', org3='$org3', orgpos3='$orgpos3', orgyear3='$orgdate3', awards3='$awards3', awardsyear3='$awarddate3'  WHERE id='$id'";
    $sqlprivacy = "UPDATE aluminfo SET privacy='$X' WHERE id='$id'";

    if (mysqli_query($link, $sqlupdate)) {
        
        mysqli_query($link, $sqlprivacy);
        mysqli_query($link, $sqlempupdate);
        mysqli_query($link, $sqlhistory1);
        mysqli_query($link, $sqlhistory2);
        mysqli_query($link, $sqlhistory3);

        $sql = "SELECT * FROM aluminfo WHERE id=$id";
        if ($result = mysqli_query($link, $sql))
        {
            $row = mysqli_fetch_array($result);
            $A = $row['lname'];
            $B = $row['fname'];
            $C = $row['years'];
            $D = $row['suffix'];
            $E = $row['mini'];
        }

        $logssql = "INSERT INTO logs (name, date ,action) 
        VALUES ('$B $E $A $D', CURRENT_DATE ,'Updated Their Account')";
        if (mysqli_query($link, $logssql)) {
            echo "<script>alert('Account has been updated.');
            window.location= 'update-records.php';</script>";
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }

    }

    mysqli_close($link);

?>