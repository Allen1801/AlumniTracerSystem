<?php

$sql = mysqli_query($link, "select * from logs where action = 'Updated Their Account' order by id DESC LIMIT 1");
$row = mysqli_fetch_array($sql);

if(isset($_POST['report'])){
    
    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Generated unemployment period data')";
    
    mysqli_query($link, $sqllogs);
}

?>

<div class="BSP">

    <hr class="divider">    
    <p class="form-label" style="margin-top: 15px; font-size: 15px; font-weight:bold; text-align: right; color:red;">*Last Update: <?php echo $row['date'] ?></p>
    <p class="course-label"><?php echo $course ?></p>

    <div class="canvas-container" id="reportPage">
    
        <div class="canvas-div-one"> 
            <canvas id="myChart2017-unemp"> </canvas>

            <div class="legend-two">
                <p class="label-one">After Grad/Absorbed - <?php echo round($pmonth0) ?>%</p>
                <p class="label-two">6 months - 1 year - <?php echo round($pmonth1) ?>%</p>

            </div>  

            <div class="legend-two">
                <p class="label-one">Less than 3 months  - <?php echo round($pmonth2) ?>%</p>
                <p class="label-two">1 year - Less than 2 years- <?php echo round($pmonth3) ?>%</p>
            </div>  

            <div class="legend-two">
                <p class="label-one">3 months - Less than 6 months - <?php echo round($pmonth4) ?>%</p>
                <p class="label-two">2 years above - <?php echo round($pmonth5) ?>%</p>
            </div>   
        </div>
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

var label = 
["Period of Unemployment",
"",
"After Grad/Absorbed", 
"Less than 3 months", 
"3 months - Less than 6 months", 
"6 months - 1 year", 
"1 year - Less than 2 years", 
"2 years above"];

var percentage =  
["Equivalent Percentage",
"",
"<?php echo round($pmonth0) ?>%", 
"<?php echo round($pmonth1) ?>%", 
"<?php echo round($pmonth2) ?>%", 
"<?php echo round($pmonth3) ?>%", 
"<?php echo round($pmonth4) ?>%", 
"<?php echo round($pmonth5) ?>%"];

var quantity =  
["Number of Alumni",
"",
"<?php echo $month0 ?>", 
"<?php echo $month1 ?>", 
"<?php echo $month2 ?>", 
"<?php echo $month3 ?>", 
"<?php echo $month4 ?>", 
"<?php echo $month5 ?>",];

    var cValues = ["After Grad/Absorbed", "Less than 3 months", "3 months - Less than 6 months", "6 months - 1 year", "1 year - Less than 2 years", "2 years above",];
    var dValues2017 = [<?php echo $month0  ?>, <?php echo $month1  ?>, <?php echo $month2  ?>, <?php echo $month3  ?>, <?php echo $month4  ?>, <?php echo $month5  ?>,50, 0];
    var barColors = ["GREEN", "YELLOW", "GREEN", "YELLOW", "GREEN", "YELLOW"];

    new Chart("myChart2017-unemp", {
    type: "horizontalBar",
    data: {
    labels: cValues,
    datasets: [{
    backgroundColor: barColors,
    data: dValues2017
    }]
    },
    options: {
    legend: {display: false},
    title: {
    display: true,
    text: "Duration of Unemployment After Graduation <?php echo $year ?> | <?php echo $course ?>"
    }
    }
    });

    $('#report').click(function(event) {
        // get size of report page
        // var reportPageHeight = $('#reportPage').innerHeight();
        // var reportPageWidth = $('#reportPage').innerWidth();
        var reportPageHeight = 1035;
        var reportPageWidth = 2200;
  
        // create a new canvas object that we will populate with all other canvas objects
        var pdfCanvas = $('<canvas />').attr({
        id: "canvaspdf",
        width: reportPageWidth,
        height: reportPageHeight
    });
  
        // keep track canvas position
        var pdfctx = $(pdfCanvas)[0].getContext('2d');
        var pdfctxX = 0;
        var pdfctxY = 0;
        var buffer = 100;
  
        // for each chart.js chart
        $("canvas").each(function(index) {
        // get the chart height/width
        // var canvasHeight = $(this).innerHeight();
        // var canvasWidth = $(this).innerWidth();

        var canvasHeight = 800;
        var canvasWidth = 1200;
    
        // draw the chart into the new canvas
        pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
        pdfctxX += canvasWidth + buffer;
    
        // our report page is in a grid pattern so replicate that in the new canvas
        if (index % 2 === 1) {
        pdfctxX = 0;
        pdfctxY += canvasHeight + buffer;
        }
    });
        let now = new Date();
        let day = now.getDate().toString().padStart(2, '0'); // Add leading zero if necessary
        let month = (now.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-indexed
        let year = now.getFullYear();
        let hours = now.getHours().toString().padStart(2, '0');
        let minutes = now.getMinutes().toString().padStart(2, '0');
        let seconds = now.getSeconds().toString().padStart(2, '0');
        let formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        // create new pdf and add our new canvas as an image
        var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
        pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
        pdf.setFontSize(20);
        pdf.text(100, 650, label);
        pdf.text(650, 650, percentage);
        pdf.text(450, 650, quantity);
  
        pdf.text(50, 890, 'Generated By: <?php echo $A  ?>');
        pdf.text(50, 930, 'Date Generated: ' + formattedDate );
        
        // download the pdf
        pdf.save('Generated unemployment report.pdf');
    });


</script>
