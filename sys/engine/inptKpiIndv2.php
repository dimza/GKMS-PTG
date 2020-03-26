<?php

    //Include database connection details
    require('../db_con/db2.php');

    /* check connection */
    if (mysqli_connect_errno($con)) { echo "Failed to connect to DataBase: " . mysqli_connect_error(); } else {

                    $ikdi=$_POST['ikdi']; //idKpiIndv
                    $mnt=$_POST['mnt']; //idMont
                    $prd=$_POST['prd']; //period
                    $act=$_POST['act']; //actual
                    $tdy=$_POST['dt']; //date
                    $rmk=$_POST['rmk']; //rmk

                    $prd2= mysqli_real_escape_string($con, $prd);

		      $qry= "select * from `monitoring` where description='$prd2'";
		      $qm= mysqli_query($con, $qry);
		      While ($qm_row= mysqli_fetch_assoc($qm)) { $qm2 = $qm_row['idMtr']; }

		      $qry2= "select * from `monthkpimontindv` where idKpiDetIndv='$ikdi' AND idMtr='$qm2'";
		      $qki= mysqli_query($con, $qry2);
		      While ($qki_row= mysqli_fetch_assoc($qki)) { $qki2 = $qki_row['target']; }

			if($qki2 > 0) { $ach= $act/$qki2; }
                    $ach2= $qki2/$act;
                    $ach3= number_format($ach * 100, 0);

                    $qlog= "INSERT INTO logmont (`idKpiDetIndv`, `idMtr`, `actual`, `mDate`) VALUES ('$ikdi','$qm2','$act','$tdy')"; mysqli_query($con, $qlog);

        define("UPLOAD_DIR", "../../assets/file/");

        if (!empty($_FILES["nama_file"])) { $nama_file= $_FILES["nama_file"];

                if ($nama_file["error"] !== UPLOAD_ERR_OK) {

                    $qkm= "UPDATE `monthkpimontindv` SET  actual='$act', achiev='$ach3', remark='$rmk', mDate='$tdy' WHERE idKpiDetIndv='$ikdi' AND idMtr='$qm2'";

		      if (mysqli_query($con, $qkm)) { header("Location: ../../_viewKpi.php?kd=$ikdi&&mtr=$mnt"); } 
                    else { echo "Error: " . $qkm . "<br>" . mysqli_error($con); }

		      }


            // ensure a safe filename
            $nama_baru=preg_replace("/[^A-Z0-9._-]/i", "_", $nama_file["name"]);

            // dont overwirte an existising file
            $i= 0;
            $parts= pathinfo($nama_baru);

            while (file_exists(UPLOAD_DIR . $nama_baru))    { $i++; $nama_baru = $parts["filename"] . "-" . $i . "." . $parts["extension"]; }

            // preserve file from temporary directory
            $success= move_uploaded_file($nama_file["tmp_name"], UPLOAD_DIR . $nama_baru);

            if (!$success) {
                echo "<p>Unable to save file.</p>";
                exit;
                }

            // set proper permission on the new file
            chmod(UPLOAD_DIR . $nama_baru, 0644);
        
            }

                    $qkm= "UPDATE `monthkpimontindv` SET  actual='$act', achiev='$ach3', remark='$rmk', mDate='$tdy', attach='$nama_baru' WHERE idKpiDetIndv='$ikdi' AND idMtr='$qm2'";

		      if (mysqli_query($con, $qkm)) { header("Location: ../../_viewKpi.php?kd=$ikdi&&mtr=$mnt"); } 
                    else { echo "Error: " . $qkm . "<br>" . mysqli_error($con); }
	}  mysqli_close($con); ?>
