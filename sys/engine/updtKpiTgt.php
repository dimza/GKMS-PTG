<?php

    date_default_timezone_set('Asia/Jakarta');
    $dt = date('l, jS \of F Y - h:i:s A');

//Include database connection details
require('../db_con/db2.php');

// Check connection
if (mysqli_connect_errno($con))

{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();

}   else

{
    $ide=$_POST['ide'];
    $idm=$_POST['idm'];
    $idk=$_POST['idk'];
    
    if ($idm=='3') 

    {

        $jan=$_POST['jan'];
        $feb=$_POST['feb'];
        $mar=$_POST['mar'];
        $apr=$_POST['apr'];
        $may=$_POST['may'];
        $jun=$_POST['jun'];
        $jul=$_POST['jul'];
        $aug=$_POST['aug'];
        $sep=$_POST['sep'];
        $oct=$_POST['oct'];
        $nov=$_POST['nov'];
        $dec=$_POST['dec'];
    
        $jan2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=49 AND idKpiDetIndv=$idk"); $jan3 = mysqli_fetch_assoc($jan2); $jan4 = $jan3['actual'];
        $jan5= $jan4/$jan; $jan6= $jan/$jan4; $jan7= number_format($jan5 * 100, 0);
    
        $feb2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=50 AND idKpiDetIndv=$idk"); $feb3 = mysqli_fetch_assoc($feb2); $feb4 = $feb3['actual'];
        $feb5= $feb4/$feb; $feb6= $feb/$feb4; $feb7= number_format($feb5 * 100, 0);
    
        $mar2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=51 AND idKpiDetIndv=$idk"); $mar3 = mysqli_fetch_assoc($mar2); $mar4 = $mar3['actual'];
        $mar5= $mar4/$mar; $mar6= $mar/$mar4; $mar7= number_format($mar5 * 100, 0);
   
        $apr2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=52 AND idKpiDetIndv=$idk"); $apr3 = mysqli_fetch_assoc($apr2); $apr4 = $apr3['actual'];
        $apr5= $apr4/$apr; $apr6= $apr/$apr4; $apr7= number_format($apr5 * 100, 0);

        $may2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=53 AND idKpiDetIndv=$idk"); $may3 = mysqli_fetch_assoc($may2); $may4 = $may3['actual'];
        $may5= $may4/$may; $may6= $may/$may4; $may7= number_format($may5 * 100, 0);

        $jun2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=54 AND idKpiDetIndv=$idk"); $jun3 = mysqli_fetch_assoc($jun2); $jun4 = $jun3['actual'];
        $jun5= $jun4/$jun; $jun6= $jun/$jun4; $jun7= number_format($jun5 * 100, 0);    

        $jul2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=55 AND idKpiDetIndv=$idk"); $jul3 = mysqli_fetch_assoc($jul2); $jul4 = $jul3['actual'];
        $jul5= $jul4/$jul; $jul6= $jul/$jul4; $jul7= number_format($jul5 * 100, 0);    

        $aug2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=56 AND idKpiDetIndv=$idk"); $aug3 = mysqli_fetch_assoc($aug2); $aug4 = $aug3['actual'];
        $aug5= $aug4/$aug; $aug6= $aug/$aug4; $aug7= number_format($aug5 * 100, 0);    

        $sep2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=57 AND idKpiDetIndv=$idk"); $sep3 = mysqli_fetch_assoc($sep2); $sep4 = $sep3['actual'];
        $sep5= $sep4/$sep; $sep6= $sep/$sep4; $sep7= number_format($sep5 * 100, 0);    

        $oct2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=58 AND idKpiDetIndv=$idk"); $oct3 = mysqli_fetch_assoc($oct2); $oct4 = $oct3['actual'];
        $oct5= $oct4/$oct; $oct6= $oct/$oct4; $oct7= number_format($oct5 * 100, 0);    

        $nov2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=59 AND idKpiDetIndv=$idk"); $nov3 = mysqli_fetch_assoc($nov2); $nov4 = $nov3['actual'];
        $nov5= $nov4/$nov; $nov6= $nov/$nov4; $nov7= number_format($nov5 * 100, 0);    

        $dec2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=60 AND idKpiDetIndv=$idk"); $dec3 = mysqli_fetch_assoc($dec2); $dec4 = $dec3['actual'];
        $dec5= $dec4/$dec; $dec6= $dec/$dec4; $dec7= number_format($dec5 * 100, 0);    

    
        $con->query("UPDATE monthkpimontindv SET target='$jan', achiev='$jan7', mDate='$dt', mEmp='$ide' WHERE idMtr=49 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$feb', achiev='$feb7', mDate='$dt', mEmp='$ide' WHERE idMtr=50 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$mar', achiev='$mar7', mDate='$dt', mEmp='$ide' WHERE idMtr=51 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$apr', achiev='$apr7', mDate='$dt', mEmp='$ide' WHERE idMtr=52 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$may', achiev='$may7', mDate='$dt', mEmp='$ide' WHERE idMtr=53 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$jun', achiev='$jun7', mDate='$dt', mEmp='$ide' WHERE idMtr=54 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$jul', achiev='$jul7', mDate='$dt', mEmp='$ide' WHERE idMtr=55 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$aug', achiev='$aug7', mDate='$dt', mEmp='$ide' WHERE idMtr=56 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$sep', achiev='$sep7', mDate='$dt', mEmp='$ide' WHERE idMtr=57 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$oct', achiev='$oct7', mDate='$dt', mEmp='$ide' WHERE idMtr=58 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$nov', achiev='$nov7', mDate='$dt', mEmp='$ide' WHERE idMtr=59 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$dec', achiev='$dec7', mDate='$dt', mEmp='$ide' WHERE idMtr=60 AND idKpiDetIndv=$idk");
    
        $sql = "UPDATE month SET jan='$jan', feb='$feb', mar='$mar', apr='$apr', may='$may', jun='$jun', jul='$jul', aug='$aug', sep='$sep', oct='$oct', nov='$nov', decm='$dec' WHERE idKpiDetIndv='$idk'";
    
            if (mysqli_query($con, $sql)) { header("Location: ../../_viewkpi.php?kd=$idk&&mtr=3"); } 
            else { echo "Error: " . $sql . "<br>" . mysqli_error($con); }

    } else if ($idm=='4') {

        $q1=$_POST['q1'];
        $q2=$_POST['q2'];
        $q3=$_POST['q3'];
        $q4=$_POST['q4'];
    
        $q12 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=61 AND idKpiDetIndv=$idk"); $q13 = mysqli_fetch_assoc($q12); $q14 = $q13['actual'];
        $q15= $q14/$q1; $q16= $q1/$q14; $q17= number_format($q15 * 100, 0);
    
        $q22 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=62 AND idKpiDetIndv=$idk"); $q23 = mysqli_fetch_assoc($q22); $q24 = $q23['actual'];
        $q25= $q24/$q2; $q26= $q2/$q24; $q27= number_format($q25 * 100, 0);
    
        $q32 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=63 AND idKpiDetIndv=$idk"); $q33 = mysqli_fetch_assoc($q32); $q34 = $q33['actual'];
        $q35= $q34/$q3; $q36= $q3/$q34; $q37= number_format($q35 * 100, 0);
   
        $q42 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=64 AND idKpiDetIndv=$idk"); $q43 = mysqli_fetch_assoc($q42); $q44 = $q43['actual'];
        $q45= $q44/$q4; $q46= $q4/$q44; $q47= number_format($q45 * 100, 0);   

    
        $con->query("UPDATE monthkpimontindv SET target='$q1', achiev='$q17', mDate='$dt' WHERE idMtr=61 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$q2', achiev='$q27', mDate='$dt' WHERE idMtr=62 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$q3', achiev='$q37', mDate='$dt' WHERE idMtr=63 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$q4', achiev='$q47', mDate='$dt' WHERE idMtr=64 AND idKpiDetIndv=$idk");

    
        $sql = "UPDATE quarter SET q1='$q1', q2='$q2', q3='$q3', q4='$q4' WHERE idKpiDetIndv='$idk'";
    
            if (mysqli_query($con, $sql)) { header("Location: ../../_viewkpi.php?kd=$idk&&mtr=4"); } 
            else { echo "Error: " . $sql . "<br>" . mysqli_error($con); }
    
    } else if ($idm=='5') {

        $yr=$_POST['yr'];
    
        $yr2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=65 AND idKpiDetIndv=$idk"); 
        $yr3 = mysqli_fetch_assoc($yr2); 
        $yr4 = $yr3['actual'];
        
        $yr5= $yr4/$yr; 
        $yr6= $yr/$yr4; 
        $yr7= number_format($yr5 * 100, 0);
    
        $con->query("UPDATE monthkpimontindv SET target='$yr', achiev='$yr7', mDate='$dt' WHERE idMtr=65 AND idKpiDetIndv=$idk");
    
        $sql = "UPDATE year SET year='$yr' WHERE idKpiDetIndv='$idk'";
    
            if (mysqli_query($con, $sql)) { header("Location: ../../_viewkpi.php?kd=$idk&&mtr=5"); } 
            else { echo "Error: " . $sql . "<br>" . mysqli_error($con); }

    } else if ($idm=='2') {

        $week01=$_POST['week01'];
        $week02=$_POST['week02'];
        $week03=$_POST['week03'];
        $week04=$_POST['week04'];
        $week05=$_POST['week05'];
        $week06=$_POST['week06'];
        $week07=$_POST['week07'];
        $week08=$_POST['week08'];
        $week09=$_POST['week09'];
        $week10=$_POST['week10'];
        $week11=$_POST['week11'];
        $week12=$_POST['week12'];

        $week13=$_POST['week13'];
        $week14=$_POST['week14'];
        $week15=$_POST['week15'];
        $week16=$_POST['week16'];
        $week17=$_POST['week17'];
        $week18=$_POST['week18'];
        $week19=$_POST['week19'];
        $week20=$_POST['week20'];
        $week21=$_POST['week21'];
        $week22=$_POST['week22'];
        $week23=$_POST['week23'];
        $week24=$_POST['week24'];

        $week25=$_POST['week25'];
        $week26=$_POST['week26'];
        $week27=$_POST['week27'];
        $week28=$_POST['week28'];
        $week29=$_POST['week29'];
        $week30=$_POST['week30'];
        $week31=$_POST['week31'];
        $week32=$_POST['week32'];
        $week33=$_POST['week33'];
        $week34=$_POST['week34'];
        $week35=$_POST['week35'];
        $week36=$_POST['week36'];

        $week37=$_POST['week37'];
        $week38=$_POST['week38'];
        $week39=$_POST['week39'];
        $week40=$_POST['week40'];
        $week41=$_POST['week41'];
        $week42=$_POST['week42'];
        $week43=$_POST['week43'];
        $week44=$_POST['week44'];
        $week45=$_POST['week45'];
        $week46=$_POST['week46'];
        $week47=$_POST['week47'];
        $week48=$_POST['week48'];        
    
        $week01_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=1 AND idKpiDetIndv=$idk"); $week01_3 = mysqli_fetch_assoc($week01_2); $week01_4 = $week01_3['actual'];
        $week01_5= $week01_4/$week01; $week01_6= $week01/$week01_4; $week01_7= number_format($week01_5 * 100, 0);                     

        $week02_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=2 AND idKpiDetIndv=$idk"); $week02_3 = mysqli_fetch_assoc($week02_2); $week02_4 = $week02_3['actual'];
        $week02_5= $week02_4/$week02; $week02_6= $week02/$week02_4; $week02_7= number_format($week02_5 * 100, 0);                     

        $week03_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=3 AND idKpiDetIndv=$idk"); $week03_3 = mysqli_fetch_assoc($week03_2); $week03_4 = $week03_3['actual'];
        $week03_5= $week03_4/$week03; $week03_6= $week03/$week03_4; $week03_7= number_format($week03_5 * 100, 0);

        $week04_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=4 AND idKpiDetIndv=$idk"); $week04_3 = mysqli_fetch_assoc($week04_2); $week04_4 = $week04_3['actual'];
        $week04_5= $week04_4/$week04; $week04_6= $week04/$week04_4; $week04_7= number_format($week04_5 * 100, 0);                     

        $week05_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=5 AND idKpiDetIndv=$idk"); $week05_3 = mysqli_fetch_assoc($week05_2); $week05_4 = $week05_3['actual'];
        $week05_5= $week05_4/$week05; $week05_6= $week05/$week05_4; $week05_7= number_format($week05_5 * 100, 0);                     

        $week06_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=6 AND idKpiDetIndv=$idk"); $week06_3 = mysqli_fetch_assoc($week06_2); $week06_4 = $week06_3['actual'];
        $week06_5= $week06_4/$week06; $week06_6= $week06/$week06_4; $week06_7= number_format($week06_5 * 100, 0);                     

        $week07_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=7 AND idKpiDetIndv=$idk"); $week07_3 = mysqli_fetch_assoc($week07_2); $week07_4 = $week07_3['actual'];
        $week07_5= $week07_4/$week07; $week07_6= $week07/$week07_4; $week07_7= number_format($week07_5 * 100, 0);                     

        $week08_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=8 AND idKpiDetIndv=$idk"); $week08_3 = mysqli_fetch_assoc($week08_2); $week08_4 = $week08_3['actual'];
        $week08_5= $week08_4/$week08; $week08_6= $week08/$week08_4; $week08_7= number_format($week08_5 * 100, 0);                     

        $week09_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=9 AND idKpiDetIndv=$idk"); $week09_3 = mysqli_fetch_assoc($week09_2); $week09_4 = $week09_3['actual'];
        $week09_5= $week09_4/$week09; $week09_6= $week09/$week09_4; $week09_7= number_format($week09_5 * 100, 0);                     

        $week10_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=10 AND idKpiDetIndv=$idk"); $week10_3 = mysqli_fetch_assoc($week10_2); $week10_4 = $week10_3['actual'];
        $week10_5= $week10_4/$week10; $week10_6= $week10/$week10_4; $week10_7= number_format($week10_5 * 100, 0);                     

        $week11_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=11 AND idKpiDetIndv=$idk"); $week11_3 = mysqli_fetch_assoc($week11_2); $week11_4 = $week11_3['actual'];
        $week11_5= $week11_4/$week11; $week11_6= $week11/$week11_4; $week11_7= number_format($week11_5 * 100, 0);                     

        $week12_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=12 AND idKpiDetIndv=$idk"); $week12_3 = mysqli_fetch_assoc($week12_2); $week12_4 = $week12_3['actual'];
        $week12_5= $week12_4/$week12; $week12_6= $week12/$week12_4; $week12_7= number_format($week12_5 * 100, 0);                     

        $week13_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=13 AND idKpiDetIndv=$idk"); $week13_3 = mysqli_fetch_assoc($week13_2); $week13_4 = $week13_3['actual'];
        $week13_5= $week13_4/$week13; $week13_6= $week13/$week13_4; $week13_7= number_format($week13_5 * 100, 0);                     

        $week14_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=14 AND idKpiDetIndv=$idk"); $week14_3 = mysqli_fetch_assoc($week14_2); $week14_4 = $week14_3['actual'];
        $week14_5= $week14_4/$week14; $week14_6= $week14/$week14_4; $week14_7= number_format($week14_5 * 100, 0);                     

        $week15_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=15 AND idKpiDetIndv=$idk"); $week15_3 = mysqli_fetch_assoc($week15_2); $week15_4 = $week15_3['actual'];
        $week15_5= $week15_4/$week15; $week15_6= $week15/$week15_4; $week15_7= number_format($week15_5 * 100, 0);                     

        $week16_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=16 AND idKpiDetIndv=$idk"); $week16_3 = mysqli_fetch_assoc($week16_2); $week16_4 = $week16_3['actual'];
        $week16_5= $week16_4/$week16; $week16_6= $week16/$week16_4; $week16_7= number_format($week16_5 * 100, 0);                     

        $week17_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=17 AND idKpiDetIndv=$idk"); $week17_3 = mysqli_fetch_assoc($week17_2); $week17_4 = $week17_3['actual'];
        $week17_5= $week17_4/$week17; $week17_6= $week17/$week17_4; $week17_7= number_format($week17_5 * 100, 0);                     

        $week18_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=18 AND idKpiDetIndv=$idk"); $week18_3 = mysqli_fetch_assoc($week18_2); $week18_4 = $week18_3['actual'];
        $week18_5= $week18_4/$week18; $week18_6= $week18/$week18_4; $week18_7= number_format($week18_5 * 100, 0);                     

        $week19_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=19 AND idKpiDetIndv=$idk"); $week19_3 = mysqli_fetch_assoc($week19_2); $week19_4 = $week19_3['actual'];
        $week19_5= $week19_4/$week19; $week19_6= $week19/$week19_4; $week19_7= number_format($week19_5 * 100, 0);

        $week20_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=20 AND idKpiDetIndv=$idk"); $week20_3 = mysqli_fetch_assoc($week20_2); $week20_4 = $week20_3['actual'];
        $week20_5= $week20_4/$week20; $week20_6= $week20/$week20_4; $week20_7= number_format($week20_5 * 100, 0);                     

        $week21_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=21 AND idKpiDetIndv=$idk"); $week21_3 = mysqli_fetch_assoc($week21_2); $week21_4 = $week21_3['actual'];
        $week21_5= $week21_4/$week21; $week21_6= $week21/$week21_4; $week21_7= number_format($week21_5 * 100, 0);                     

        $week22_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=22 AND idKpiDetIndv=$idk"); $week22_3 = mysqli_fetch_assoc($week22_2); $week22_4 = $week22_3['actual'];
        $week22_5= $week22_4/$week22; $week22_6= $week22/$week22_4; $week22_7= number_format($week22_5 * 100, 0);                     

        $week23_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=23 AND idKpiDetIndv=$idk"); $week23_3 = mysqli_fetch_assoc($week23_2); $week23_4 = $week23_3['actual'];
        $week23_5= $week23_4/$week23; $week23_6= $week23/$week23_4; $week23_7= number_format($week23_5 * 100, 0);                     

        $week24_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=24 AND idKpiDetIndv=$idk"); $week24_3 = mysqli_fetch_assoc($week24_2); $week24_4 = $week24_3['actual'];
        $week24_5= $week24_4/$week24; $week24_6= $week24/$week24_4; $week24_7= number_format($week24_5 * 100, 0);                     

        $week25_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=25 AND idKpiDetIndv=$idk"); $week25_3 = mysqli_fetch_assoc($week25_2); $week25_4 = $week25_3['actual'];
        $week25_5= $week25_4/$week25; $week25_6= $week25/$week25_4; $week25_7= number_format($week25_5 * 100, 0);                     

        $week26_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=26 AND idKpiDetIndv=$idk"); $week26_3 = mysqli_fetch_assoc($week26_2); $week26_4 = $week26_3['actual'];
        $week26_5= $week26_4/$week26; $week26_6= $week26/$week26_4; $week26_7= number_format($week26_5 * 100, 0);                     

        $week27_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=27 AND idKpiDetIndv=$idk"); $week27_3 = mysqli_fetch_assoc($week27_2); $week27_4 = $week27_3['actual'];
        $week27_5= $week27_4/$week27; $week27_6= $week27/$week27_4; $week27_7= number_format($week27_5 * 100, 0);                     

        $week28_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=28 AND idKpiDetIndv=$idk"); $week28_3 = mysqli_fetch_assoc($week28_2); $week28_4 = $week28_3['actual'];
        $week28_5= $week28_4/$week28; $week28_6= $week28/$week28_4; $week28_7= number_format($week28_5 * 100, 0);                     

        $week29_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=29 AND idKpiDetIndv=$idk"); $week29_3 = mysqli_fetch_assoc($week29_2); $week29_4 = $week29_3['actual'];
        $week29_5= $week29_4/$week29; $week29_6= $week29/$week29_4; $week29_7= number_format($week29_5 * 100, 0);                     

        $week30_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=30 AND idKpiDetIndv=$idk"); $week30_3 = mysqli_fetch_assoc($week30_2); $week30_4 = $week30_3['actual'];
        $week30_5= $week30_4/$week30; $week30_6= $week30/$week30_4; $week30_7= number_format($week30_5 * 100, 0);                     

        $week31_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=31 AND idKpiDetIndv=$idk"); $week31_3 = mysqli_fetch_assoc($week31_2); $week31_4 = $week31_3['actual'];
        $week31_5= $week31_4/$week31; $week31_6= $week31/$week31_4; $week31_7= number_format($week31_5 * 100, 0);                     

        $week32_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=32 AND idKpiDetIndv=$idk"); $week32_3 = mysqli_fetch_assoc($week32_2); $week32_4 = $week32_3['actual'];
        $week32_5= $week32_4/$week32; $week32_6= $week32/$week32_4; $week32_7= number_format($week32_5 * 100, 0);                     

        $week33_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=33 AND idKpiDetIndv=$idk"); $week33_3 = mysqli_fetch_assoc($week33_2); $week33_4 = $week33_3['actual'];
        $week33_5= $week33_4/$week33; $week33_6= $week33/$week33_4; $week33_7= number_format($week33_5 * 100, 0); 

        $week34_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=34 AND idKpiDetIndv=$idk"); $week34_3 = mysqli_fetch_assoc($week34_2); $week34_4 = $week34_3['actual'];
        $week34_5= $week34_4/$week34; $week34_6= $week34/$week34_4; $week34_7= number_format($week34_5 * 100, 0);                     
                    
        $week35_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=35 AND idKpiDetIndv=$idk"); $week35_3 = mysqli_fetch_assoc($week35_2); $week35_4 = $week35_3['actual'];
        $week35_5= $week35_4/$week35; $week35_6= $week35/$week35_4; $week35_7= number_format($week35_5 * 100, 0);                     

        $week36_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=36 AND idKpiDetIndv=$idk"); $week36_3 = mysqli_fetch_assoc($week36_2); $week36_4 = $week36_3['actual'];
        $week36_5= $week36_4/$week36; $week36_6= $week36/$week36_4; $week36_7= number_format($week36_5 * 100, 0);                     

        $week37_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=37 AND idKpiDetIndv=$idk"); $week37_3 = mysqli_fetch_assoc($week37_2); $week37_4 = $week37_3['actual'];
        $week37_5= $week37_4/$week37; $week37_6= $week37/$week37_4; $week37_7= number_format($week37_5 * 100, 0);                     

        $week38_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=38 AND idKpiDetIndv=$idk"); $week38_3 = mysqli_fetch_assoc($week38_2); $week38_4 = $week38_3['actual'];
        $week38_5= $week38_4/$week38; $week38_6= $week38/$week38_4; $week38_7= number_format($week38_5 * 100, 0);                     

        $week39_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=39 AND idKpiDetIndv=$idk"); $week39_3 = mysqli_fetch_assoc($week39_2); $week39_4 = $week39_3['actual'];
        $week39_5= $week39_4/$week39; $week39_6= $week39/$week39_4; $week39_7= number_format($week39_5 * 100, 0);                     

        $week40_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=40 AND idKpiDetIndv=$idk"); $week40_3 = mysqli_fetch_assoc($week40_2); $week40_4 = $week40_3['actual'];
        $week40_5= $week40_4/$week40; $week40_6= $week40/$week40_4; $week40_7= number_format($week40_5 * 100, 0);                     

        $week41_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=41 AND idKpiDetIndv=$idk"); $week41_3 = mysqli_fetch_assoc($week41_2); $week41_4 = $week41_3['actual'];
        $week41_5= $week41_4/$week41; $week41_6= $week41/$week41_4; $week41_7= number_format($week41_5 * 100, 0);                     

        $week42_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=42 AND idKpiDetIndv=$idk"); $week42_3 = mysqli_fetch_assoc($week42_2); $week42_4 = $week42_3['actual'];
        $week42_5= $week42_4/$week42; $week42_6= $week42/$week42_4; $week42_7= number_format($week42_5 * 100, 0);

        $week43_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=43 AND idKpiDetIndv=$idk"); $wee43_3 = mysqli_fetch_assoc($week43_2); $week43_4 = $week43_3['actual'];
        $week43_5= $week43_4/$week43; $week43_6= $week43/$week43_4; $week43_7= number_format($week43_5 * 100, 0);                     

        $week44_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=44 AND idKpiDetIndv=$idk"); $week44_3 = mysqli_fetch_assoc($week44_2); $week44_4 = $week44_3['actual'];
        $week44_5= $week44_4/$week44; $week44_6= $week44/$week44_4; $week44_7= number_format($week44_5 * 100, 0);                     

        $week45_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=45 AND idKpiDetIndv=$idk"); $week45_3 = mysqli_fetch_assoc($week45_2); $week45_4 = $week45_3['actual'];
        $week45_5= $week45_4/$week45; $week45_6= $week45/$week45_4; $week45_7= number_format($week45_5 * 100, 0);

        $week46_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=46 AND idKpiDetIndv=$idk"); $week46_3 = mysqli_fetch_assoc($week46_2); $week46_4 = $week46_3['actual'];
        $week46_5= $week46_4/$week46; $week46_6= $week46/$week46_4; $week46_7= number_format($week46_5 * 100, 0);                     
                            
        $week47_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=47 AND idKpiDetIndv=$idk"); $week47_3 = mysqli_fetch_assoc($week47_2); $week47_4 = $week47_3['actual'];
        $week47_5= $week47_4/$week47; $week47_6= $week47/$week47_4; $week47_7= number_format($week47_5 * 100, 0);                     

        $week48_2 = $con->query("SELECT actual FROM monthkpimontindv  WHERE idMtr=48 AND idKpiDetIndv=$idk"); $week48_3 = mysqli_fetch_assoc($week48_2); $week48_4 = $week48_3['actual'];
        $week48_5= $week48_4/$week48; $week48_6= $week48/$week48_4; $week48_7= number_format($week48_5 * 100, 0);                     

        $con->query("UPDATE monthkpimontindv SET target='$week01', achiev='$week01_7', mDate='$dt' WHERE idMtr=1 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week02', achiev='$week02_7', mDate='$dt' WHERE idMtr=2 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week03', achiev='$week03_7', mDate='$dt' WHERE idMtr=3 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week04', achiev='$week04_7', mDate='$dt' WHERE idMtr=4 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week05', achiev='$week05_7', mDate='$dt' WHERE idMtr=5 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week06', achiev='$week06_7', mDate='$dt' WHERE idMtr=6 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week07', achiev='$week07_7', mDate='$dt' WHERE idMtr=7 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week08', achiev='$week08_7', mDate='$dt' WHERE idMtr=8 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week09', achiev='$week09_7', mDate='$dt' WHERE idMtr=9 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week10', achiev='$week10_7', mDate='$dt' WHERE idMtr=10 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week11', achiev='$week11_7', mDate='$dt' WHERE idMtr=11 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week12', achiev='$week12_7', mDate='$dt' WHERE idMtr=12 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week13', achiev='$week13_7', mDate='$dt' WHERE idMtr=13 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week14', achiev='$week14_7', mDate='$dt' WHERE idMtr=14 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week15', achiev='$week15_7', mDate='$dt' WHERE idMtr=15 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week16', achiev='$week16_7', mDate='$dt' WHERE idMtr=16 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week17', achiev='$week17_7', mDate='$dt' WHERE idMtr=17 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week18', achiev='$week18_7', mDate='$dt' WHERE idMtr=18 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week19', achiev='$week19_7', mDate='$dt' WHERE idMtr=19 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week20', achiev='$week20_7', mDate='$dt' WHERE idMtr=20 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week21', achiev='$week21_7', mDate='$dt' WHERE idMtr=21 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week22', achiev='$week22_7', mDate='$dt' WHERE idMtr=22 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week23', achiev='$week23_7', mDate='$dt' WHERE idMtr=23 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week24', achiev='$week24_7', mDate='$dt' WHERE idMtr=24 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week25', achiev='$week25_7', mDate='$dt' WHERE idMtr=25 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week26', achiev='$week26_7', mDate='$dt' WHERE idMtr=26 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week27', achiev='$week27_7', mDate='$dt' WHERE idMtr=27 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week28', achiev='$week28_7', mDate='$dt' WHERE idMtr=28 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week29', achiev='$week29_7', mDate='$dt' WHERE idMtr=29 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week30', achiev='$week30_7', mDate='$dt' WHERE idMtr=30 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week31', achiev='$week31_7', mDate='$dt' WHERE idMtr=31 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week32', achiev='$week32_7', mDate='$dt' WHERE idMtr=32 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week33', achiev='$week33_7', mDate='$dt' WHERE idMtr=33 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week34', achiev='$week34_7', mDate='$dt' WHERE idMtr=34 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week35', achiev='$week35_7', mDate='$dt' WHERE idMtr=35 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week36', achiev='$week36_7', mDate='$dt' WHERE idMtr=36 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week37', achiev='$week37_7', mDate='$dt' WHERE idMtr=37 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week38', achiev='$week38_7', mDate='$dt' WHERE idMtr=38 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week39', achiev='$week39_7', mDate='$dt' WHERE idMtr=39 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week40', achiev='$week40_7', mDate='$dt' WHERE idMtr=40 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week41', achiev='$week41_7', mDate='$dt' WHERE idMtr=41 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week42', achiev='$week42_7', mDate='$dt' WHERE idMtr=42 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week43', achiev='$week43_7', mDate='$dt' WHERE idMtr=43 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week44', achiev='$week44_7', mDate='$dt' WHERE idMtr=44 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week45', achiev='$week45_7', mDate='$dt' WHERE idMtr=45 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week46', achiev='$week46_7', mDate='$dt' WHERE idMtr=46 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week47', achiev='$week47_7', mDate='$dt' WHERE idMtr=47 AND idKpiDetIndv=$idk");
        $con->query("UPDATE monthkpimontindv SET target='$week48', achiev='$week48_7', mDate='$dt' WHERE idMtr=48 AND idKpiDetIndv=$idk");
    
        $sql = "UPDATE week SET week01='$week01', week02='$week02', week03='$week03', week04='$week04', week05='$week05', week06='$week06', week07='$week07', week08='$week08', week09='$week09', week10='$week10', week11='$week11', week12='$week12', week13='$week13', week14='$week14', week15='$week15', week16='$week16', week17='$week17', week18='$week18', week19='$week19', week20='$week20', week21='$week21', week22='$week22', week23='$week23', week24='$week24', week25='$week25', week26='$week26', week27='$week27', week28='$week28', week29='$week29', week30='$week30', week31='$week31', week32='$week32', week33='$week33', week34='$week34', week35='$week35', week36='$week36', week37='$week37', week38='$week38', week39='$week39', week40='$week40', week41='$week41', week42='$week42', week43='$week43', week44='$week44' , week45='$week45', week46='$week46', week47='$week47', week48='$week48'  WHERE idKpiDetIndv='$idk'";
    
            if (mysqli_query($con, $sql)) { header("Location: ../../_viewkpi.php?kd=$idk&&mtr=2"); } 
            else { echo "Error: " . $sql . "<br>" . mysqli_error($con); }
    
    } else {}

}

mysqli_close($con);

?>


	