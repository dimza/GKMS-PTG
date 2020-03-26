<?php

    date_default_timezone_set('Asia/Jakarta');
    $dt = date('l, jS \of F Y - h:i:s A');

//Include database connection details
require('../db_con/db2.php');

// Check connection
if (mysqli_connect_errno($con)) { echo "Failed to connect to DataBase: " . mysqli_connect_error(); } else

{
    $cat=$_POST['cat'];     //kategori
    $sm=$_POST['sm'];       //theme Strategic Map
    $tk=$_POST['tk'];       //title kpi
    $dsc=$_POST['dsc'];     //description kpi
    $clc=$_POST['clc'];     //calculation kpi
    $ku=$_POST['ku'];       //unit kpi
    $tgt=$_POST['tgt'];     //tgt kpi akumulasi setahun
    $mnt=$_POST['mnt'];     //monitoring kpi
    $wgh=$_POST['wgh'];     //bobot kpi tiap perspektif
    $np=$_POST['np'];       //id employee kpi
    $div=$_POST['div'];     //division kode
    $dep=$_POST['dep'];     //department kode
    $sec=$_POST['sec'];     //section kode
    $yr=$_POST['yr'];       //tahun kpi
    $lvl=$_POST['lvl'];     //level kpi 0, 1, 2
    $idk=$_POST['idk'];     //id kpi ditambah 1
    $cd=$_POST['cd'];       //kode kpi (ie. f01.01)
    $spv=$_POST['spv'];     //id SPV

    
    if ($sec=='0') {  if ($dep=='0') { $sec2=0; $dep2=0; $div2=$div; } else { $sec2=0; $dep2=$dep; $div2=0; } } else { $sec2=$sec; $dep2=0; $div2=0; }
    
    if ($mnt=='3') {
    
            $tgt3= $tgt/12;
            $tgt2= number_format($tgt3, 1);
    
            $sql2= "INSERT INTO month (`idKpiDetIndv`, `jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `decm`) VALUES
                                            ('$idk','$tgt2','$tgt2','$tgt2','$tgt2','$tgt2','$tgt2','$tgt2','$tgt2','$tgt2','$tgt2','$tgt2','$tgt2')"; mysqli_query($con, $sql2);
        
            $sql3= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',49,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql3);
            $sql4= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',50,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql4);
            $sql5= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',51,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql5);
            $sql6= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',52,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql6);
            $sql7= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',53,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql7);
            $sql8= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',54,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql8);
            $sql9= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',55,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql9);
            $sql10= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',56,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql10);
            $sql11= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',57,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql11);
            $sql12= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',58,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql12);
            $sql13= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',59,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql13);
            $sql14= "INSERT INTO monthkpimontindv (`idMontIndv`, `idKpiDetIndv`, `idMont`, `idMtr`, `period`, `target`, `actual`, `achiev`, `remark`, `mDate`, `attach`, `vis`) VALUES
                                                        (NULL, '$idk','$mnt',60,0,'$tgt2',0,0,'n/a','$dt','ie.pdf',0)"; mysqli_query($con, $sql14);        
        
    }


            $sql = "INSERT INTO kpidetindv (idKpiDetIndv, idEmp, idDiv, idDep, idSec, idCat, idSm, idUnit, idMont, level, code, title, descr, calc, target, weight, mDate, year) VALUES 
                                 ('$idk', '$np', '$div2', '$dep2', '$sec2', '$cat', '$sm', '$ku', '$mnt', '$lvl', '$cd', '$tk', '$dsc', '$clc', '$tgt2', '$wgh', '$dt', '$yr')";

                if (mysqli_query($con, $sql)) { header("Location: ../../_viewKpi.php?kd=$idk&&mtr=$mnt"); } 
                else { echo "Error: " . $sql . "<br>" . mysqli_error($con); }

}

mysqli_close($con);

?>


	