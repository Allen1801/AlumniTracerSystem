<?php

$sql = mysqli_query($link, "select * from logs where action = 'Updated Their Account' order by id DESC LIMIT 1");
$row = mysqli_fetch_array($sql);

if(isset($_POST['report'])){
    
    $sqllogs = "INSERT INTO logs (name, date ,action) 
    VALUES ('$A', CURRENT_DATE ,'Generated geographical distribution data')";
    
    mysqli_query($link, $sqllogs);
}

?>

<div class="BSP">

    <hr class="divider">    
    <p class="form-label" style="margin-top: 15px; font-size: 15px; font-weight:bold; text-align: right; color:red;">*Last Update: <?php echo $row['date'] ?></p>
    <p class="course-label"><?php echo $course ?></p>

    <div class="canvas-container" id="reportPage">



        <div class="canvas-div-two"> 
            <canvas id="myChart2017-city"></canvas>

            <div class="legend-two">
                <p class="label-one">Region I - Ilocos Region - <?php echo round($pcity1) ?>%</p>
                <p class="label-two">Region IX - Zamboanga Peninsula - <?php echo round($pcity10) ?>%</p>
            </div>  

            <div class="legend-two">
                <p class="label-one">Region II - Cagayan Valley - <?php echo round($pcity2) ?>%</p>
                <p class="label-two">Region X - Northern Mindanao - <?php echo round($pcity11) ?>%</p>
            </div>  

            <div class="legend-two">
                <p class="label-one">Region III - Central Luzon - <?php echo round($pcity3) ?>%</p>
                <p class="label-two">Region XI - Davao Region  - <?php echo round($pcity12) ?>%</p>
            </div>  

            <div class="legend-two">
                <p class="label-one">Region IV-A - CALABARZON - <?php echo round($pcity4) ?>%</p>
                <p class="label-two">Region XII - SOCCSKSARGEN - <?php echo round($pcity13) ?>%</p>
            </div>  

            <div class="legend-two">
                <p class="label-one">MIMAROPA Region - <?php echo round($pcity5) ?>%</p>
                <p class="label-two">Region XIII - Caraga - <?php echo round($pcity14) ?>%</p>
            </div>  

            <div class="legend-two">
                <p class="label-one">Region V - Bicol Region - <?php echo round($pcity6) ?>%</p>
                <p class="label-two">NCR - National Capital Region - <?php echo round($pcity15) ?>%</p>
            </div>  

            <div class="legend-two">
                <p class="label-one">Region VI - Western Visayas - <?php echo round($pcity7) ?>%</p>
                <p class="label-two">CAR - Cordillera Administrative Region - <?php echo round($pcity16) ?>%</p>
            </div>  

            <div class="legend-two">
                <p class="label-one">Region VII - Central Visayas - <?php echo round($pcity8) ?>%</p>
                <p class="label-two">BARMM - Bangsamoro Autonomous Region in Muslim Mindanao - <?php echo round($pcity17) ?>%</p>
            </div>  

            <div class="legend-two">
                <p class="label-one">Region VIII -Eastern Visayas - <?php echo round($pcity9) ?>%</p>
                <p class="label-two">Outside the Philippines - <?php echo round($pcity18) ?>% </p>
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

    var region = 
    ["Geographic Distribution",
    "",
    "Region I - Ilocos Region", 
    "Region II - Cagayan Valley", 
    "Region III - Central Luzon",
    "Region IV-A - CALABARZON",
    "MIMAROPA Region",
    "Region V - Bicol Region", 
    "Region VI - Western Visayas", 
    "Region VII - Central Visayas", 
    "Region VIII -Eastern Visayas", 
    "Region IX - Zamboanga Peninsula", 
    "Region X - Northern Mindanao", 
    "Region XI - Davao Region", 
    "Region XII - SOCCSKSARGEN", 
    "Region XIII - Caraga", 
    "NCR - National Capital Region", 
    "CAR - Cordillera Administrative Regio", 
    "BARMM - Bangsamoro Autonomous Region in Muslim Mindanao",
    "Outside the Philippines"];

    var percentage = 
    ["Equivalent Percentage",
    "",
    "<?php echo round($pcity1) ?>%", 
    "<?php echo round($pcity2) ?>%", 
    "<?php echo round($pcity3) ?>%",
    "<?php echo round($pcity4) ?>%",
    "<?php echo round($pcity5) ?>%",
    "<?php echo round($pcity6) ?>%", 
    "<?php echo round($pcity7) ?>%", 
    "<?php echo round($pcity8) ?>%", 
    "<?php echo round($pcity9) ?>%", 
    "<?php echo round($pcity10) ?>%", 
    "<?php echo round($pcity11) ?>%", 
    "<?php echo round($pcity12) ?>%", 
    "<?php echo round($pcity13) ?>%", 
    "<?php echo round($pcity14) ?>%", 
    "<?php echo round($pcity15) ?>%", 
    "<?php echo round($pcity16) ?>%", 
    "<?php echo round($pcity17) ?>%",
    "<?php echo round($pcity18) ?>%"];
    
    var quantity = 
    ["Number of Alumni",
    "",
    "<?php echo $cityemp1  ?>", 
    "<?php echo $cityemp2  ?>", 
    "<?php echo $cityemp3  ?>",
    "<?php echo $cityemp4  ?>",
    "<?php echo $cityemp5  ?>",
    "<?php echo $cityemp6  ?>", 
    "<?php echo $cityemp7  ?>", 
    "<?php echo $cityemp8  ?>", 
    "<?php echo $cityemp9  ?>", 
    "<?php echo $cityemp10  ?>", 
    "<?php echo $cityemp11  ?>", 
    "<?php echo $cityemp12  ?>", 
    "<?php echo $cityemp13  ?>", 
    "<?php echo $cityemp14  ?>", 
    "<?php echo $cityemp15  ?>", 
    "<?php echo $cityemp16  ?>", 
    "<?php echo $cityemp17  ?>",
    "<?php echo $cityemp18  ?>"];

    var eValues = ["Region I", "Region II", "Region III", "Region IV-A", "Region IV-B", "Region V", "Region VI", "Region VII", "Region VIII", "Region IX", "Region X", "Region XI", "Region XII", "Region XIII", "NCR", "CAR", "BARMM", "Outside the Philippines"];
    var fValues2017 = [<?php echo $cityemp1  ?>, <?php echo $cityemp2  ?>, <?php echo $cityemp3  ?>, <?php echo $cityemp4  ?>, <?php echo $cityemp5  ?>, <?php echo $cityemp6  ?>, <?php echo $cityemp7  ?>, <?php echo $cityemp8  ?>, <?php echo $cityemp9  ?>, <?php echo $cityemp10  ?>, <?php echo $cityemp11  ?>, <?php echo $cityemp12  ?>, <?php echo $cityemp13  ?>, <?php echo $cityemp14  ?>, <?php echo $cityemp15  ?>, <?php echo $cityemp16  ?>, <?php echo $cityemp17  ?>, <?php echo $cityemp17  ?> , 50, 0];
    var barColors = ["GREEN", "YELLOW", "GREEN", "YELLOW", "GREEN", "YELLOW", "GREEN", "YELLOW", "GREEN", "YELLOW", "GREEN", "YELLOW", "GREEN", "YELLOW", "GREEN", "YELLOW", "GREEN", "YELOW"];

    new Chart("myChart2017-city", {
    type: "horizontalBar",
    data: {
    labels: eValues,
    datasets: [{
    backgroundColor: barColors,
    data: fValues2017
    }]
    },
    options: {
    legend: {display: false},
    title: {
    display: true,
    text: "Geographic Distrubution of Alumni Who Has Jobs <?php echo $year ?> | <?php echo $course ?> "
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

        var canvasHeight = 700;
        var canvasWidth = 1500;
    
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
        pdf.text(50, 540, region);
        pdf.text(900, 540, percentage);
        pdf.text(700, 540, quantity);
       
        pdf.text(50, 890, 'Generated By: <?php echo $A  ?>');
        pdf.text(50, 930, 'Date Generated: ' + formattedDate );
          
        // download the pdf
        pdf.save('Generated geographical report.pdf');
    });


</script>