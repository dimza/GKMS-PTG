<?php

    //Include database connection details
    require('../db_con/db2.php');

    /* check connection */
    if (mysqli_connect_errno($con)) { echo "Failed to connect to DataBase: " . mysqli_connect_error(); } else {

    date_default_timezone_set('Asia/Jakarta');
    $dt = date('l, jS \of F Y - h:i:s A');

    $cdjt2=$_POST['cdjt'];
    $tkjt2=$_POST['tkjt'];

    $cds2=$_POST['cds'];
    $deps2=$_POST['deps'];
    $ts2=$_POST['ts'];

    $cdie2=$_POST['cdie'];
    $tie2=$_POST['tie'];

    $swh2=$_POST['swh'];
    
        if($swh2==1) {
            
            //insert new job title
            $qjt= "INSERT INTO emppos (`code`, `descr`, `mDate`) VALUES ('$cdjt2', '$tkjt2', '$dt')";
                               
                if (mysqli_query($con, $qjt)) { header("Location: ../../_register.php?al=4"); } 
                else { echo "Error: " . $qjt . "<br>" . mysqli_error($con); }            
            
        } else if($swh2==2) {
            
            //insert new section
            $qsec= "INSERT INTO empsec (`idDep`, `code`, `descr`, `mDate`) VALUES ('$deps2', '$cds2', '$ts2', '$dt')";
                               
                if (mysqli_query($con, $qsec)) { header("Location: ../../_register.php?al=5"); } 
                else { echo "Error: " . $qsec . "<br>" . mysqli_error($con); }            
            
        } else if($swh2==3) {
            
            //insert new section
            $qjt= "INSERT INTO empspv (`code`, `descr`, `mDate`) VALUES ('$cdie2', '$tie2', '$dt')";
                               
                if (mysqli_query($con, $qjt)) { header("Location: ../../_register.php?al=6"); } 
                else { echo "Error: " . $qjt . "<br>" . mysqli_error($con); }
            
        } 
 
    } mysqli_close($con); ?>