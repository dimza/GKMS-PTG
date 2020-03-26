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
    $cat=$_POST['cat']; //idCat
    $ku=$_POST['ku']; //idCat
    $cd=$_POST['cd']; //code
    $tk=$_POST['tk']; //title
    $dsc=$_POST['dsc']; //desc
    $wgh=$_POST['wgh']; //weight
    $np=$_POST['np']; //idEmp
    $idk=$_POST['idk']; //idKpiDetIndv
    $ide=$_POST['ide']; //idKpiDetIndv
    
        $sql = "UPDATE kpidetindv SET  
                	
		      idUnit='$ku',   
                    code='$cd', 
                    descr='$dsc',  
                    weight='$wgh',
                    mDate='$dt',
                    mEmp='$ide'

                WHERE idKpiDetIndv='$idk'";

                if (mysqli_query($con, $sql)) { header("Location: ../../_viewKpi.php?kd=$idk&&mtr=3"); } 
                else { echo "Error: " . $sql . "<br>" . mysqli_error($con); }

}

mysqli_close($con);

?>


    