
    console.log("try");
    var xValues = ["EMPLOYED", "UMEMPLOYED"];
    var yValues2017 = [<?php echo $emp  ?>, <?php echo $unemp  ?>, 10, 0];
    var barColors = ["GREEN", "YELLOW"];

    var aValues = ["ALIGNED", "NOT ALIGNED"];
    var bValues2017 = [<?php echo $align  ?>, <?php echo $unalign ?>, 10, 0];
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
        text: "Alumni Employment Status <?php echo $year ?>"
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
        text: "Job Alignment to Bachelor's Degree <?php echo $year ?>"
        }
    }
    });
