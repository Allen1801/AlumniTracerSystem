<?php 
    include_once 'Includes/dbconnector.php';
    include_once 'Includes/admin/getId.php';

    $total = "SELECT * FROM reviews";
    if ($totalcount = mysqli_query($link, $total)){
        $count = mysqli_num_rows($totalcount);
    }

    $negative = "SELECT * FROM reviews WHERE status='Negative'";
    if ($negativecount = mysqli_query($link, $negative)){
        $negcount = mysqli_num_rows($negativecount);
    }
    for($o=0;$o<=$negcount;$o++){
        $negativetotal = $o;
    }

    $neutral = "SELECT * FROM reviews WHERE status='Neutral'";
    if ($neutralcount = mysqli_query($link, $neutral)){
        $neucount = mysqli_num_rows($neutralcount);
    }
    for($a=0;$a<=$negcount;$a++){
        $neutraltotal = $a;
    }

    $positive = "SELECT * FROM reviews WHERE status='Positive'";
    if ($positivecount = mysqli_query($link, $positive)){
        $poscount = mysqli_num_rows($positivecount);
    }
    for($b=0;$b<=$negcount;$b++){
        $positivetotal = $b;
    }

    if($count != 0){
    $pneg = $negcount / $count * 100;
    $pneu = $neucount / $count * 100;
    $ppos = $poscount / $count * 100;
    }else{
    $pneg = 0;
    $pnue = 0;
    $ppos = 0;
    }

?>

<!DOCTYPE html>
<html>
<title> Admin | Dashboard | PLPATS </title>

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel = "icon" href="Images/Logo.ico">
    <link rel="stylesheet" href="CSS/global.css"/> 
    <link rel="stylesheet" href="CSS/sidebar-style.css"/> 
    <link rel="stylesheet" href="CSS/admin-dashboard.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div id="sidebar-div"> <?php include("admin-sidebar.php"); ?> </div>

<main>

    <div class="colleges">
        <h2> Sentiment Analysis </h2>
        <p class="colleges-active"> Total Reviews : <?php echo "$count"; ?> </p>

        <div class="colleges-div">
                <div class="container">
                <p style="text-align:center;"> NEGATIVE </p>
                    <a href="negative-reviews.php">
                        <img src="Images/negative.png" class="cont-logo"> 
                        <p class="cont-label" style="font-size: 45px;"><?php echo round($pneg) ?>%</p>
                    </a>
                </div>  

                <div class="container">
                <p style="text-align:center;"> NEUTRAL </p>
                    <a href="neutral-reviews.php">
                        <img src="Images/neutral.png" class="cont-logo"> 
                        <p class="cont-label" style="font-size: 45px;"><?php echo round($pneu) ?>%</p>
                    </a>
                </div>  

                <div class="container">
                <p style="text-align:center;"> POSITIVE </p>
                    <a href="positive-reviews.php">
                        <img src="Images/positive.png" class="cont-logo"> 
                        <p class="cont-label" style="font-size: 45px;"><?php echo round($ppos) ?>%</p>
                    </a>
                </div>
        </div>
    </div>

    <div class="overview">
        <h2> REVIEWS </h2>
        <hr>
        <?php
        $result = mysqli_query($link, "select * from reviews order by id desc LIMIT 3");
        while($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $review = $row['review'];
        echo "<p style='font-size: 17px; font-weight:bold; margin-bottom: -20px;'>" .$name. "</p>
        <p>" .$review. "</p>
        <hr>";
        }
        ?>  
    </div>
</main>

<script src="Javascript/logout-admin.js"></script>
<script src="Javascript/sidebar-toggle.js" type="text/javascript"> </script>
<script src="Javascript/time-date.js" type="text/javascript"> </script>
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