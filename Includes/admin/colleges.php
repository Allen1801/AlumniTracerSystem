<?php
    $counter = "SELECT * FROM aluminfo";
    if ($alumcount = mysqli_query($link, $counter)){
        $alumtotal = mysqli_num_rows($alumcount);
    }

    $course = " ";
    $overalltotal = 0;
    $overallgradtotal =0;

    if(isset($_POST['search'])){

        $course = $_POST['program'];
        $year = $_POST['year'];
    
        $overall = "SELECT * FROM aluminfo INNER JOIN educ on aluminfo.id = educ.id WHERE status = 'Active' AND (degree1='$course' AND years1='$year')";
        if ($overallcount = mysqli_query($link, $overall)){
            $oacount = mysqli_num_rows($overallcount);
        }
        for($o=0;$o<=$oacount;$o++){
            $overalltotal = $o;
        }

        $overallgrad = "SELECT * FROM alumni where degree='$course' AND year='$year'";
        if ($overallgradcount = mysqli_query($link, $overallgrad)){
            $oagcount = mysqli_num_rows($overallgradcount);
        }
        for($og=0;$og<=$oagcount;$og++){
            $overallgradtotal = $og;
        }

        //Bar graph for employment status
        $total = "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND empstatus = 'Unemployed' AND (degree1='$course' AND years1='$year')";
        if ($totalcount = mysqli_query($link, $total)){
            $count = mysqli_num_rows($totalcount);
        }
        for($i=0;$i<=$count;$i++){
            $unemp = $i;
        }

        $total1 = "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND empstatus = 'Employed' AND (degree1='$course' AND years1='$year')";
        if ($totalcount1 = mysqli_query($link, $total1)){
            $count1 = mysqli_num_rows($totalcount1);
        }
        for($x=0;$x<=$count1;$x++){
            $emp = $x;
        }

        //Bar Graph for Course Alignment Job
        $total2 = "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND align = 'Aligned' AND (degree1='$course' AND years1='$year')";
        if ($totalcount2 = mysqli_query($link, $total2)){
            $count2 = mysqli_num_rows($totalcount2);
        }
        for($z=0;$z<=$count2;$z++){
            $align = $z;
        }

        $total3 = "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND align = 'Not Aligned' AND (degree1='$course' AND years1='$year')";
        if ($totalcount3 = mysqli_query($link, $total3)){
            $count3 = mysqli_num_rows($totalcount3);
        }
        for($y=0;$y<=$count3;$y++){
            $unalign = $y;
        }

        //Bar graph for months before landing a Job
        $total4="SELECT * from employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND unemp = 'Absorbed' AND (degree1='$course' AND years1='$year')";
        if($totalcount4 = mysqli_query($link, $total4)){
            $count4 = mysqli_num_rows($totalcount4);
        }
        for($z=0;$z<=$count4;$z++){
            $month0 = $z;
        }

        $total5="SELECT * from employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND unemp = 'Less than 3 months' AND (degree1='$course' AND years1='$year')";
        if($totalcount5 = mysqli_query($link, $total5)){
            $count5 = mysqli_num_rows($totalcount5);
        }
        for($a=0;$a<=$count5;$a++){
            $month1 = $a;
        }

        $total6="SELECT * from employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND unemp = '3 months - Less than 6 months' AND (degree1='$course' AND years1='$year')";
        if($totalcount6 = mysqli_query($link, $total6)){
            $count6 = mysqli_num_rows($totalcount6);
        }
        for($b=0;$b<=$count6;$b++){
            $month2 = $b;
        }

        $total7="SELECT * from employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND unemp = '6 months - 1 year' AND (degree1='$course' AND years1='$year')";
        if($totalcount7 = mysqli_query($link, $total7)){
            $count7 = mysqli_num_rows($totalcount7);
        }
        for($c=0;$c<=$count7;$c++){
            $month3 = $c;
        }

        $total8="SELECT * from employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND unemp = '1 year - Less than 2 years' AND (degree1='$course' AND years1='$year')";
        if($totalcount8 = mysqli_query($link, $total8)){
            $count8 = mysqli_num_rows($totalcount8);
        }
        for($d=0;$d<=$count8;$d++){
            $month4 = $d;
        }

        $total9="SELECT * from employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND unemp = '2 years above' AND (degree1='$course' AND years1='$year')";
        if($totalcount9= mysqli_query($link, $total9)){
            $count9 = mysqli_num_rows($totalcount9);
        }
        for($e=0;$e<=$count9;$e++){
            $month5 = $e;
        }

        //Bar Graph for geographic distrubition of employees
        $city1 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region I - Ilocos Region' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount1 = mysqli_query($link, $city1)){
            $citytotalemps1 = mysqli_num_rows($citytotalcount1);
        }
        for($c1=0;$c1<=$citytotalemps1;$c1++){
            $cityemp1 = $c1;
        }

        $city2 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region II - Cagayan Valley' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount2 = mysqli_query($link, $city2)){
            $citytotalemps2 = mysqli_num_rows($citytotalcount2);
        }
        for($c2=0;$c2<=$citytotalemps2;$c2++){
            $cityemp2 = $c2;
        }

        $city3 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region III - Central Luzon' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount3 = mysqli_query($link, $city3)){
            $citytotalemps3 = mysqli_num_rows($citytotalcount3);
        }
        for($c3=0;$c3<=$citytotalemps3;$c3++){
            $cityemp3 = $c3;
        }

        $city4 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region IV-A - CALABARZON' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount4 = mysqli_query($link, $city4)){
            $citytotalemps4 = mysqli_num_rows($citytotalcount4);
        }
        for($c4=0;$c4<=$citytotalemps4;$c4++){
            $cityemp4 = $c4;
        }

        $city5 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'MIMAROPA Region' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount5 = mysqli_query($link, $city5)){
            $citytotalemps5 = mysqli_num_rows($citytotalcount5);
        }
        for($c5=0;$c5<=$citytotalemps5;$c5++){
            $cityemp5 = $c5;
        }

        $city6 = "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region V - Bicol Region' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount6 = mysqli_query($link, $city6)){
            $citytotalemps6 = mysqli_num_rows($citytotalcount6);
        }
        for($c6=0;$c6<=$citytotalemps6;$c6++){
            $cityemp6 = $c6;
        }

        $city7 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region VI - Western Visayas' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount7 = mysqli_query($link, $city7)){
            $citytotalemps7 = mysqli_num_rows($citytotalcount7);
        }
        for($c7=0;$c7<=$citytotalemps7;$c7++){
            $cityemp7 = $c7;
        }

        $city8 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region VII - Central Visayas' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount8 = mysqli_query($link, $city8)){
            $citytotalemps8 = mysqli_num_rows($citytotalcount8);
        }
        for($c8=0;$c8<=$citytotalemps8;$c8++){
            $cityemp8 = $c8;
        }

        $city9 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region VIII -Eastern Visayas' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount9 = mysqli_query($link, $city9)){
            $citytotalemps9 = mysqli_num_rows($citytotalcount9);
        }
        for($c9=0;$c9<=$citytotalemps9;$c9++){
            $cityemp9 = $c9;
        }

        $city10 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region IX - Zamboanga Peninsula' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount10 = mysqli_query($link, $city10)){
            $citytotalemps10 = mysqli_num_rows($citytotalcount10);
        }
        for($c10=0;$c10<=$citytotalemps10;$c10++){
            $cityemp10 = $c10;
        }

        $city11 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region X - Northern Mindanao' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount11 = mysqli_query($link, $city11)){
            $citytotalemps11 = mysqli_num_rows($citytotalcount11);
        }
        for($c11=0;$c11<=$citytotalemps11;$c11++){
            $cityemp11 = $c11;
        }

        $city12 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region XI - Davao Region' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount12 = mysqli_query($link, $city12)){
            $citytotalemps12 = mysqli_num_rows($citytotalcount12);
        }
        for($c12=0;$c12<=$citytotalemps12;$c12++){
            $cityemp12 = $c12;
        }

        $city13 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region XII - SOCCSKSARGEN' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount13 = mysqli_query($link, $city13)){
            $citytotalemps13 = mysqli_num_rows($citytotalcount13);
        }
        for($c13=0;$c13<=$citytotalemps13;$c13++){
            $cityemp13 = $c13;
        }

        $city14 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Region XIII - Caraga' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount14 = mysqli_query($link, $city14)){
            $citytotalemps14 = mysqli_num_rows($citytotalcount14);
        }
        for($c14=0;$c14<=$citytotalemps14;$c14++){
            $cityemp14 = $c14;
        }

        $city15 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'NCR - National Capital Region' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount15 = mysqli_query($link, $city15)){
            $citytotalemps15 = mysqli_num_rows($citytotalcount15);
        }
        for($c15=0;$c15<=$citytotalemps15;$c15++){
            $cityemp15 = $c15;
        }

        $city16 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'CAR - Cordillera Administrative Region' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount16 = mysqli_query($link, $city16)){
            $citytotalemps16 = mysqli_num_rows($citytotalcount16);
        }
        for($c16=0;$c16<=$citytotalemps16;$c16++){
            $cityemp16 = $c16;
        }

        $city17 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'BARMM - Bangsamoro Autonomous Region in Muslim Mindanao' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount17 = mysqli_query($link, $city17)){
            $citytotalemps17 = mysqli_num_rows($citytotalcount17);
        }
        for($c17=0;$c17<=$citytotalemps17;$c17++){
            $cityemp17 = $c17;
        }

        $city18 =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND city = 'Outside the Philippines' AND (degree1='$course' AND years1='$year')";
        if($citytotalcount18 = mysqli_query($link, $city18)){
            $citytotalemps18 = mysqli_num_rows($citytotalcount18);
        }
        for($c18=0;$c18<=$citytotalemps18;$c18++){
            $cityemp18 = $c18;
        }
        
        $educM =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND degree2 != ''  AND (degree1='$course' AND years1='$year')";
        if($educMcount = mysqli_query($link, $educM)){
            $educMtotal = mysqli_num_rows($educMcount);
        }
        for($educMc=0;$educMc<=$educMtotal;$educMc++){
            $educMfinal = $educMc;
        }
        
        $educD =  "SELECT * FROM employment INNER JOIN educ on employment.id = educ.id INNER JOIN aluminfo on educ.id = aluminfo.id  WHERE status='Active' AND degree3 !='' AND (degree1='$course' AND years1='$year')";
        if($educDcount = mysqli_query($link, $educD)){
            $educDtotal = mysqli_num_rows($educDcount);
        }
        for($educDc=0;$educDc<=$educDtotal;$educDc++){
            $educDfinal = $educDc;
        }
    }


    if( $overalltotal != 0){
        $peducM = $educMfinal / $overalltotal * 100;
        
        $peducD = $educDfinal / $overalltotal * 100;
        
        $punemp = $unemp /  $overalltotal * 100;

        $pemp = $emp / $overalltotal * 100;

        $palign = $align / $overalltotal * 100;

        $punalign = $unalign / $overalltotal * 100;

        $pmonth0 = $month0 /  $overalltotal * 100;
        $pmonth1 = $month1 /  $overalltotal * 100;
        $pmonth2 = $month2 /  $overalltotal * 100;
        $pmonth3 = $month3 /  $overalltotal * 100;
        $pmonth4 = $month4 /  $overalltotal * 100;
        $pmonth5 = $month5 /  $overalltotal * 100;

        $pcity1 = $cityemp1 /  $overalltotal * 100;
        $pcity2 = $cityemp2 / $overalltotal * 100;
        $pcity3 = $cityemp3 / $overalltotal * 100;
        $pcity4 = $cityemp4 / $overalltotal * 100;
        $pcity5 = $cityemp5 / $overalltotal * 100;
        $pcity6 = $cityemp6 / $overalltotal * 100;
        $pcity7 = $cityemp7 / $overalltotal * 100;
        $pcity8 = $cityemp8 / $overalltotal * 100;
        $pcity9 = $cityemp9 / $overalltotal * 100;
        $pcity10 = $cityemp10 / $overalltotal * 100;
        $pcity11 = $cityemp11 / $overalltotal * 100;
        $pcity12 = $cityemp12 / $overalltotal * 100;
        $pcity13 = $cityemp13 / $overalltotal * 100;
        $pcity14 = $cityemp14 / $overalltotal * 100;
        $pcity15 = $cityemp15 / $overalltotal * 100;
        $pcity16 = $cityemp16 / $overalltotal * 100;
        $pcity17 = $cityemp17 / $overalltotal * 100;
        $pcity18 = $cityemp18 / $overalltotal * 100;


        }else{
            $punemp = 0;
            $pemp = 0;

            $palign = 0;
            $punalign = 0;

            $pmonth0 = 0;
            $pmonth1 = 0;
            $pmonth2 = 0;
            $pmonth3 = 0;
            $pmonth4 = 0;
            $pmonth5 = 0;
            
            $pcity1 = 0;
            $pcity2 = 0;
            $pcity3 = 0;
            $pcity4 = 0;
            $pcity5 = 0;
            $pcity6 = 0;
            $pcity7 = 0;
            $pcity8 = 0;
            $pcity9 = 0;
            $pcity10 = 0;
            $pcity11 = 0;
            $pcity12 = 0;
            $pcity13 = 0;
            $pcity14 = 0;
            $pcity15 = 0;
            $pcity16 = 0;
            $pcity17 = 0;
            $pcity18 = 0;
            $peducM = 0;
            $peducD = 0;
        }
?>
