<?php 

session_start();


$id = $_SESSION['id'];

    if(!isset($_SESSION['id'])){
    header("location:index.php");
    }


//SQL query to call the data from the database
$sqlget = "SELECT * FROM educ WHERE id=$id";
$sqlemp = "SELECT * FROM employment WHERE id=$id";
$sqlhistoryemp1 = "SELECT * FROM historyemp1 WHERE id=$id";
$sqlhistoryemp2 = "SELECT * FROM historyemp2 WHERE id=$id";
$sqlhistoryemp3 = "SELECT * FROM historyemp3 WHERE id=$id";

    if($educresult = mysqli_query($link, $sqlget))
{
    //Getting data from the educ table
    $row = mysqli_fetch_array($educresult);
    $O1 = $row['degree1'];
    $O2 = $row['degree2'];
    $O3 = $row['degree3'];
    $P1 = $row['years1'];
    $P2 = $row['years2'];
    $P3 = $row['years3'];
    $Z1 = $row['univ1'];
    $Z2 = $row['univ2'];
    $Z3 = $row['univ3'];

    //Getting data in the employment Table
    $empresult = mysqli_query($link, $sqlemp);
    $row = mysqli_fetch_array($empresult);

    $Q = $row['empstatus'];
    $R = $row['cname'];
    $S = $row['pos'];
    $T = $row['exp'];
    $U = $row['income'];
    $V = $row['align'];
    $W = $row['unemp'];
    $Y = $row['appoint'];
    $X = $row['city'];

    //Getting Data in the historyemp1 table
    $historyresult1 = mysqli_query($link, $sqlhistoryemp1);
    $row = mysqli_fetch_array($historyresult1);

    $comp1 = $row['comp1'];
    $position1 = $row['pos1'];
    $appointment1 = $row['appoint1'];
    $compdate1 = $row['years1'];
    $align1 = $row['align1'];
    $org1 = $row['org1'];
    $orgpos1 = $row['orgpos1'];
    $orgdate1 = $row['orgyear1'];
    $awards1 = $row['awards1'];
    $awarddate1 = $row['awardsyear1'];

    //Getting Data in the historyemp2 table
    $historyresult2 = mysqli_query($link, $sqlhistoryemp2);
    $row = mysqli_fetch_array($historyresult2);

    $comp2 = $row['comp2'];
    $position2 = $row['pos2'];
    $appointment2 = $row['appoint2'];
    $compdate2 = $row['years2'];
    $align2 = $row['align2'];
    $org2 = $row['org2'];
    $orgpos2 = $row['orgpos2'];
    $orgdate2 = $row['orgyear2'];
    $awards2 = $row['awards2'];
    $awarddate2 = $row['awardsyear2'];

    //Getting Data in the historyemp3 table
    $historyresult3 = mysqli_query($link, $sqlhistoryemp3);
    $row = mysqli_fetch_array($historyresult3);

    $comp3 = $row['comp3'];
    $position3 = $row['pos3'];
    $appointment3 = $row['appoint3'];
    $compdate3 = $row['years3'];
    $align3 = $row['align3'];
    $org3 = $row['org3'];
    $orgpos3 = $row['orgpos3'];
    $orgdate3 = $row['orgyear3'];
    $awards3 = $row['awards3'];
    $awarddate3 = $row['awardsyear3'];
}

?>