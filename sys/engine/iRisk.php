<?php

    //Include database connection details
    require('../db_con/db2.php');

    /* check connection */
    if (mysqli_connect_errno($con)) { echo "Failed to connect to DataBase: " . mysqli_connect_error(); } else {

    date_default_timezone_set('Asia/Jakarta');
    $dt = date('l, jS \of F Y - h:i:s A');

    $idk2=$_POST['idk'];
    $idem2=$_POST['idem'];
    $dsc2=$_POST['dsc'];
    $dsc3=$_POST['dsc2'];
    $dsc4=$_POST['dsc3'];
    $dsc5=$_POST['dsc4'];
    $dsc6=$_POST['dsc5'];
    $mtg2=$_POST['mtg'];
    $mtg3=$_POST['mtg2'];
    $mtg4=$_POST['mtg3'];
    $mtg5=$_POST['mtg4'];
    $mtg6=$_POST['mtg5'];    
        
        $mnt=3;

    $swh2=$_POST['swh'];
    
        if($swh2==1) {
            
            if(!empty($dsc2)) {
            
            //insert new strategic
            $qstrg= "INSERT INTO strategic (`idStra`, `idKpiDetIndv`, `idEmp`, `description`, `sDate`, `eDate`, `mDate`, `vis`) VALUES (NULL, '$idk2', '$idem2', '$dsc2', 0, 0, '$dt', 0)";
                               
                if (mysqli_query($con, $qstrg)) { } 
                else { echo "Error: " . $qstrg . "<br>" . mysqli_error($con); }            
            
            } else { }
            
            if(!empty($dsc3)) {
            
            //insert new strategic
            $qstrg2= "INSERT INTO strategic (`idStra`, `idKpiDetIndv`, `idEmp`, `description`, `sDate`, `eDate`, `mDate`, `vis`) VALUES (NULL, '$idk2', '$idem2', '$dsc3', 0, 0, '$dt', 0)";
                               
                if (mysqli_query($con, $qstrg2)) { } 
                else { echo "Error: " . $qstrg2 . "<br>" . mysqli_error($con); }            
            
            } else { }
            
            if(!empty($dsc4)) {
            
            //insert new strategic
            $qstrg3= "INSERT INTO strategic (`idStra`, `idKpiDetIndv`, `idEmp`, `description`, `sDate`, `eDate`, `mDate`, `vis`) VALUES (NULL, '$idk2', '$idem2', '$dsc4', 0, 0, '$dt', 0)";
                               
                if (mysqli_query($con, $qstrg3)) { } 
                else { echo "Error: " . $qstrg3 . "<br>" . mysqli_error($con); }            
            
            } else { }
            
            if(!empty($dsc5)) {
            
            //insert new strategic
            $qstrg4= "INSERT INTO strategic (`idStra`, `idKpiDetIndv`, `idEmp`, `description`, `sDate`, `eDate`, `mDate`, `vis`) VALUES (NULL, '$idk2', '$idem2', '$dsc5', 0, 0, '$dt', 0)";
                               
                if (mysqli_query($con, $qstrg4)) { } 
                else { echo "Error: " . $qstrg4 . "<br>" . mysqli_error($con); }            
            
            } else { }
             
            if(!empty($dsc6)) {
            
            //insert new strategic
            $qstrg5= "INSERT INTO strategic (`idStra`, `idKpiDetIndv`, `idEmp`, `description`, `sDate`, `eDate`, `mDate`, `vis`) VALUES (NULL, '$idk2', '$idem2', '$dsc6', 0, 0, '$dt', 0)";
                               
                if (mysqli_query($con, $qstrg5)) { } 
                else { echo "Error: " . $qstrg5 . "<br>" . mysqli_error($con); }            
            
            } else { }
            
        } else if($swh2==2) {
            
            if(!empty($dsc2)) {
            
            //insert new risk title
            $qrsk= "INSERT INTO risk (`idRisk`, `idKpiDetIndv`, `idEmp`, `description`, `mitigation`, `likelihood`, `impact`, `mDate`, `vis`) VALUES (NULL, '$idk2', '$idem2', '$dsc2', '$mtg2', 0, 0, '$dt', 0)";
            
                if (mysqli_query($con, $qrsk)) { } 
                else { echo "Error: " . $qrsk . "<br>" . mysqli_error($con); }                
                
            } else { }
            
            if(!empty($dsc3)) {
            
            //insert new risk title
            $qrsk2= "INSERT INTO risk (`idRisk`, `idKpiDetIndv`, `idEmp`, `description`, `mitigation`, `likelihood`, `impact`, `mDate`, `vis`) VALUES (NULL, '$idk2', '$idem2', '$dsc3', '$mtg3', 0, 0, '$dt', 0)";
                
                if (mysqli_query($con, $qrsk2)) { } 
                else { echo "Error: " . $$qrsk2 . "<br>" . mysqli_error($con); }
                
            } else { }
            
            if(!empty($dsc4)) {
            
            //insert new risk title
            $qrsk3= "INSERT INTO risk (`idRisk`, `idKpiDetIndv`, `idEmp`, `description`, `mitigation`, `likelihood`, `impact`, `mDate`, `vis`) VALUES (NULL, '$idk2', '$idem2', '$dsc4', '$mtg4', 0, 0, '$dt', 0)";
                
                if (mysqli_query($con, $qrsk3)) { } 
                else { echo "Error: " . $$qrsk3 . "<br>" . mysqli_error($con); }
                
            } else { }
            
            if(!empty($dsc5)) {
            
            //insert new risk title
            $qrsk4= "INSERT INTO risk (`idRisk`, `idKpiDetIndv`, `idEmp`, `description`, `mitigation`, `likelihood`, `impact`, `mDate`, `vis`) VALUES (NULL, '$idk2', '$idem2', '$dsc5', '$mtg5', 0, 0, '$dt', 0)";
                
                if (mysqli_query($con, $qrsk4)) { } 
                else { echo "Error: " . $$qrsk4 . "<br>" . mysqli_error($con); }
                
            } else { }
            
            if(!empty($dsc6)) {
            
            //insert new risk title
            $qrsk5= "INSERT INTO risk (`idRisk`, `idKpiDetIndv`, `idEmp`, `description`, `mitigation`, `likelihood`, `impact`, `mDate`, `vis`) VALUES (NULL, '$idk2', '$idem2', '$dsc6', '$mtg6', 0, 0, '$dt', 0)";
                
                if (mysqli_query($con, $qrsk5)) { } 
                else { echo "Error: " . $$qrsk5 . "<br>" . mysqli_error($con); }
                
            } else { }
            
        } 
 
    } header("Location: ../../_viewKpi.php?kd=$idk2&&mtr=$mnt");  mysqli_close($con); ?>