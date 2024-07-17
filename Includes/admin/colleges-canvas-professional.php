<?php
    //include 'Includes/dbconnector.php';
    //include 'Includes/admin/getId.php';

$sql = mysqli_query($link, "select * from logs where action = 'Updated Their Account' order by id DESC LIMIT 1");
$row = mysqli_fetch_array($sql);

if(isset($_POST['report'])){
    
    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Genarated employment rate data')";
    
    mysqli_query($link, $sqllogs);
}

?>

<div class="BSP">
    
    <hr class="divider">    
    <p class="form-label" style="margin-top: 15px; font-size: 15px; font-weight:bold; text-align: right; color:red;">*Last Update: <?php echo $row['date'] ?></p>
    <p class="course-label"><?php echo $course ?></p>

    <div class="canvas-container" id="reportPage">

        <div class="canvas-div"> 
            <canvas id="myChart2017"> </canvas>

            <div class="legend">
                <p class="label-one">Employed - <?php echo round($pemp) ?>%</p>
                <p class="label-two">Unemployed - <?php echo round($punemp) ?>%</p>
            </div>  
        </div>

        <div class="canvas-div"> 
            <canvas id="myChart2017-align"> </canvas>

            <div class="legend">
                <p class="label-one">Aligned - <?php echo round($palign) ?>%</p>
                <p class="label-two">Not Aligned - <?php echo round($punalign) ?>%</p>
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

var label1 = 
["Employment Status",
"",
"Employed",
"Unemployed"];

var label2 = 
["Job Alignment",
"",
"Aligned",
"Unaligned"];

var percentage1 = ["Equivalent Percentage", " ", "<?php echo round($pemp) ?>%", "<?php echo round($punemp) ?>%"];

var percentage2 = ["Equivalent Percentage", " ", "<?php echo round($palign) ?>%", "<?php echo round($punalign) ?>%"];

var quantity1 = ["Number of Alumni", " ", "<?php echo $emp ?>", "<?php echo $unemp ?>"];

var quantity2 = ["Number of Alumni", " ", "<?php echo $align ?>", "<?php echo $unalign ?>"];

    var xValues = ["EMPLOYED", "UNEMPLOYED"];
    var yValues2017 = [<?php echo $emp  ?>, <?php echo $unemp?>, 50, 0];
    var barColors = ["GREEN", "YELLOW"];

    var aValues = ["ALIGNED", "NOT ALIGNED"];
    var bValues2017 = [<?php echo $align  ?>, <?php echo $unalign ?>,50, 0];
    var barColors = ["GREEN", "YELLOW"];

    new Chart("myChart2017", {
    type: "bar",
    data: {
    labels: xValues,
    datasets: [{
    backgroundColor: barColors,
    data: yValues2017
    }]
    },
    options: {
    legend: {display: false},
    title: {
    display: true,
    text: "Alumni Employment Status <?php echo $year ?> | <?php echo $course ?>"
    }
    }
    });

    new Chart("myChart2017-align", {
    type: "bar",
    data: {
    labels: aValues,
    datasets: [{
    backgroundColor: barColors,
    data: bValues2017
    }]
    },
    options: {
    legend: {display: false},
    title: {
    display: true,
    text: "Job Alignment to Bachelor's Degree <?php echo $year ?> | <?php echo $course ?>"
    }
    }
    });
    $('#report').click(function(event) {
        // get size of report page
        // var reportPageHeight = $('#reportPage').innerHeight();
        // var reportPageWidth = $('#reportPage').innerWidth();
        var reportPageHeight = 980;
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

        var canvasHeight = 600;
        var canvasWidth = 1000;
    
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
        pdf.text(50, 500, label1);
        pdf.setFontSize(20);
        pdf.text(875, 500, label2);
        pdf.text(500, 500, percentage1);
        pdf.text(1345, 500, percentage2);
        pdf.text(260, 500, quantity1);
        pdf.text(1075, 500, quantity2);

        pdf.text(50, 890, 'Generated By: <?php echo $A  ?>');
        pdf.text(50, 930, 'Date Generated: ' + formattedDate );
  
        // download the pdf
        pdf.save('Generated professional report.pdf');
    });


</script>